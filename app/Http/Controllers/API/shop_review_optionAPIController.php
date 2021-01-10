<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createshop_review_optionAPIRequest;
use App\Http\Requests\API\Updateshop_review_optionAPIRequest;
use App\Models\shop_review_option;
use App\Repositories\shop_review_optionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class shop_review_optionController
 * @package App\Http\Controllers\API
 */

class shop_review_optionAPIController extends AppBaseController
{
    /** @var  shop_review_optionRepository */
    private $shopReviewOptionRepository;

    public function __construct(shop_review_optionRepository $shopReviewOptionRepo)
    {
        $this->shopReviewOptionRepository = $shopReviewOptionRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/shopReviewOptions",
     *      summary="Get a listing of the shop_review_options.",
     *      tags={"shop_review_option"},
     *      description="Get all shop_review_options",
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
     *                  @SWG\Items(ref="#/definitions/shop_review_option")
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
        $shopReviewOptions = $this->shopReviewOptionRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($shopReviewOptions->toArray(), 'Shop Review Options retrieved successfully');
    }

    /**
     * @param Createshop_review_optionAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/shopReviewOptions",
     *      summary="Store a newly created shop_review_option in storage",
     *      tags={"shop_review_option"},
     *      description="Store shop_review_option",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="shop_review_option that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/shop_review_option")
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
     *                  ref="#/definitions/shop_review_option"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(Createshop_review_optionAPIRequest $request)
    {
        $input = $request->all();

        $shopReviewOption = $this->shopReviewOptionRepository->create($input);

        return $this->sendResponse($shopReviewOption->toArray(), 'Shop Review Option saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/shopReviewOptions/{id}",
     *      summary="Display the specified shop_review_option",
     *      tags={"shop_review_option"},
     *      description="Get shop_review_option",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_review_option",
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
     *                  ref="#/definitions/shop_review_option"
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
        /** @var shop_review_option $shopReviewOption */
        $shopReviewOption = $this->shopReviewOptionRepository->find($id);

        if (empty($shopReviewOption)) {
            return $this->sendError('Shop Review Option not found');
        }

        return $this->sendResponse($shopReviewOption->toArray(), 'Shop Review Option retrieved successfully');
    }

    /**
     * @param int $id
     * @param Updateshop_review_optionAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/shopReviewOptions/{id}",
     *      summary="Update the specified shop_review_option in storage",
     *      tags={"shop_review_option"},
     *      description="Update shop_review_option",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_review_option",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="shop_review_option that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/shop_review_option")
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
     *                  ref="#/definitions/shop_review_option"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, Updateshop_review_optionAPIRequest $request)
    {
        $input = $request->all();

        /** @var shop_review_option $shopReviewOption */
        $shopReviewOption = $this->shopReviewOptionRepository->find($id);

        if (empty($shopReviewOption)) {
            return $this->sendError('Shop Review Option not found');
        }

        $shopReviewOption = $this->shopReviewOptionRepository->update($input, $id);

        return $this->sendResponse($shopReviewOption->toArray(), 'shop_review_option updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/shopReviewOptions/{id}",
     *      summary="Remove the specified shop_review_option from storage",
     *      tags={"shop_review_option"},
     *      description="Delete shop_review_option",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_review_option",
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
        /** @var shop_review_option $shopReviewOption */
        $shopReviewOption = $this->shopReviewOptionRepository->find($id);

        if (empty($shopReviewOption)) {
            return $this->sendError('Shop Review Option not found');
        }

        $shopReviewOption->delete();

        return $this->sendSuccess('Shop Review Option deleted successfully');
    }
}
