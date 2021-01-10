<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createshop_delay_causeAPIRequest;
use App\Http\Requests\API\Updateshop_delay_causeAPIRequest;
use App\Models\shop_delay_cause;
use App\Repositories\shop_delay_causeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class shop_delay_causeController
 * @package App\Http\Controllers\API
 */

class shop_delay_causeAPIController extends AppBaseController
{
    /** @var  shop_delay_causeRepository */
    private $shopDelayCauseRepository;

    public function __construct(shop_delay_causeRepository $shopDelayCauseRepo)
    {
        $this->shopDelayCauseRepository = $shopDelayCauseRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/shopDelayCauses",
     *      summary="Get a listing of the shop_delay_causes.",
     *      tags={"shop_delay_cause"},
     *      description="Get all shop_delay_causes",
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
     *                  @SWG\Items(ref="#/definitions/shop_delay_cause")
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
        $shopDelayCauses = $this->shopDelayCauseRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($shopDelayCauses->toArray(), 'Shop Delay Causes retrieved successfully');
    }

    /**
     * @param Createshop_delay_causeAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/shopDelayCauses",
     *      summary="Store a newly created shop_delay_cause in storage",
     *      tags={"shop_delay_cause"},
     *      description="Store shop_delay_cause",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="shop_delay_cause that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/shop_delay_cause")
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
     *                  ref="#/definitions/shop_delay_cause"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(Createshop_delay_causeAPIRequest $request)
    {
        $input = $request->all();

        $shopDelayCause = $this->shopDelayCauseRepository->create($input);

        return $this->sendResponse($shopDelayCause->toArray(), 'Shop Delay Cause saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/shopDelayCauses/{id}",
     *      summary="Display the specified shop_delay_cause",
     *      tags={"shop_delay_cause"},
     *      description="Get shop_delay_cause",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_delay_cause",
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
     *                  ref="#/definitions/shop_delay_cause"
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
        /** @var shop_delay_cause $shopDelayCause */
        $shopDelayCause = $this->shopDelayCauseRepository->find($id);

        if (empty($shopDelayCause)) {
            return $this->sendError('Shop Delay Cause not found');
        }

        return $this->sendResponse($shopDelayCause->toArray(), 'Shop Delay Cause retrieved successfully');
    }

    /**
     * @param int $id
     * @param Updateshop_delay_causeAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/shopDelayCauses/{id}",
     *      summary="Update the specified shop_delay_cause in storage",
     *      tags={"shop_delay_cause"},
     *      description="Update shop_delay_cause",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_delay_cause",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="shop_delay_cause that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/shop_delay_cause")
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
     *                  ref="#/definitions/shop_delay_cause"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, Updateshop_delay_causeAPIRequest $request)
    {
        $input = $request->all();

        /** @var shop_delay_cause $shopDelayCause */
        $shopDelayCause = $this->shopDelayCauseRepository->find($id);

        if (empty($shopDelayCause)) {
            return $this->sendError('Shop Delay Cause not found');
        }

        $shopDelayCause = $this->shopDelayCauseRepository->update($input, $id);

        return $this->sendResponse($shopDelayCause->toArray(), 'shop_delay_cause updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/shopDelayCauses/{id}",
     *      summary="Remove the specified shop_delay_cause from storage",
     *      tags={"shop_delay_cause"},
     *      description="Delete shop_delay_cause",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_delay_cause",
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
        /** @var shop_delay_cause $shopDelayCause */
        $shopDelayCause = $this->shopDelayCauseRepository->find($id);

        if (empty($shopDelayCause)) {
            return $this->sendError('Shop Delay Cause not found');
        }

        $shopDelayCause->delete();

        return $this->sendSuccess('Shop Delay Cause deleted successfully');
    }
}
