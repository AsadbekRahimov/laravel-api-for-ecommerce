<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createshop_productAPIRequest;
use App\Http\Requests\API\Updateshop_productAPIRequest;
use App\Models\shop_product;
use App\Repositories\shop_productRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class shop_productController
 * @package App\Http\Controllers\API
 */

class shop_productAPIController extends AppBaseController
{
    /** @var  shop_productRepository */
    private $shopProductRepository;

    public function __construct(shop_productRepository $shopProductRepo)
    {
        $this->shopProductRepository = $shopProductRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/shopProducts",
     *      summary="Get a listing of the shop_products.",
     *      tags={"shop_product"},
     *      description="Get all shop_products",
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
     *                  @SWG\Items(ref="#/definitions/shop_product")
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
        $shopProducts = $this->shopProductRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($shopProducts->toArray(), 'Shop Products retrieved successfully');
    }

    /**
     * @param Createshop_productAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/shopProducts",
     *      summary="Store a newly created shop_product in storage",
     *      tags={"shop_product"},
     *      description="Store shop_product",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="shop_product that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/shop_product")
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
     *                  ref="#/definitions/shop_product"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(Createshop_productAPIRequest $request)
    {
        $input = $request->all();

        $shopProduct = $this->shopProductRepository->create($input);

        return $this->sendResponse($shopProduct->toArray(), 'Shop Product saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/shopProducts/{id}",
     *      summary="Display the specified shop_product",
     *      tags={"shop_product"},
     *      description="Get shop_product",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_product",
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
     *                  ref="#/definitions/shop_product"
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
        /** @var shop_product $shopProduct */
        $shopProduct = $this->shopProductRepository->find($id);

        if (empty($shopProduct)) {
            return $this->sendError('Shop Product not found');
        }

        return $this->sendResponse($shopProduct->toArray(), 'Shop Product retrieved successfully');
    }

    /**
     * @param int $id
     * @param Updateshop_productAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/shopProducts/{id}",
     *      summary="Update the specified shop_product in storage",
     *      tags={"shop_product"},
     *      description="Update shop_product",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_product",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="shop_product that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/shop_product")
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
     *                  ref="#/definitions/shop_product"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, Updateshop_productAPIRequest $request)
    {
        $input = $request->all();

        /** @var shop_product $shopProduct */
        $shopProduct = $this->shopProductRepository->find($id);

        if (empty($shopProduct)) {
            return $this->sendError('Shop Product not found');
        }

        $shopProduct = $this->shopProductRepository->update($input, $id);

        return $this->sendResponse($shopProduct->toArray(), 'shop_product updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/shopProducts/{id}",
     *      summary="Remove the specified shop_product from storage",
     *      tags={"shop_product"},
     *      description="Delete shop_product",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_product",
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
        /** @var shop_product $shopProduct */
        $shopProduct = $this->shopProductRepository->find($id);

        if (empty($shopProduct)) {
            return $this->sendError('Shop Product not found');
        }

        $shopProduct->delete();

        return $this->sendSuccess('Shop Product deleted successfully');
    }
}
