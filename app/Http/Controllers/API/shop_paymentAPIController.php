<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createshop_paymentAPIRequest;
use App\Http\Requests\API\Updateshop_paymentAPIRequest;
use App\Models\shop_payment;
use App\Repositories\shop_paymentRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class shop_paymentController
 * @package App\Http\Controllers\API
 */

class shop_paymentAPIController extends AppBaseController
{
    /** @var  shop_paymentRepository */
    private $shopPaymentRepository;

    public function __construct(shop_paymentRepository $shopPaymentRepo)
    {
        $this->shopPaymentRepository = $shopPaymentRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/shopPayments",
     *      summary="Get a listing of the shop_payments.",
     *      tags={"shop_payment"},
     *      description="Get all shop_payments",
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
     *                  @SWG\Items(ref="#/definitions/shop_payment")
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
        $shopPayments = $this->shopPaymentRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($shopPayments->toArray(), 'Shop Payments retrieved successfully');
    }

    /**
     * @param Createshop_paymentAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/shopPayments",
     *      summary="Store a newly created shop_payment in storage",
     *      tags={"shop_payment"},
     *      description="Store shop_payment",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="shop_payment that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/shop_payment")
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
     *                  ref="#/definitions/shop_payment"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(Createshop_paymentAPIRequest $request)
    {
        $input = $request->all();

        $shopPayment = $this->shopPaymentRepository->create($input);

        return $this->sendResponse($shopPayment->toArray(), 'Shop Payment saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/shopPayments/{id}",
     *      summary="Display the specified shop_payment",
     *      tags={"shop_payment"},
     *      description="Get shop_payment",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_payment",
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
     *                  ref="#/definitions/shop_payment"
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
        /** @var shop_payment $shopPayment */
        $shopPayment = $this->shopPaymentRepository->find($id);

        if (empty($shopPayment)) {
            return $this->sendError('Shop Payment not found');
        }

        return $this->sendResponse($shopPayment->toArray(), 'Shop Payment retrieved successfully');
    }

    /**
     * @param int $id
     * @param Updateshop_paymentAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/shopPayments/{id}",
     *      summary="Update the specified shop_payment in storage",
     *      tags={"shop_payment"},
     *      description="Update shop_payment",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_payment",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="shop_payment that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/shop_payment")
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
     *                  ref="#/definitions/shop_payment"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, Updateshop_paymentAPIRequest $request)
    {
        $input = $request->all();

        /** @var shop_payment $shopPayment */
        $shopPayment = $this->shopPaymentRepository->find($id);

        if (empty($shopPayment)) {
            return $this->sendError('Shop Payment not found');
        }

        $shopPayment = $this->shopPaymentRepository->update($input, $id);

        return $this->sendResponse($shopPayment->toArray(), 'shop_payment updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/shopPayments/{id}",
     *      summary="Remove the specified shop_payment from storage",
     *      tags={"shop_payment"},
     *      description="Delete shop_payment",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_payment",
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
        /** @var shop_payment $shopPayment */
        $shopPayment = $this->shopPaymentRepository->find($id);

        if (empty($shopPayment)) {
            return $this->sendError('Shop Payment not found');
        }

        $shopPayment->delete();

        return $this->sendSuccess('Shop Payment deleted successfully');
    }
}
