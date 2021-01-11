<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createshop_bannerRequest;
use App\Http\Requests\Updateshop_bannerRequest;
use App\Repositories\shop_bannerRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class shop_bannerController extends AppBaseController
{
    /** @var  shop_bannerRepository */
    private $shopBannerRepository;

    public function __construct(shop_bannerRepository $shopBannerRepo)
    {
        $this->shopBannerRepository = $shopBannerRepo;
    }

    /**
     * Display a listing of the shop_banner.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $shopBanners = $this->shopBannerRepository->all();

        return view('shop_banners.index')
            ->with('shopBanners', $shopBanners);
    }

    /**
     * Show the form for creating a new shop_banner.
     *
     * @return Response
     */
    public function create()
    {
        return view('shop_banners.create');
    }

    /**
     * Store a newly created shop_banner in storage.
     *
     * @param Createshop_bannerRequest $request
     *
     * @return Response
     */
    public function store(Createshop_bannerRequest $request)
    {
        $input = $request->all();

        $shopBanner = $this->shopBannerRepository->create($input);

        Flash::success('Shop Banner saved successfully.');

        return redirect(route('shopBanners.index'));
    }

    /**
     * Display the specified shop_banner.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $shopBanner = $this->shopBannerRepository->find($id);

        if (empty($shopBanner)) {
            Flash::error('Shop Banner not found');

            return redirect(route('shopBanners.index'));
        }

        return view('shop_banners.show')->with('shopBanner', $shopBanner);
    }

    /**
     * Show the form for editing the specified shop_banner.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $shopBanner = $this->shopBannerRepository->find($id);

        if (empty($shopBanner)) {
            Flash::error('Shop Banner not found');

            return redirect(route('shopBanners.index'));
        }

        return view('shop_banners.edit')->with('shopBanner', $shopBanner);
    }

    /**
     * Update the specified shop_banner in storage.
     *
     * @param int $id
     * @param Updateshop_bannerRequest $request
     *
     * @return Response
     */
    public function update($id, Updateshop_bannerRequest $request)
    {
        $shopBanner = $this->shopBannerRepository->find($id);

        if (empty($shopBanner)) {
            Flash::error('Shop Banner not found');

            return redirect(route('shopBanners.index'));
        }

        $shopBanner = $this->shopBannerRepository->update($request->all(), $id);

        Flash::success('Shop Banner updated successfully.');

        return redirect(route('shopBanners.index'));
    }

    /**
     * Remove the specified shop_banner from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $shopBanner = $this->shopBannerRepository->find($id);

        if (empty($shopBanner)) {
            Flash::error('Shop Banner not found');

            return redirect(route('shopBanners.index'));
        }

        $this->shopBannerRepository->delete($id);

        Flash::success('Shop Banner deleted successfully.');

        return redirect(route('shopBanners.index'));
    }
}
