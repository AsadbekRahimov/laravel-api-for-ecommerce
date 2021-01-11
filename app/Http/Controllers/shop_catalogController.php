<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createshop_catalogRequest;
use App\Http\Requests\Updateshop_catalogRequest;
use App\Repositories\shop_catalogRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class shop_catalogController extends AppBaseController
{
    /** @var  shop_catalogRepository */
    private $shopCatalogRepository;

    public function __construct(shop_catalogRepository $shopCatalogRepo)
    {
        $this->shopCatalogRepository = $shopCatalogRepo;
    }

    /**
     * Display a listing of the shop_catalog.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $shopCatalogs = $this->shopCatalogRepository->all();

        return view('shop_catalogs.index')
            ->with('shopCatalogs', $shopCatalogs);
    }

    /**
     * Show the form for creating a new shop_catalog.
     *
     * @return Response
     */
    public function create()
    {
        return view('shop_catalogs.create');
    }

    /**
     * Store a newly created shop_catalog in storage.
     *
     * @param Createshop_catalogRequest $request
     *
     * @return Response
     */
    public function store(Createshop_catalogRequest $request)
    {
        $input = $request->all();

        $shopCatalog = $this->shopCatalogRepository->create($input);

        Flash::success('Shop Catalog saved successfully.');

        return redirect(route('shopCatalogs.index'));
    }

    /**
     * Display the specified shop_catalog.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $shopCatalog = $this->shopCatalogRepository->find($id);

        if (empty($shopCatalog)) {
            Flash::error('Shop Catalog not found');

            return redirect(route('shopCatalogs.index'));
        }

        return view('shop_catalogs.show')->with('shopCatalog', $shopCatalog);
    }

    /**
     * Show the form for editing the specified shop_catalog.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $shopCatalog = $this->shopCatalogRepository->find($id);

        if (empty($shopCatalog)) {
            Flash::error('Shop Catalog not found');

            return redirect(route('shopCatalogs.index'));
        }

        return view('shop_catalogs.edit')->with('shopCatalog', $shopCatalog);
    }

    /**
     * Update the specified shop_catalog in storage.
     *
     * @param int $id
     * @param Updateshop_catalogRequest $request
     *
     * @return Response
     */
    public function update($id, Updateshop_catalogRequest $request)
    {
        $shopCatalog = $this->shopCatalogRepository->find($id);

        if (empty($shopCatalog)) {
            Flash::error('Shop Catalog not found');

            return redirect(route('shopCatalogs.index'));
        }

        $shopCatalog = $this->shopCatalogRepository->update($request->all(), $id);

        Flash::success('Shop Catalog updated successfully.');

        return redirect(route('shopCatalogs.index'));
    }

    /**
     * Remove the specified shop_catalog from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $shopCatalog = $this->shopCatalogRepository->find($id);

        if (empty($shopCatalog)) {
            Flash::error('Shop Catalog not found');

            return redirect(route('shopCatalogs.index'));
        }

        $this->shopCatalogRepository->delete($id);

        Flash::success('Shop Catalog deleted successfully.');

        return redirect(route('shopCatalogs.index'));
    }
}
