<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createshop_option_branchAPIRequest;
use App\Http\Requests\API\Updateshop_option_branchAPIRequest;
use App\Models\shop_option_branch;
use App\Repositories\shop_option_branchRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class shop_option_branchController
 * @package App\Http\Controllers\API
 */

class shop_option_branchAPIController extends AppBaseController
{
    /** @var  shop_option_branchRepository */
    private $shopOptionBranchRepository;

    public function __construct(shop_option_branchRepository $shopOptionBranchRepo)
    {
        $this->shopOptionBranchRepository = $shopOptionBranchRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/shopOptionBranches",
     *      summary="Get a listing of the shop_option_branches.",
     *      tags={"shop_option_branch"},
     *      description="Get all shop_option_branches",
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
     *                  @SWG\Items(ref="#/definitions/shop_option_branch")
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
        $shopOptionBranches = $this->shopOptionBranchRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($shopOptionBranches->toArray(), 'Shop Option Branches retrieved successfully');
    }

    /**
     * @param Createshop_option_branchAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/shopOptionBranches",
     *      summary="Store a newly created shop_option_branch in storage",
     *      tags={"shop_option_branch"},
     *      description="Store shop_option_branch",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="shop_option_branch that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/shop_option_branch")
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
     *                  ref="#/definitions/shop_option_branch"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(Createshop_option_branchAPIRequest $request)
    {
        $input = $request->all();

        $shopOptionBranch = $this->shopOptionBranchRepository->create($input);

        return $this->sendResponse($shopOptionBranch->toArray(), 'Shop Option Branch saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/shopOptionBranches/{id}",
     *      summary="Display the specified shop_option_branch",
     *      tags={"shop_option_branch"},
     *      description="Get shop_option_branch",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_option_branch",
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
     *                  ref="#/definitions/shop_option_branch"
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
        /** @var shop_option_branch $shopOptionBranch */
        $shopOptionBranch = $this->shopOptionBranchRepository->find($id);

        if (empty($shopOptionBranch)) {
            return $this->sendError('Shop Option Branch not found');
        }

        return $this->sendResponse($shopOptionBranch->toArray(), 'Shop Option Branch retrieved successfully');
    }

    /**
     * @param int $id
     * @param Updateshop_option_branchAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/shopOptionBranches/{id}",
     *      summary="Update the specified shop_option_branch in storage",
     *      tags={"shop_option_branch"},
     *      description="Update shop_option_branch",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_option_branch",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="shop_option_branch that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/shop_option_branch")
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
     *                  ref="#/definitions/shop_option_branch"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, Updateshop_option_branchAPIRequest $request)
    {
        $input = $request->all();

        /** @var shop_option_branch $shopOptionBranch */
        $shopOptionBranch = $this->shopOptionBranchRepository->find($id);

        if (empty($shopOptionBranch)) {
            return $this->sendError('Shop Option Branch not found');
        }

        $shopOptionBranch = $this->shopOptionBranchRepository->update($input, $id);

        return $this->sendResponse($shopOptionBranch->toArray(), 'shop_option_branch updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/shopOptionBranches/{id}",
     *      summary="Remove the specified shop_option_branch from storage",
     *      tags={"shop_option_branch"},
     *      description="Delete shop_option_branch",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_option_branch",
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
        /** @var shop_option_branch $shopOptionBranch */
        $shopOptionBranch = $this->shopOptionBranchRepository->find($id);

        if (empty($shopOptionBranch)) {
            return $this->sendError('Shop Option Branch not found');
        }

        $shopOptionBranch->delete();

        return $this->sendSuccess('Shop Option Branch deleted successfully');
    }
}
