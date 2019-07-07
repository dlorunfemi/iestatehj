@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('global.requistion.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.requistions.update", [$requistion->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('property_id') ? 'has-error' : '' }}">
                <label for="property">{{ trans('global.requistion.fields.property') }}*</label>
                <select name="property_id" id="property" class="form-control select2">
                    @foreach($properties as $id => $property)
                        <option value="{{ $id }}" {{ (isset($requistion) && $requistion->property ? $requistion->property->id : old('property_id')) == $id ? 'selected' : '' }}>{{ $property }}</option>
                    @endforeach
                </select>
                @if($errors->has('property_id'))
                    <p class="help-block">
                        {{ $errors->first('property_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('landlord_id') ? 'has-error' : '' }}">
                <label for="landlord">{{ trans('global.requistion.fields.landlord') }}*</label>
                <select name="landlord_id" id="landlord" class="form-control select2">
                    @foreach($landlords as $id => $landlord)
                        <option value="{{ $id }}" {{ (isset($requistion) && $requistion->landlord ? $requistion->landlord->id : old('landlord_id')) == $id ? 'selected' : '' }}>{{ $landlord }}</option>
                    @endforeach
                </select>
                @if($errors->has('landlord_id'))
                    <p class="help-block">
                        {{ $errors->first('landlord_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('amount_withdraw') ? 'has-error' : '' }}">
                <label for="amount_withdraw">{{ trans('global.requistion.fields.amount_withdraw') }}*</label>
                <input type="number" id="amount_withdraw" name="amount_withdraw" class="form-control" value="{{ old('amount_withdraw', isset($requistion) ? $requistion->amount_withdraw : '') }}" step="0.01">
                @if($errors->has('amount_withdraw'))
                    <p class="help-block">
                        {{ $errors->first('amount_withdraw') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.requistion.fields.amount_withdraw_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('initiating_staff_id') ? 'has-error' : '' }}">
                <label for="initiating_staff">{{ trans('global.requistion.fields.initiating_staff') }}*</label>
                <select name="initiating_staff_id" id="initiating_staff" class="form-control select2">
                    @foreach($initiating_staffs as $id => $initiating_staff)
                        <option value="{{ $id }}" {{ (isset($requistion) && $requistion->initiating_staff ? $requistion->initiating_staff->id : old('initiating_staff_id')) == $id ? 'selected' : '' }}>{{ $initiating_staff }}</option>
                    @endforeach
                </select>
                @if($errors->has('initiating_staff_id'))
                    <p class="help-block">
                        {{ $errors->first('initiating_staff_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                <label for="status">{{ trans('global.requistion.fields.status') }}*</label>
                <select id="status" name="status" class="form-control">
                    <option value="" disabled {{ old('status', null) === null ? 'selected' : '' }}>@lang('global.pleaseSelect')</option>
                    @foreach(App\Requistion::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $requistion->status) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <p class="help-block">
                        {{ $errors->first('status') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('accountant') ? 'has-error' : '' }}">
                <label for="accountant">{{ trans('global.requistion.fields.accountant') }}</label>
                <select id="accountant" name="accountant" class="form-control">
                    <option value="" disabled {{ old('accountant', null) === null ? 'selected' : '' }}>@lang('global.pleaseSelect')</option>
                    @foreach(App\Requistion::ACCOUNTANT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('accountant', $requistion->accountant) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('accountant'))
                    <p class="help-block">
                        {{ $errors->first('accountant') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('acc_conf_date') ? 'has-error' : '' }}">
                <label for="acc_conf_date">{{ trans('global.requistion.fields.acc_conf_date') }}</label>
                <input type="text" id="acc_conf_date" name="acc_conf_date" class="form-control datetime" value="{{ old('acc_conf_date', isset($requistion) ? $requistion->acc_conf_date : '') }}">
                @if($errors->has('acc_conf_date'))
                    <p class="help-block">
                        {{ $errors->first('acc_conf_date') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.requistion.fields.acc_conf_date_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('gm') ? 'has-error' : '' }}">
                <label for="gm">{{ trans('global.requistion.fields.gm') }}</label>
                <select id="gm" name="gm" class="form-control">
                    <option value="" disabled {{ old('gm', null) === null ? 'selected' : '' }}>@lang('global.pleaseSelect')</option>
                    @foreach(App\Requistion::GM_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('gm', $requistion->gm) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('gm'))
                    <p class="help-block">
                        {{ $errors->first('gm') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('gm_conf_date') ? 'has-error' : '' }}">
                <label for="gm_conf_date">{{ trans('global.requistion.fields.gm_conf_date') }}</label>
                <input type="text" id="gm_conf_date" name="gm_conf_date" class="form-control datetime" value="{{ old('gm_conf_date', isset($requistion) ? $requistion->gm_conf_date : '') }}">
                @if($errors->has('gm_conf_date'))
                    <p class="help-block">
                        {{ $errors->first('gm_conf_date') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.requistion.fields.gm_conf_date_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('ceo') ? 'has-error' : '' }}">
                <label for="ceo">{{ trans('global.requistion.fields.ceo') }}</label>
                <select id="ceo" name="ceo" class="form-control">
                    <option value="" disabled {{ old('ceo', null) === null ? 'selected' : '' }}>@lang('global.pleaseSelect')</option>
                    @foreach(App\Requistion::CEO_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('ceo', $requistion->ceo) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('ceo'))
                    <p class="help-block">
                        {{ $errors->first('ceo') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('ceo_conf_date') ? 'has-error' : '' }}">
                <label for="ceo_conf_date">{{ trans('global.requistion.fields.ceo_conf_date') }}</label>
                <input type="text" id="ceo_conf_date" name="ceo_conf_date" class="form-control datetime" value="{{ old('ceo_conf_date', isset($requistion) ? $requistion->ceo_conf_date : '') }}">
                @if($errors->has('ceo_conf_date'))
                    <p class="help-block">
                        {{ $errors->first('ceo_conf_date') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.requistion.fields.ceo_conf_date_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('is_returned') ? 'has-error' : '' }}">
                <label for="is_returned">{{ trans('global.requistion.fields.is_returned') }}</label>
                <select id="is_returned" name="is_returned" class="form-control">
                    <option value="" disabled {{ old('is_returned', null) === null ? 'selected' : '' }}>@lang('global.pleaseSelect')</option>
                    @foreach(App\Requistion::IS_RETURNED_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('is_returned', $requistion->is_returned) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('is_returned'))
                    <p class="help-block">
                        {{ $errors->first('is_returned') }}
                    </p>
                @endif
            </div>
            <input type="hidden" name="return_user_id" id="return_user" value="{{ $auth->id }}">
            {{-- <div class="form-group {{ $errors->has('return_user_id') ? 'has-error' : '' }}">
                <label for="return_user">{{ trans('global.requistion.fields.return_user') }}</label>
                <select name="return_user_id" id="return_user" class="form-control select2">
                    @foreach($return_users as $id => $return_user)
                        <option value="{{ $id }}" {{ (isset($requistion) && $requistion->return_user ? $requistion->return_user->id : old('return_user_id')) == $id ? 'selected' : '' }}>{{ $return_user }}</option>
                    @endforeach
                </select>
                @if($errors->has('return_user_id'))
                    <p class="help-block">
                        {{ $errors->first('return_user_id') }}
                    </p>
                @endif
            </div> --}}
            <div class="form-group {{ $errors->has('return_date') ? 'has-error' : '' }}">
                <label for="return_date">{{ trans('global.requistion.fields.return_date') }}</label>
                <input type="text" id="return_date" name="return_date" class="form-control datetime" value="{{ old('return_date', isset($requistion) ? $requistion->return_date : '') }}">
                @if($errors->has('return_date'))
                    <p class="help-block">
                        {{ $errors->first('return_date') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.requistion.fields.return_date_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection
