@extends('layouts.admin')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.property-categories.index") }}">
                {{ trans('global.back') }} To {{ trans('global.propertyCategory.title_singular') }}
            </a>
        </div>
    </div>
<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.propertyCategory.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.propertyCategory.fields.name') }}
                    </th>
                    <td>
                        {{ $propertyCategory->name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.propertyCategory.fields.description') }}
                    </th>
                    <td>
                        {!! $propertyCategory->description !!}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection