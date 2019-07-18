@extends('layouts.admin')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.requistions.index") }}">
                {{ trans('global.back') }} To {{ trans('global.requistion.title_singular') }}
            </a>
        </div>
    </div>
<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('global.requistion.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.requistions.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
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
                        <option value="{{ $key }}" {{ old('status', null) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <p class="help-block">
                        {{ $errors->first('status') }}
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