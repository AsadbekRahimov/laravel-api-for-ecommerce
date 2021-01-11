<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createshop_order_itemRequest;
use App\Http\Requests\Updateshop_order_itemRequest;
use App\Repositories\shop_order_itemRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class shop_order_itemController extends AppBaseController
{
    /** @var  shop_order_itemRepository */
    private $shopOrderItemRepository;

    public function __construct(shop_order_itemRepository $shopOrderItemRepo)
    {
        $this->shopOrderItemRepository = $shopOrderItemRepo;
    }

    /**
     * Display a listing of the shop_order_item.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $shopOrderItems = $this->shopOrderItemRepository->all();

        return view('shop_order_items.index')
            ->with('shopOrderItems', $shopOrderItems);
    }

    /**
     * Show the form for creating a new shop_order_item.
     *
     * @return Response
     */
    public function create()
    {
        return view('shop_order_items.create');
    }

    /**
     * Store a newly created shop_order_item in storage.
     *
     * @param Createshop_order_itemRequest $request
     *
     * @return Response
     */
    public function store(Createshop_order_itemRequest $request)
    {
        $input = $request->all();

        $shopOrderItem = $this->shopOrderItemRepository->create($input);

        Flash::success('Shop Order Item saved successfully.');

        return redirect(route('shopOrderItems.index'));
    }

    /**
     * Display the specified shop_order_item.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $shopOrderItem = $this->shopOrderItemRepository->find($id);

        if (empty($shopOrderItem)) {
            Flash::error('Shop Order Item not found');

            return redirect(route('shopOrderItems.index'));
        }

        return view('shop_order_items.show')->with('shopOrderItem', $shopOrderItem);
    }

    /**
     * Show the form for editing the specified shop_order_item.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $shopOrderItem = $this->shopOrderItemRepository->find($id);

        if (empty($shopOrderItem)) {
            Flash::error('Shop Order Item not found');

            return redirect(route('shopOrderItems.index'));
        }

        return view('shop_order_items.edit')->with('shopOrderItem', $shopOrderItem);
    }

    /**
     * Update the specified shop_order_item in storage.
     *
     * @param int $id
     * @param Updateshop_order_itemRequest $request
     *
     * @return Response
     */
    public function update($id, Updateshop_order_itemRequest $request)
    {
        $shopOrderItem = $this->shopOrderItemRepository->find($id);

        if (empty($shopOrderItem)) {
            Flash::error('Shop Order Item not found');

            return redirect(route('shopOrderItems.index'));
        }

        $shopOrderItem = $this->shopOrderItemRepository->update($request->all(), $id);

        Flash::success('Shop Order Item updated successfully.');

        return redirect(route('shopOrderItems.index'));
    }

    /**
     * Remove the specified shop_order_item from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $shopOrderItem = $this->shopOrderItemRepository->find($id);

        if (empty($shopOrderItem)) {
            Flash::error('Shop Order Item not found');

            return redirect(route('shopOrderItems.index'));
        }

        $this->shopOrderItemRepository->delete($id);

        Flash::success('Shop Order Item deleted successfully.');

        return redirect(route('shopOrderItems.index'));
    }
}
