<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createshop_option_branchRequest;
use App\Http\Requests\Updateshop_option_branchRequest;
use App\Repositories\shop_option_branchRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class shop_option_branchController extends AppBaseController
{
    /** @var  shop_option_branchRepository */
    private $shopOptionBranchRepository;

    public function __construct(shop_option_branchRepository $shopOptionBranchRepo)
    {
        $this->shopOptionBranchRepository = $shopOptionBranchRepo;
    }

    /**
     * Display a listing of the shop_option_branch.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $shopOptionBranches = $this->shopOptionBranchRepository->all();

        return view('shop_option_branches.index')
            ->with('shopOptionBranches', $shopOptionBranches);
    }

    /**
     * Show the form for creating a new shop_option_branch.
     *
     * @return Response
     */
    public function create()
    {
        return view('shop_option_branches.create');
    }

    /**
     * Store a newly created shop_option_branch in storage.
     *
     * @param Createshop_option_branchRequest $request
     *
     * @return Response
     */
    public function store(Createshop_option_branchRequest $request)
    {
        $input = $request->all();

        $shopOptionBranch = $this->shopOptionBranchRepository->create($input);

        Flash::success('Shop Option Branch saved successfully.');

        return redirect(route('shopOptionBranches.index'));
    }

    /**
     * Display the specified shop_option_branch.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $shopOptionBranch = $this->shopOptionBranchRepository->find($id);

        if (empty($shopOptionBranch)) {
            Flash::error('Shop Option Branch not found');

            return redirect(route('shopOptionBranches.index'));
        }

        return view('shop_option_branches.show')->with('shopOptionBranch', $shopOptionBranch);
    }

    /**
     * Show the form for editing the specified shop_option_branch.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $shopOptionBranch = $this->shopOptionBranchRepository->find($id);

        if (empty($shopOptionBranch)) {
            Flash::error('Shop Option Branch not found');

            return redirect(route('shopOptionBranches.index'));
        }

        return view('shop_option_branches.edit')->with('shopOptionBranch', $shopOptionBranch);
    }

    /**
     * Update the specified shop_option_branch in storage.
     *
     * @param int $id
     * @param Updateshop_option_branchRequest $request
     *
     * @return Response
     */
    public function update($id, Updateshop_option_branchRequest $request)
    {
        $shopOptionBranch = $this->shopOptionBranchRepository->find($id);

        if (empty($shopOptionBranch)) {
            Flash::error('Shop Option Branch not found');

            return redirect(route('shopOptionBranches.index'));
        }

        $shopOptionBranch = $this->shopOptionBranchRepository->update($request->all(), $id);

        Flash::success('Shop Option Branch updated successfully.');

        return redirect(route('shopOptionBranches.index'));
    }

    /**
     * Remove the specified shop_option_branch from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $shopOptionBranch = $this->shopOptionBranchRepository->find($id);

        if (empty($shopOptionBranch)) {
            Flash::error('Shop Option Branch not found');

            return redirect(route('shopOptionBranches.index'));
        }

        $this->shopOptionBranchRepository->delete($id);

        Flash::success('Shop Option Branch deleted successfully.');

        return redirect(route('shopOptionBranches.index'));
    }
}
