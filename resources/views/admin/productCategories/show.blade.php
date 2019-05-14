@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.productCategory.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.productCategory.fields.name') }}
                    </th>
                    <td>
                        {{ $productCategory->name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.productCategory.fields.description') }}
                    </th>
                    <td>
                        {!! $productCategory->description !!}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection