@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('global.property.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.properties.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
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
                        <option value="{{ $key }}" {{ old('is_new', null) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
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
                        <option value="{{ $key }}" {{ old('state', null) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
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
                        <option value="{{ $key }}" {{ old('is_bank', null) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
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
                        <option value="{{ $key }}" {{ old('is_dormant', null) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('is_dormant'))
                    <p class="help-block">
                        {{ $errors->first('is_dormant') }}
                    </p>
                @endif
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
            {{-- <div class="form-group {{ $errors->has('created_by_id') ? 'has-error' : '' }}">
                <label for="created_by">{{ trans('global.property.fields.created_by') }}*</label>
                <select name="created_by_id" id="created_by" class="form-control select2">
                    @foreach($created_bies as $id => $created_by)
                        <option value="{{ $id }}" {{ (isset($property) && $property->created_by ? $property->created_by->id : old('created_by_id')) == $id ? 'selected' : '' }}>{{ $created_by }}</option>
                    @endforeach
                </select>
                @if($errors->has('created_by_id'))
                    <p class="help-block">
                        {{ $errors->first('created_by_id') }}
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
