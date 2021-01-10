<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createshop_shipmentAPIRequest;
use App\Http\Requests\API\Updateshop_shipmentAPIRequest;
use App\Models\shop_shipment;
use App\Repositories\shop_shipmentRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class shop_shipmentController
 * @package App\Http\Controllers\API
 */

class shop_shipmentAPIController extends AppBaseController
{
    /** @var  shop_shipmentRepository */
    private $shopShipmentRepository;

    public function __construct(shop_shipmentRepository $shopShipmentRepo)
    {
        $this->shopShipmentRepository = $shopShipmentRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/shopShipments",
     *      summary="Get a listing of the shop_shipments.",
     *      tags={"shop_shipment"},
     *      description="Get all shop_shipments",
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
     *                  @SWG\Items(ref="#/definitions/shop_shipment")
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
        $shopShipments = $this->shopShipmentRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($shopShipments->toArray(), 'Shop Shipments retrieved successfully');
    }

    /**
     * @param Createshop_shipmentAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/shopShipments",
     *      summary="Store a newly created shop_shipment in storage",
     *      tags={"shop_shipment"},
     *      description="Store shop_shipment",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="shop_shipment that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/shop_shipment")
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
     *                  ref="#/definitions/shop_shipment"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(Createshop_shipmentAPIRequest $request)
    {
        $input = $request->all();

        $shopShipment = $this->shopShipmentRepository->create($input);

        return $this->sendResponse($shopShipment->toArray(), 'Shop Shipment saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/shopShipments/{id}",
     *      summary="Display the specified shop_shipment",
     *      tags={"shop_shipment"},
     *      description="Get shop_shipment",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_shipment",
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
     *                  ref="#/definitions/shop_shipment"
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
        /** @var shop_shipment $shopShipment */
        $shopShipment = $this->shopShipmentRepository->find($id);

        if (empty($shopShipment)) {
            return $this->sendError('Shop Shipment not found');
        }

        return $this->sendResponse($shopShipment->toArray(), 'Shop Shipment retrieved successfully');
    }

    /**
     * @param int $id
     * @param Updateshop_shipmentAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/shopShipments/{id}",
     *      summary="Update the specified shop_shipment in storage",
     *      tags={"shop_shipment"},
     *      description="Update shop_shipment",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_shipment",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="shop_shipment that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/shop_shipment")
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
     *                  ref="#/definitions/shop_shipment"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, Updateshop_shipmentAPIRequest $request)
    {
        $input = $request->all();

        /** @var shop_shipment $shopShipment */
        $shopShipment = $this->shopShipmentRepository->find($id);

        if (empty($shopShipment)) {
            return $this->sendError('Shop Shipment not found');
        }

        $shopShipment = $this->shopShipmentRepository->update($input, $id);

        return $this->sendResponse($shopShipment->toArray(), 'shop_shipment updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/shopShipments/{id}",
     *      summary="Remove the specified shop_shipment from storage",
     *      tags={"shop_shipment"},
     *      description="Delete shop_shipment",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_shipment",
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
        /** @var shop_shipment $shopShipment */
        $shopShipment = $this->shopShipmentRepository->find($id);

        if (empty($shopShipment)) {
            return $this->sendError('Shop Shipment not found');
        }

        $shopShipment->delete();

        return $this->sendSuccess('Shop Shipment deleted successfully');
    }
}
