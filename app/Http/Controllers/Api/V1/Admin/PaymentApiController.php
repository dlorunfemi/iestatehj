<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Payment;

class PaymentApiController extends Controller
{
    public function index()
    {
        $payments = Payment::all();

        return $payments;
    }

    public function store(StorePaymentRequest $request)
    {
        return Payment::create($request->all());
    }

    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        return $payment->update($request->all());
    }

    public function show(Payment $payment)
    {
        return $payment;
    }

    public function destroy(Payment $payment)
    {
        return $payment->delete();
    }
}
