<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createshop_bannerAPIRequest;
use App\Http\Requests\API\Updateshop_bannerAPIRequest;
use App\Models\shop_banner;
use App\Repositories\shop_bannerRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class shop_bannerController
 * @package App\Http\Controllers\API
 */

class shop_bannerAPIController extends AppBaseController
{
    /** @var  shop_bannerRepository */
    private $shopBannerRepository;

    public function __construct(shop_bannerRepository $shopBannerRepo)
    {
        $this->shopBannerRepository = $shopBannerRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/shopBanners",
     *      summary="Get a listing of the shop_banners.",
     *      tags={"shop_banner"},
     *      description="Get all shop_banners",
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
     *                  @SWG\Items(ref="#/definitions/shop_banner")
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
        $shopBanners = $this->shopBannerRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($shopBanners->toArray(), 'Shop Banners retrieved successfully');
    }

    /**
     * @param Createshop_bannerAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/shopBanners",
     *      summary="Store a newly created shop_banner in storage",
     *      tags={"shop_banner"},
     *      description="Store shop_banner",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="shop_banner that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/shop_banner")
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
     *                  ref="#/definitions/shop_banner"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(Createshop_bannerAPIRequest $request)
    {
        $input = $request->all();

        $shopBanner = $this->shopBannerRepository->create($input);

        return $this->sendResponse($shopBanner->toArray(), 'Shop Banner saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/shopBanners/{id}",
     *      summary="Display the specified shop_banner",
     *      tags={"shop_banner"},
     *      description="Get shop_banner",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_banner",
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
     *                  ref="#/definitions/shop_banner"
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
        /** @var shop_banner $shopBanner */
        $shopBanner = $this->shopBannerRepository->find($id);

        if (empty($shopBanner)) {
            return $this->sendError('Shop Banner not found');
        }

        return $this->sendResponse($shopBanner->toArray(), 'Shop Banner retrieved successfully');
    }

    /**
     * @param int $id
     * @param Updateshop_bannerAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/shopBanners/{id}",
     *      summary="Update the specified shop_banner in storage",
     *      tags={"shop_banner"},
     *      description="Update shop_banner",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_banner",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="shop_banner that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/shop_banner")
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
     *                  ref="#/definitions/shop_banner"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, Updateshop_bannerAPIRequest $request)
    {
        $input = $request->all();

        /** @var shop_banner $shopBanner */
        $shopBanner = $this->shopBannerRepository->find($id);

        if (empty($shopBanner)) {
            return $this->sendError('Shop Banner not found');
        }

        $shopBanner = $this->shopBannerRepository->update($input, $id);

        return $this->sendResponse($shopBanner->toArray(), 'shop_banner updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/shopBanners/{id}",
     *      summary="Remove the specified shop_banner from storage",
     *      tags={"shop_banner"},
     *      description="Delete shop_banner",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_banner",
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
        /** @var shop_banner $shopBanner */
        $shopBanner = $this->shopBannerRepository->find($id);

        if (empty($shopBanner)) {
            return $this->sendError('Shop Banner not found');
        }

        $shopBanner->delete();

        return $this->sendSuccess('Shop Banner deleted successfully');
    }
}
