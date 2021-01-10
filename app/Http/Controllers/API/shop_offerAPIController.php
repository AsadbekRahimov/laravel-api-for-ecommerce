<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createshop_offerAPIRequest;
use App\Http\Requests\API\Updateshop_offerAPIRequest;
use App\Models\shop_offer;
use App\Repositories\shop_offerRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class shop_offerController
 * @package App\Http\Controllers\API
 */

class shop_offerAPIController extends AppBaseController
{
    /** @var  shop_offerRepository */
    private $shopOfferRepository;

    public function __construct(shop_offerRepository $shopOfferRepo)
    {
        $this->shopOfferRepository = $shopOfferRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/shopOffers",
     *      summary="Get a listing of the shop_offers.",
     *      tags={"shop_offer"},
     *      description="Get all shop_offers",
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
     *                  @SWG\Items(ref="#/definitions/shop_offer")
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
        $shopOffers = $this->shopOfferRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($shopOffers->toArray(), 'Shop Offers retrieved successfully');
    }

    /**
     * @param Createshop_offerAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/shopOffers",
     *      summary="Store a newly created shop_offer in storage",
     *      tags={"shop_offer"},
     *      description="Store shop_offer",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="shop_offer that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/shop_offer")
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
     *                  ref="#/definitions/shop_offer"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(Createshop_offerAPIRequest $request)
    {
        $input = $request->all();

        $shopOffer = $this->shopOfferRepository->create($input);

        return $this->sendResponse($shopOffer->toArray(), 'Shop Offer saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/shopOffers/{id}",
     *      summary="Display the specified shop_offer",
     *      tags={"shop_offer"},
     *      description="Get shop_offer",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_offer",
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
     *                  ref="#/definitions/shop_offer"
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
        /** @var shop_offer $shopOffer */
        $shopOffer = $this->shopOfferRepository->find($id);

        if (empty($shopOffer)) {
            return $this->sendError('Shop Offer not found');
        }

        return $this->sendResponse($shopOffer->toArray(), 'Shop Offer retrieved successfully');
    }

    /**
     * @param int $id
     * @param Updateshop_offerAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/shopOffers/{id}",
     *      summary="Update the specified shop_offer in storage",
     *      tags={"shop_offer"},
     *      description="Update shop_offer",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_offer",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="shop_offer that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/shop_offer")
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
     *                  ref="#/definitions/shop_offer"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, Updateshop_offerAPIRequest $request)
    {
        $input = $request->all();

        /** @var shop_offer $shopOffer */
        $shopOffer = $this->shopOfferRepository->find($id);

        if (empty($shopOffer)) {
            return $this->sendError('Shop Offer not found');
        }

        $shopOffer = $this->shopOfferRepository->update($input, $id);

        return $this->sendResponse($shopOffer->toArray(), 'shop_offer updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/shopOffers/{id}",
     *      summary="Remove the specified shop_offer from storage",
     *      tags={"shop_offer"},
     *      description="Delete shop_offer",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_offer",
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
        /** @var shop_offer $shopOffer */
        $shopOffer = $this->shopOfferRepository->find($id);

        if (empty($shopOffer)) {
            return $this->sendError('Shop Offer not found');
        }

        $shopOffer->delete();

        return $this->sendSuccess('Shop Offer deleted successfully');
    }
}
