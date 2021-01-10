<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createshop_reviewAPIRequest;
use App\Http\Requests\API\Updateshop_reviewAPIRequest;
use App\Models\shop_review;
use App\Repositories\shop_reviewRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class shop_reviewController
 * @package App\Http\Controllers\API
 */

class shop_reviewAPIController extends AppBaseController
{
    /** @var  shop_reviewRepository */
    private $shopReviewRepository;

    public function __construct(shop_reviewRepository $shopReviewRepo)
    {
        $this->shopReviewRepository = $shopReviewRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/shopReviews",
     *      summary="Get a listing of the shop_reviews.",
     *      tags={"shop_review"},
     *      description="Get all shop_reviews",
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
     *                  @SWG\Items(ref="#/definitions/shop_review")
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
        $shopReviews = $this->shopReviewRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($shopReviews->toArray(), 'Shop Reviews retrieved successfully');
    }

    /**
     * @param Createshop_reviewAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/shopReviews",
     *      summary="Store a newly created shop_review in storage",
     *      tags={"shop_review"},
     *      description="Store shop_review",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="shop_review that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/shop_review")
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
     *                  ref="#/definitions/shop_review"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(Createshop_reviewAPIRequest $request)
    {
        $input = $request->all();

        $shopReview = $this->shopReviewRepository->create($input);

        return $this->sendResponse($shopReview->toArray(), 'Shop Review saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/shopReviews/{id}",
     *      summary="Display the specified shop_review",
     *      tags={"shop_review"},
     *      description="Get shop_review",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_review",
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
     *                  ref="#/definitions/shop_review"
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
        /** @var shop_review $shopReview */
        $shopReview = $this->shopReviewRepository->find($id);

        if (empty($shopReview)) {
            return $this->sendError('Shop Review not found');
        }

        return $this->sendResponse($shopReview->toArray(), 'Shop Review retrieved successfully');
    }

    /**
     * @param int $id
     * @param Updateshop_reviewAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/shopReviews/{id}",
     *      summary="Update the specified shop_review in storage",
     *      tags={"shop_review"},
     *      description="Update shop_review",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_review",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="shop_review that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/shop_review")
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
     *                  ref="#/definitions/shop_review"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, Updateshop_reviewAPIRequest $request)
    {
        $input = $request->all();

        /** @var shop_review $shopReview */
        $shopReview = $this->shopReviewRepository->find($id);

        if (empty($shopReview)) {
            return $this->sendError('Shop Review not found');
        }

        $shopReview = $this->shopReviewRepository->update($input, $id);

        return $this->sendResponse($shopReview->toArray(), 'shop_review updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/shopReviews/{id}",
     *      summary="Remove the specified shop_review from storage",
     *      tags={"shop_review"},
     *      description="Delete shop_review",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_review",
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
        /** @var shop_review $shopReview */
        $shopReview = $this->shopReviewRepository->find($id);

        if (empty($shopReview)) {
            return $this->sendError('Shop Review not found');
        }

        $shopReview->delete();

        return $this->sendSuccess('Shop Review deleted successfully');
    }
}
