<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createshop_packagingAPIRequest;
use App\Http\Requests\API\Updateshop_packagingAPIRequest;
use App\Models\shop_packaging;
use App\Repositories\shop_packagingRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class shop_packagingController
 * @package App\Http\Controllers\API
 */

class shop_packagingAPIController extends AppBaseController
{
    /** @var  shop_packagingRepository */
    private $shopPackagingRepository;

    public function __construct(shop_packagingRepository $shopPackagingRepo)
    {
        $this->shopPackagingRepository = $shopPackagingRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/shopPackagings",
     *      summary="Get a listing of the shop_packagings.",
     *      tags={"shop_packaging"},
     *      description="Get all shop_packagings",
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
     *                  @SWG\Items(ref="#/definitions/shop_packaging")
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
        $shopPackagings = $this->shopPackagingRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($shopPackagings->toArray(), 'Shop Packagings retrieved successfully');
    }

    /**
     * @param Createshop_packagingAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/shopPackagings",
     *      summary="Store a newly created shop_packaging in storage",
     *      tags={"shop_packaging"},
     *      description="Store shop_packaging",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="shop_packaging that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/shop_packaging")
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
     *                  ref="#/definitions/shop_packaging"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(Createshop_packagingAPIRequest $request)
    {
        $input = $request->all();

        $shopPackaging = $this->shopPackagingRepository->create($input);

        return $this->sendResponse($shopPackaging->toArray(), 'Shop Packaging saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/shopPackagings/{id}",
     *      summary="Display the specified shop_packaging",
     *      tags={"shop_packaging"},
     *      description="Get shop_packaging",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_packaging",
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
     *                  ref="#/definitions/shop_packaging"
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
        /** @var shop_packaging $shopPackaging */
        $shopPackaging = $this->shopPackagingRepository->find($id);

        if (empty($shopPackaging)) {
            return $this->sendError('Shop Packaging not found');
        }

        return $this->sendResponse($shopPackaging->toArray(), 'Shop Packaging retrieved successfully');
    }

    /**
     * @param int $id
     * @param Updateshop_packagingAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/shopPackagings/{id}",
     *      summary="Update the specified shop_packaging in storage",
     *      tags={"shop_packaging"},
     *      description="Update shop_packaging",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_packaging",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="shop_packaging that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/shop_packaging")
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
     *                  ref="#/definitions/shop_packaging"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, Updateshop_packagingAPIRequest $request)
    {
        $input = $request->all();

        /** @var shop_packaging $shopPackaging */
        $shopPackaging = $this->shopPackagingRepository->find($id);

        if (empty($shopPackaging)) {
            return $this->sendError('Shop Packaging not found');
        }

        $shopPackaging = $this->shopPackagingRepository->update($input, $id);

        return $this->sendResponse($shopPackaging->toArray(), 'shop_packaging updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/shopPackagings/{id}",
     *      summary="Remove the specified shop_packaging from storage",
     *      tags={"shop_packaging"},
     *      description="Delete shop_packaging",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_packaging",
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
        /** @var shop_packaging $shopPackaging */
        $shopPackaging = $this->shopPackagingRepository->find($id);

        if (empty($shopPackaging)) {
            return $this->sendError('Shop Packaging not found');
        }

        $shopPackaging->delete();

        return $this->sendSuccess('Shop Packaging deleted successfully');
    }
}
