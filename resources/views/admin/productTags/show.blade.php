@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.productTag.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.productTag.fields.name') }}
                    </th>
                    <td>
                        {{ $productTag->name }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection