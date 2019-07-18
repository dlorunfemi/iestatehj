@extends('layouts.admin')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.property-tags.index") }}">
                {{ trans('global.back') }} {{ trans('global.propertyTag.title_singular') }}
            </a>
        </div>
    </div>
<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.propertyTag.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.propertyTag.fields.name') }}
                    </th>
                    <td>
                        {{ $propertyTag->name }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection