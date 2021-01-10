<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createshop_catalogAPIRequest;
use App\Http\Requests\API\Updateshop_catalogAPIRequest;
use App\Models\shop_catalog;
use App\Repositories\shop_catalogRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class shop_catalogController
 * @package App\Http\Controllers\API
 */

class shop_catalogAPIController extends AppBaseController
{
    /** @var  shop_catalogRepository */
    private $shopCatalogRepository;

    public function __construct(shop_catalogRepository $shopCatalogRepo)
    {
        $this->shopCatalogRepository = $shopCatalogRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/shopCatalogs",
     *      summary="Get a listing of the shop_catalogs.",
     *      tags={"shop_catalog"},
     *      description="Get all shop_catalogs",
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
     *                  @SWG\Items(ref="#/definitions/shop_catalog")
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
        $shopCatalogs = $this->shopCatalogRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($shopCatalogs->toArray(), 'Shop Catalogs retrieved successfully');
    }

    /**
     * @param Createshop_catalogAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/shopCatalogs",
     *      summary="Store a newly created shop_catalog in storage",
     *      tags={"shop_catalog"},
     *      description="Store shop_catalog",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="shop_catalog that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/shop_catalog")
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
     *                  ref="#/definitions/shop_catalog"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(Createshop_catalogAPIRequest $request)
    {
        $input = $request->all();

        $shopCatalog = $this->shopCatalogRepository->create($input);

        return $this->sendResponse($shopCatalog->toArray(), 'Shop Catalog saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/shopCatalogs/{id}",
     *      summary="Display the specified shop_catalog",
     *      tags={"shop_catalog"},
     *      description="Get shop_catalog",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_catalog",
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
     *                  ref="#/definitions/shop_catalog"
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
        /** @var shop_catalog $shopCatalog */
        $shopCatalog = $this->shopCatalogRepository->find($id);

        if (empty($shopCatalog)) {
            return $this->sendError('Shop Catalog not found');
        }

        return $this->sendResponse($shopCatalog->toArray(), 'Shop Catalog retrieved successfully');
    }

    /**
     * @param int $id
     * @param Updateshop_catalogAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/shopCatalogs/{id}",
     *      summary="Update the specified shop_catalog in storage",
     *      tags={"shop_catalog"},
     *      description="Update shop_catalog",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_catalog",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="shop_catalog that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/shop_catalog")
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
     *                  ref="#/definitions/shop_catalog"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, Updateshop_catalogAPIRequest $request)
    {
        $input = $request->all();

        /** @var shop_catalog $shopCatalog */
        $shopCatalog = $this->shopCatalogRepository->find($id);

        if (empty($shopCatalog)) {
            return $this->sendError('Shop Catalog not found');
        }

        $shopCatalog = $this->shopCatalogRepository->update($input, $id);

        return $this->sendResponse($shopCatalog->toArray(), 'shop_catalog updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/shopCatalogs/{id}",
     *      summary="Remove the specified shop_catalog from storage",
     *      tags={"shop_catalog"},
     *      description="Delete shop_catalog",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_catalog",
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
        /** @var shop_catalog $shopCatalog */
        $shopCatalog = $this->shopCatalogRepository->find($id);

        if (empty($shopCatalog)) {
            return $this->sendError('Shop Catalog not found');
        }

        $shopCatalog->delete();

        return $this->sendSuccess('Shop Catalog deleted successfully');
    }
}
