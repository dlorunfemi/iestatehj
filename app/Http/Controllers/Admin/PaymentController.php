<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPaymentRequest;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Landlord;
use App\Payment;
use App\Property;
use App\PropertyTag;
use App\Tenant;
use App\User;
use App\Vacancy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_unless(\Gate::allows('payment_access'), 403);

        $payments = Payment::latest()->get();
        // $payments = DB::table('payments')->latest()->first();
        $auth = Auth::user();

        $P = Payment::all()->where('landlord_id', 130)->sum('amount_paid');
        // dd($payments);

        return view('admin.payments.index', compact('payments', 'auth'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('payment_create'), 403);

        $properties = Property::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $landlords = Landlord::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tenants = Tenant::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $apartments = Vacancy::all()->pluck('description', 'id')->prepend(trans('global.pleaseSelect'), '');

        $confirm_staffs = User::all()->pluck('name', 'id');

        $is_confirmed_gm_names = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $auth = Auth::user();

        return view('admin.payments.create', compact('properties', 'landlords', 'tenants', 'apartments', 'confirm_staffs', 'is_confirmed_gm_names', 'auth'));
    }

    public function gettenant($id = 0)
    {

        $is_tenant = Tenant::whereId($id)->first();
        $is_property = Property::whereId($is_tenant->property_id)->first();
        $is_apartment = PropertyTag::whereId($is_tenant->apartment_id)->first();
        $is_landlord = Landlord::whereId($is_property->landlord_id)->first();
        $is_vacant = Vacancy::whereId($is_property->landlord_id)->first();

        $data = [
          'apartment'  => $is_apartment,
          'landlord'  => $is_landlord,
          'property'  => $is_property,
          'tenant'    => $is_tenant,
          'vacant'    => $is_vacant,
        ];
        return response()->json($data);
    }

    public function store(StorePaymentRequest $request)
    {
        abort_unless(\Gate::allows('payment_create'), 403);

        $payment = Payment::create($request->all());
        // dd($payment);
        Landlord::find($payment->landlord_id)->increment('account', $payment->landlord_account);
        if($payment->caution_deposit !== null) {
            Landlord::find($payment->landlord_id)->increment('caution_deposit', $payment->caution_deposit);
        }
        if($payment->service_charge !== null) {
            Landlord::find($payment->landlord_id)->increment('service_charge', $payment->service_charge);
        }


        foreach ($request->input('document', []) as $file) {
            $payment->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('document');
        }

        return redirect()->route('admin.payments.index');
    }

    public function edit(Payment $payment)
    {
        abort_unless(\Gate::allows('payment_edit'), 403);

        $properties = Property::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $landlords = Landlord::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tenants = Tenant::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $apartments = Vacancy::all()->pluck('description', 'id')->prepend(trans('global.pleaseSelect'), '');

        $is_confirm_bies = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $is_confirmed_gm_names = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $created_bies = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $auth = Auth::user();

        $payment->load('property', 'landlord', 'tenant', 'apartment', 'is_confirm_by', 'is_confirmed_gm_name', 'is_confirmed_ceo_name', 'cancelled_by', 'created_by', 'updated_by');

        return view('admin.payments.edit', compact('properties', 'landlords', 'tenants', 'apartments', 'is_confirm_bies', 'is_confirmed_gm_names', 'created_bies', 'payment', 'auth'));
    }

        public function update(UpdatePaymentRequest $request, Payment $payment)
        {
            abort_unless(\Gate::allows('payment_edit'), 403);

            $payment->update($request->all());

            // dd($payment);

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

        public function confirm($request, Payment $payment)
        {
            // abort_unless(\Gate::allows('payment_index'), 403);

            $id = (int)$request;
            dd($payment);

            $payment->update($id->all());




            return redirect()->route('admin.payments.index');
        }


        public function show(Payment $payment)
        {
            abort_unless(\Gate::allows('payment_show'), 403);

            $payment->load('property', 'landlord', 'tenant', 'apartment', 'is_confirm_by', 'is_confirmed_gm_name', 'is_confirmed_ceo_name', 'cancelled_by', 'created_by', 'updated_by');

            $auth = Auth::user();
            // return json_encode($auth->roles[0]['title']);

            return view('admin.payments.show', compact('payment', 'auth'));
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
