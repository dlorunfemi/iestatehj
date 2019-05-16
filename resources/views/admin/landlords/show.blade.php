@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.landlord.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.landlord.fields.title') }}
                    </th>
                    <td>
                        {{ $landlord->title }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.landlord.fields.name') }}
                    </th>
                    <td>
                        {{ $landlord->name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.landlord.fields.phone') }}
                    </th>
                    <td>
                        {{ $landlord->phone }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.landlord.fields.email') }}
                    </th>
                    <td>
                        {{ $landlord->email }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.landlord.fields.address_office') }}
                    </th>
                    <td>
                        {!! $landlord->address_office !!}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.landlord.fields.address_residence') }}
                    </th>
                    <td>
                        {!! $landlord->address_residence !!}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.landlord.fields.kin_name') }}
                    </th>
                    <td>
                        {{ $landlord->kin_name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.landlord.fields.kin_phone') }}
                    </th>
                    <td>
                        {{ $landlord->kin_phone }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.landlord.fields.kin_address') }}
                    </th>
                    <td>
                        {!! $landlord->kin_address !!}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.landlord.fields.officer') }}
                    </th>
                    <td>
                        {{ $landlord->officer->name ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.landlord.fields.bank_name') }}
                    </th>
                    <td>
                        {{ $landlord->bank_name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.landlord.fields.account_name') }}
                    </th>
                    <td>
                        {{ $landlord->account_name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.landlord.fields.account_no') }}
                    </th>
                    <td>
                        {{ $landlord->account_no }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.landlord.fields.branch') }}
                    </th>
                    <td>
                        {{ $landlord->branch }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection