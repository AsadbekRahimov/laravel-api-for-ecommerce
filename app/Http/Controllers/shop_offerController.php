<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createshop_offerRequest;
use App\Http\Requests\Updateshop_offerRequest;
use App\Repositories\shop_offerRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class shop_offerController extends AppBaseController
{
    /** @var  shop_offerRepository */
    private $shopOfferRepository;

    public function __construct(shop_offerRepository $shopOfferRepo)
    {
        $this->shopOfferRepository = $shopOfferRepo;
    }

    /**
     * Display a listing of the shop_offer.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $shopOffers = $this->shopOfferRepository->all();

        return view('shop_offers.index')
            ->with('shopOffers', $shopOffers);
    }

    /**
     * Show the form for creating a new shop_offer.
     *
     * @return Response
     */
    public function create()
    {
        return view('shop_offers.create');
    }

    /**
     * Store a newly created shop_offer in storage.
     *
     * @param Createshop_offerRequest $request
     *
     * @return Response
     */
    public function store(Createshop_offerRequest $request)
    {
        $input = $request->all();

        $shopOffer = $this->shopOfferRepository->create($input);

        Flash::success('Shop Offer saved successfully.');

        return redirect(route('shopOffers.index'));
    }

    /**
     * Display the specified shop_offer.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $shopOffer = $this->shopOfferRepository->find($id);

        if (empty($shopOffer)) {
            Flash::error('Shop Offer not found');

            return redirect(route('shopOffers.index'));
        }

        return view('shop_offers.show')->with('shopOffer', $shopOffer);
    }

    /**
     * Show the form for editing the specified shop_offer.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $shopOffer = $this->shopOfferRepository->find($id);

        if (empty($shopOffer)) {
            Flash::error('Shop Offer not found');

            return redirect(route('shopOffers.index'));
        }

        return view('shop_offers.edit')->with('shopOffer', $shopOffer);
    }

    /**
     * Update the specified shop_offer in storage.
     *
     * @param int $id
     * @param Updateshop_offerRequest $request
     *
     * @return Response
     */
    public function update($id, Updateshop_offerRequest $request)
    {
        $shopOffer = $this->shopOfferRepository->find($id);

        if (empty($shopOffer)) {
            Flash::error('Shop Offer not found');

            return redirect(route('shopOffers.index'));
        }

        $shopOffer = $this->shopOfferRepository->update($request->all(), $id);

        Flash::success('Shop Offer updated successfully.');

        return redirect(route('shopOffers.index'));
    }

    /**
     * Remove the specified shop_offer from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $shopOffer = $this->shopOfferRepository->find($id);

        if (empty($shopOffer)) {
            Flash::error('Shop Offer not found');

            return redirect(route('shopOffers.index'));
        }

        $this->shopOfferRepository->delete($id);

        Flash::success('Shop Offer deleted successfully.');

        return redirect(route('shopOffers.index'));
    }
}
