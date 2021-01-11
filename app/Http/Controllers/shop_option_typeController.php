<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createshop_option_typeRequest;
use App\Http\Requests\Updateshop_option_typeRequest;
use App\Repositories\shop_option_typeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class shop_option_typeController extends AppBaseController
{
    /** @var  shop_option_typeRepository */
    private $shopOptionTypeRepository;

    public function __construct(shop_option_typeRepository $shopOptionTypeRepo)
    {
        $this->shopOptionTypeRepository = $shopOptionTypeRepo;
    }

    /**
     * Display a listing of the shop_option_type.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $shopOptionTypes = $this->shopOptionTypeRepository->all();

        return view('shop_option_types.index')
            ->with('shopOptionTypes', $shopOptionTypes);
    }

    /**
     * Show the form for creating a new shop_option_type.
     *
     * @return Response
     */
    public function create()
    {
        return view('shop_option_types.create');
    }

    /**
     * Store a newly created shop_option_type in storage.
     *
     * @param Createshop_option_typeRequest $request
     *
     * @return Response
     */
    public function store(Createshop_option_typeRequest $request)
    {
        $input = $request->all();

        $shopOptionType = $this->shopOptionTypeRepository->create($input);

        Flash::success('Shop Option Type saved successfully.');

        return redirect(route('shopOptionTypes.index'));
    }

    /**
     * Display the specified shop_option_type.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $shopOptionType = $this->shopOptionTypeRepository->find($id);

        if (empty($shopOptionType)) {
            Flash::error('Shop Option Type not found');

            return redirect(route('shopOptionTypes.index'));
        }

        return view('shop_option_types.show')->with('shopOptionType', $shopOptionType);
    }

    /**
     * Show the form for editing the specified shop_option_type.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $shopOptionType = $this->shopOptionTypeRepository->find($id);

        if (empty($shopOptionType)) {
            Flash::error('Shop Option Type not found');

            return redirect(route('shopOptionTypes.index'));
        }

        return view('shop_option_types.edit')->with('shopOptionType', $shopOptionType);
    }

    /**
     * Update the specified shop_option_type in storage.
     *
     * @param int $id
     * @param Updateshop_option_typeRequest $request
     *
     * @return Response
     */
    public function update($id, Updateshop_option_typeRequest $request)
    {
        $shopOptionType = $this->shopOptionTypeRepository->find($id);

        if (empty($shopOptionType)) {
            Flash::error('Shop Option Type not found');

            return redirect(route('shopOptionTypes.index'));
        }

        $shopOptionType = $this->shopOptionTypeRepository->update($request->all(), $id);

        Flash::success('Shop Option Type updated successfully.');

        return redirect(route('shopOptionTypes.index'));
    }

    /**
     * Remove the specified shop_option_type from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $shopOptionType = $this->shopOptionTypeRepository->find($id);

        if (empty($shopOptionType)) {
            Flash::error('Shop Option Type not found');

            return redirect(route('shopOptionTypes.index'));
        }

        $this->shopOptionTypeRepository->delete($id);

        Flash::success('Shop Option Type deleted successfully.');

        return redirect(route('shopOptionTypes.index'));
    }
}
