<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createshop_overviewRequest;
use App\Http\Requests\Updateshop_overviewRequest;
use App\Repositories\shop_overviewRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class shop_overviewController extends AppBaseController
{
    /** @var  shop_overviewRepository */
    private $shopOverviewRepository;

    public function __construct(shop_overviewRepository $shopOverviewRepo)
    {
        $this->shopOverviewRepository = $shopOverviewRepo;
    }

    /**
     * Display a listing of the shop_overview.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $shopOverviews = $this->shopOverviewRepository->all();

        return view('shop_overviews.index')
            ->with('shopOverviews', $shopOverviews);
    }

    /**
     * Show the form for creating a new shop_overview.
     *
     * @return Response
     */
    public function create()
    {
        return view('shop_overviews.create');
    }

    /**
     * Store a newly created shop_overview in storage.
     *
     * @param Createshop_overviewRequest $request
     *
     * @return Response
     */
    public function store(Createshop_overviewRequest $request)
    {
        $input = $request->all();

        $shopOverview = $this->shopOverviewRepository->create($input);

        Flash::success('Shop Overview saved successfully.');

        return redirect(route('shopOverviews.index'));
    }

    /**
     * Display the specified shop_overview.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $shopOverview = $this->shopOverviewRepository->find($id);

        if (empty($shopOverview)) {
            Flash::error('Shop Overview not found');

            return redirect(route('shopOverviews.index'));
        }

        return view('shop_overviews.show')->with('shopOverview', $shopOverview);
    }

    /**
     * Show the form for editing the specified shop_overview.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $shopOverview = $this->shopOverviewRepository->find($id);

        if (empty($shopOverview)) {
            Flash::error('Shop Overview not found');

            return redirect(route('shopOverviews.index'));
        }

        return view('shop_overviews.edit')->with('shopOverview', $shopOverview);
    }

    /**
     * Update the specified shop_overview in storage.
     *
     * @param int $id
     * @param Updateshop_overviewRequest $request
     *
     * @return Response
     */
    public function update($id, Updateshop_overviewRequest $request)
    {
        $shopOverview = $this->shopOverviewRepository->find($id);

        if (empty($shopOverview)) {
            Flash::error('Shop Overview not found');

            return redirect(route('shopOverviews.index'));
        }

        $shopOverview = $this->shopOverviewRepository->update($request->all(), $id);

        Flash::success('Shop Overview updated successfully.');

        return redirect(route('shopOverviews.index'));
    }

    /**
     * Remove the specified shop_overview from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $shopOverview = $this->shopOverviewRepository->find($id);

        if (empty($shopOverview)) {
            Flash::error('Shop Overview not found');

            return redirect(route('shopOverviews.index'));
        }

        $this->shopOverviewRepository->delete($id);

        Flash::success('Shop Overview deleted successfully.');

        return redirect(route('shopOverviews.index'));
    }
}
