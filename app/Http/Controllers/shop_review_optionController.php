<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createshop_review_optionRequest;
use App\Http\Requests\Updateshop_review_optionRequest;
use App\Repositories\shop_review_optionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class shop_review_optionController extends AppBaseController
{
    /** @var  shop_review_optionRepository */
    private $shopReviewOptionRepository;

    public function __construct(shop_review_optionRepository $shopReviewOptionRepo)
    {
        $this->shopReviewOptionRepository = $shopReviewOptionRepo;
    }

    /**
     * Display a listing of the shop_review_option.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $shopReviewOptions = $this->shopReviewOptionRepository->all();

        return view('shop_review_options.index')
            ->with('shopReviewOptions', $shopReviewOptions);
    }

    /**
     * Show the form for creating a new shop_review_option.
     *
     * @return Response
     */
    public function create()
    {
        return view('shop_review_options.create');
    }

    /**
     * Store a newly created shop_review_option in storage.
     *
     * @param Createshop_review_optionRequest $request
     *
     * @return Response
     */
    public function store(Createshop_review_optionRequest $request)
    {
        $input = $request->all();

        $shopReviewOption = $this->shopReviewOptionRepository->create($input);

        Flash::success('Shop Review Option saved successfully.');

        return redirect(route('shopReviewOptions.index'));
    }

    /**
     * Display the specified shop_review_option.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $shopReviewOption = $this->shopReviewOptionRepository->find($id);

        if (empty($shopReviewOption)) {
            Flash::error('Shop Review Option not found');

            return redirect(route('shopReviewOptions.index'));
        }

        return view('shop_review_options.show')->with('shopReviewOption', $shopReviewOption);
    }

    /**
     * Show the form for editing the specified shop_review_option.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $shopReviewOption = $this->shopReviewOptionRepository->find($id);

        if (empty($shopReviewOption)) {
            Flash::error('Shop Review Option not found');

            return redirect(route('shopReviewOptions.index'));
        }

        return view('shop_review_options.edit')->with('shopReviewOption', $shopReviewOption);
    }

    /**
     * Update the specified shop_review_option in storage.
     *
     * @param int $id
     * @param Updateshop_review_optionRequest $request
     *
     * @return Response
     */
    public function update($id, Updateshop_review_optionRequest $request)
    {
        $shopReviewOption = $this->shopReviewOptionRepository->find($id);

        if (empty($shopReviewOption)) {
            Flash::error('Shop Review Option not found');

            return redirect(route('shopReviewOptions.index'));
        }

        $shopReviewOption = $this->shopReviewOptionRepository->update($request->all(), $id);

        Flash::success('Shop Review Option updated successfully.');

        return redirect(route('shopReviewOptions.index'));
    }

    /**
     * Remove the specified shop_review_option from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $shopReviewOption = $this->shopReviewOptionRepository->find($id);

        if (empty($shopReviewOption)) {
            Flash::error('Shop Review Option not found');

            return redirect(route('shopReviewOptions.index'));
        }

        $this->shopReviewOptionRepository->delete($id);

        Flash::success('Shop Review Option deleted successfully.');

        return redirect(route('shopReviewOptions.index'));
    }
}
