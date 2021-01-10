<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createshop_catalog_wareAPIRequest;
use App\Http\Requests\API\Updateshop_catalog_wareAPIRequest;
use App\Models\shop_catalog_ware;
use App\Repositories\shop_catalog_wareRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class shop_catalog_wareController
 * @package App\Http\Controllers\API
 */

class shop_catalog_wareAPIController extends AppBaseController
{
    /** @var  shop_catalog_wareRepository */
    private $shopCatalogWareRepository;

    public function __construct(shop_catalog_wareRepository $shopCatalogWareRepo)
    {
        $this->shopCatalogWareRepository = $shopCatalogWareRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/shopCatalogWare",
     *      summary="Get a listing of the shop_catalog_ware.",
     *      tags={"shop_catalog_ware"},
     *      description="Get all shop_catalog_ware",
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
     *                  @SWG\Items(ref="#/definitions/shop_catalog_ware")
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
        $shopCatalogWare = $this->shopCatalogWareRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($shopCatalogWare->toArray(), 'Shop Catalog Ware retrieved successfully');
    }

    /**
     * @param Createshop_catalog_wareAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/shopCatalogWare",
     *      summary="Store a newly created shop_catalog_ware in storage",
     *      tags={"shop_catalog_ware"},
     *      description="Store shop_catalog_ware",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="shop_catalog_ware that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/shop_catalog_ware")
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
     *                  ref="#/definitions/shop_catalog_ware"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(Createshop_catalog_wareAPIRequest $request)
    {
        $input = $request->all();

        $shopCatalogWare = $this->shopCatalogWareRepository->create($input);

        return $this->sendResponse($shopCatalogWare->toArray(), 'Shop Catalog Ware saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/shopCatalogWare/{id}",
     *      summary="Display the specified shop_catalog_ware",
     *      tags={"shop_catalog_ware"},
     *      description="Get shop_catalog_ware",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_catalog_ware",
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
     *                  ref="#/definitions/shop_catalog_ware"
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
        /** @var shop_catalog_ware $shopCatalogWare */
        $shopCatalogWare = $this->shopCatalogWareRepository->find($id);

        if (empty($shopCatalogWare)) {
            return $this->sendError('Shop Catalog Ware not found');
        }

        return $this->sendResponse($shopCatalogWare->toArray(), 'Shop Catalog Ware retrieved successfully');
    }

    /**
     * @param int $id
     * @param Updateshop_catalog_wareAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/shopCatalogWare/{id}",
     *      summary="Update the specified shop_catalog_ware in storage",
     *      tags={"shop_catalog_ware"},
     *      description="Update shop_catalog_ware",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_catalog_ware",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="shop_catalog_ware that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/shop_catalog_ware")
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
     *                  ref="#/definitions/shop_catalog_ware"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, Updateshop_catalog_wareAPIRequest $request)
    {
        $input = $request->all();

        /** @var shop_catalog_ware $shopCatalogWare */
        $shopCatalogWare = $this->shopCatalogWareRepository->find($id);

        if (empty($shopCatalogWare)) {
            return $this->sendError('Shop Catalog Ware not found');
        }

        $shopCatalogWare = $this->shopCatalogWareRepository->update($input, $id);

        return $this->sendResponse($shopCatalogWare->toArray(), 'shop_catalog_ware updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/shopCatalogWare/{id}",
     *      summary="Remove the specified shop_catalog_ware from storage",
     *      tags={"shop_catalog_ware"},
     *      description="Delete shop_catalog_ware",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_catalog_ware",
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
        /** @var shop_catalog_ware $shopCatalogWare */
        $shopCatalogWare = $this->shopCatalogWareRepository->find($id);

        if (empty($shopCatalogWare)) {
            return $this->sendError('Shop Catalog Ware not found');
        }

        $shopCatalogWare->delete();

        return $this->sendSuccess('Shop Catalog Ware deleted successfully');
    }
}
