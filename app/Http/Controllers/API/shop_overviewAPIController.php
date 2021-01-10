<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createshop_overviewAPIRequest;
use App\Http\Requests\API\Updateshop_overviewAPIRequest;
use App\Models\shop_overview;
use App\Repositories\shop_overviewRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class shop_overviewController
 * @package App\Http\Controllers\API
 */

class shop_overviewAPIController extends AppBaseController
{
    /** @var  shop_overviewRepository */
    private $shopOverviewRepository;

    public function __construct(shop_overviewRepository $shopOverviewRepo)
    {
        $this->shopOverviewRepository = $shopOverviewRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/shopOverviews",
     *      summary="Get a listing of the shop_overviews.",
     *      tags={"shop_overview"},
     *      description="Get all shop_overviews",
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
     *                  @SWG\Items(ref="#/definitions/shop_overview")
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
        $shopOverviews = $this->shopOverviewRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($shopOverviews->toArray(), 'Shop Overviews retrieved successfully');
    }

    /**
     * @param Createshop_overviewAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/shopOverviews",
     *      summary="Store a newly created shop_overview in storage",
     *      tags={"shop_overview"},
     *      description="Store shop_overview",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="shop_overview that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/shop_overview")
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
     *                  ref="#/definitions/shop_overview"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(Createshop_overviewAPIRequest $request)
    {
        $input = $request->all();

        $shopOverview = $this->shopOverviewRepository->create($input);

        return $this->sendResponse($shopOverview->toArray(), 'Shop Overview saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/shopOverviews/{id}",
     *      summary="Display the specified shop_overview",
     *      tags={"shop_overview"},
     *      description="Get shop_overview",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_overview",
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
     *                  ref="#/definitions/shop_overview"
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
        /** @var shop_overview $shopOverview */
        $shopOverview = $this->shopOverviewRepository->find($id);

        if (empty($shopOverview)) {
            return $this->sendError('Shop Overview not found');
        }

        return $this->sendResponse($shopOverview->toArray(), 'Shop Overview retrieved successfully');
    }

    /**
     * @param int $id
     * @param Updateshop_overviewAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/shopOverviews/{id}",
     *      summary="Update the specified shop_overview in storage",
     *      tags={"shop_overview"},
     *      description="Update shop_overview",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_overview",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="shop_overview that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/shop_overview")
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
     *                  ref="#/definitions/shop_overview"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, Updateshop_overviewAPIRequest $request)
    {
        $input = $request->all();

        /** @var shop_overview $shopOverview */
        $shopOverview = $this->shopOverviewRepository->find($id);

        if (empty($shopOverview)) {
            return $this->sendError('Shop Overview not found');
        }

        $shopOverview = $this->shopOverviewRepository->update($input, $id);

        return $this->sendResponse($shopOverview->toArray(), 'shop_overview updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/shopOverviews/{id}",
     *      summary="Remove the specified shop_overview from storage",
     *      tags={"shop_overview"},
     *      description="Delete shop_overview",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_overview",
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
        /** @var shop_overview $shopOverview */
        $shopOverview = $this->shopOverviewRepository->find($id);

        if (empty($shopOverview)) {
            return $this->sendError('Shop Overview not found');
        }

        $shopOverview->delete();

        return $this->sendSuccess('Shop Overview deleted successfully');
    }
}
