<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createtree_shopAPIRequest;
use App\Http\Requests\API\Updatetree_shopAPIRequest;
use App\Models\tree_shop;
use App\Repositories\tree_shopRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class tree_shopController
 * @package App\Http\Controllers\API
 */

class tree_shopAPIController extends AppBaseController
{
    /** @var  tree_shopRepository */
    private $treeShopRepository;

    public function __construct(tree_shopRepository $treeShopRepo)
    {
        $this->treeShopRepository = $treeShopRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/treeShops",
     *      summary="Get a listing of the tree_shops.",
     *      tags={"tree_shop"},
     *      description="Get all tree_shops",
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
     *                  @SWG\Items(ref="#/definitions/tree_shop")
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
        $treeShops = $this->treeShopRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($treeShops->toArray(), 'Tree Shops retrieved successfully');
    }

    /**
     * @param Createtree_shopAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/treeShops",
     *      summary="Store a newly created tree_shop in storage",
     *      tags={"tree_shop"},
     *      description="Store tree_shop",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="tree_shop that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/tree_shop")
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
     *                  ref="#/definitions/tree_shop"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(Createtree_shopAPIRequest $request)
    {
        $input = $request->all();

        $treeShop = $this->treeShopRepository->create($input);

        return $this->sendResponse($treeShop->toArray(), 'Tree Shop saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/treeShops/{id}",
     *      summary="Display the specified tree_shop",
     *      tags={"tree_shop"},
     *      description="Get tree_shop",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of tree_shop",
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
     *                  ref="#/definitions/tree_shop"
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
        /** @var tree_shop $treeShop */
        $treeShop = $this->treeShopRepository->find($id);

        if (empty($treeShop)) {
            return $this->sendError('Tree Shop not found');
        }

        return $this->sendResponse($treeShop->toArray(), 'Tree Shop retrieved successfully');
    }

    /**
     * @param int $id
     * @param Updatetree_shopAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/treeShops/{id}",
     *      summary="Update the specified tree_shop in storage",
     *      tags={"tree_shop"},
     *      description="Update tree_shop",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of tree_shop",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="tree_shop that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/tree_shop")
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
     *                  ref="#/definitions/tree_shop"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, Updatetree_shopAPIRequest $request)
    {
        $input = $request->all();

        /** @var tree_shop $treeShop */
        $treeShop = $this->treeShopRepository->find($id);

        if (empty($treeShop)) {
            return $this->sendError('Tree Shop not found');
        }

        $treeShop = $this->treeShopRepository->update($input, $id);

        return $this->sendResponse($treeShop->toArray(), 'tree_shop updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/treeShops/{id}",
     *      summary="Remove the specified tree_shop from storage",
     *      tags={"tree_shop"},
     *      description="Delete tree_shop",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of tree_shop",
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
        /** @var tree_shop $treeShop */
        $treeShop = $this->treeShopRepository->find($id);

        if (empty($treeShop)) {
            return $this->sendError('Tree Shop not found');
        }

        $treeShop->delete();

        return $this->sendSuccess('Tree Shop deleted successfully');
    }
}
