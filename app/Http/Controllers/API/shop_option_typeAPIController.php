<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createshop_option_typeAPIRequest;
use App\Http\Requests\API\Updateshop_option_typeAPIRequest;
use App\Models\shop_option_type;
use App\Repositories\shop_option_typeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class shop_option_typeController
 * @package App\Http\Controllers\API
 */

class shop_option_typeAPIController extends AppBaseController
{
    /** @var  shop_option_typeRepository */
    private $shopOptionTypeRepository;

    public function __construct(shop_option_typeRepository $shopOptionTypeRepo)
    {
        $this->shopOptionTypeRepository = $shopOptionTypeRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/shopOptionTypes",
     *      summary="Get a listing of the shop_option_types.",
     *      tags={"shop_option_type"},
     *      description="Get all shop_option_types",
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
     *                  @SWG\Items(ref="#/definitions/shop_option_type")
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
        $shopOptionTypes = $this->shopOptionTypeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($shopOptionTypes->toArray(), 'Shop Option Types retrieved successfully');
    }

    /**
     * @param Createshop_option_typeAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/shopOptionTypes",
     *      summary="Store a newly created shop_option_type in storage",
     *      tags={"shop_option_type"},
     *      description="Store shop_option_type",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="shop_option_type that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/shop_option_type")
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
     *                  ref="#/definitions/shop_option_type"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(Createshop_option_typeAPIRequest $request)
    {
        $input = $request->all();

        $shopOptionType = $this->shopOptionTypeRepository->create($input);

        return $this->sendResponse($shopOptionType->toArray(), 'Shop Option Type saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/shopOptionTypes/{id}",
     *      summary="Display the specified shop_option_type",
     *      tags={"shop_option_type"},
     *      description="Get shop_option_type",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_option_type",
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
     *                  ref="#/definitions/shop_option_type"
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
        /** @var shop_option_type $shopOptionType */
        $shopOptionType = $this->shopOptionTypeRepository->find($id);

        if (empty($shopOptionType)) {
            return $this->sendError('Shop Option Type not found');
        }

        return $this->sendResponse($shopOptionType->toArray(), 'Shop Option Type retrieved successfully');
    }

    /**
     * @param int $id
     * @param Updateshop_option_typeAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/shopOptionTypes/{id}",
     *      summary="Update the specified shop_option_type in storage",
     *      tags={"shop_option_type"},
     *      description="Update shop_option_type",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_option_type",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="shop_option_type that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/shop_option_type")
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
     *                  ref="#/definitions/shop_option_type"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, Updateshop_option_typeAPIRequest $request)
    {
        $input = $request->all();

        /** @var shop_option_type $shopOptionType */
        $shopOptionType = $this->shopOptionTypeRepository->find($id);

        if (empty($shopOptionType)) {
            return $this->sendError('Shop Option Type not found');
        }

        $shopOptionType = $this->shopOptionTypeRepository->update($input, $id);

        return $this->sendResponse($shopOptionType->toArray(), 'shop_option_type updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/shopOptionTypes/{id}",
     *      summary="Remove the specified shop_option_type from storage",
     *      tags={"shop_option_type"},
     *      description="Delete shop_option_type",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_option_type",
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
        /** @var shop_option_type $shopOptionType */
        $shopOptionType = $this->shopOptionTypeRepository->find($id);

        if (empty($shopOptionType)) {
            return $this->sendError('Shop Option Type not found');
        }

        $shopOptionType->delete();

        return $this->sendSuccess('Shop Option Type deleted successfully');
    }
}
