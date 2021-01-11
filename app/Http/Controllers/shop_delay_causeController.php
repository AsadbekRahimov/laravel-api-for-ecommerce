<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createshop_delay_causeRequest;
use App\Http\Requests\Updateshop_delay_causeRequest;
use App\Repositories\shop_delay_causeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class shop_delay_causeController extends AppBaseController
{
    /** @var  shop_delay_causeRepository */
    private $shopDelayCauseRepository;

    public function __construct(shop_delay_causeRepository $shopDelayCauseRepo)
    {
        $this->shopDelayCauseRepository = $shopDelayCauseRepo;
    }

    /**
     * Display a listing of the shop_delay_cause.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $shopDelayCauses = $this->shopDelayCauseRepository->all();

        return view('shop_delay_causes.index')
            ->with('shopDelayCauses', $shopDelayCauses);
    }

    /**
     * Show the form for creating a new shop_delay_cause.
     *
     * @return Response
     */
    public function create()
    {
        return view('shop_delay_causes.create');
    }

    /**
     * Store a newly created shop_delay_cause in storage.
     *
     * @param Createshop_delay_causeRequest $request
     *
     * @return Response
     */
    public function store(Createshop_delay_causeRequest $request)
    {
        $input = $request->all();

        $shopDelayCause = $this->shopDelayCauseRepository->create($input);

        Flash::success('Shop Delay Cause saved successfully.');

        return redirect(route('shopDelayCauses.index'));
    }

    /**
     * Display the specified shop_delay_cause.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $shopDelayCause = $this->shopDelayCauseRepository->find($id);

        if (empty($shopDelayCause)) {
            Flash::error('Shop Delay Cause not found');

            return redirect(route('shopDelayCauses.index'));
        }

        return view('shop_delay_causes.show')->with('shopDelayCause', $shopDelayCause);
    }

    /**
     * Show the form for editing the specified shop_delay_cause.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $shopDelayCause = $this->shopDelayCauseRepository->find($id);

        if (empty($shopDelayCause)) {
            Flash::error('Shop Delay Cause not found');

            return redirect(route('shopDelayCauses.index'));
        }

        return view('shop_delay_causes.edit')->with('shopDelayCause', $shopDelayCause);
    }

    /**
     * Update the specified shop_delay_cause in storage.
     *
     * @param int $id
     * @param Updateshop_delay_causeRequest $request
     *
     * @return Response
     */
    public function update($id, Updateshop_delay_causeRequest $request)
    {
        $shopDelayCause = $this->shopDelayCauseRepository->find($id);

        if (empty($shopDelayCause)) {
            Flash::error('Shop Delay Cause not found');

            return redirect(route('shopDelayCauses.index'));
        }

        $shopDelayCause = $this->shopDelayCauseRepository->update($request->all(), $id);

        Flash::success('Shop Delay Cause updated successfully.');

        return redirect(route('shopDelayCauses.index'));
    }

    /**
     * Remove the specified shop_delay_cause from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $shopDelayCause = $this->shopDelayCauseRepository->find($id);

        if (empty($shopDelayCause)) {
            Flash::error('Shop Delay Cause not found');

            return redirect(route('shopDelayCauses.index'));
        }

        $this->shopDelayCauseRepository->delete($id);

        Flash::success('Shop Delay Cause deleted successfully.');

        return redirect(route('shopDelayCauses.index'));
    }
}
