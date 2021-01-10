<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createshop_elementAPIRequest;
use App\Http\Requests\API\Updateshop_elementAPIRequest;
use App\Models\shop_element;
use App\Repositories\shop_elementRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class shop_elementController
 * @package App\Http\Controllers\API
 */

class shop_elementAPIController extends AppBaseController
{
    /** @var  shop_elementRepository */
    private $shopElementRepository;

    public function __construct(shop_elementRepository $shopElementRepo)
    {
        $this->shopElementRepository = $shopElementRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/shopElements",
     *      summary="Get a listing of the shop_elements.",
     *      tags={"shop_element"},
     *      description="Get all shop_elements",
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
     *                  @SWG\Items(ref="#/definitions/shop_element")
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
        $shopElements = $this->shopElementRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($shopElements->toArray(), 'Shop Elements retrieved successfully');
    }

    /**
     * @param Createshop_elementAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/shopElements",
     *      summary="Store a newly created shop_element in storage",
     *      tags={"shop_element"},
     *      description="Store shop_element",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="shop_element that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/shop_element")
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
     *                  ref="#/definitions/shop_element"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(Createshop_elementAPIRequest $request)
    {
        $input = $request->all();

        $shopElement = $this->shopElementRepository->create($input);

        return $this->sendResponse($shopElement->toArray(), 'Shop Element saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/shopElements/{id}",
     *      summary="Display the specified shop_element",
     *      tags={"shop_element"},
     *      description="Get shop_element",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_element",
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
     *                  ref="#/definitions/shop_element"
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
        /** @var shop_element $shopElement */
        $shopElement = $this->shopElementRepository->find($id);

        if (empty($shopElement)) {
            return $this->sendError('Shop Element not found');
        }

        return $this->sendResponse($shopElement->toArray(), 'Shop Element retrieved successfully');
    }

    /**
     * @param int $id
     * @param Updateshop_elementAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/shopElements/{id}",
     *      summary="Update the specified shop_element in storage",
     *      tags={"shop_element"},
     *      description="Update shop_element",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_element",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="shop_element that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/shop_element")
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
     *                  ref="#/definitions/shop_element"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, Updateshop_elementAPIRequest $request)
    {
        $input = $request->all();

        /** @var shop_element $shopElement */
        $shopElement = $this->shopElementRepository->find($id);

        if (empty($shopElement)) {
            return $this->sendError('Shop Element not found');
        }

        $shopElement = $this->shopElementRepository->update($input, $id);

        return $this->sendResponse($shopElement->toArray(), 'shop_element updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/shopElements/{id}",
     *      summary="Remove the specified shop_element from storage",
     *      tags={"shop_element"},
     *      description="Delete shop_element",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_element",
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
        /** @var shop_element $shopElement */
        $shopElement = $this->shopElementRepository->find($id);

        if (empty($shopElement)) {
            return $this->sendError('Shop Element not found');
        }

        $shopElement->delete();

        return $this->sendSuccess('Shop Element deleted successfully');
    }
}
