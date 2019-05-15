@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('global.tenant.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.tenants.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">{{ trans('global.tenant.fields.title') }}</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', isset($tenant) ? $tenant->title : '') }}">
                @if($errors->has('title'))
                    <p class="help-block">
                        {{ $errors->first('title') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.tenant.fields.title_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('global.tenant.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($tenant) ? $tenant->name : '') }}">
                @if($errors->has('name'))
                    <p class="help-block">
                        {{ $errors->first('name') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.tenant.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('properties') ? 'has-error' : '' }}">
                <label for="property">{{ trans('global.tenant.fields.property') }}*
                    <span class="btn btn-info btn-xs select-all">Select all</span>
                    <span class="btn btn-info btn-xs deselect-all">Deselect all</span></label>
                <select name="properties[]" id="properties" class="form-control select2" multiple="multiple">
                    @foreach($properties as $id => $property)
                        <option value="{{ $id }}" {{ (in_array($id, old('properties', [])) || isset($tenant) && $tenant->properties->contains($id)) ? 'selected' : '' }}>{{ $property }}</option>
                    @endforeach
                </select>
                @if($errors->has('properties'))
                    <p class="help-block">
                        {{ $errors->first('properties') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.tenant.fields.property_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('apartments') ? 'has-error' : '' }}">
                <label for="apartment">{{ trans('global.tenant.fields.apartment') }}
                    <span class="btn btn-info btn-xs select-all">Select all</span>
                    <span class="btn btn-info btn-xs deselect-all">Deselect all</span></label>
                <select name="apartments[]" id="apartments" class="form-control select2" multiple="multiple">
                    @foreach($apartments as $id => $apartment)
                        <option value="{{ $id }}" {{ (in_array($id, old('apartments', [])) || isset($tenant) && $tenant->apartments->contains($id)) ? 'selected' : '' }}>{{ $apartment }}</option>
                    @endforeach
                </select>
                @if($errors->has('apartments'))
                    <p class="help-block">
                        {{ $errors->first('apartments') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.tenant.fields.apartment_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                <label for="phone">{{ trans('global.tenant.fields.phone') }}*</label>
                <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', isset($tenant) ? $tenant->phone : '') }}">
                @if($errors->has('phone'))
                    <p class="help-block">
                        {{ $errors->first('phone') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.tenant.fields.phone_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">{{ trans('global.tenant.fields.email') }}*</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($tenant) ? $tenant->email : '') }}">
                @if($errors->has('email'))
                    <p class="help-block">
                        {{ $errors->first('email') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.tenant.fields.email_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('work_place') ? 'has-error' : '' }}">
                <label for="work_place">{{ trans('global.tenant.fields.work_place') }}</label>
                <textarea id="work_place" name="work_place" class="form-control ">{{ old('work_place', isset($tenant) ? $tenant->work_place : '') }}</textarea>
                @if($errors->has('work_place'))
                    <p class="help-block">
                        {{ $errors->first('work_place') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.tenant.fields.work_place_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('kin_name') ? 'has-error' : '' }}">
                <label for="kin_name">{{ trans('global.tenant.fields.kin_name') }}</label>
                <input type="text" id="kin_name" name="kin_name" class="form-control" value="{{ old('kin_name', isset($tenant) ? $tenant->kin_name : '') }}">
                @if($errors->has('kin_name'))
                    <p class="help-block">
                        {{ $errors->first('kin_name') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.tenant.fields.kin_name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('kin_phone') ? 'has-error' : '' }}">
                <label for="kin_phone">{{ trans('global.tenant.fields.kin_phone') }}</label>
                <input type="text" id="kin_phone" name="kin_phone" class="form-control" value="{{ old('kin_phone', isset($tenant) ? $tenant->kin_phone : '') }}">
                @if($errors->has('kin_phone'))
                    <p class="help-block">
                        {{ $errors->first('kin_phone') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.tenant.fields.kin_phone_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('kin_address') ? 'has-error' : '' }}">
                <label for="kin_address">{{ trans('global.tenant.fields.kin_address') }}</label>
                <input type="text" id="kin_address" name="kin_address" class="form-control" value="{{ old('kin_address', isset($tenant) ? $tenant->kin_address : '') }}">
                @if($errors->has('kin_address'))
                    <p class="help-block">
                        {{ $errors->first('kin_address') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.tenant.fields.kin_address_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('is_active') ? 'has-error' : '' }}">
                <label for="is_active">{{ trans('global.tenant.fields.is_active') }}*</label>
                <select id="is_active" name="is_active" class="form-control">
                    <option value="" disabled {{ old('is_active', null) === null ? 'selected' : '' }}>@lang('global.pleaseSelect')</option>
                    @foreach(App\Tenant::IS_ACTIVE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('is_active', null) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('is_active'))
                    <p class="help-block">
                        {{ $errors->first('is_active') }}
                    </p>
                @endif
            </div>
            <input type="hidden" name="created_by_id" id="created_by" value="{{ $auth->id }}">

            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection
