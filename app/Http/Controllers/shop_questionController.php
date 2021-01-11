<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createshop_questionRequest;
use App\Http\Requests\Updateshop_questionRequest;
use App\Repositories\shop_questionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class shop_questionController extends AppBaseController
{
    /** @var  shop_questionRepository */
    private $shopQuestionRepository;

    public function __construct(shop_questionRepository $shopQuestionRepo)
    {
        $this->shopQuestionRepository = $shopQuestionRepo;
    }

    /**
     * Display a listing of the shop_question.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $shopQuestions = $this->shopQuestionRepository->all();

        return view('shop_questions.index')
            ->with('shopQuestions', $shopQuestions);
    }

    /**
     * Show the form for creating a new shop_question.
     *
     * @return Response
     */
    public function create()
    {
        return view('shop_questions.create');
    }

    /**
     * Store a newly created shop_question in storage.
     *
     * @param Createshop_questionRequest $request
     *
     * @return Response
     */
    public function store(Createshop_questionRequest $request)
    {
        $input = $request->all();

        $shopQuestion = $this->shopQuestionRepository->create($input);

        Flash::success('Shop Question saved successfully.');

        return redirect(route('shopQuestions.index'));
    }

    /**
     * Display the specified shop_question.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $shopQuestion = $this->shopQuestionRepository->find($id);

        if (empty($shopQuestion)) {
            Flash::error('Shop Question not found');

            return redirect(route('shopQuestions.index'));
        }

        return view('shop_questions.show')->with('shopQuestion', $shopQuestion);
    }

    /**
     * Show the form for editing the specified shop_question.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $shopQuestion = $this->shopQuestionRepository->find($id);

        if (empty($shopQuestion)) {
            Flash::error('Shop Question not found');

            return redirect(route('shopQuestions.index'));
        }

        return view('shop_questions.edit')->with('shopQuestion', $shopQuestion);
    }

    /**
     * Update the specified shop_question in storage.
     *
     * @param int $id
     * @param Updateshop_questionRequest $request
     *
     * @return Response
     */
    public function update($id, Updateshop_questionRequest $request)
    {
        $shopQuestion = $this->shopQuestionRepository->find($id);

        if (empty($shopQuestion)) {
            Flash::error('Shop Question not found');

            return redirect(route('shopQuestions.index'));
        }

        $shopQuestion = $this->shopQuestionRepository->update($request->all(), $id);

        Flash::success('Shop Question updated successfully.');

        return redirect(route('shopQuestions.index'));
    }

    /**
     * Remove the specified shop_question from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $shopQuestion = $this->shopQuestionRepository->find($id);

        if (empty($shopQuestion)) {
            Flash::error('Shop Question not found');

            return redirect(route('shopQuestions.index'));
        }

        $this->shopQuestionRepository->delete($id);

        Flash::success('Shop Question deleted successfully.');

        return redirect(route('shopQuestions.index'));
    }
}
