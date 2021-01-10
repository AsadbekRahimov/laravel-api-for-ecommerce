<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createshop_order_itemAPIRequest;
use App\Http\Requests\API\Updateshop_order_itemAPIRequest;
use App\Models\shop_order_item;
use App\Repositories\shop_order_itemRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class shop_order_itemController
 * @package App\Http\Controllers\API
 */

class shop_order_itemAPIController extends AppBaseController
{
    /** @var  shop_order_itemRepository */
    private $shopOrderItemRepository;

    public function __construct(shop_order_itemRepository $shopOrderItemRepo)
    {
        $this->shopOrderItemRepository = $shopOrderItemRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/shopOrderItems",
     *      summary="Get a listing of the shop_order_items.",
     *      tags={"shop_order_item"},
     *      description="Get all shop_order_items",
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
     *                  @SWG\Items(ref="#/definitions/shop_order_item")
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
        $shopOrderItems = $this->shopOrderItemRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($shopOrderItems->toArray(), 'Shop Order Items retrieved successfully');
    }

    /**
     * @param Createshop_order_itemAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/shopOrderItems",
     *      summary="Store a newly created shop_order_item in storage",
     *      tags={"shop_order_item"},
     *      description="Store shop_order_item",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="shop_order_item that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/shop_order_item")
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
     *                  ref="#/definitions/shop_order_item"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(Createshop_order_itemAPIRequest $request)
    {
        $input = $request->all();

        $shopOrderItem = $this->shopOrderItemRepository->create($input);

        return $this->sendResponse($shopOrderItem->toArray(), 'Shop Order Item saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/shopOrderItems/{id}",
     *      summary="Display the specified shop_order_item",
     *      tags={"shop_order_item"},
     *      description="Get shop_order_item",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_order_item",
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
     *                  ref="#/definitions/shop_order_item"
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
        /** @var shop_order_item $shopOrderItem */
        $shopOrderItem = $this->shopOrderItemRepository->find($id);

        if (empty($shopOrderItem)) {
            return $this->sendError('Shop Order Item not found');
        }

        return $this->sendResponse($shopOrderItem->toArray(), 'Shop Order Item retrieved successfully');
    }

    /**
     * @param int $id
     * @param Updateshop_order_itemAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/shopOrderItems/{id}",
     *      summary="Update the specified shop_order_item in storage",
     *      tags={"shop_order_item"},
     *      description="Update shop_order_item",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_order_item",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="shop_order_item that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/shop_order_item")
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
     *                  ref="#/definitions/shop_order_item"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, Updateshop_order_itemAPIRequest $request)
    {
        $input = $request->all();

        /** @var shop_order_item $shopOrderItem */
        $shopOrderItem = $this->shopOrderItemRepository->find($id);

        if (empty($shopOrderItem)) {
            return $this->sendError('Shop Order Item not found');
        }

        $shopOrderItem = $this->shopOrderItemRepository->update($input, $id);

        return $this->sendResponse($shopOrderItem->toArray(), 'shop_order_item updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/shopOrderItems/{id}",
     *      summary="Remove the specified shop_order_item from storage",
     *      tags={"shop_order_item"},
     *      description="Delete shop_order_item",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_order_item",
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
        /** @var shop_order_item $shopOrderItem */
        $shopOrderItem = $this->shopOrderItemRepository->find($id);

        if (empty($shopOrderItem)) {
            return $this->sendError('Shop Order Item not found');
        }

        $shopOrderItem->delete();

        return $this->sendSuccess('Shop Order Item deleted successfully');
    }
}
