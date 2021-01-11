<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createshop_categoryRequest;
use App\Http\Requests\Updateshop_categoryRequest;
use App\Repositories\shop_categoryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class shop_categoryController extends AppBaseController
{
    /** @var  shop_categoryRepository */
    private $shopCategoryRepository;

    public function __construct(shop_categoryRepository $shopCategoryRepo)
    {
        $this->shopCategoryRepository = $shopCategoryRepo;
    }

    /**
     * Display a listing of the shop_category.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $shopCategories = $this->shopCategoryRepository->all();

        return view('shop_categories.index')
            ->with('shopCategories', $shopCategories);
    }

    /**
     * Show the form for creating a new shop_category.
     *
     * @return Response
     */
    public function create()
    {
        return view('shop_categories.create');
    }

    /**
     * Store a newly created shop_category in storage.
     *
     * @param Createshop_categoryRequest $request
     *
     * @return Response
     */
    public function store(Createshop_categoryRequest $request)
    {
        $input = $request->all();

        $shopCategory = $this->shopCategoryRepository->create($input);

        Flash::success('Shop Category saved successfully.');

        return redirect(route('shopCategories.index'));
    }

    /**
     * Display the specified shop_category.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $shopCategory = $this->shopCategoryRepository->find($id);

        if (empty($shopCategory)) {
            Flash::error('Shop Category not found');

            return redirect(route('shopCategories.index'));
        }

        return view('shop_categories.show')->with('shopCategory', $shopCategory);
    }

    /**
     * Show the form for editing the specified shop_category.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $shopCategory = $this->shopCategoryRepository->find($id);

        if (empty($shopCategory)) {
            Flash::error('Shop Category not found');

            return redirect(route('shopCategories.index'));
        }

        return view('shop_categories.edit')->with('shopCategory', $shopCategory);
    }

    /**
     * Update the specified shop_category in storage.
     *
     * @param int $id
     * @param Updateshop_categoryRequest $request
     *
     * @return Response
     */
    public function update($id, Updateshop_categoryRequest $request)
    {
        $shopCategory = $this->shopCategoryRepository->find($id);

        if (empty($shopCategory)) {
            Flash::error('Shop Category not found');

            return redirect(route('shopCategories.index'));
        }

        $shopCategory = $this->shopCategoryRepository->update($request->all(), $id);

        Flash::success('Shop Category updated successfully.');

        return redirect(route('shopCategories.index'));
    }

    /**
     * Remove the specified shop_category from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $shopCategory = $this->shopCategoryRepository->find($id);

        if (empty($shopCategory)) {
            Flash::error('Shop Category not found');

            return redirect(route('shopCategories.index'));
        }

        $this->shopCategoryRepository->delete($id);

        Flash::success('Shop Category deleted successfully.');

        return redirect(route('shopCategories.index'));
    }
}
