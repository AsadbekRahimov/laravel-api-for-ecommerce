<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createshop_delayRequest;
use App\Http\Requests\Updateshop_delayRequest;
use App\Repositories\shop_delayRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class shop_delayController extends AppBaseController
{
    /** @var  shop_delayRepository */
    private $shopDelayRepository;

    public function __construct(shop_delayRepository $shopDelayRepo)
    {
        $this->shopDelayRepository = $shopDelayRepo;
    }

    /**
     * Display a listing of the shop_delay.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $shopDelays = $this->shopDelayRepository->all();

        return view('shop_delays.index')
            ->with('shopDelays', $shopDelays);
    }

    /**
     * Show the form for creating a new shop_delay.
     *
     * @return Response
     */
    public function create()
    {
        return view('shop_delays.create');
    }

    /**
     * Store a newly created shop_delay in storage.
     *
     * @param Createshop_delayRequest $request
     *
     * @return Response
     */
    public function store(Createshop_delayRequest $request)
    {
        $input = $request->all();

        $shopDelay = $this->shopDelayRepository->create($input);

        Flash::success('Shop Delay saved successfully.');

        return redirect(route('shopDelays.index'));
    }

    /**
     * Display the specified shop_delay.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $shopDelay = $this->shopDelayRepository->find($id);

        if (empty($shopDelay)) {
            Flash::error('Shop Delay not found');

            return redirect(route('shopDelays.index'));
        }

        return view('shop_delays.show')->with('shopDelay', $shopDelay);
    }

    /**
     * Show the form for editing the specified shop_delay.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $shopDelay = $this->shopDelayRepository->find($id);

        if (empty($shopDelay)) {
            Flash::error('Shop Delay not found');

            return redirect(route('shopDelays.index'));
        }

        return view('shop_delays.edit')->with('shopDelay', $shopDelay);
    }

    /**
     * Update the specified shop_delay in storage.
     *
     * @param int $id
     * @param Updateshop_delayRequest $request
     *
     * @return Response
     */
    public function update($id, Updateshop_delayRequest $request)
    {
        $shopDelay = $this->shopDelayRepository->find($id);

        if (empty($shopDelay)) {
            Flash::error('Shop Delay not found');

            return redirect(route('shopDelays.index'));
        }

        $shopDelay = $this->shopDelayRepository->update($request->all(), $id);

        Flash::success('Shop Delay updated successfully.');

        return redirect(route('shopDelays.index'));
    }

    /**
     * Remove the specified shop_delay from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $shopDelay = $this->shopDelayRepository->find($id);

        if (empty($shopDelay)) {
            Flash::error('Shop Delay not found');

            return redirect(route('shopDelays.index'));
        }

        $this->shopDelayRepository->delete($id);

        Flash::success('Shop Delay deleted successfully.');

        return redirect(route('shopDelays.index'));
    }
}
