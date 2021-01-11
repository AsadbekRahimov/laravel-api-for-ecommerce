<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createshop_reviewRequest;
use App\Http\Requests\Updateshop_reviewRequest;
use App\Repositories\shop_reviewRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class shop_reviewController extends AppBaseController
{
    /** @var  shop_reviewRepository */
    private $shopReviewRepository;

    public function __construct(shop_reviewRepository $shopReviewRepo)
    {
        $this->shopReviewRepository = $shopReviewRepo;
    }

    /**
     * Display a listing of the shop_review.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $shopReviews = $this->shopReviewRepository->all();

        return view('shop_reviews.index')
            ->with('shopReviews', $shopReviews);
    }

    /**
     * Show the form for creating a new shop_review.
     *
     * @return Response
     */
    public function create()
    {
        return view('shop_reviews.create');
    }

    /**
     * Store a newly created shop_review in storage.
     *
     * @param Createshop_reviewRequest $request
     *
     * @return Response
     */
    public function store(Createshop_reviewRequest $request)
    {
        $input = $request->all();

        $shopReview = $this->shopReviewRepository->create($input);

        Flash::success('Shop Review saved successfully.');

        return redirect(route('shopReviews.index'));
    }

    /**
     * Display the specified shop_review.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $shopReview = $this->shopReviewRepository->find($id);

        if (empty($shopReview)) {
            Flash::error('Shop Review not found');

            return redirect(route('shopReviews.index'));
        }

        return view('shop_reviews.show')->with('shopReview', $shopReview);
    }

    /**
     * Show the form for editing the specified shop_review.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $shopReview = $this->shopReviewRepository->find($id);

        if (empty($shopReview)) {
            Flash::error('Shop Review not found');

            return redirect(route('shopReviews.index'));
        }

        return view('shop_reviews.edit')->with('shopReview', $shopReview);
    }

    /**
     * Update the specified shop_review in storage.
     *
     * @param int $id
     * @param Updateshop_reviewRequest $request
     *
     * @return Response
     */
    public function update($id, Updateshop_reviewRequest $request)
    {
        $shopReview = $this->shopReviewRepository->find($id);

        if (empty($shopReview)) {
            Flash::error('Shop Review not found');

            return redirect(route('shopReviews.index'));
        }

        $shopReview = $this->shopReviewRepository->update($request->all(), $id);

        Flash::success('Shop Review updated successfully.');

        return redirect(route('shopReviews.index'));
    }

    /**
     * Remove the specified shop_review from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $shopReview = $this->shopReviewRepository->find($id);

        if (empty($shopReview)) {
            Flash::error('Shop Review not found');

            return redirect(route('shopReviews.index'));
        }

        $this->shopReviewRepository->delete($id);

        Flash::success('Shop Review deleted successfully.');

        return redirect(route('shopReviews.index'));
    }
}
