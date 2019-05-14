@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('global.payment.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.payments.update", [$payment->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('properties') ? 'has-error' : '' }}">
                <label for="property">{{ trans('global.payment.fields.property') }}*
                    <span class="btn btn-info btn-xs select-all">Select all</span>
                    <span class="btn btn-info btn-xs deselect-all">Deselect all</span></label>
                <select name="properties[]" id="properties" class="form-control select2" multiple="multiple">
                    @foreach($properties as $id => $property)
                        <option value="{{ $id }}" {{ (in_array($id, old('properties', [])) || isset($payment) && $payment->properties->contains($id)) ? 'selected' : '' }}>{{ $property }}</option>
                    @endforeach
                </select>
                @if($errors->has('properties'))
                    <p class="help-block">
                        {{ $errors->first('properties') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.payment.fields.property_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('landlords') ? 'has-error' : '' }}">
                <label for="landlord">{{ trans('global.payment.fields.landlord') }}*
                    <span class="btn btn-info btn-xs select-all">Select all</span>
                    <span class="btn btn-info btn-xs deselect-all">Deselect all</span></label>
                <select name="landlords[]" id="landlords" class="form-control select2" multiple="multiple">
                    @foreach($landlords as $id => $landlord)
                        <option value="{{ $id }}" {{ (in_array($id, old('landlords', [])) || isset($payment) && $payment->landlords->contains($id)) ? 'selected' : '' }}>{{ $landlord }}</option>
                    @endforeach
                </select>
                @if($errors->has('landlords'))
                    <p class="help-block">
                        {{ $errors->first('landlords') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.payment.fields.landlord_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('tenants') ? 'has-error' : '' }}">
                <label for="tenant">{{ trans('global.payment.fields.tenant') }}*
                    <span class="btn btn-info btn-xs select-all">Select all</span>
                    <span class="btn btn-info btn-xs deselect-all">Deselect all</span></label>
                <select name="tenants[]" id="tenants" class="form-control select2" multiple="multiple">
                    @foreach($tenants as $id => $tenant)
                        <option value="{{ $id }}" {{ (in_array($id, old('tenants', [])) || isset($payment) && $payment->tenants->contains($id)) ? 'selected' : '' }}>{{ $tenant }}</option>
                    @endforeach
                </select>
                @if($errors->has('tenants'))
                    <p class="help-block">
                        {{ $errors->first('tenants') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.payment.fields.tenant_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('apartmernt_id') ? 'has-error' : '' }}">
                <label for="apartmernt">{{ trans('global.payment.fields.apartmernt') }}</label>
                <select name="apartmernt_id" id="apartmernt" class="form-control select2">
                    @foreach($apartmernts as $id => $apartmernt)
                        <option value="{{ $id }}" {{ (isset($payment) && $payment->apartmernt ? $payment->apartmernt->id : old('apartmernt_id')) == $id ? 'selected' : '' }}>{{ $apartmernt }}</option>
                    @endforeach
                </select>
                @if($errors->has('apartmernt_id'))
                    <p class="help-block">
                        {{ $errors->first('apartmernt_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('annual_charge') ? 'has-error' : '' }}">
                <label for="annual_charge">{{ trans('global.payment.fields.annual_charge') }}*</label>
                <input type="number" id="annual_charge" name="annual_charge" class="form-control" value="{{ old('annual_charge', isset($payment) ? $payment->annual_charge : '') }}" step="0.01">
                @if($errors->has('annual_charge'))
                    <p class="help-block">
                        {{ $errors->first('annual_charge') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.payment.fields.annual_charge_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('service_charge') ? 'has-error' : '' }}">
                <label for="service_charge">{{ trans('global.payment.fields.service_charge') }}</label>
                <input type="number" id="service_charge" name="service_charge" class="form-control" value="{{ old('service_charge', isset($payment) ? $payment->service_charge : '') }}" step="0.01">
                @if($errors->has('service_charge'))
                    <p class="help-block">
                        {{ $errors->first('service_charge') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.payment.fields.service_charge_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('legal_fee') ? 'has-error' : '' }}">
                <label for="legal_fee">{{ trans('global.payment.fields.legal_fee') }}</label>
                <input type="number" id="legal_fee" name="legal_fee" class="form-control" value="{{ old('legal_fee', isset($payment) ? $payment->legal_fee : '') }}" step="0.01">
                @if($errors->has('legal_fee'))
                    <p class="help-block">
                        {{ $errors->first('legal_fee') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.payment.fields.legal_fee_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('caution_deposit') ? 'has-error' : '' }}">
                <label for="caution_deposit">{{ trans('global.payment.fields.caution_deposit') }}</label>
                <input type="number" id="caution_deposit" name="caution_deposit" class="form-control" value="{{ old('caution_deposit', isset($payment) ? $payment->caution_deposit : '') }}" step="0.01">
                @if($errors->has('caution_deposit'))
                    <p class="help-block">
                        {{ $errors->first('caution_deposit') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.payment.fields.caution_deposit_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('agency_fee') ? 'has-error' : '' }}">
                <label for="agency_fee">{{ trans('global.payment.fields.agency_fee') }}</label>
                <input type="number" id="agency_fee" name="agency_fee" class="form-control" value="{{ old('agency_fee', isset($payment) ? $payment->agency_fee : '') }}" step="0.01">
                @if($errors->has('agency_fee'))
                    <p class="help-block">
                        {{ $errors->first('agency_fee') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.payment.fields.agency_fee_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('management_fee') ? 'has-error' : '' }}">
                <label for="management_fee">{{ trans('global.payment.fields.management_fee') }}</label>
                <input type="number" id="management_fee" name="management_fee" class="form-control" value="{{ old('management_fee', isset($payment) ? $payment->management_fee : '') }}" step="0.01">
                @if($errors->has('management_fee'))
                    <p class="help-block">
                        {{ $errors->first('management_fee') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.payment.fields.management_fee_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('amount_paid') ? 'has-error' : '' }}">
                <label for="amount_paid">{{ trans('global.payment.fields.amount_paid') }}</label>
                <input type="number" id="amount_paid" name="amount_paid" class="form-control" value="{{ old('amount_paid', isset($payment) ? $payment->amount_paid : '') }}" step="0.01">
                @if($errors->has('amount_paid'))
                    <p class="help-block">
                        {{ $errors->first('amount_paid') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.payment.fields.amount_paid_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('landlord_account') ? 'has-error' : '' }}">
                <label for="landlord_account">{{ trans('global.payment.fields.landlord_account') }}</label>
                <input type="number" id="landlord_account" name="landlord_account" class="form-control" value="{{ old('landlord_account', isset($payment) ? $payment->landlord_account : '') }}" step="0.01">
                @if($errors->has('landlord_account'))
                    <p class="help-block">
                        {{ $errors->first('landlord_account') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.payment.fields.landlord_account_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('company_account') ? 'has-error' : '' }}">
                <label for="company_account">{{ trans('global.payment.fields.company_account') }}</label>
                <input type="number" id="company_account" name="company_account" class="form-control" value="{{ old('company_account', isset($payment) ? $payment->company_account : '') }}" step="0.01">
                @if($errors->has('company_account'))
                    <p class="help-block">
                        {{ $errors->first('company_account') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.payment.fields.company_account_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('payment_date') ? 'has-error' : '' }}">
                <label for="payment_date">{{ trans('global.payment.fields.payment_date') }}*</label>
                <input type="text" id="payment_date" name="payment_date" class="form-control date" value="{{ old('payment_date', isset($payment) ? $payment->payment_date : '') }}">
                @if($errors->has('payment_date'))
                    <p class="help-block">
                        {{ $errors->first('payment_date') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.payment.fields.payment_date_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('rent_from') ? 'has-error' : '' }}">
                <label for="rent_from">{{ trans('global.payment.fields.rent_from') }}*</label>
                <input type="text" id="rent_from" name="rent_from" class="form-control date" value="{{ old('rent_from', isset($payment) ? $payment->rent_from : '') }}">
                @if($errors->has('rent_from'))
                    <p class="help-block">
                        {{ $errors->first('rent_from') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.payment.fields.rent_from_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('rent_to') ? 'has-error' : '' }}">
                <label for="rent_to">{{ trans('global.payment.fields.rent_to') }}*</label>
                <input type="text" id="rent_to" name="rent_to" class="form-control date" value="{{ old('rent_to', isset($payment) ? $payment->rent_to : '') }}">
                @if($errors->has('rent_to'))
                    <p class="help-block">
                        {{ $errors->first('rent_to') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.payment.fields.rent_to_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('payment_type') ? 'has-error' : '' }}">
                <label for="payment_type">{{ trans('global.payment.fields.payment_type') }}*</label>
                <select id="payment_type" name="payment_type" class="form-control">
                    <option value="" disabled {{ old('payment_type', null) === null ? 'selected' : '' }}>@lang('global.pleaseSelect')</option>
                    @foreach(App\Payment::PAYMENT_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('payment_type', $payment->payment_type) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('payment_type'))
                    <p class="help-block">
                        {{ $errors->first('payment_type') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('bank_name') ? 'has-error' : '' }}">
                <label for="bank_name">{{ trans('global.payment.fields.bank_name') }}</label>
                <input type="text" id="bank_name" name="bank_name" class="form-control" value="{{ old('bank_name', isset($payment) ? $payment->bank_name : '') }}">
                @if($errors->has('bank_name'))
                    <p class="help-block">
                        {{ $errors->first('bank_name') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.payment.fields.bank_name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('cheque_no') ? 'has-error' : '' }}">
                <label for="cheque_no">{{ trans('global.payment.fields.cheque_no') }}</label>
                <input type="text" id="cheque_no" name="cheque_no" class="form-control" value="{{ old('cheque_no', isset($payment) ? $payment->cheque_no : '') }}">
                @if($errors->has('cheque_no'))
                    <p class="help-block">
                        {{ $errors->first('cheque_no') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.payment.fields.cheque_no_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('document') ? 'has-error' : '' }}">
                <label for="document">{{ trans('global.payment.fields.document') }}</label>
                <div class="needsclick dropzone" id="document-dropzone">

                </div>
                @if($errors->has('document'))
                    <p class="help-block">
                        {{ $errors->first('document') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.payment.fields.document_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('note') ? 'has-error' : '' }}">
                <label for="note">{{ trans('global.payment.fields.note') }}</label>
                <textarea id="note" name="note" class="form-control ">{{ old('note', isset($payment) ? $payment->note : '') }}</textarea>
                @if($errors->has('note'))
                    <p class="help-block">
                        {{ $errors->first('note') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.payment.fields.note_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('is_confirmed') ? 'has-error' : '' }}">
                <label for="is_confirmed">{{ trans('global.payment.fields.is_confirmed') }}</label>
                <select id="is_confirmed" name="is_confirmed" class="form-control">
                    <option value="" disabled {{ old('is_confirmed', null) === null ? 'selected' : '' }}>@lang('global.pleaseSelect')</option>
                    @foreach(App\Payment::IS_CONFIRMED_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('is_confirmed', $payment->is_confirmed) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('is_confirmed'))
                    <p class="help-block">
                        {{ $errors->first('is_confirmed') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('confirm_staffs') ? 'has-error' : '' }}">
                <label for="confirm_staff">{{ trans('global.payment.fields.confirm_staff') }}
                    <span class="btn btn-info btn-xs select-all">Select all</span>
                    <span class="btn btn-info btn-xs deselect-all">Deselect all</span></label>
                <select name="confirm_staffs[]" id="confirm_staffs" class="form-control select2" multiple="multiple">
                    @foreach($confirm_staffs as $id => $confirm_staff)
                        <option value="{{ $id }}" {{ (in_array($id, old('confirm_staffs', [])) || isset($payment) && $payment->confirm_staffs->contains($id)) ? 'selected' : '' }}>{{ $confirm_staff }}</option>
                    @endforeach
                </select>
                @if($errors->has('confirm_staffs'))
                    <p class="help-block">
                        {{ $errors->first('confirm_staffs') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.payment.fields.confirm_staff_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('is_confirmed_date') ? 'has-error' : '' }}">
                <label for="is_confirmed_date">{{ trans('global.payment.fields.is_confirmed_date') }}</label>
                <input type="text" id="is_confirmed_date" name="is_confirmed_date" class="form-control datetime" value="{{ old('is_confirmed_date', isset($payment) ? $payment->is_confirmed_date : '') }}">
                @if($errors->has('is_confirmed_date'))
                    <p class="help-block">
                        {{ $errors->first('is_confirmed_date') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.payment.fields.is_confirmed_date_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('is_confirmed_gm') ? 'has-error' : '' }}">
                <label for="is_confirmed_gm">{{ trans('global.payment.fields.is_confirmed_gm') }}</label>
                <select id="is_confirmed_gm" name="is_confirmed_gm" class="form-control">
                    <option value="" disabled {{ old('is_confirmed_gm', null) === null ? 'selected' : '' }}>@lang('global.pleaseSelect')</option>
                    @foreach(App\Payment::IS_CONFIRMED_GM_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('is_confirmed_gm', $payment->is_confirmed_gm) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('is_confirmed_gm'))
                    <p class="help-block">
                        {{ $errors->first('is_confirmed_gm') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('is_confirmed_gm_name_id') ? 'has-error' : '' }}">
                <label for="is_confirmed_gm_name">{{ trans('global.payment.fields.is_confirmed_gm_name') }}</label>
                <select name="is_confirmed_gm_name_id" id="is_confirmed_gm_name" class="form-control select2">
                    @foreach($is_confirmed_gm_names as $id => $is_confirmed_gm_name)
                        <option value="{{ $id }}" {{ (isset($payment) && $payment->is_confirmed_gm_name ? $payment->is_confirmed_gm_name->id : old('is_confirmed_gm_name_id')) == $id ? 'selected' : '' }}>{{ $is_confirmed_gm_name }}</option>
                    @endforeach
                </select>
                @if($errors->has('is_confirmed_gm_name_id'))
                    <p class="help-block">
                        {{ $errors->first('is_confirmed_gm_name_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('is_confirmed_gm_date') ? 'has-error' : '' }}">
                <label for="is_confirmed_gm_date">{{ trans('global.payment.fields.is_confirmed_gm_date') }}</label>
                <input type="text" id="is_confirmed_gm_date" name="is_confirmed_gm_date" class="form-control datetime" value="{{ old('is_confirmed_gm_date', isset($payment) ? $payment->is_confirmed_gm_date : '') }}">
                @if($errors->has('is_confirmed_gm_date'))
                    <p class="help-block">
                        {{ $errors->first('is_confirmed_gm_date') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.payment.fields.is_confirmed_gm_date_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('is_confirmed_ceo') ? 'has-error' : '' }}">
                <label for="is_confirmed_ceo">{{ trans('global.payment.fields.is_confirmed_ceo') }}</label>
                <select id="is_confirmed_ceo" name="is_confirmed_ceo" class="form-control">
                    <option value="" disabled {{ old('is_confirmed_ceo', null) === null ? 'selected' : '' }}>@lang('global.pleaseSelect')</option>
                    @foreach(App\Payment::IS_CONFIRMED_CEO_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('is_confirmed_ceo', $payment->is_confirmed_ceo) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('is_confirmed_ceo'))
                    <p class="help-block">
                        {{ $errors->first('is_confirmed_ceo') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('is_confirmed_ceo_name_id') ? 'has-error' : '' }}">
                <label for="is_confirmed_ceo_name">{{ trans('global.payment.fields.is_confirmed_ceo_name') }}</label>
                <select name="is_confirmed_ceo_name_id" id="is_confirmed_ceo_name" class="form-control select2">
                    @foreach($is_confirmed_ceo_names as $id => $is_confirmed_ceo_name)
                        <option value="{{ $id }}" {{ (isset($payment) && $payment->is_confirmed_ceo_name ? $payment->is_confirmed_ceo_name->id : old('is_confirmed_ceo_name_id')) == $id ? 'selected' : '' }}>{{ $is_confirmed_ceo_name }}</option>
                    @endforeach
                </select>
                @if($errors->has('is_confirmed_ceo_name_id'))
                    <p class="help-block">
                        {{ $errors->first('is_confirmed_ceo_name_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('is_confirmed_ceo_date') ? 'has-error' : '' }}">
                <label for="is_confirmed_ceo_date">{{ trans('global.payment.fields.is_confirmed_ceo_date') }}</label>
                <input type="text" id="is_confirmed_ceo_date" name="is_confirmed_ceo_date" class="form-control datetime" value="{{ old('is_confirmed_ceo_date', isset($payment) ? $payment->is_confirmed_ceo_date : '') }}">
                @if($errors->has('is_confirmed_ceo_date'))
                    <p class="help-block">
                        {{ $errors->first('is_confirmed_ceo_date') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.payment.fields.is_confirmed_ceo_date_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('is_cancelled') ? 'has-error' : '' }}">
                <label for="is_cancelled">{{ trans('global.payment.fields.is_cancelled') }}</label>
                <select id="is_cancelled" name="is_cancelled" class="form-control">
                    <option value="" disabled {{ old('is_cancelled', null) === null ? 'selected' : '' }}>@lang('global.pleaseSelect')</option>
                    @foreach(App\Payment::IS_CANCELLED_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('is_cancelled', $payment->is_cancelled) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('is_cancelled'))
                    <p class="help-block">
                        {{ $errors->first('is_cancelled') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('date_cancelled') ? 'has-error' : '' }}">
                <label for="date_cancelled">{{ trans('global.payment.fields.date_cancelled') }}</label>
                <input type="text" id="date_cancelled" name="date_cancelled" class="form-control datetime" value="{{ old('date_cancelled', isset($payment) ? $payment->date_cancelled : '') }}">
                @if($errors->has('date_cancelled'))
                    <p class="help-block">
                        {{ $errors->first('date_cancelled') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.payment.fields.date_cancelled_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('cancelled_by_id') ? 'has-error' : '' }}">
                <label for="cancelled_by">{{ trans('global.payment.fields.cancelled_by') }}</label>
                <select name="cancelled_by_id" id="cancelled_by" class="form-control select2">
                    @foreach($cancelled_bies as $id => $cancelled_by)
                        <option value="{{ $id }}" {{ (isset($payment) && $payment->cancelled_by ? $payment->cancelled_by->id : old('cancelled_by_id')) == $id ? 'selected' : '' }}>{{ $cancelled_by }}</option>
                    @endforeach
                </select>
                @if($errors->has('cancelled_by_id'))
                    <p class="help-block">
                        {{ $errors->first('cancelled_by_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('is_full_payment') ? 'has-error' : '' }}">
                <label for="is_full_payment">{{ trans('global.payment.fields.is_full_payment') }}</label>
                <select id="is_full_payment" name="is_full_payment" class="form-control">
                    <option value="" disabled {{ old('is_full_payment', null) === null ? 'selected' : '' }}>@lang('global.pleaseSelect')</option>
                    @foreach(App\Payment::IS_FULL_PAYMENT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('is_full_payment', $payment->is_full_payment) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('is_full_payment'))
                    <p class="help-block">
                        {{ $errors->first('is_full_payment') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('is_part_payment') ? 'has-error' : '' }}">
                <label for="is_part_payment">{{ trans('global.payment.fields.is_part_payment') }}</label>
                <select id="is_part_payment" name="is_part_payment" class="form-control">
                    <option value="" disabled {{ old('is_part_payment', null) === null ? 'selected' : '' }}>@lang('global.pleaseSelect')</option>
                    @foreach(App\Payment::IS_PART_PAYMENT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('is_part_payment', $payment->is_part_payment) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('is_part_payment'))
                    <p class="help-block">
                        {{ $errors->first('is_part_payment') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('updated_by_id') ? 'has-error' : '' }}">
                <label for="updated_by">{{ trans('global.payment.fields.updated_by') }}</label>
                <select name="updated_by_id" id="updated_by" class="form-control select2">
                    @foreach($updated_bies as $id => $updated_by)
                        <option value="{{ $id }}" {{ (isset($payment) && $payment->updated_by ? $payment->updated_by->id : old('updated_by_id')) == $id ? 'selected' : '' }}>{{ $updated_by }}</option>
                    @endforeach
                </select>
                @if($errors->has('updated_by_id'))
                    <p class="help-block">
                        {{ $errors->first('updated_by_id') }}
                    </p>
                @endif
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection
@section('scripts')
<script>
    var uploadedDocumentMap = {}
Dropzone.options.documentDropzone = {
    url: '{{ route('admin.payments.storeMedia') }}',
    maxFilesize: 10, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')
      uploadedDocumentMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedDocumentMap[file.name]
      }
      $('form').find('input[name="document[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($payment) && $payment->document)
          var files =
            {!! json_encode($payment->document) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')
            }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@stop