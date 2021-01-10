<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createshop_couponAPIRequest;
use App\Http\Requests\API\Updateshop_couponAPIRequest;
use App\Models\shop_coupon;
use App\Repositories\shop_couponRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class shop_couponController
 * @package App\Http\Controllers\API
 */

class shop_couponAPIController extends AppBaseController
{
    /** @var  shop_couponRepository */
    private $shopCouponRepository;

    public function __construct(shop_couponRepository $shopCouponRepo)
    {
        $this->shopCouponRepository = $shopCouponRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/shopCoupons",
     *      summary="Get a listing of the shop_coupons.",
     *      tags={"shop_coupon"},
     *      description="Get all shop_coupons",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/shop_coupon")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $shopCoupons = $this->shopCouponRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($shopCoupons->toArray(), 'Shop Coupons retrieved successfully');
    }

    /**
     * @param Createshop_couponAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/shopCoupons",
     *      summary="Store a newly created shop_coupon in storage",
     *      tags={"shop_coupon"},
     *      description="Store shop_coupon",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="shop_coupon that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/shop_coupon")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/shop_coupon"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(Createshop_couponAPIRequest $request)
    {
        $input = $request->all();

        $shopCoupon = $this->shopCouponRepository->create($input);

        return $this->sendResponse($shopCoupon->toArray(), 'Shop Coupon saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/shopCoupons/{id}",
     *      summary="Display the specified shop_coupon",
     *      tags={"shop_coupon"},
     *      description="Get shop_coupon",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_coupon",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/shop_coupon"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var shop_coupon $shopCoupon */
        $shopCoupon = $this->shopCouponRepository->find($id);

        if (empty($shopCoupon)) {
            return $this->sendError('Shop Coupon not found');
        }

        return $this->sendResponse($shopCoupon->toArray(), 'Shop Coupon retrieved successfully');
    }

    /**
     * @param int $id
     * @param Updateshop_couponAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/shopCoupons/{id}",
     *      summary="Update the specified shop_coupon in storage",
     *      tags={"shop_coupon"},
     *      description="Update shop_coupon",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_coupon",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="shop_coupon that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/shop_coupon")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/shop_coupon"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, Updateshop_couponAPIRequest $request)
    {
        $input = $request->all();

        /** @var shop_coupon $shopCoupon */
        $shopCoupon = $this->shopCouponRepository->find($id);

        if (empty($shopCoupon)) {
            return $this->sendError('Shop Coupon not found');
        }

        $shopCoupon = $this->shopCouponRepository->update($input, $id);

        return $this->sendResponse($shopCoupon->toArray(), 'shop_coupon updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/shopCoupons/{id}",
     *      summary="Remove the specified shop_coupon from storage",
     *      tags={"shop_coupon"},
     *      description="Delete shop_coupon",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_coupon",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var shop_coupon $shopCoupon */
        $shopCoupon = $this->shopCouponRepository->find($id);

        if (empty($shopCoupon)) {
            return $this->sendError('Shop Coupon not found');
        }

        $shopCoupon->delete();

        return $this->sendSuccess('Shop Coupon deleted successfully');
    }
}
