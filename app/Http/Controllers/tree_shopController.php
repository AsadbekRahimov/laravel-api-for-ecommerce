<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createtree_shopRequest;
use App\Http\Requests\Updatetree_shopRequest;
use App\Repositories\tree_shopRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class tree_shopController extends AppBaseController
{
    /** @var  tree_shopRepository */
    private $treeShopRepository;

    public function __construct(tree_shopRepository $treeShopRepo)
    {
        $this->treeShopRepository = $treeShopRepo;
    }

    /**
     * Display a listing of the tree_shop.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $treeShops = $this->treeShopRepository->all();

        return view('tree_shops.index')
            ->with('treeShops', $treeShops);
    }

    /**
     * Show the form for creating a new tree_shop.
     *
     * @return Response
     */
    public function create()
    {
        return view('tree_shops.create');
    }

    /**
     * Store a newly created tree_shop in storage.
     *
     * @param Createtree_shopRequest $request
     *
     * @return Response
     */
    public function store(Createtree_shopRequest $request)
    {
        $input = $request->all();

        $treeShop = $this->treeShopRepository->create($input);

        Flash::success('Tree Shop saved successfully.');

        return redirect(route('treeShops.index'));
    }

    /**
     * Display the specified tree_shop.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $treeShop = $this->treeShopRepository->find($id);

        if (empty($treeShop)) {
            Flash::error('Tree Shop not found');

            return redirect(route('treeShops.index'));
        }

        return view('tree_shops.show')->with('treeShop', $treeShop);
    }

    /**
     * Show the form for editing the specified tree_shop.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $treeShop = $this->treeShopRepository->find($id);

        if (empty($treeShop)) {
            Flash::error('Tree Shop not found');

            return redirect(route('treeShops.index'));
        }

        return view('tree_shops.edit')->with('treeShop', $treeShop);
    }

    /**
     * Update the specified tree_shop in storage.
     *
     * @param int $id
     * @param Updatetree_shopRequest $request
     *
     * @return Response
     */
    public function update($id, Updatetree_shopRequest $request)
    {
        $treeShop = $this->treeShopRepository->find($id);

        if (empty($treeShop)) {
            Flash::error('Tree Shop not found');

            return redirect(route('treeShops.index'));
        }

        $treeShop = $this->treeShopRepository->update($request->all(), $id);

        Flash::success('Tree Shop updated successfully.');

        return redirect(route('treeShops.index'));
    }

    /**
     * Remove the specified tree_shop from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $treeShop = $this->treeShopRepository->find($id);

        if (empty($treeShop)) {
            Flash::error('Tree Shop not found');

            return redirect(route('treeShops.index'));
        }

        $this->treeShopRepository->delete($id);

        Flash::success('Tree Shop deleted successfully.');

        return redirect(route('treeShops.index'));
    }
}
