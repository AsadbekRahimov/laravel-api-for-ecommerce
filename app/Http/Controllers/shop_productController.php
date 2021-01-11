<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createshop_productRequest;
use App\Http\Requests\Updateshop_productRequest;
use App\Repositories\shop_productRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class shop_productController extends AppBaseController
{
    /** @var  shop_productRepository */
    private $shopProductRepository;

    public function __construct(shop_productRepository $shopProductRepo)
    {
        $this->shopProductRepository = $shopProductRepo;
    }

    /**
     * Display a listing of the shop_product.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $shopProducts = $this->shopProductRepository->all();

        return view('shop_products.index')
            ->with('shopProducts', $shopProducts);
    }

    /**
     * Show the form for creating a new shop_product.
     *
     * @return Response
     */
    public function create()
    {
        return view('shop_products.create');
    }

    /**
     * Store a newly created shop_product in storage.
     *
     * @param Createshop_productRequest $request
     *
     * @return Response
     */
    public function store(Createshop_productRequest $request)
    {
        $input = $request->all();

        $shopProduct = $this->shopProductRepository->create($input);

        Flash::success('Shop Product saved successfully.');

        return redirect(route('shopProducts.index'));
    }

    /**
     * Display the specified shop_product.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $shopProduct = $this->shopProductRepository->find($id);

        if (empty($shopProduct)) {
            Flash::error('Shop Product not found');

            return redirect(route('shopProducts.index'));
        }

        return view('shop_products.show')->with('shopProduct', $shopProduct);
    }

    /**
     * Show the form for editing the specified shop_product.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $shopProduct = $this->shopProductRepository->find($id);

        if (empty($shopProduct)) {
            Flash::error('Shop Product not found');

            return redirect(route('shopProducts.index'));
        }

        return view('shop_products.edit')->with('shopProduct', $shopProduct);
    }

    /**
     * Update the specified shop_product in storage.
     *
     * @param int $id
     * @param Updateshop_productRequest $request
     *
     * @return Response
     */
    public function update($id, Updateshop_productRequest $request)
    {
        $shopProduct = $this->shopProductRepository->find($id);

        if (empty($shopProduct)) {
            Flash::error('Shop Product not found');

            return redirect(route('shopProducts.index'));
        }

        $shopProduct = $this->shopProductRepository->update($request->all(), $id);

        Flash::success('Shop Product updated successfully.');

        return redirect(route('shopProducts.index'));
    }

    /**
     * Remove the specified shop_product from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $shopProduct = $this->shopProductRepository->find($id);

        if (empty($shopProduct)) {
            Flash::error('Shop Product not found');

            return redirect(route('shopProducts.index'));
        }

        $this->shopProductRepository->delete($id);

        Flash::success('Shop Product deleted successfully.');

        return redirect(route('shopProducts.index'));
    }
}
