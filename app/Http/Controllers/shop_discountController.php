<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createshop_discountRequest;
use App\Http\Requests\Updateshop_discountRequest;
use App\Repositories\shop_discountRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class shop_discountController extends AppBaseController
{
    /** @var  shop_discountRepository */
    private $shopDiscountRepository;

    public function __construct(shop_discountRepository $shopDiscountRepo)
    {
        $this->shopDiscountRepository = $shopDiscountRepo;
    }

    /**
     * Display a listing of the shop_discount.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $shopDiscounts = $this->shopDiscountRepository->all();

        return view('shop_discounts.index')
            ->with('shopDiscounts', $shopDiscounts);
    }

    /**
     * Show the form for creating a new shop_discount.
     *
     * @return Response
     */
    public function create()
    {
        return view('shop_discounts.create');
    }

    /**
     * Store a newly created shop_discount in storage.
     *
     * @param Createshop_discountRequest $request
     *
     * @return Response
     */
    public function store(Createshop_discountRequest $request)
    {
        $input = $request->all();

        $shopDiscount = $this->shopDiscountRepository->create($input);

        Flash::success('Shop Discount saved successfully.');

        return redirect(route('shopDiscounts.index'));
    }

    /**
     * Display the specified shop_discount.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $shopDiscount = $this->shopDiscountRepository->find($id);

        if (empty($shopDiscount)) {
            Flash::error('Shop Discount not found');

            return redirect(route('shopDiscounts.index'));
        }

        return view('shop_discounts.show')->with('shopDiscount', $shopDiscount);
    }

    /**
     * Show the form for editing the specified shop_discount.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $shopDiscount = $this->shopDiscountRepository->find($id);

        if (empty($shopDiscount)) {
            Flash::error('Shop Discount not found');

            return redirect(route('shopDiscounts.index'));
        }

        return view('shop_discounts.edit')->with('shopDiscount', $shopDiscount);
    }

    /**
     * Update the specified shop_discount in storage.
     *
     * @param int $id
     * @param Updateshop_discountRequest $request
     *
     * @return Response
     */
    public function update($id, Updateshop_discountRequest $request)
    {
        $shopDiscount = $this->shopDiscountRepository->find($id);

        if (empty($shopDiscount)) {
            Flash::error('Shop Discount not found');

            return redirect(route('shopDiscounts.index'));
        }

        $shopDiscount = $this->shopDiscountRepository->update($request->all(), $id);

        Flash::success('Shop Discount updated successfully.');

        return redirect(route('shopDiscounts.index'));
    }

    /**
     * Remove the specified shop_discount from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $shopDiscount = $this->shopDiscountRepository->find($id);

        if (empty($shopDiscount)) {
            Flash::error('Shop Discount not found');

            return redirect(route('shopDiscounts.index'));
        }

        $this->shopDiscountRepository->delete($id);

        Flash::success('Shop Discount deleted successfully.');

        return redirect(route('shopDiscounts.index'));
    }
}
