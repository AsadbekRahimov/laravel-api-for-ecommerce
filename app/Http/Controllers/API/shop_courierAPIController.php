<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createshop_courierAPIRequest;
use App\Http\Requests\API\Updateshop_courierAPIRequest;
use App\Models\shop_courier;
use App\Repositories\shop_courierRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class shop_courierController
 * @package App\Http\Controllers\API
 */

class shop_courierAPIController extends AppBaseController
{
    /** @var  shop_courierRepository */
    private $shopCourierRepository;

    public function __construct(shop_courierRepository $shopCourierRepo)
    {
        $this->shopCourierRepository = $shopCourierRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/shopCouriers",
     *      summary="Get a listing of the shop_couriers.",
     *      tags={"shop_courier"},
     *      description="Get all shop_couriers",
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
     *                  @SWG\Items(ref="#/definitions/shop_courier")
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
        $shopCouriers = $this->shopCourierRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($shopCouriers->toArray(), 'Shop Couriers retrieved successfully');
    }

    /**
     * @param Createshop_courierAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/shopCouriers",
     *      summary="Store a newly created shop_courier in storage",
     *      tags={"shop_courier"},
     *      description="Store shop_courier",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="shop_courier that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/shop_courier")
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
     *                  ref="#/definitions/shop_courier"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(Createshop_courierAPIRequest $request)
    {
        $input = $request->all();

        $shopCourier = $this->shopCourierRepository->create($input);

        return $this->sendResponse($shopCourier->toArray(), 'Shop Courier saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/shopCouriers/{id}",
     *      summary="Display the specified shop_courier",
     *      tags={"shop_courier"},
     *      description="Get shop_courier",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_courier",
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
     *                  ref="#/definitions/shop_courier"
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
        /** @var shop_courier $shopCourier */
        $shopCourier = $this->shopCourierRepository->find($id);

        if (empty($shopCourier)) {
            return $this->sendError('Shop Courier not found');
        }

        return $this->sendResponse($shopCourier->toArray(), 'Shop Courier retrieved successfully');
    }

    /**
     * @param int $id
     * @param Updateshop_courierAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/shopCouriers/{id}",
     *      summary="Update the specified shop_courier in storage",
     *      tags={"shop_courier"},
     *      description="Update shop_courier",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_courier",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="shop_courier that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/shop_courier")
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
     *                  ref="#/definitions/shop_courier"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, Updateshop_courierAPIRequest $request)
    {
        $input = $request->all();

        /** @var shop_courier $shopCourier */
        $shopCourier = $this->shopCourierRepository->find($id);

        if (empty($shopCourier)) {
            return $this->sendError('Shop Courier not found');
        }

        $shopCourier = $this->shopCourierRepository->update($input, $id);

        return $this->sendResponse($shopCourier->toArray(), 'shop_courier updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/shopCouriers/{id}",
     *      summary="Remove the specified shop_courier from storage",
     *      tags={"shop_courier"},
     *      description="Delete shop_courier",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_courier",
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
        /** @var shop_courier $shopCourier */
        $shopCourier = $this->shopCourierRepository->find($id);

        if (empty($shopCourier)) {
            return $this->sendError('Shop Courier not found');
        }

        $shopCourier->delete();

        return $this->sendSuccess('Shop Courier deleted successfully');
    }
}
