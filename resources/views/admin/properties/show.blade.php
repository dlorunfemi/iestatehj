@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.property.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.property.fields.landlord') }}
                    </th>
                    <td>
                        {{ $property->landlord->name ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.property.fields.property_type') }}
                    </th>
                    <td>
                        {{ $property->property_type->name ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.property.fields.name') }}
                    </th>
                    <td>
                        {{ $property->name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.property.fields.is_new') }}
                    </th>
                    <td>
                        {{ App\Property::IS_NEW_SELECT[$property->is_new] }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.property.fields.state') }}
                    </th>
                    <td>
                        {{ App\Property::STATE_SELECT[$property->state] }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.property.fields.bank_name') }}
                    </th>
                    <td>
                        {{ $property->bank_name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.property.fields.is_bank') }}
                    </th>
                    <td>
                        {{ App\Property::IS_BANK_SELECT[$property->is_bank] }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.property.fields.is_dormant') }}
                    </th>
                    <td>
                        {{ App\Property::IS_DORMANT_SELECT[$property->is_dormant] }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.property.fields.dormant_date') }}
                    </th>
                    <td>
                        {{ $property->dormant_date }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.property.fields.officer') }}
                    </th>
                    <td>
                        {{ $property->officer->name ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.property.fields.created_by') }}
                    </th>
                    <td>
                        {{ $property->created_by->name ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.property.fields.updated_by') }}
                    </th>
                    <td>
                        {{ $property->updated_by->name ?? '' }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection