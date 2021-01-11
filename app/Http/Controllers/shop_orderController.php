<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createshop_orderRequest;
use App\Http\Requests\Updateshop_orderRequest;
use App\Repositories\shop_orderRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class shop_orderController extends AppBaseController
{
    /** @var  shop_orderRepository */
    private $shopOrderRepository;

    public function __construct(shop_orderRepository $shopOrderRepo)
    {
        $this->shopOrderRepository = $shopOrderRepo;
    }

    /**
     * Display a listing of the shop_order.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $shopOrders = $this->shopOrderRepository->all();

        return view('shop_orders.index')
            ->with('shopOrders', $shopOrders);
    }

    /**
     * Show the form for creating a new shop_order.
     *
     * @return Response
     */
    public function create()
    {
        return view('shop_orders.create');
    }

    /**
     * Store a newly created shop_order in storage.
     *
     * @param Createshop_orderRequest $request
     *
     * @return Response
     */
    public function store(Createshop_orderRequest $request)
    {
        $input = $request->all();

        $shopOrder = $this->shopOrderRepository->create($input);

        Flash::success('Shop Order saved successfully.');

        return redirect(route('shopOrders.index'));
    }

    /**
     * Display the specified shop_order.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $shopOrder = $this->shopOrderRepository->find($id);

        if (empty($shopOrder)) {
            Flash::error('Shop Order not found');

            return redirect(route('shopOrders.index'));
        }

        return view('shop_orders.show')->with('shopOrder', $shopOrder);
    }

    /**
     * Show the form for editing the specified shop_order.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $shopOrder = $this->shopOrderRepository->find($id);

        if (empty($shopOrder)) {
            Flash::error('Shop Order not found');

            return redirect(route('shopOrders.index'));
        }

        return view('shop_orders.edit')->with('shopOrder', $shopOrder);
    }

    /**
     * Update the specified shop_order in storage.
     *
     * @param int $id
     * @param Updateshop_orderRequest $request
     *
     * @return Response
     */
    public function update($id, Updateshop_orderRequest $request)
    {
        $shopOrder = $this->shopOrderRepository->find($id);

        if (empty($shopOrder)) {
            Flash::error('Shop Order not found');

            return redirect(route('shopOrders.index'));
        }

        $shopOrder = $this->shopOrderRepository->update($request->all(), $id);

        Flash::success('Shop Order updated successfully.');

        return redirect(route('shopOrders.index'));
    }

    /**
     * Remove the specified shop_order from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $shopOrder = $this->shopOrderRepository->find($id);

        if (empty($shopOrder)) {
            Flash::error('Shop Order not found');

            return redirect(route('shopOrders.index'));
        }

        $this->shopOrderRepository->delete($id);

        Flash::success('Shop Order deleted successfully.');

        return redirect(route('shopOrders.index'));
    }
}
