<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createshop_brandRequest;
use App\Http\Requests\Updateshop_brandRequest;
use App\Repositories\shop_brandRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class shop_brandController extends AppBaseController
{
    /** @var  shop_brandRepository */
    private $shopBrandRepository;

    public function __construct(shop_brandRepository $shopBrandRepo)
    {
        $this->shopBrandRepository = $shopBrandRepo;
    }

    /**
     * Display a listing of the shop_brand.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $shopBrands = $this->shopBrandRepository->all();

        return view('shop_brands.index')
            ->with('shopBrands', $shopBrands);
    }

    /**
     * Show the form for creating a new shop_brand.
     *
     * @return Response
     */
    public function create()
    {
        return view('shop_brands.create');
    }

    /**
     * Store a newly created shop_brand in storage.
     *
     * @param Createshop_brandRequest $request
     *
     * @return Response
     */
    public function store(Createshop_brandRequest $request)
    {
        $input = $request->all();

        $shopBrand = $this->shopBrandRepository->create($input);

        Flash::success('Shop Brand saved successfully.');

        return redirect(route('shopBrands.index'));
    }

    /**
     * Display the specified shop_brand.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $shopBrand = $this->shopBrandRepository->find($id);

        if (empty($shopBrand)) {
            Flash::error('Shop Brand not found');

            return redirect(route('shopBrands.index'));
        }

        return view('shop_brands.show')->with('shopBrand', $shopBrand);
    }

    /**
     * Show the form for editing the specified shop_brand.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $shopBrand = $this->shopBrandRepository->find($id);

        if (empty($shopBrand)) {
            Flash::error('Shop Brand not found');

            return redirect(route('shopBrands.index'));
        }

        return view('shop_brands.edit')->with('shopBrand', $shopBrand);
    }

    /**
     * Update the specified shop_brand in storage.
     *
     * @param int $id
     * @param Updateshop_brandRequest $request
     *
     * @return Response
     */
    public function update($id, Updateshop_brandRequest $request)
    {
        $shopBrand = $this->shopBrandRepository->find($id);

        if (empty($shopBrand)) {
            Flash::error('Shop Brand not found');

            return redirect(route('shopBrands.index'));
        }

        $shopBrand = $this->shopBrandRepository->update($request->all(), $id);

        Flash::success('Shop Brand updated successfully.');

        return redirect(route('shopBrands.index'));
    }

    /**
     * Remove the specified shop_brand from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $shopBrand = $this->shopBrandRepository->find($id);

        if (empty($shopBrand)) {
            Flash::error('Shop Brand not found');

            return redirect(route('shopBrands.index'));
        }

        $this->shopBrandRepository->delete($id);

        Flash::success('Shop Brand deleted successfully.');

        return redirect(route('shopBrands.index'));
    }
}
