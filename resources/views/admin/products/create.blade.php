@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('global.product.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.products.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('landlord_id') ? 'has-error' : '' }}">
                <label for="landlord">{{ trans('global.product.fields.landlord') }}*</label>
                <select name="landlord_id" id="landlord" class="form-control select2">
                    @foreach($landlords as $id => $landlord)
                        <option value="{{ $id }}" {{ (isset($product) && $product->landlord ? $product->landlord->id : old('landlord_id')) == $id ? 'selected' : '' }}>{{ $landlord }}</option>
                    @endforeach
                </select>
                @if($errors->has('landlord_id'))
                    <p class="help-block">
                        {{ $errors->first('landlord_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('categories') ? 'has-error' : '' }}">
                <label for="category">{{ trans('global.product.fields.category') }}*
                    <span class="btn btn-info btn-xs select-all">Select all</span>
                    <span class="btn btn-info btn-xs deselect-all">Deselect all</span></label>
                <select name="categories[]" id="categories" class="form-control select2" multiple="multiple">
                    @foreach($categories as $id => $category)
                        <option value="{{ $id }}" {{ (in_array($id, old('categories', [])) || isset($product) && $product->categories->contains($id)) ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>
                @if($errors->has('categories'))
                    <p class="help-block">
                        {{ $errors->first('categories') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.category_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('is_new') ? 'has-error' : '' }}">
                <label for="is_new">{{ trans('global.product.fields.is_new') }}*</label>
                <select id="is_new" name="is_new" class="form-control">
                    <option value="" disabled {{ old('is_new', null) === null ? 'selected' : '' }}>@lang('global.pleaseSelect')</option>
                    @foreach(App\Product::IS_NEW_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('is_new', null) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('is_new'))
                    <p class="help-block">
                        {{ $errors->first('is_new') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('global.product.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($product) ? $product->name : '') }}">
                @if($errors->has('name'))
                    <p class="help-block">
                        {{ $errors->first('name') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('state') ? 'has-error' : '' }}">
                <label for="state">{{ trans('global.product.fields.state') }}*</label>
                <select id="state" name="state" class="form-control">
                    <option value="" disabled {{ old('state', null) === null ? 'selected' : '' }}>@lang('global.pleaseSelect')</option>
                    @foreach(App\Product::STATE_SELECT as $key => $label)
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
                <label for="bank_name">{{ trans('global.product.fields.bank_name') }}</label>
                <input type="text" id="bank_name" name="bank_name" class="form-control" value="{{ old('bank_name', isset($product) ? $product->bank_name : '') }}">
                @if($errors->has('bank_name'))
                    <p class="help-block">
                        {{ $errors->first('bank_name') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.bank_name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('is_bank') ? 'has-error' : '' }}">
                <label for="is_bank">{{ trans('global.product.fields.is_bank') }}*</label>
                <select id="is_bank" name="is_bank" class="form-control">
                    <option value="" disabled {{ old('is_bank', null) === null ? 'selected' : '' }}>@lang('global.pleaseSelect')</option>
                    @foreach(App\Product::IS_BANK_SELECT as $key => $label)
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
                <label for="is_dormant">{{ trans('global.product.fields.is_dormant') }}*</label>
                <select id="is_dormant" name="is_dormant" class="form-control">
                    <option value="" disabled {{ old('is_dormant', null) === null ? 'selected' : '' }}>@lang('global.pleaseSelect')</option>
                    @foreach(App\Product::IS_DORMANT_SELECT as $key => $label)
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
                <label for="officer">{{ trans('global.product.fields.officer') }}*</label>
                <select name="officer_id" id="officer" class="form-control select2">
                    @foreach($officers as $id => $officer)
                        <option value="{{ $id }}" {{ (isset($product) && $product->officer ? $product->officer->id : old('officer_id')) == $id ? 'selected' : '' }}>{{ $officer }}</option>
                    @endforeach
                </select>
                @if($errors->has('officer_id'))
                    <p class="help-block">
                        {{ $errors->first('officer_id') }}
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
