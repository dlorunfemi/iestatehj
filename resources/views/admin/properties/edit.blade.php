@extends('layouts.admin')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.properties.index") }}">
                {{ trans('global.back') }} To {{ trans('global.property.title_singular') }}
            </a>
        </div>
    </div>
<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('global.property.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.properties.update", [$property->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('landlord_id') ? 'has-error' : '' }}">
                <label for="landlord">{{ trans('global.property.fields.landlord') }}*</label>
                <select name="landlord_id" id="landlord" class="form-control select2">
                    @foreach($landlords as $id => $landlord)
                        <option value="{{ $id }}" {{ (isset($property) && $property->landlord ? $property->landlord->id : old('landlord_id')) == $id ? 'selected' : '' }}>{{ $landlord }}</option>
                    @endforeach
                </select>
                @if($errors->has('landlord_id'))
                    <p class="help-block">
                        {{ $errors->first('landlord_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('property_type_id') ? 'has-error' : '' }}">
                <label for="property_type">{{ trans('global.property.fields.property_type') }}*</label>
                <select name="property_type_id" id="property_type" class="form-control select2">
                    @foreach($property_types as $id => $property_type)
                        <option value="{{ $id }}" {{ (isset($property) && $property->property_type ? $property->property_type->id : old('property_type_id')) == $id ? 'selected' : '' }}>{{ $property_type }}</option>
                    @endforeach
                </select>
                @if($errors->has('property_type_id'))
                    <p class="help-block">
                        {{ $errors->first('property_type_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('global.property.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($property) ? $property->name : '') }}">
                @if($errors->has('name'))
                    <p class="help-block">
                        {{ $errors->first('name') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.property.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('is_new') ? 'has-error' : '' }}">
                <label for="is_new">{{ trans('global.property.fields.is_new') }}*</label>
                <select id="is_new" name="is_new" class="form-control">
                    <option value="" disabled {{ old('is_new', null) === null ? 'selected' : '' }}>@lang('global.pleaseSelect')</option>
                    @foreach(App\Property::IS_NEW_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('is_new', $property->is_new) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('is_new'))
                    <p class="help-block">
                        {{ $errors->first('is_new') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('state') ? 'has-error' : '' }}">
                <label for="state">{{ trans('global.property.fields.state') }}*</label>
                <select id="state" name="state" class="form-control">
                    <option value="" disabled {{ old('state', null) === null ? 'selected' : '' }}>@lang('global.pleaseSelect')</option>
                    @foreach(App\Property::STATE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('state', $property->state) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('state'))
                    <p class="help-block">
                        {{ $errors->first('state') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('bank_name') ? 'has-error' : '' }}">
                <label for="bank_name">{{ trans('global.property.fields.bank_name') }}</label>
                <input type="text" id="bank_name" name="bank_name" class="form-control" value="{{ old('bank_name', isset($property) ? $property->bank_name : '') }}">
                @if($errors->has('bank_name'))
                    <p class="help-block">
                        {{ $errors->first('bank_name') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.property.fields.bank_name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('is_bank') ? 'has-error' : '' }}">
                <label for="is_bank">{{ trans('global.property.fields.is_bank') }}*</label>
                <select id="is_bank" name="is_bank" class="form-control">
                    <option value="" disabled {{ old('is_bank', null) === null ? 'selected' : '' }}>@lang('global.pleaseSelect')</option>
                    @foreach(App\Property::IS_BANK_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('is_bank', $property->is_bank) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('is_bank'))
                    <p class="help-block">
                        {{ $errors->first('is_bank') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('is_dormant') ? 'has-error' : '' }}">
                <label for="is_dormant">{{ trans('global.property.fields.is_dormant') }}*</label>
                <select id="is_dormant" name="is_dormant" class="form-control">
                    <option value="" disabled {{ old('is_dormant', null) === null ? 'selected' : '' }}>@lang('global.pleaseSelect')</option>
                    @foreach(App\Property::IS_DORMANT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('is_dormant', $property->is_dormant) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('is_dormant'))
                    <p class="help-block">
                        {{ $errors->first('is_dormant') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('dormant_date') ? 'has-error' : '' }}">
                <label for="dormant_date">{{ trans('global.property.fields.dormant_date') }}</label>
                <input type="text" id="dormant_date" name="dormant_date" class="form-control datetime" value="{{ old('dormant_date', isset($property) ? $property->dormant_date : '') }}">
                @if($errors->has('dormant_date'))
                    <p class="help-block">
                        {{ $errors->first('dormant_date') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.property.fields.dormant_date_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('officer_id') ? 'has-error' : '' }}">
                <label for="officer">{{ trans('global.property.fields.officer') }}*</label>
                <select name="officer_id" id="officer" class="form-control select2">
                    @foreach($officers as $id => $officer)
                        <option value="{{ $id }}" {{ (isset($property) && $property->officer ? $property->officer->id : old('officer_id')) == $id ? 'selected' : '' }}>{{ $officer }}</option>
                    @endforeach
                </select>
                @if($errors->has('officer_id'))
                    <p class="help-block">
                        {{ $errors->first('officer_id') }}
                    </p>
                @endif
            </div>
            <input type="hidden" name="updated_by_id" id="updated_by" value="{{ $auth->id }}">
            {{-- <div class="form-group {{ $errors->has('updated_by_id') ? 'has-error' : '' }}">
                <label for="updated_by">{{ trans('global.property.fields.updated_by') }}</label>
                <select name="updated_by_id" id="updated_by" class="form-control select2">
                    @foreach($updated_bies as $id => $updated_by)
                        <option value="{{ $id }}" {{ (isset($property) && $property->updated_by ? $property->updated_by->id : old('updated_by_id')) == $id ? 'selected' : '' }}>{{ $updated_by }}</option>
                    @endforeach
                </select>
                @if($errors->has('updated_by_id'))
                    <p class="help-block">
                        {{ $errors->first('updated_by_id') }}
                    </p>
                @endif
            </div> --}}
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection