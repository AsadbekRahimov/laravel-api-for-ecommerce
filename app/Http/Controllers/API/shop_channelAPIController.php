<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createshop_channelAPIRequest;
use App\Http\Requests\API\Updateshop_channelAPIRequest;
use App\Models\shop_channel;
use App\Repositories\shop_channelRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class shop_channelController
 * @package App\Http\Controllers\API
 */

class shop_channelAPIController extends AppBaseController
{
    /** @var  shop_channelRepository */
    private $shopChannelRepository;

    public function __construct(shop_channelRepository $shopChannelRepo)
    {
        $this->shopChannelRepository = $shopChannelRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/shopChannels",
     *      summary="Get a listing of the shop_channels.",
     *      tags={"shop_channel"},
     *      description="Get all shop_channels",
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
     *                  @SWG\Items(ref="#/definitions/shop_channel")
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
        $shopChannels = $this->shopChannelRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($shopChannels->toArray(), 'Shop Channels retrieved successfully');
    }

    /**
     * @param Createshop_channelAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/shopChannels",
     *      summary="Store a newly created shop_channel in storage",
     *      tags={"shop_channel"},
     *      description="Store shop_channel",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="shop_channel that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/shop_channel")
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
     *                  ref="#/definitions/shop_channel"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(Createshop_channelAPIRequest $request)
    {
        $input = $request->all();

        $shopChannel = $this->shopChannelRepository->create($input);

        return $this->sendResponse($shopChannel->toArray(), 'Shop Channel saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/shopChannels/{id}",
     *      summary="Display the specified shop_channel",
     *      tags={"shop_channel"},
     *      description="Get shop_channel",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_channel",
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
     *                  ref="#/definitions/shop_channel"
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
        /** @var shop_channel $shopChannel */
        $shopChannel = $this->shopChannelRepository->find($id);

        if (empty($shopChannel)) {
            return $this->sendError('Shop Channel not found');
        }

        return $this->sendResponse($shopChannel->toArray(), 'Shop Channel retrieved successfully');
    }

    /**
     * @param int $id
     * @param Updateshop_channelAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/shopChannels/{id}",
     *      summary="Update the specified shop_channel in storage",
     *      tags={"shop_channel"},
     *      description="Update shop_channel",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_channel",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="shop_channel that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/shop_channel")
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
     *                  ref="#/definitions/shop_channel"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, Updateshop_channelAPIRequest $request)
    {
        $input = $request->all();

        /** @var shop_channel $shopChannel */
        $shopChannel = $this->shopChannelRepository->find($id);

        if (empty($shopChannel)) {
            return $this->sendError('Shop Channel not found');
        }

        $shopChannel = $this->shopChannelRepository->update($input, $id);

        return $this->sendResponse($shopChannel->toArray(), 'shop_channel updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/shopChannels/{id}",
     *      summary="Remove the specified shop_channel from storage",
     *      tags={"shop_channel"},
     *      description="Delete shop_channel",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_channel",
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
        /** @var shop_channel $shopChannel */
        $shopChannel = $this->shopChannelRepository->find($id);

        if (empty($shopChannel)) {
            return $this->sendError('Shop Channel not found');
        }

        $shopChannel->delete();

        return $this->sendSuccess('Shop Channel deleted successfully');
    }
}
