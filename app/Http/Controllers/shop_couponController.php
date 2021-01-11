<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createshop_couponRequest;
use App\Http\Requests\Updateshop_couponRequest;
use App\Repositories\shop_couponRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class shop_couponController extends AppBaseController
{
    /** @var  shop_couponRepository */
    private $shopCouponRepository;

    public function __construct(shop_couponRepository $shopCouponRepo)
    {
        $this->shopCouponRepository = $shopCouponRepo;
    }

    /**
     * Display a listing of the shop_coupon.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $shopCoupons = $this->shopCouponRepository->all();

        return view('shop_coupons.index')
            ->with('shopCoupons', $shopCoupons);
    }

    /**
     * Show the form for creating a new shop_coupon.
     *
     * @return Response
     */
    public function create()
    {
        return view('shop_coupons.create');
    }

    /**
     * Store a newly created shop_coupon in storage.
     *
     * @param Createshop_couponRequest $request
     *
     * @return Response
     */
    public function store(Createshop_couponRequest $request)
    {
        $input = $request->all();

        $shopCoupon = $this->shopCouponRepository->create($input);

        Flash::success('Shop Coupon saved successfully.');

        return redirect(route('shopCoupons.index'));
    }

    /**
     * Display the specified shop_coupon.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $shopCoupon = $this->shopCouponRepository->find($id);

        if (empty($shopCoupon)) {
            Flash::error('Shop Coupon not found');

            return redirect(route('shopCoupons.index'));
        }

        return view('shop_coupons.show')->with('shopCoupon', $shopCoupon);
    }

    /**
     * Show the form for editing the specified shop_coupon.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $shopCoupon = $this->shopCouponRepository->find($id);

        if (empty($shopCoupon)) {
            Flash::error('Shop Coupon not found');

            return redirect(route('shopCoupons.index'));
        }

        return view('shop_coupons.edit')->with('shopCoupon', $shopCoupon);
    }

    /**
     * Update the specified shop_coupon in storage.
     *
     * @param int $id
     * @param Updateshop_couponRequest $request
     *
     * @return Response
     */
    public function update($id, Updateshop_couponRequest $request)
    {
        $shopCoupon = $this->shopCouponRepository->find($id);

        if (empty($shopCoupon)) {
            Flash::error('Shop Coupon not found');

            return redirect(route('shopCoupons.index'));
        }

        $shopCoupon = $this->shopCouponRepository->update($request->all(), $id);

        Flash::success('Shop Coupon updated successfully.');

        return redirect(route('shopCoupons.index'));
    }

    /**
     * Remove the specified shop_coupon from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $shopCoupon = $this->shopCouponRepository->find($id);

        if (empty($shopCoupon)) {
            Flash::error('Shop Coupon not found');

            return redirect(route('shopCoupons.index'));
        }

        $this->shopCouponRepository->delete($id);

        Flash::success('Shop Coupon deleted successfully.');

        return redirect(route('shopCoupons.index'));
    }
}
