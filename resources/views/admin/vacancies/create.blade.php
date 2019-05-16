@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('global.vacancy.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.vacancies.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('property_id') ? 'has-error' : '' }}">
                <label for="property">{{ trans('global.vacancy.fields.property') }}*</label>
                <select name="property_id" id="property" class="form-control select2">
                    @foreach($properties as $id => $property)
                        <option value="{{ $id }}" {{ (isset($vacancy) && $vacancy->property ? $vacancy->property->id : old('property_id')) == $id ? 'selected' : '' }}>{{ $property }}</option>
                    @endforeach
                </select>
                @if($errors->has('property_id'))
                    <p class="help-block">
                        {{ $errors->first('property_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('property_tag_id') ? 'has-error' : '' }}">
                <label for="property_tag">{{ trans('global.vacancy.fields.property_tag') }}*</label>
                <select name="property_tag_id" id="property_tag" class="form-control select2">
                    @foreach($property_tags as $id => $property_tag)
                        <option value="{{ $id }}" {{ (isset($vacancy) && $vacancy->property_tag ? $vacancy->property_tag->id : old('property_tag_id')) == $id ? 'selected' : '' }}>{{ $property_tag }}</option>
                    @endforeach
                </select>
                @if($errors->has('property_tag_id'))
                    <p class="help-block">
                        {{ $errors->first('property_tag_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('is_vacant') ? 'has-error' : '' }}">
                <label for="is_vacant">{{ trans('global.vacancy.fields.is_vacant') }}*</label>
                <select id="is_vacant" name="is_vacant" class="form-control">
                    <option value="" disabled {{ old('is_vacant', null) === null ? 'selected' : '' }}>@lang('global.pleaseSelect')</option>
                    @foreach(App\Vacancy::IS_VACANT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('is_vacant', null) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('is_vacant'))
                    <p class="help-block">
                        {{ $errors->first('is_vacant') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">{{ trans('global.vacancy.fields.description') }}</label>
                <textarea id="description" name="description" class="form-control ">{{ old('description', isset($vacancy) ? $vacancy->description : '') }}</textarea>
                @if($errors->has('description'))
                    <p class="help-block">
                        {{ $errors->first('description') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.vacancy.fields.description_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('rent') ? 'has-error' : '' }}">
                <label for="rent">{{ trans('global.vacancy.fields.rent') }}*</label>
                <input type="number" id="rent" name="rent" class="form-control" value="{{ old('rent', isset($vacancy) ? $vacancy->rent : '') }}" step="0.01">
                @if($errors->has('rent'))
                    <p class="help-block">
                        {{ $errors->first('rent') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.vacancy.fields.rent_helper') }}
                </p>
            </div>
            <input type="hidden" name="created_by_id" id="created_by" value="{{ $auth->id }}">
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection
