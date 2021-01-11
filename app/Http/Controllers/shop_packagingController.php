<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createshop_packagingRequest;
use App\Http\Requests\Updateshop_packagingRequest;
use App\Repositories\shop_packagingRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class shop_packagingController extends AppBaseController
{
    /** @var  shop_packagingRepository */
    private $shopPackagingRepository;

    public function __construct(shop_packagingRepository $shopPackagingRepo)
    {
        $this->shopPackagingRepository = $shopPackagingRepo;
    }

    /**
     * Display a listing of the shop_packaging.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $shopPackagings = $this->shopPackagingRepository->all();

        return view('shop_packagings.index')
            ->with('shopPackagings', $shopPackagings);
    }

    /**
     * Show the form for creating a new shop_packaging.
     *
     * @return Response
     */
    public function create()
    {
        return view('shop_packagings.create');
    }

    /**
     * Store a newly created shop_packaging in storage.
     *
     * @param Createshop_packagingRequest $request
     *
     * @return Response
     */
    public function store(Createshop_packagingRequest $request)
    {
        $input = $request->all();

        $shopPackaging = $this->shopPackagingRepository->create($input);

        Flash::success('Shop Packaging saved successfully.');

        return redirect(route('shopPackagings.index'));
    }

    /**
     * Display the specified shop_packaging.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $shopPackaging = $this->shopPackagingRepository->find($id);

        if (empty($shopPackaging)) {
            Flash::error('Shop Packaging not found');

            return redirect(route('shopPackagings.index'));
        }

        return view('shop_packagings.show')->with('shopPackaging', $shopPackaging);
    }

    /**
     * Show the form for editing the specified shop_packaging.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $shopPackaging = $this->shopPackagingRepository->find($id);

        if (empty($shopPackaging)) {
            Flash::error('Shop Packaging not found');

            return redirect(route('shopPackagings.index'));
        }

        return view('shop_packagings.edit')->with('shopPackaging', $shopPackaging);
    }

    /**
     * Update the specified shop_packaging in storage.
     *
     * @param int $id
     * @param Updateshop_packagingRequest $request
     *
     * @return Response
     */
    public function update($id, Updateshop_packagingRequest $request)
    {
        $shopPackaging = $this->shopPackagingRepository->find($id);

        if (empty($shopPackaging)) {
            Flash::error('Shop Packaging not found');

            return redirect(route('shopPackagings.index'));
        }

        $shopPackaging = $this->shopPackagingRepository->update($request->all(), $id);

        Flash::success('Shop Packaging updated successfully.');

        return redirect(route('shopPackagings.index'));
    }

    /**
     * Remove the specified shop_packaging from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $shopPackaging = $this->shopPackagingRepository->find($id);

        if (empty($shopPackaging)) {
            Flash::error('Shop Packaging not found');

            return redirect(route('shopPackagings.index'));
        }

        $this->shopPackagingRepository->delete($id);

        Flash::success('Shop Packaging deleted successfully.');

        return redirect(route('shopPackagings.index'));
    }
}
