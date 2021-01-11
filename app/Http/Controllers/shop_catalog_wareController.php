<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createshop_catalog_wareRequest;
use App\Http\Requests\Updateshop_catalog_wareRequest;
use App\Repositories\shop_catalog_wareRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class shop_catalog_wareController extends AppBaseController
{
    /** @var  shop_catalog_wareRepository */
    private $shopCatalogWareRepository;

    public function __construct(shop_catalog_wareRepository $shopCatalogWareRepo)
    {
        $this->shopCatalogWareRepository = $shopCatalogWareRepo;
    }

    /**
     * Display a listing of the shop_catalog_ware.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $shopCatalogWare = $this->shopCatalogWareRepository->all();

        return view('shop_catalog_ware.index')
            ->with('shopCatalogWare', $shopCatalogWare);
    }

    /**
     * Show the form for creating a new shop_catalog_ware.
     *
     * @return Response
     */
    public function create()
    {
        return view('shop_catalog_ware.create');
    }

    /**
     * Store a newly created shop_catalog_ware in storage.
     *
     * @param Createshop_catalog_wareRequest $request
     *
     * @return Response
     */
    public function store(Createshop_catalog_wareRequest $request)
    {
        $input = $request->all();

        $shopCatalogWare = $this->shopCatalogWareRepository->create($input);

        Flash::success('Shop Catalog Ware saved successfully.');

        return redirect(route('shopCatalogWare.index'));
    }

    /**
     * Display the specified shop_catalog_ware.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $shopCatalogWare = $this->shopCatalogWareRepository->find($id);

        if (empty($shopCatalogWare)) {
            Flash::error('Shop Catalog Ware not found');

            return redirect(route('shopCatalogWare.index'));
        }

        return view('shop_catalog_ware.show')->with('shopCatalogWare', $shopCatalogWare);
    }

    /**
     * Show the form for editing the specified shop_catalog_ware.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $shopCatalogWare = $this->shopCatalogWareRepository->find($id);

        if (empty($shopCatalogWare)) {
            Flash::error('Shop Catalog Ware not found');

            return redirect(route('shopCatalogWare.index'));
        }

        return view('shop_catalog_ware.edit')->with('shopCatalogWare', $shopCatalogWare);
    }

    /**
     * Update the specified shop_catalog_ware in storage.
     *
     * @param int $id
     * @param Updateshop_catalog_wareRequest $request
     *
     * @return Response
     */
    public function update($id, Updateshop_catalog_wareRequest $request)
    {
        $shopCatalogWare = $this->shopCatalogWareRepository->find($id);

        if (empty($shopCatalogWare)) {
            Flash::error('Shop Catalog Ware not found');

            return redirect(route('shopCatalogWare.index'));
        }

        $shopCatalogWare = $this->shopCatalogWareRepository->update($request->all(), $id);

        Flash::success('Shop Catalog Ware updated successfully.');

        return redirect(route('shopCatalogWare.index'));
    }

    /**
     * Remove the specified shop_catalog_ware from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $shopCatalogWare = $this->shopCatalogWareRepository->find($id);

        if (empty($shopCatalogWare)) {
            Flash::error('Shop Catalog Ware not found');

            return redirect(route('shopCatalogWare.index'));
        }

        $this->shopCatalogWareRepository->delete($id);

        Flash::success('Shop Catalog Ware deleted successfully.');

        return redirect(route('shopCatalogWare.index'));
    }
}
