<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createshop_delayAPIRequest;
use App\Http\Requests\API\Updateshop_delayAPIRequest;
use App\Models\shop_delay;
use App\Repositories\shop_delayRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class shop_delayController
 * @package App\Http\Controllers\API
 */

class shop_delayAPIController extends AppBaseController
{
    /** @var  shop_delayRepository */
    private $shopDelayRepository;

    public function __construct(shop_delayRepository $shopDelayRepo)
    {
        $this->shopDelayRepository = $shopDelayRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/shopDelays",
     *      summary="Get a listing of the shop_delays.",
     *      tags={"shop_delay"},
     *      description="Get all shop_delays",
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
     *                  @SWG\Items(ref="#/definitions/shop_delay")
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
        $shopDelays = $this->shopDelayRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($shopDelays->toArray(), 'Shop Delays retrieved successfully');
    }

    /**
     * @param Createshop_delayAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/shopDelays",
     *      summary="Store a newly created shop_delay in storage",
     *      tags={"shop_delay"},
     *      description="Store shop_delay",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="shop_delay that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/shop_delay")
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
     *                  ref="#/definitions/shop_delay"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(Createshop_delayAPIRequest $request)
    {
        $input = $request->all();

        $shopDelay = $this->shopDelayRepository->create($input);

        return $this->sendResponse($shopDelay->toArray(), 'Shop Delay saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/shopDelays/{id}",
     *      summary="Display the specified shop_delay",
     *      tags={"shop_delay"},
     *      description="Get shop_delay",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_delay",
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
     *                  ref="#/definitions/shop_delay"
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
        /** @var shop_delay $shopDelay */
        $shopDelay = $this->shopDelayRepository->find($id);

        if (empty($shopDelay)) {
            return $this->sendError('Shop Delay not found');
        }

        return $this->sendResponse($shopDelay->toArray(), 'Shop Delay retrieved successfully');
    }

    /**
     * @param int $id
     * @param Updateshop_delayAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/shopDelays/{id}",
     *      summary="Update the specified shop_delay in storage",
     *      tags={"shop_delay"},
     *      description="Update shop_delay",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_delay",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="shop_delay that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/shop_delay")
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
     *                  ref="#/definitions/shop_delay"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, Updateshop_delayAPIRequest $request)
    {
        $input = $request->all();

        /** @var shop_delay $shopDelay */
        $shopDelay = $this->shopDelayRepository->find($id);

        if (empty($shopDelay)) {
            return $this->sendError('Shop Delay not found');
        }

        $shopDelay = $this->shopDelayRepository->update($input, $id);

        return $this->sendResponse($shopDelay->toArray(), 'shop_delay updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/shopDelays/{id}",
     *      summary="Remove the specified shop_delay from storage",
     *      tags={"shop_delay"},
     *      description="Delete shop_delay",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_delay",
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
        /** @var shop_delay $shopDelay */
        $shopDelay = $this->shopDelayRepository->find($id);

        if (empty($shopDelay)) {
            return $this->sendError('Shop Delay not found');
        }

        $shopDelay->delete();

        return $this->sendSuccess('Shop Delay deleted successfully');
    }
}
