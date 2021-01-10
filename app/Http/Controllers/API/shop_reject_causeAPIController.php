<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createshop_reject_causeAPIRequest;
use App\Http\Requests\API\Updateshop_reject_causeAPIRequest;
use App\Models\shop_reject_cause;
use App\Repositories\shop_reject_causeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class shop_reject_causeController
 * @package App\Http\Controllers\API
 */

class shop_reject_causeAPIController extends AppBaseController
{
    /** @var  shop_reject_causeRepository */
    private $shopRejectCauseRepository;

    public function __construct(shop_reject_causeRepository $shopRejectCauseRepo)
    {
        $this->shopRejectCauseRepository = $shopRejectCauseRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/shopRejectCauses",
     *      summary="Get a listing of the shop_reject_causes.",
     *      tags={"shop_reject_cause"},
     *      description="Get all shop_reject_causes",
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
     *                  @SWG\Items(ref="#/definitions/shop_reject_cause")
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
        $shopRejectCauses = $this->shopRejectCauseRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($shopRejectCauses->toArray(), 'Shop Reject Causes retrieved successfully');
    }

    /**
     * @param Createshop_reject_causeAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/shopRejectCauses",
     *      summary="Store a newly created shop_reject_cause in storage",
     *      tags={"shop_reject_cause"},
     *      description="Store shop_reject_cause",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="shop_reject_cause that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/shop_reject_cause")
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
     *                  ref="#/definitions/shop_reject_cause"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(Createshop_reject_causeAPIRequest $request)
    {
        $input = $request->all();

        $shopRejectCause = $this->shopRejectCauseRepository->create($input);

        return $this->sendResponse($shopRejectCause->toArray(), 'Shop Reject Cause saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/shopRejectCauses/{id}",
     *      summary="Display the specified shop_reject_cause",
     *      tags={"shop_reject_cause"},
     *      description="Get shop_reject_cause",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_reject_cause",
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
     *                  ref="#/definitions/shop_reject_cause"
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
        /** @var shop_reject_cause $shopRejectCause */
        $shopRejectCause = $this->shopRejectCauseRepository->find($id);

        if (empty($shopRejectCause)) {
            return $this->sendError('Shop Reject Cause not found');
        }

        return $this->sendResponse($shopRejectCause->toArray(), 'Shop Reject Cause retrieved successfully');
    }

    /**
     * @param int $id
     * @param Updateshop_reject_causeAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/shopRejectCauses/{id}",
     *      summary="Update the specified shop_reject_cause in storage",
     *      tags={"shop_reject_cause"},
     *      description="Update shop_reject_cause",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_reject_cause",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="shop_reject_cause that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/shop_reject_cause")
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
     *                  ref="#/definitions/shop_reject_cause"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, Updateshop_reject_causeAPIRequest $request)
    {
        $input = $request->all();

        /** @var shop_reject_cause $shopRejectCause */
        $shopRejectCause = $this->shopRejectCauseRepository->find($id);

        if (empty($shopRejectCause)) {
            return $this->sendError('Shop Reject Cause not found');
        }

        $shopRejectCause = $this->shopRejectCauseRepository->update($input, $id);

        return $this->sendResponse($shopRejectCause->toArray(), 'shop_reject_cause updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/shopRejectCauses/{id}",
     *      summary="Remove the specified shop_reject_cause from storage",
     *      tags={"shop_reject_cause"},
     *      description="Delete shop_reject_cause",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_reject_cause",
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
        /** @var shop_reject_cause $shopRejectCause */
        $shopRejectCause = $this->shopRejectCauseRepository->find($id);

        if (empty($shopRejectCause)) {
            return $this->sendError('Shop Reject Cause not found');
        }

        $shopRejectCause->delete();

        return $this->sendSuccess('Shop Reject Cause deleted successfully');
    }
}
