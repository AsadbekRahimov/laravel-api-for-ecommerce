<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createshop_categoryAPIRequest;
use App\Http\Requests\API\Updateshop_categoryAPIRequest;
use App\Models\shop_category;
use App\Repositories\shop_categoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class shop_categoryController
 * @package App\Http\Controllers\API
 */

class shop_categoryAPIController extends AppBaseController
{
    /** @var  shop_categoryRepository */
    private $shopCategoryRepository;

    public function __construct(shop_categoryRepository $shopCategoryRepo)
    {
        $this->shopCategoryRepository = $shopCategoryRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/shopCategories",
     *      summary="Get a listing of the shop_categories.",
     *      tags={"shop_category"},
     *      description="Get all shop_categories",
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
     *                  @SWG\Items(ref="#/definitions/shop_category")
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
        $shopCategories = $this->shopCategoryRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($shopCategories->toArray(), 'Shop Categories retrieved successfully');
    }

    /**
     * @param Createshop_categoryAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/shopCategories",
     *      summary="Store a newly created shop_category in storage",
     *      tags={"shop_category"},
     *      description="Store shop_category",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="shop_category that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/shop_category")
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
     *                  ref="#/definitions/shop_category"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(Createshop_categoryAPIRequest $request)
    {
        $input = $request->all();

        $shopCategory = $this->shopCategoryRepository->create($input);

        return $this->sendResponse($shopCategory->toArray(), 'Shop Category saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/shopCategories/{id}",
     *      summary="Display the specified shop_category",
     *      tags={"shop_category"},
     *      description="Get shop_category",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_category",
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
     *                  ref="#/definitions/shop_category"
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
        /** @var shop_category $shopCategory */
        $shopCategory = $this->shopCategoryRepository->find($id);

        if (empty($shopCategory)) {
            return $this->sendError('Shop Category not found');
        }

        return $this->sendResponse($shopCategory->toArray(), 'Shop Category retrieved successfully');
    }

    /**
     * @param int $id
     * @param Updateshop_categoryAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/shopCategories/{id}",
     *      summary="Update the specified shop_category in storage",
     *      tags={"shop_category"},
     *      description="Update shop_category",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_category",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="shop_category that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/shop_category")
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
     *                  ref="#/definitions/shop_category"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, Updateshop_categoryAPIRequest $request)
    {
        $input = $request->all();

        /** @var shop_category $shopCategory */
        $shopCategory = $this->shopCategoryRepository->find($id);

        if (empty($shopCategory)) {
            return $this->sendError('Shop Category not found');
        }

        $shopCategory = $this->shopCategoryRepository->update($input, $id);

        return $this->sendResponse($shopCategory->toArray(), 'shop_category updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/shopCategories/{id}",
     *      summary="Remove the specified shop_category from storage",
     *      tags={"shop_category"},
     *      description="Delete shop_category",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_category",
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
        /** @var shop_category $shopCategory */
        $shopCategory = $this->shopCategoryRepository->find($id);

        if (empty($shopCategory)) {
            return $this->sendError('Shop Category not found');
        }

        $shopCategory->delete();

        return $this->sendSuccess('Shop Category deleted successfully');
    }
}
