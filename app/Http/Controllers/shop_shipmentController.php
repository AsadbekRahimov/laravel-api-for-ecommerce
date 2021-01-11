<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createshop_shipmentRequest;
use App\Http\Requests\Updateshop_shipmentRequest;
use App\Repositories\shop_shipmentRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class shop_shipmentController extends AppBaseController
{
    /** @var  shop_shipmentRepository */
    private $shopShipmentRepository;

    public function __construct(shop_shipmentRepository $shopShipmentRepo)
    {
        $this->shopShipmentRepository = $shopShipmentRepo;
    }

    /**
     * Display a listing of the shop_shipment.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $shopShipments = $this->shopShipmentRepository->all();

        return view('shop_shipments.index')
            ->with('shopShipments', $shopShipments);
    }

    /**
     * Show the form for creating a new shop_shipment.
     *
     * @return Response
     */
    public function create()
    {
        return view('shop_shipments.create');
    }

    /**
     * Store a newly created shop_shipment in storage.
     *
     * @param Createshop_shipmentRequest $request
     *
     * @return Response
     */
    public function store(Createshop_shipmentRequest $request)
    {
        $input = $request->all();

        $shopShipment = $this->shopShipmentRepository->create($input);

        Flash::success('Shop Shipment saved successfully.');

        return redirect(route('shopShipments.index'));
    }

    /**
     * Display the specified shop_shipment.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $shopShipment = $this->shopShipmentRepository->find($id);

        if (empty($shopShipment)) {
            Flash::error('Shop Shipment not found');

            return redirect(route('shopShipments.index'));
        }

        return view('shop_shipments.show')->with('shopShipment', $shopShipment);
    }

    /**
     * Show the form for editing the specified shop_shipment.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $shopShipment = $this->shopShipmentRepository->find($id);

        if (empty($shopShipment)) {
            Flash::error('Shop Shipment not found');

            return redirect(route('shopShipments.index'));
        }

        return view('shop_shipments.edit')->with('shopShipment', $shopShipment);
    }

    /**
     * Update the specified shop_shipment in storage.
     *
     * @param int $id
     * @param Updateshop_shipmentRequest $request
     *
     * @return Response
     */
    public function update($id, Updateshop_shipmentRequest $request)
    {
        $shopShipment = $this->shopShipmentRepository->find($id);

        if (empty($shopShipment)) {
            Flash::error('Shop Shipment not found');

            return redirect(route('shopShipments.index'));
        }

        $shopShipment = $this->shopShipmentRepository->update($request->all(), $id);

        Flash::success('Shop Shipment updated successfully.');

        return redirect(route('shopShipments.index'));
    }

    /**
     * Remove the specified shop_shipment from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $shopShipment = $this->shopShipmentRepository->find($id);

        if (empty($shopShipment)) {
            Flash::error('Shop Shipment not found');

            return redirect(route('shopShipments.index'));
        }

        $this->shopShipmentRepository->delete($id);

        Flash::success('Shop Shipment deleted successfully.');

        return redirect(route('shopShipments.index'));
    }
}
