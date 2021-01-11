<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createshop_reject_causeRequest;
use App\Http\Requests\Updateshop_reject_causeRequest;
use App\Repositories\shop_reject_causeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class shop_reject_causeController extends AppBaseController
{
    /** @var  shop_reject_causeRepository */
    private $shopRejectCauseRepository;

    public function __construct(shop_reject_causeRepository $shopRejectCauseRepo)
    {
        $this->shopRejectCauseRepository = $shopRejectCauseRepo;
    }

    /**
     * Display a listing of the shop_reject_cause.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $shopRejectCauses = $this->shopRejectCauseRepository->all();

        return view('shop_reject_causes.index')
            ->with('shopRejectCauses', $shopRejectCauses);
    }

    /**
     * Show the form for creating a new shop_reject_cause.
     *
     * @return Response
     */
    public function create()
    {
        return view('shop_reject_causes.create');
    }

    /**
     * Store a newly created shop_reject_cause in storage.
     *
     * @param Createshop_reject_causeRequest $request
     *
     * @return Response
     */
    public function store(Createshop_reject_causeRequest $request)
    {
        $input = $request->all();

        $shopRejectCause = $this->shopRejectCauseRepository->create($input);

        Flash::success('Shop Reject Cause saved successfully.');

        return redirect(route('shopRejectCauses.index'));
    }

    /**
     * Display the specified shop_reject_cause.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $shopRejectCause = $this->shopRejectCauseRepository->find($id);

        if (empty($shopRejectCause)) {
            Flash::error('Shop Reject Cause not found');

            return redirect(route('shopRejectCauses.index'));
        }

        return view('shop_reject_causes.show')->with('shopRejectCause', $shopRejectCause);
    }

    /**
     * Show the form for editing the specified shop_reject_cause.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $shopRejectCause = $this->shopRejectCauseRepository->find($id);

        if (empty($shopRejectCause)) {
            Flash::error('Shop Reject Cause not found');

            return redirect(route('shopRejectCauses.index'));
        }

        return view('shop_reject_causes.edit')->with('shopRejectCause', $shopRejectCause);
    }

    /**
     * Update the specified shop_reject_cause in storage.
     *
     * @param int $id
     * @param Updateshop_reject_causeRequest $request
     *
     * @return Response
     */
    public function update($id, Updateshop_reject_causeRequest $request)
    {
        $shopRejectCause = $this->shopRejectCauseRepository->find($id);

        if (empty($shopRejectCause)) {
            Flash::error('Shop Reject Cause not found');

            return redirect(route('shopRejectCauses.index'));
        }

        $shopRejectCause = $this->shopRejectCauseRepository->update($request->all(), $id);

        Flash::success('Shop Reject Cause updated successfully.');

        return redirect(route('shopRejectCauses.index'));
    }

    /**
     * Remove the specified shop_reject_cause from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $shopRejectCause = $this->shopRejectCauseRepository->find($id);

        if (empty($shopRejectCause)) {
            Flash::error('Shop Reject Cause not found');

            return redirect(route('shopRejectCauses.index'));
        }

        $this->shopRejectCauseRepository->delete($id);

        Flash::success('Shop Reject Cause deleted successfully.');

        return redirect(route('shopRejectCauses.index'));
    }
}
