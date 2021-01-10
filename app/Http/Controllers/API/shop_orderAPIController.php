<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createshop_orderAPIRequest;
use App\Http\Requests\API\Updateshop_orderAPIRequest;
use App\Models\shop_order;
use App\Repositories\shop_orderRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class shop_orderController
 * @package App\Http\Controllers\API
 */

class shop_orderAPIController extends AppBaseController
{
    /** @var  shop_orderRepository */
    private $shopOrderRepository;

    public function __construct(shop_orderRepository $shopOrderRepo)
    {
        $this->shopOrderRepository = $shopOrderRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/shopOrders",
     *      summary="Get a listing of the shop_orders.",
     *      tags={"shop_order"},
     *      description="Get all shop_orders",
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
     *                  @SWG\Items(ref="#/definitions/shop_order")
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
        $shopOrders = $this->shopOrderRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($shopOrders->toArray(), 'Shop Orders retrieved successfully');
    }

    /**
     * @param Createshop_orderAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/shopOrders",
     *      summary="Store a newly created shop_order in storage",
     *      tags={"shop_order"},
     *      description="Store shop_order",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="shop_order that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/shop_order")
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
     *                  ref="#/definitions/shop_order"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(Createshop_orderAPIRequest $request)
    {
        $input = $request->all();

        $shopOrder = $this->shopOrderRepository->create($input);

        return $this->sendResponse($shopOrder->toArray(), 'Shop Order saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/shopOrders/{id}",
     *      summary="Display the specified shop_order",
     *      tags={"shop_order"},
     *      description="Get shop_order",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_order",
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
     *                  ref="#/definitions/shop_order"
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
        /** @var shop_order $shopOrder */
        $shopOrder = $this->shopOrderRepository->find($id);

        if (empty($shopOrder)) {
            return $this->sendError('Shop Order not found');
        }

        return $this->sendResponse($shopOrder->toArray(), 'Shop Order retrieved successfully');
    }

    /**
     * @param int $id
     * @param Updateshop_orderAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/shopOrders/{id}",
     *      summary="Update the specified shop_order in storage",
     *      tags={"shop_order"},
     *      description="Update shop_order",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_order",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="shop_order that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/shop_order")
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
     *                  ref="#/definitions/shop_order"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, Updateshop_orderAPIRequest $request)
    {
        $input = $request->all();

        /** @var shop_order $shopOrder */
        $shopOrder = $this->shopOrderRepository->find($id);

        if (empty($shopOrder)) {
            return $this->sendError('Shop Order not found');
        }

        $shopOrder = $this->shopOrderRepository->update($input, $id);

        return $this->sendResponse($shopOrder->toArray(), 'shop_order updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/shopOrders/{id}",
     *      summary="Remove the specified shop_order from storage",
     *      tags={"shop_order"},
     *      description="Delete shop_order",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_order",
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
        /** @var shop_order $shopOrder */
        $shopOrder = $this->shopOrderRepository->find($id);

        if (empty($shopOrder)) {
            return $this->sendError('Shop Order not found');
        }

        $shopOrder->delete();

        return $this->sendSuccess('Shop Order deleted successfully');
    }
}
