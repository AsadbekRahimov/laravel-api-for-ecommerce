<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createshop_brandAPIRequest;
use App\Http\Requests\API\Updateshop_brandAPIRequest;
use App\Models\shop_brand;
use App\Repositories\shop_brandRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class shop_brandController
 * @package App\Http\Controllers\API
 */

class shop_brandAPIController extends AppBaseController
{
    /** @var  shop_brandRepository */
    private $shopBrandRepository;

    public function __construct(shop_brandRepository $shopBrandRepo)
    {
        $this->shopBrandRepository = $shopBrandRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/shopBrands",
     *      summary="Get a listing of the shop_brands.",
     *      tags={"shop_brand"},
     *      description="Get all shop_brands",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/shop_brand")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $shopBrands = $this->shopBrandRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($shopBrands->toArray(), 'Shop Brands retrieved successfully');
    }

    /**
     * @param Createshop_brandAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/shopBrands",
     *      summary="Store a newly created shop_brand in storage",
     *      tags={"shop_brand"},
     *      description="Store shop_brand",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="shop_brand that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/shop_brand")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/shop_brand"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(Createshop_brandAPIRequest $request)
    {
        $input = $request->all();

        $shopBrand = $this->shopBrandRepository->create($input);

        return $this->sendResponse($shopBrand->toArray(), 'Shop Brand saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/shopBrands/{id}",
     *      summary="Display the specified shop_brand",
     *      tags={"shop_brand"},
     *      description="Get shop_brand",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_brand",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/shop_brand"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var shop_brand $shopBrand */
        $shopBrand = $this->shopBrandRepository->find($id);

        if (empty($shopBrand)) {
            return $this->sendError('Shop Brand not found');
        }

        return $this->sendResponse($shopBrand->toArray(), 'Shop Brand retrieved successfully');
    }

    /**
     * @param int $id
     * @param Updateshop_brandAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/shopBrands/{id}",
     *      summary="Update the specified shop_brand in storage",
     *      tags={"shop_brand"},
     *      description="Update shop_brand",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_brand",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="shop_brand that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/shop_brand")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/shop_brand"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, Updateshop_brandAPIRequest $request)
    {
        $input = $request->all();

        /** @var shop_brand $shopBrand */
        $shopBrand = $this->shopBrandRepository->find($id);

        if (empty($shopBrand)) {
            return $this->sendError('Shop Brand not found');
        }

        $shopBrand = $this->shopBrandRepository->update($input, $id);

        return $this->sendResponse($shopBrand->toArray(), 'shop_brand updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/shopBrands/{id}",
     *      summary="Remove the specified shop_brand from storage",
     *      tags={"shop_brand"},
     *      description="Delete shop_brand",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_brand",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var shop_brand $shopBrand */
        $shopBrand = $this->shopBrandRepository->find($id);

        if (empty($shopBrand)) {
            return $this->sendError('Shop Brand not found');
        }

        $shopBrand->delete();

        return $this->sendSuccess('Shop Brand deleted successfully');
    }
}
