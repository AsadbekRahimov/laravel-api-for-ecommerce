<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createshop_courierRequest;
use App\Http\Requests\Updateshop_courierRequest;
use App\Repositories\shop_courierRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class shop_courierController extends AppBaseController
{
    /** @var  shop_courierRepository */
    private $shopCourierRepository;

    public function __construct(shop_courierRepository $shopCourierRepo)
    {
        $this->shopCourierRepository = $shopCourierRepo;
    }

    /**
     * Display a listing of the shop_courier.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $shopCouriers = $this->shopCourierRepository->all();

        return view('shop_couriers.index')
            ->with('shopCouriers', $shopCouriers);
    }

    /**
     * Show the form for creating a new shop_courier.
     *
     * @return Response
     */
    public function create()
    {
        return view('shop_couriers.create');
    }

    /**
     * Store a newly created shop_courier in storage.
     *
     * @param Createshop_courierRequest $request
     *
     * @return Response
     */
    public function store(Createshop_courierRequest $request)
    {
        $input = $request->all();

        $shopCourier = $this->shopCourierRepository->create($input);

        Flash::success('Shop Courier saved successfully.');

        return redirect(route('shopCouriers.index'));
    }

    /**
     * Display the specified shop_courier.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $shopCourier = $this->shopCourierRepository->find($id);

        if (empty($shopCourier)) {
            Flash::error('Shop Courier not found');

            return redirect(route('shopCouriers.index'));
        }

        return view('shop_couriers.show')->with('shopCourier', $shopCourier);
    }

    /**
     * Show the form for editing the specified shop_courier.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $shopCourier = $this->shopCourierRepository->find($id);

        if (empty($shopCourier)) {
            Flash::error('Shop Courier not found');

            return redirect(route('shopCouriers.index'));
        }

        return view('shop_couriers.edit')->with('shopCourier', $shopCourier);
    }

    /**
     * Update the specified shop_courier in storage.
     *
     * @param int $id
     * @param Updateshop_courierRequest $request
     *
     * @return Response
     */
    public function update($id, Updateshop_courierRequest $request)
    {
        $shopCourier = $this->shopCourierRepository->find($id);

        if (empty($shopCourier)) {
            Flash::error('Shop Courier not found');

            return redirect(route('shopCouriers.index'));
        }

        $shopCourier = $this->shopCourierRepository->update($request->all(), $id);

        Flash::success('Shop Courier updated successfully.');

        return redirect(route('shopCouriers.index'));
    }

    /**
     * Remove the specified shop_courier from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $shopCourier = $this->shopCourierRepository->find($id);

        if (empty($shopCourier)) {
            Flash::error('Shop Courier not found');

            return redirect(route('shopCouriers.index'));
        }

        $this->shopCourierRepository->delete($id);

        Flash::success('Shop Courier deleted successfully.');

        return redirect(route('shopCouriers.index'));
    }
}
