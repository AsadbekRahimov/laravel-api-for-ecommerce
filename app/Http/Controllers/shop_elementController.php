<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createshop_elementRequest;
use App\Http\Requests\Updateshop_elementRequest;
use App\Repositories\shop_elementRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class shop_elementController extends AppBaseController
{
    /** @var  shop_elementRepository */
    private $shopElementRepository;

    public function __construct(shop_elementRepository $shopElementRepo)
    {
        $this->shopElementRepository = $shopElementRepo;
    }

    /**
     * Display a listing of the shop_element.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $shopElements = $this->shopElementRepository->all();

        return view('shop_elements.index')
            ->with('shopElements', $shopElements);
    }

    /**
     * Show the form for creating a new shop_element.
     *
     * @return Response
     */
    public function create()
    {
        return view('shop_elements.create');
    }

    /**
     * Store a newly created shop_element in storage.
     *
     * @param Createshop_elementRequest $request
     *
     * @return Response
     */
    public function store(Createshop_elementRequest $request)
    {
        $input = $request->all();

        $shopElement = $this->shopElementRepository->create($input);

        Flash::success('Shop Element saved successfully.');

        return redirect(route('shopElements.index'));
    }

    /**
     * Display the specified shop_element.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $shopElement = $this->shopElementRepository->find($id);

        if (empty($shopElement)) {
            Flash::error('Shop Element not found');

            return redirect(route('shopElements.index'));
        }

        return view('shop_elements.show')->with('shopElement', $shopElement);
    }

    /**
     * Show the form for editing the specified shop_element.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $shopElement = $this->shopElementRepository->find($id);

        if (empty($shopElement)) {
            Flash::error('Shop Element not found');

            return redirect(route('shopElements.index'));
        }

        return view('shop_elements.edit')->with('shopElement', $shopElement);
    }

    /**
     * Update the specified shop_element in storage.
     *
     * @param int $id
     * @param Updateshop_elementRequest $request
     *
     * @return Response
     */
    public function update($id, Updateshop_elementRequest $request)
    {
        $shopElement = $this->shopElementRepository->find($id);

        if (empty($shopElement)) {
            Flash::error('Shop Element not found');

            return redirect(route('shopElements.index'));
        }

        $shopElement = $this->shopElementRepository->update($request->all(), $id);

        Flash::success('Shop Element updated successfully.');

        return redirect(route('shopElements.index'));
    }

    /**
     * Remove the specified shop_element from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $shopElement = $this->shopElementRepository->find($id);

        if (empty($shopElement)) {
            Flash::error('Shop Element not found');

            return redirect(route('shopElements.index'));
        }

        $this->shopElementRepository->delete($id);

        Flash::success('Shop Element deleted successfully.');

        return redirect(route('shopElements.index'));
    }
}
