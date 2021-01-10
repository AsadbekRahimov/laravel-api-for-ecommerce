<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createshop_optionAPIRequest;
use App\Http\Requests\API\Updateshop_optionAPIRequest;
use App\Models\shop_option;
use App\Repositories\shop_optionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class shop_optionController
 * @package App\Http\Controllers\API
 */

class shop_optionAPIController extends AppBaseController
{
    /** @var  shop_optionRepository */
    private $shopOptionRepository;

    public function __construct(shop_optionRepository $shopOptionRepo)
    {
        $this->shopOptionRepository = $shopOptionRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/shopOptions",
     *      summary="Get a listing of the shop_options.",
     *      tags={"shop_option"},
     *      description="Get all shop_options",
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
     *                  @SWG\Items(ref="#/definitions/shop_option")
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
        $shopOptions = $this->shopOptionRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($shopOptions->toArray(), 'Shop Options retrieved successfully');
    }

    /**
     * @param Createshop_optionAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/shopOptions",
     *      summary="Store a newly created shop_option in storage",
     *      tags={"shop_option"},
     *      description="Store shop_option",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="shop_option that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/shop_option")
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
     *                  ref="#/definitions/shop_option"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(Createshop_optionAPIRequest $request)
    {
        $input = $request->all();

        $shopOption = $this->shopOptionRepository->create($input);

        return $this->sendResponse($shopOption->toArray(), 'Shop Option saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/shopOptions/{id}",
     *      summary="Display the specified shop_option",
     *      tags={"shop_option"},
     *      description="Get shop_option",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_option",
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
     *                  ref="#/definitions/shop_option"
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
        /** @var shop_option $shopOption */
        $shopOption = $this->shopOptionRepository->find($id);

        if (empty($shopOption)) {
            return $this->sendError('Shop Option not found');
        }

        return $this->sendResponse($shopOption->toArray(), 'Shop Option retrieved successfully');
    }

    /**
     * @param int $id
     * @param Updateshop_optionAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/shopOptions/{id}",
     *      summary="Update the specified shop_option in storage",
     *      tags={"shop_option"},
     *      description="Update shop_option",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_option",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="shop_option that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/shop_option")
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
     *                  ref="#/definitions/shop_option"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, Updateshop_optionAPIRequest $request)
    {
        $input = $request->all();

        /** @var shop_option $shopOption */
        $shopOption = $this->shopOptionRepository->find($id);

        if (empty($shopOption)) {
            return $this->sendError('Shop Option not found');
        }

        $shopOption = $this->shopOptionRepository->update($input, $id);

        return $this->sendResponse($shopOption->toArray(), 'shop_option updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/shopOptions/{id}",
     *      summary="Remove the specified shop_option from storage",
     *      tags={"shop_option"},
     *      description="Delete shop_option",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_option",
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
        /** @var shop_option $shopOption */
        $shopOption = $this->shopOptionRepository->find($id);

        if (empty($shopOption)) {
            return $this->sendError('Shop Option not found');
        }

        $shopOption->delete();

        return $this->sendSuccess('Shop Option deleted successfully');
    }
}
