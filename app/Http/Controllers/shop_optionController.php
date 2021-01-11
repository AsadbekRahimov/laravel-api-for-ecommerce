<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createshop_optionRequest;
use App\Http\Requests\Updateshop_optionRequest;
use App\Repositories\shop_optionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class shop_optionController extends AppBaseController
{
    /** @var  shop_optionRepository */
    private $shopOptionRepository;

    public function __construct(shop_optionRepository $shopOptionRepo)
    {
        $this->shopOptionRepository = $shopOptionRepo;
    }

    /**
     * Display a listing of the shop_option.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $shopOptions = $this->shopOptionRepository->all();

        return view('shop_options.index')
            ->with('shopOptions', $shopOptions);
    }

    /**
     * Show the form for creating a new shop_option.
     *
     * @return Response
     */
    public function create()
    {
        return view('shop_options.create');
    }

    /**
     * Store a newly created shop_option in storage.
     *
     * @param Createshop_optionRequest $request
     *
     * @return Response
     */
    public function store(Createshop_optionRequest $request)
    {
        $input = $request->all();

        $shopOption = $this->shopOptionRepository->create($input);

        Flash::success('Shop Option saved successfully.');

        return redirect(route('shopOptions.index'));
    }

    /**
     * Display the specified shop_option.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $shopOption = $this->shopOptionRepository->find($id);

        if (empty($shopOption)) {
            Flash::error('Shop Option not found');

            return redirect(route('shopOptions.index'));
        }

        return view('shop_options.show')->with('shopOption', $shopOption);
    }

    /**
     * Show the form for editing the specified shop_option.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $shopOption = $this->shopOptionRepository->find($id);

        if (empty($shopOption)) {
            Flash::error('Shop Option not found');

            return redirect(route('shopOptions.index'));
        }

        return view('shop_options.edit')->with('shopOption', $shopOption);
    }

    /**
     * Update the specified shop_option in storage.
     *
     * @param int $id
     * @param Updateshop_optionRequest $request
     *
     * @return Response
     */
    public function update($id, Updateshop_optionRequest $request)
    {
        $shopOption = $this->shopOptionRepository->find($id);

        if (empty($shopOption)) {
            Flash::error('Shop Option not found');

            return redirect(route('shopOptions.index'));
        }

        $shopOption = $this->shopOptionRepository->update($request->all(), $id);

        Flash::success('Shop Option updated successfully.');

        return redirect(route('shopOptions.index'));
    }

    /**
     * Remove the specified shop_option from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $shopOption = $this->shopOptionRepository->find($id);

        if (empty($shopOption)) {
            Flash::error('Shop Option not found');

            return redirect(route('shopOptions.index'));
        }

        $this->shopOptionRepository->delete($id);

        Flash::success('Shop Option deleted successfully.');

        return redirect(route('shopOptions.index'));
    }
}
