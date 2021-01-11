<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createshop_paymentRequest;
use App\Http\Requests\Updateshop_paymentRequest;
use App\Repositories\shop_paymentRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class shop_paymentController extends AppBaseController
{
    /** @var  shop_paymentRepository */
    private $shopPaymentRepository;

    public function __construct(shop_paymentRepository $shopPaymentRepo)
    {
        $this->shopPaymentRepository = $shopPaymentRepo;
    }

    /**
     * Display a listing of the shop_payment.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $shopPayments = $this->shopPaymentRepository->all();

        return view('shop_payments.index')
            ->with('shopPayments', $shopPayments);
    }

    /**
     * Show the form for creating a new shop_payment.
     *
     * @return Response
     */
    public function create()
    {
        return view('shop_payments.create');
    }

    /**
     * Store a newly created shop_payment in storage.
     *
     * @param Createshop_paymentRequest $request
     *
     * @return Response
     */
    public function store(Createshop_paymentRequest $request)
    {
        $input = $request->all();

        $shopPayment = $this->shopPaymentRepository->create($input);

        Flash::success('Shop Payment saved successfully.');

        return redirect(route('shopPayments.index'));
    }

    /**
     * Display the specified shop_payment.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $shopPayment = $this->shopPaymentRepository->find($id);

        if (empty($shopPayment)) {
            Flash::error('Shop Payment not found');

            return redirect(route('shopPayments.index'));
        }

        return view('shop_payments.show')->with('shopPayment', $shopPayment);
    }

    /**
     * Show the form for editing the specified shop_payment.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $shopPayment = $this->shopPaymentRepository->find($id);

        if (empty($shopPayment)) {
            Flash::error('Shop Payment not found');

            return redirect(route('shopPayments.index'));
        }

        return view('shop_payments.edit')->with('shopPayment', $shopPayment);
    }

    /**
     * Update the specified shop_payment in storage.
     *
     * @param int $id
     * @param Updateshop_paymentRequest $request
     *
     * @return Response
     */
    public function update($id, Updateshop_paymentRequest $request)
    {
        $shopPayment = $this->shopPaymentRepository->find($id);

        if (empty($shopPayment)) {
            Flash::error('Shop Payment not found');

            return redirect(route('shopPayments.index'));
        }

        $shopPayment = $this->shopPaymentRepository->update($request->all(), $id);

        Flash::success('Shop Payment updated successfully.');

        return redirect(route('shopPayments.index'));
    }

    /**
     * Remove the specified shop_payment from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $shopPayment = $this->shopPaymentRepository->find($id);

        if (empty($shopPayment)) {
            Flash::error('Shop Payment not found');

            return redirect(route('shopPayments.index'));
        }

        $this->shopPaymentRepository->delete($id);

        Flash::success('Shop Payment deleted successfully.');

        return redirect(route('shopPayments.index'));
    }
}
