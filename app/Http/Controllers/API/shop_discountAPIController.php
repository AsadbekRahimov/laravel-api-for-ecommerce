<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createshop_discountAPIRequest;
use App\Http\Requests\API\Updateshop_discountAPIRequest;
use App\Models\shop_discount;
use App\Repositories\shop_discountRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class shop_discountController
 * @package App\Http\Controllers\API
 */

class shop_discountAPIController extends AppBaseController
{
    /** @var  shop_discountRepository */
    private $shopDiscountRepository;

    public function __construct(shop_discountRepository $shopDiscountRepo)
    {
        $this->shopDiscountRepository = $shopDiscountRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/shopDiscounts",
     *      summary="Get a listing of the shop_discounts.",
     *      tags={"shop_discount"},
     *      description="Get all shop_discounts",
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
     *                  @SWG\Items(ref="#/definitions/shop_discount")
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
        $shopDiscounts = $this->shopDiscountRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($shopDiscounts->toArray(), 'Shop Discounts retrieved successfully');
    }

    /**
     * @param Createshop_discountAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/shopDiscounts",
     *      summary="Store a newly created shop_discount in storage",
     *      tags={"shop_discount"},
     *      description="Store shop_discount",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="shop_discount that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/shop_discount")
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
     *                  ref="#/definitions/shop_discount"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(Createshop_discountAPIRequest $request)
    {
        $input = $request->all();

        $shopDiscount = $this->shopDiscountRepository->create($input);

        return $this->sendResponse($shopDiscount->toArray(), 'Shop Discount saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/shopDiscounts/{id}",
     *      summary="Display the specified shop_discount",
     *      tags={"shop_discount"},
     *      description="Get shop_discount",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_discount",
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
     *                  ref="#/definitions/shop_discount"
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
        /** @var shop_discount $shopDiscount */
        $shopDiscount = $this->shopDiscountRepository->find($id);

        if (empty($shopDiscount)) {
            return $this->sendError('Shop Discount not found');
        }

        return $this->sendResponse($shopDiscount->toArray(), 'Shop Discount retrieved successfully');
    }

    /**
     * @param int $id
     * @param Updateshop_discountAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/shopDiscounts/{id}",
     *      summary="Update the specified shop_discount in storage",
     *      tags={"shop_discount"},
     *      description="Update shop_discount",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_discount",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="shop_discount that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/shop_discount")
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
     *                  ref="#/definitions/shop_discount"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, Updateshop_discountAPIRequest $request)
    {
        $input = $request->all();

        /** @var shop_discount $shopDiscount */
        $shopDiscount = $this->shopDiscountRepository->find($id);

        if (empty($shopDiscount)) {
            return $this->sendError('Shop Discount not found');
        }

        $shopDiscount = $this->shopDiscountRepository->update($input, $id);

        return $this->sendResponse($shopDiscount->toArray(), 'shop_discount updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/shopDiscounts/{id}",
     *      summary="Remove the specified shop_discount from storage",
     *      tags={"shop_discount"},
     *      description="Delete shop_discount",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_discount",
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
        /** @var shop_discount $shopDiscount */
        $shopDiscount = $this->shopDiscountRepository->find($id);

        if (empty($shopDiscount)) {
            return $this->sendError('Shop Discount not found');
        }

        $shopDiscount->delete();

        return $this->sendSuccess('Shop Discount deleted successfully');
    }
}
