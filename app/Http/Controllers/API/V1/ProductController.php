<?php


namespace App\Http\Controllers\API\V1;


use App\Business;
use App\Http\Resources\BaseCollection;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Media;
use App\Product;
use App\PurchaseLine;
use App\Utils\ModuleUtil;
use App\Utils\ProductUtil;
use App\Variation;
use App\VariationLocationDetails;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductController extends ApiController
{
    protected $rules = [];

    protected $model, $resource, $resourceCollection, $moduleUtil, $productUtil;

    public function __construct(ModuleUtil $moduleUtil, ProductUtil $productUtil)
    {
        $this->model = new Product;
        $this->resource = ProductResource::class;
        $this->resourceCollection = ProductCollection::class;
        $this->moduleUtil = $moduleUtil;
        $this->productUtil = $productUtil;
    }

    public function index(Request $request)
    {
        $user = Auth::guard('api')->user();
        $business_id = $user->business_id;
        $per_page = $request->get('per_page', 10);
        $query = Product::leftJoin('brands', 'products.brand_id', '=', 'brands.id')
            ->join('units', 'products.unit_id', '=', 'units.id')
            ->leftJoin('categories as c1', 'products.category_id', '=', 'c1.id')
            ->leftJoin('categories as c2', 'products.sub_category_id', '=', 'c2.id')
            ->leftJoin('tax_rates', 'products.tax', '=', 'tax_rates.id')
            ->join('variations as v', 'v.product_id', '=', 'products.id')
            ->leftJoin('variation_location_details as vld', 'vld.variation_id', '=', 'v.id')
            ->where('products.business_id', $business_id)
            ->where('products.type', '!=', 'modifier');

        //Filter by location
        $location_id = $request->get('location_id', null);
        $permitted_locations = $user->permitted_locations();

        if (!empty($location_id) && $location_id != 'none') {
            if ($permitted_locations == 'all' || in_array($location_id, $permitted_locations)) {
                $query->whereHas('product_locations', function ($query) use ($location_id) {
                    $query->where('product_locations.location_id', '=', $location_id);
                });
            }
        } elseif ($location_id == 'none') {
            $query->doesntHave('product_locations');
        } else {
            if ($permitted_locations != 'all') {
                $query->whereHas('product_locations', function ($query) use ($permitted_locations) {
                    $query->whereIn('product_locations.location_id', $permitted_locations);
                });
            } else {
                $query->with('product_locations');
            }
        }

        $products = $query->select(
            'products.id',
            'products.name as product',
            'products.type',
            'c1.name as category',
            'c2.name as sub_category',
            'units.actual_name as unit',
            'brands.name as brand',
            'tax_rates.name as tax',
            'products.sku',
            'products.image',
            'products.enable_stock',
            'products.is_inactive',
            'products.not_for_selling',
            'products.product_custom_field1',
            'products.product_custom_field2',
            'products.product_custom_field3',
            'products.product_custom_field4',
            DB::raw('SUM(vld.qty_available) as current_stock'),
            DB::raw('MAX(v.sell_price_inc_tax) as max_price'),
            DB::raw('MIN(v.sell_price_inc_tax) as min_price'),
            DB::raw('MAX(v.dpp_inc_tax) as max_purchase_price'),
            DB::raw('MIN(v.dpp_inc_tax) as min_purchase_price')

        )->groupBy('products.id');

        $type = $request->get('type', null);
        if (!empty($type)) {
            $products->where('products.type', $type);
        }

        $category_id = $request->get('category_id', null);
        if (!empty($category_id)) {
            $products->where('products.category_id', $category_id);
        }

        $brand_id = $request->get('brand_id', null);
        if (!empty($brand_id)) {
            $products->where('products.brand_id', $brand_id);
        }

        $unit_id = $request->get('unit_id', null);
        if (!empty($unit_id)) {
            $products->where('products.unit_id', $unit_id);
        }

        $tax_id = $request->get('tax_id', null);
        if (!empty($tax_id)) {
            $products->where('products.tax', $tax_id);
        }

        $active_state = $request->get('active_state', null);
        if ($active_state == 'active') {
            $products->Active();
        }
        if ($active_state == 'inactive') {
            $products->Inactive();
        }
        $not_for_selling = $request->get('not_for_selling', null);
        if ($not_for_selling == 'true') {
            $products->ProductNotForSales();
        }

        if (!empty($request->get('repair_model_id'))) {
            $products->where('products.repair_model_id', request()->get('repair_model_id'));
        }
        $products = $products->paginate($per_page);
        return new $this->resourceCollection($products);
    }

    public function store(Request $request)
    {
        try {
            $user = Auth::guard('api')->user();
            $business_id = $user->business_id;
            $form_fields = ['name', 'brand_id', 'unit_id', 'category_id', 'tax', 'type', 'barcode_type', 'sku', 'alert_quantity', 'tax_type', 'weight', /*'product_custom_field1', 'product_custom_field2', 'product_custom_field3', 'product_custom_field4',*/
                'product_description', 'sub_unit_ids'];

            $module_form_fields = $this->moduleUtil->getModuleFormField('product_form_fields');
            if (!empty($module_form_fields)) {
                $form_fields = array_merge($form_fields, $module_form_fields);
            }

            $product_details = $request->only($form_fields);
            $product_details['business_id'] = $business_id;
            $product_details['created_by'] = $user->id;

            $product_details['enable_stock'] = (!empty($request->input('enable_stock')) && $request->input('enable_stock') == 1) ? 1 : 0;
            $product_details['not_for_selling'] = (!empty($request->input('not_for_selling')) && $request->input('not_for_selling') == 1) ? 1 : 0;

            if (!empty($request->input('sub_category_id'))) {
                $product_details['sub_category_id'] = $request->input('sub_category_id');
            }

            if (empty($product_details['sku'])) {
                $product_details['sku'] = ' ';
            }

            $expiry_enabled = null;
            if (!empty($request->input('expiry_period_type')) && !empty($request->input('expiry_period')) && !empty($expiry_enabled) && ($product_details['enable_stock'] == 1)) {
                $product_details['expiry_period_type'] = $request->input('expiry_period_type');
                $product_details['expiry_period'] = $this->productUtil->num_uf($request->input('expiry_period'));
            }

            if (!empty($request->input('enable_sr_no')) && $request->input('enable_sr_no') == 1) {
                $product_details['enable_sr_no'] = 1;
            }

            //upload document
            $product_details['image'] = $this->productUtil->uploadFile($request, 'image', config('constants.product_img_path'), 'image');

            $product_details['warranty_id'] = !empty($request->input('warranty_id')) ? $request->input('warranty_id') : null;

            DB::beginTransaction();

            $product = Product::create($product_details);

            if (empty(trim($request->input('sku')))) {
                $sku = $this->productUtil->generateProductSku($product->id, $business_id);
                $product->sku = $sku;
                $product->save();
            }

            //Add product locations
            $product_locations = $request->input('product_locations');
            if (!empty($product_locations)) {
                $product->product_locations()->sync($product_locations);
            }

            if ($product->type == 'single') {
                $this->productUtil->createSingleProductVariation($product->id, $product->sku, $request->input('single_dpp'), $request->input('single_dpp_inc_tax'), $request->input('profit_percent'), $request->input('single_dsp'), $request->input('single_dsp_inc_tax'));
            } elseif ($product->type == 'variable') {
                if (!empty($request->input('product_variation'))) {
                    $input_variations = $request->input('product_variation');
                    $this->productUtil->createVariableProductVariations($product->id, $input_variations);
                }
            } elseif ($product->type == 'combo') {

                //Create combo_variations array by combining variation_id and quantity.
                $combo_variations = [];
                if (!empty($request->input('composition_variation_id'))) {
                    $composition_variation_id = $request->input('composition_variation_id');
                    $quantity = $request->input('quantity');
                    $unit = $request->input('unit');

                    foreach ($composition_variation_id as $key => $value) {
                        $combo_variations[] = [
                            'variation_id' => $value,
                            'quantity' => $this->productUtil->num_uf($quantity[$key]),
                            'unit_id' => $unit[$key]
                        ];
                    }
                }

                $this->productUtil->createSingleProductVariation($product->id, $product->sku, $request->input('item_level_purchase_price_total'), $request->input('purchase_price_inc_tax'), $request->input('profit_percent'), $request->input('selling_price'), $request->input('selling_price_inc_tax'), $combo_variations);
            }

            //Add product racks details.
            $product_racks = $request->get('product_racks', null);
            if (!empty($product_racks)) {
                $this->productUtil->addRackDetails($business_id, $product->id, $product_racks);
            }

            //Set Module fields
            if (!empty($request->input('has_module_data'))) {
                $this->moduleUtil->getModuleData('after_product_saved', ['product' => $product, 'request' => $request]);
            }

            DB::commit();
            return new $this->resource($product, 201, __('product.product_added_success'));
        } catch (Exception $e) {
            DB::rollBack();
            Log::emergency("File:" . $e->getFile() . "Line:" . $e->getLine() . "Message:" . $e->getMessage());
            return $this->apiResponse(__("messages.something_went_wrong"), 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $user = Auth::guard('api')->user();
            $business_id = $user->business_id;
            $product_details = $request->only(['name', 'brand_id', 'unit_id', 'category_id', 'tax', 'barcode_type', 'sku', 'alert_quantity', 'tax_type', 'weight', /*'product_custom_field1', 'product_custom_field2', 'product_custom_field3', 'product_custom_field4',*/ 'product_description', 'sub_unit_ids']);

            DB::beginTransaction();

            $product = Product::where('business_id', $business_id)
                ->where('id', $id)
                ->with(['product_variations'])
                ->first();

            $module_form_fields = $this->moduleUtil->getModuleFormField('product_form_fields');
            if (!empty($module_form_fields)) {
                foreach ($module_form_fields as $column) {
                    $product->$column = $request->input($column);
                }
            }

            $product->sku = $product_details['sku'];
            $product->name = $product_details['name'];
            $product->brand_id = $product_details['brand_id'];
            $product->unit_id = $product_details['unit_id'];
            $product->category_id = $product_details['category_id'];
            $product->tax = $product_details['tax'];
            $product->barcode_type = $product_details['barcode_type'];
            $product->alert_quantity = $product_details['alert_quantity'];
            $product->tax_type = $product_details['tax_type'];
            $product->weight = $product_details['weight'];
            /*$product->product_custom_field1 = $product_details['product_custom_field1'];
            $product->product_custom_field2 = $product_details['product_custom_field2'];
            $product->product_custom_field3 = $product_details['product_custom_field3'];
            $product->product_custom_field4 = $product_details['product_custom_field4'];*/
            $product->product_description = $product_details['product_description'];
            $product->sub_unit_ids = !empty($product_details['sub_unit_ids']) ? $product_details['sub_unit_ids'] : null;
            $product->warranty_id = !empty($request->input('warranty_id')) ? $request->input('warranty_id') : null;

            if (!empty($request->input('enable_stock')) && $request->input('enable_stock') == 1) {
                $product->enable_stock = 1;
            } else {
                $product->enable_stock = 0;
            }

            $product->not_for_selling = (!empty($request->input('not_for_selling')) && $request->input('not_for_selling') == 1) ? 1 : 0;

            if (!empty($request->input('sub_category_id'))) {
                $product->sub_category_id = $request->input('sub_category_id');
            } else {
                $product->sub_category_id = null;
            }

            $expiry_enabled = null;
            if (!empty($expiry_enabled)) {
                if (!empty($request->input('expiry_period_type')) && !empty($request->input('expiry_period')) && ($product->enable_stock == 1)) {
                    $product->expiry_period_type = $request->input('expiry_period_type');
                    $product->expiry_period = $this->productUtil->num_uf($request->input('expiry_period'));
                } else {
                    $product->expiry_period_type = null;
                    $product->expiry_period = null;
                }
            }

            if (!empty($request->input('enable_sr_no')) && $request->input('enable_sr_no') == 1) {
                $product->enable_sr_no = 1;
            } else {
                $product->enable_sr_no = 0;
            }

            //upload document
            $file_name = $this->productUtil->uploadFile($request, 'image', config('constants.product_img_path'), 'image');
            if (!empty($file_name)) {

                //If previous image found then remove
                if (!empty($product->image_path) && file_exists($product->image_path)) {
                    unlink($product->image_path);
                }

                $product->image = $file_name;
                //If product image is updated update woocommerce media id
                if (!empty($product->woocommerce_media_id)) {
                    $product->woocommerce_media_id = null;
                }
            }

            $product->save();

            //Add product locations
            $product_locations = !empty($request->input('product_locations')) ?
                $request->input('product_locations') : [];
            $product->product_locations()->sync($product_locations);

            if ($product->type == 'single') {
                $single_data = $request->only(['single_variation_id', 'single_dpp', 'single_dpp_inc_tax', 'single_dsp_inc_tax', 'profit_percent', 'single_dsp']);
                $variation = Variation::find($single_data['single_variation_id']);

                $variation->sub_sku = $product->sku;
                $variation->default_purchase_price = $this->productUtil->num_uf($single_data['single_dpp']);
                $variation->dpp_inc_tax = $this->productUtil->num_uf($single_data['single_dpp_inc_tax']);
                $variation->profit_percent = $this->productUtil->num_uf($single_data['profit_percent']);
                $variation->default_sell_price = $this->productUtil->num_uf($single_data['single_dsp']);
                $variation->sell_price_inc_tax = $this->productUtil->num_uf($single_data['single_dsp_inc_tax']);
                $variation->save();

                Media::uploadMedia($product->business_id, $variation, $request, 'variation_images');
            } elseif ($product->type == 'variable') {
                //Update existing variations
                $input_variations_edit = $request->get('product_variation_edit');
                if (!empty($input_variations_edit)) {
                    $this->productUtil->updateVariableProductVariations($product->id, $input_variations_edit);
                }

                //Add new variations created.
                $input_variations = $request->input('product_variation');
                if (!empty($input_variations)) {
                    $this->productUtil->createVariableProductVariations($product->id, $input_variations);
                }
            } elseif ($product->type == 'combo') {

                //Create combo_variations array by combining variation_id and quantity.
                $combo_variations = [];
                if (!empty($request->input('composition_variation_id'))) {
                    $composition_variation_id = $request->input('composition_variation_id');
                    $quantity = $request->input('quantity');
                    $unit = $request->input('unit');

                    foreach ($composition_variation_id as $key => $value) {
                        $combo_variations[] = [
                            'variation_id' => $value,
                            'quantity' => $quantity[$key],
                            'unit_id' => $unit[$key]
                        ];
                    }
                }

                $variation = Variation::find($request->input('combo_variation_id'));
                $variation->sub_sku = $product->sku;
                $variation->default_purchase_price = $this->productUtil->num_uf($request->input('item_level_purchase_price_total'));
                $variation->dpp_inc_tax = $this->productUtil->num_uf($request->input('purchase_price_inc_tax'));
                $variation->profit_percent = $this->productUtil->num_uf($request->input('profit_percent'));
                $variation->default_sell_price = $this->productUtil->num_uf($request->input('selling_price'));
                $variation->sell_price_inc_tax = $this->productUtil->num_uf($request->input('selling_price_inc_tax'));
                $variation->combo_variations = $combo_variations;
                $variation->save();
            }

            //Add product racks details.
            $product_racks = $request->get('product_racks', null);
            if (!empty($product_racks)) {
                $this->productUtil->addRackDetails($business_id, $product->id, $product_racks);
            }

            $product_racks_update = $request->get('product_racks_update', null);
            if (!empty($product_racks_update)) {
                $this->productUtil->updateRackDetails($business_id, $product->id, $product_racks_update);
            }

            //Set Module fields
            if (!empty($request->input('has_module_data'))) {
                $this->moduleUtil->getModuleData('after_product_saved', ['product' => $product, 'request' => $request]);
            }

            DB::commit();
            return new $this->resource($product, 200, __('product.product_updated_success'));
        } catch (Exception $e) {
            DB::rollBack();
            \Log::emergency("File:" . $e->getFile() . "Line:" . $e->getLine() . "Message:" . $e->getMessage());
            return $this->apiResponse($e->getMessage(), 404);
        }
    }

    public function show($id)
    {
        $user = Auth::guard('api')->user();
        $business_id = $user->business_id;
        $query = Product::leftJoin('brands', 'products.brand_id', '=', 'brands.id')
            ->join('units', 'products.unit_id', '=', 'units.id')
            ->leftJoin('categories as c1', 'products.category_id', '=', 'c1.id')
            ->leftJoin('categories as c2', 'products.sub_category_id', '=', 'c2.id')
            ->leftJoin('tax_rates', 'products.tax', '=', 'tax_rates.id')
            ->join('variations as v', 'v.product_id', '=', 'products.id')
            ->leftJoin('variation_location_details as vld', 'vld.variation_id', '=', 'v.id')
            ->where('products.business_id', $business_id)
            ->where('products.type', '!=', 'modifier')
            ->where('products.id', $id);
        $model = $query->select(
            'products.id',
            'products.name as product',
            'products.type',
            'c1.name as category',
            'c2.name as sub_category',
            'units.actual_name as unit',
            'brands.name as brand',
            'tax_rates.name as tax',
            'products.sku',
            'products.image',
            'products.enable_stock',
            'products.is_inactive',
            'products.not_for_selling',
            DB::raw('SUM(vld.qty_available) as current_stock'),
            DB::raw('MAX(v.sell_price_inc_tax) as max_price'),
            DB::raw('MIN(v.sell_price_inc_tax) as min_price'),
            DB::raw('MAX(v.dpp_inc_tax) as max_purchase_price'),
            DB::raw('MIN(v.dpp_inc_tax) as min_purchase_price')

        )->get()->first();

        try {
            $this->throwWhenModelEmpty($model);
            return new $this->resource($model);
        } catch (Exception $e) {
            return $this->apiResponse($e->getMessage(), 404);
        }
    }

    public function destroy($id)
    {
        try {
            $user = Auth::guard('api')->user();
            $business_id = $user->business_id;

            $can_be_deleted = true;
            $error_msg = '';

            //Check if any purchase or transfer exists
            $count = PurchaseLine::join(
                'transactions as T',
                'purchase_lines.transaction_id',
                '=',
                'T.id'
            )
                ->whereIn('T.type', ['purchase'])
                ->where('T.business_id', $business_id)
                ->where('purchase_lines.product_id', $id)
                ->count();
            if ($count > 0) {
                $can_be_deleted = false;
                $error_msg = __('lang_v1.purchase_already_exist');
            } else {
                //Check if any opening stock sold
                $count = PurchaseLine::join(
                    'transactions as T',
                    'purchase_lines.transaction_id',
                    '=',
                    'T.id'
                )
                    ->where('T.type', 'opening_stock')
                    ->where('T.business_id', $business_id)
                    ->where('purchase_lines.product_id', $id)
                    ->where('purchase_lines.quantity_sold', '>', 0)
                    ->count();
                if ($count > 0) {
                    $can_be_deleted = false;
                    $error_msg = __('lang_v1.opening_stock_sold');
                } else {
                    //Check if any stock is adjusted
                    $count = PurchaseLine::join(
                        'transactions as T',
                        'purchase_lines.transaction_id',
                        '=',
                        'T.id'
                    )
                        ->where('T.business_id', $business_id)
                        ->where('purchase_lines.product_id', $id)
                        ->where('purchase_lines.quantity_adjusted', '>', 0)
                        ->count();
                    if ($count > 0) {
                        $can_be_deleted = false;
                        $error_msg = __('lang_v1.stock_adjusted');
                    }
                }
            }

            $product = Product::where('id', $id)
                ->where('business_id', $business_id)
                ->with('variations')
                ->first();

            //Check if product is added as an ingredient of any recipe
            if ($this->moduleUtil->isModuleInstalled('Manufacturing')) {
                $variation_ids = $product->variations->pluck('id');

                $exists_as_ingredient = MfgRecipeIngredient::whereIn('variation_id', $variation_ids)
                    ->exists();
                $can_be_deleted = !$exists_as_ingredient;
                $error_msg = __('manufacturing::lang.added_as_ingredient');
            }

            if ($can_be_deleted) {
                if (!empty($product)) {
                    DB::beginTransaction();
                    //Delete variation location details
                    VariationLocationDetails::where('product_id', $id)
                        ->delete();
                    $product->delete();

                    DB::commit();
                }
                return $this->apiResponse(__("lang_v1.product_delete_success"), 200);
            } else {
                return $this->apiResponse($error_msg, 409);
            }
        } catch (Exception $e) {
            DB::rollBack();
            Log::emergency("File:" . $e->getFile() . "Line:" . $e->getLine() . "Message:" . $e->getMessage());
            return $this->apiResponse(__("messages.something_went_wrong"), 500);
        }
    }

    public function search()
    {
        $user = Auth::guard('api')->user();
        $business_id = $user->business_id;
        $search_term = request()->input('term', '');
        $location_id = request()->input('location_id', null);
        $contact_type_id = request()->input('contact_type_id', null);
        $supplier_id= request()->input('filter_supplier_id', null);
        $consumer_id= request()->input('filter_consumer_id', null);
        $check_qty = request()->input('check_qty', true);
        $not_for_selling = request()->get('not_for_selling', null);
        $price_group_id = request()->input('price_group', '');
        $product_types = request()->get('product_types', []);

        $search_fields = request()->get('search_fields', [ 'sku', 'name']);
        if (in_array('sku', $search_fields)) {
            $search_fields[] = 'sub_sku';
        }

        $result = $this->productUtil->filterProduct($business_id, $search_term, $location_id, $contact_type_id, $supplier_id, $consumer_id, $not_for_selling, $price_group_id, $product_types, $search_fields, $check_qty);

        return $this->apiResponse('Result',200,$result);
    }

    public function featuredProducts()
    {
        $user = Auth::guard('api')->user();
        $business = Business::findOrFail($user->business_id);
        $featured_products = $business->locations->first();
        return $featured_products->getFeaturedProducts();
        return $this->apiResponse('Featured products',200,$featured_products);
    }

    protected function params($request)
    {
        // TODO: Implement params() method.
    }

    protected function getRules($request)
    {
        // TODO: Implement getRules() method.
    }
}