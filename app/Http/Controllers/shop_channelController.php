<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createshop_channelRequest;
use App\Http\Requests\Updateshop_channelRequest;
use App\Repositories\shop_channelRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class shop_channelController extends AppBaseController
{
    /** @var  shop_channelRepository */
    private $shopChannelRepository;

    public function __construct(shop_channelRepository $shopChannelRepo)
    {
        $this->shopChannelRepository = $shopChannelRepo;
    }

    /**
     * Display a listing of the shop_channel.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $shopChannels = $this->shopChannelRepository->all();

        return view('shop_channels.index')
            ->with('shopChannels', $shopChannels);
    }

    /**
     * Show the form for creating a new shop_channel.
     *
     * @return Response
     */
    public function create()
    {
        return view('shop_channels.create');
    }

    /**
     * Store a newly created shop_channel in storage.
     *
     * @param Createshop_channelRequest $request
     *
     * @return Response
     */
    public function store(Createshop_channelRequest $request)
    {
        $input = $request->all();

        $shopChannel = $this->shopChannelRepository->create($input);

        Flash::success('Shop Channel saved successfully.');

        return redirect(route('shopChannels.index'));
    }

    /**
     * Display the specified shop_channel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $shopChannel = $this->shopChannelRepository->find($id);

        if (empty($shopChannel)) {
            Flash::error('Shop Channel not found');

            return redirect(route('shopChannels.index'));
        }

        return view('shop_channels.show')->with('shopChannel', $shopChannel);
    }

    /**
     * Show the form for editing the specified shop_channel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $shopChannel = $this->shopChannelRepository->find($id);

        if (empty($shopChannel)) {
            Flash::error('Shop Channel not found');

            return redirect(route('shopChannels.index'));
        }

        return view('shop_channels.edit')->with('shopChannel', $shopChannel);
    }

    /**
     * Update the specified shop_channel in storage.
     *
     * @param int $id
     * @param Updateshop_channelRequest $request
     *
     * @return Response
     */
    public function update($id, Updateshop_channelRequest $request)
    {
        $shopChannel = $this->shopChannelRepository->find($id);

        if (empty($shopChannel)) {
            Flash::error('Shop Channel not found');

            return redirect(route('shopChannels.index'));
        }

        $shopChannel = $this->shopChannelRepository->update($request->all(), $id);

        Flash::success('Shop Channel updated successfully.');

        return redirect(route('shopChannels.index'));
    }

    /**
     * Remove the specified shop_channel from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $shopChannel = $this->shopChannelRepository->find($id);

        if (empty($shopChannel)) {
            Flash::error('Shop Channel not found');

            return redirect(route('shopChannels.index'));
        }

        $this->shopChannelRepository->delete($id);

        Flash::success('Shop Channel deleted successfully.');

        return redirect(route('shopChannels.index'));
    }
}
