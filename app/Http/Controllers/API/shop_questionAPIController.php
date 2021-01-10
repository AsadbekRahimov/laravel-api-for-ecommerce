<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createshop_questionAPIRequest;
use App\Http\Requests\API\Updateshop_questionAPIRequest;
use App\Models\shop_question;
use App\Repositories\shop_questionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class shop_questionController
 * @package App\Http\Controllers\API
 */

class shop_questionAPIController extends AppBaseController
{
    /** @var  shop_questionRepository */
    private $shopQuestionRepository;

    public function __construct(shop_questionRepository $shopQuestionRepo)
    {
        $this->shopQuestionRepository = $shopQuestionRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/shopQuestions",
     *      summary="Get a listing of the shop_questions.",
     *      tags={"shop_question"},
     *      description="Get all shop_questions",
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
     *                  @SWG\Items(ref="#/definitions/shop_question")
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
        $shopQuestions = $this->shopQuestionRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($shopQuestions->toArray(), 'Shop Questions retrieved successfully');
    }

    /**
     * @param Createshop_questionAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/shopQuestions",
     *      summary="Store a newly created shop_question in storage",
     *      tags={"shop_question"},
     *      description="Store shop_question",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="shop_question that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/shop_question")
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
     *                  ref="#/definitions/shop_question"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(Createshop_questionAPIRequest $request)
    {
        $input = $request->all();

        $shopQuestion = $this->shopQuestionRepository->create($input);

        return $this->sendResponse($shopQuestion->toArray(), 'Shop Question saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/shopQuestions/{id}",
     *      summary="Display the specified shop_question",
     *      tags={"shop_question"},
     *      description="Get shop_question",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_question",
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
     *                  ref="#/definitions/shop_question"
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
        /** @var shop_question $shopQuestion */
        $shopQuestion = $this->shopQuestionRepository->find($id);

        if (empty($shopQuestion)) {
            return $this->sendError('Shop Question not found');
        }

        return $this->sendResponse($shopQuestion->toArray(), 'Shop Question retrieved successfully');
    }

    /**
     * @param int $id
     * @param Updateshop_questionAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/shopQuestions/{id}",
     *      summary="Update the specified shop_question in storage",
     *      tags={"shop_question"},
     *      description="Update shop_question",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_question",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="shop_question that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/shop_question")
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
     *                  ref="#/definitions/shop_question"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, Updateshop_questionAPIRequest $request)
    {
        $input = $request->all();

        /** @var shop_question $shopQuestion */
        $shopQuestion = $this->shopQuestionRepository->find($id);

        if (empty($shopQuestion)) {
            return $this->sendError('Shop Question not found');
        }

        $shopQuestion = $this->shopQuestionRepository->update($input, $id);

        return $this->sendResponse($shopQuestion->toArray(), 'shop_question updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/shopQuestions/{id}",
     *      summary="Remove the specified shop_question from storage",
     *      tags={"shop_question"},
     *      description="Delete shop_question",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of shop_question",
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
        /** @var shop_question $shopQuestion */
        $shopQuestion = $this->shopQuestionRepository->find($id);

        if (empty($shopQuestion)) {
            return $this->sendError('Shop Question not found');
        }

        $shopQuestion->delete();

        return $this->sendSuccess('Shop Question deleted successfully');
    }
}
