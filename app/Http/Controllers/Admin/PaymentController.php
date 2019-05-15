<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPaymentRequest;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Landlord;
use App\Payment;
use App\Product;
use App\ProductTag;
use App\Tenant;
use App\User;
use Illuminate\Support\Facades\Auth;


class PaymentController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_unless(\Gate::allows('payment_access'), 403);

        $payments = Payment::all();

        return view('admin.payments.index', compact('payments'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('payment_create'), 403);

        $properties = Product::all()->pluck('name', 'id');

        $landlords = Landlord::all()->pluck('name', 'id');

        $tenants = Tenant::all()->pluck('name', 'id');

        $apartmernts = ProductTag::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $confirm_staffs = User::all()->pluck('name', 'id');

        $is_confirmed_gm_names = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $auth = Auth::user();

        return view('admin.payments.create', compact('properties', 'landlords', 'tenants', 'apartmernts', 'confirm_staffs', 'is_confirmed_gm_names', 'auth'));
    }

    public function store(StorePaymentRequest $request)
    {
        abort_unless(\Gate::allows('payment_create'), 403);

        $payment = Payment::create($request->all());
        $payment->properties()->sync($request->input('properties', []));
        $payment->landlords()->sync($request->input('landlords', []));
        $payment->tenants()->sync($request->input('tenants', []));
        $payment->confirm_staffs()->sync($request->input('confirm_staffs', []));

        foreach ($request->input('document', []) as $file) {
            $payment->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('document');
        }

        return redirect()->route('admin.payments.index');
    }

    public function edit(Payment $payment)
    {
        abort_unless(\Gate::allows('payment_edit'), 403);

        $properties = Product::all()->pluck('name', 'id');

        $landlords = Landlord::all()->pluck('name', 'id');

        $tenants = Tenant::all()->pluck('name', 'id');

        $apartmernts = ProductTag::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $confirm_staffs = User::all()->pluck('name', 'id');

        $is_confirmed_gm_names = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $created_bies = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $payment->load('properties', 'landlords', 'tenants', 'apartmernt', 'confirm_staffs', 'is_confirmed_gm_name', 'is_confirmed_ceo_name', 'cancelled_by', 'created_by', 'updated_by');

        return view('admin.payments.edit', compact('properties', 'landlords', 'tenants', 'apartmernts', 'confirm_staffs', 'is_confirmed_gm_names', 'created_bies', 'payment'));
    }

    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        abort_unless(\Gate::allows('payment_edit'), 403);

        $payment->update($request->all());
        $payment->properties()->sync($request->input('properties', []));
        $payment->landlords()->sync($request->input('landlords', []));
        $payment->tenants()->sync($request->input('tenants', []));
        $payment->confirm_staffs()->sync($request->input('confirm_staffs', []));

        if (count($payment->document) > 0) {
            foreach ($payment->document as $media) {
                if (!in_array($media->file_name, $request->input('document', []))) {
                    $media->delete();
                }
            }
        }

        $media = $payment->document->pluck('file_name')->toArray();

        foreach ($request->input('document', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $payment->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('document');
            }
        }

        return redirect()->route('admin.payments.index');
    }

    public function show(Payment $payment)
    {
        abort_unless(\Gate::allows('payment_show'), 403);

        $payment->load('properties', 'landlords', 'tenants', 'apartmernt', 'confirm_staffs', 'is_confirmed_gm_name', 'is_confirmed_ceo_name', 'cancelled_by', 'created_by', 'updated_by');

        return view('admin.payments.show', compact('payment'));
    }

    public function destroy(Payment $payment)
    {
        abort_unless(\Gate::allows('payment_delete'), 403);

        $payment->delete();

        return back();
    }

    public function massDestroy(MassDestroyPaymentRequest $request)
    {
        Payment::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
