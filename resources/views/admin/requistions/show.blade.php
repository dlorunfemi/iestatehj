@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.requistion.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        Property
                    </th>
                    <td>
                        @foreach($requistion->properties as $id => $property)
                            <span class="label label-info label-many">{{ $property->name }}</span>
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.requistion.fields.amount_withdraw') }}
                    </th>
                    <td>
                        ${{ $requistion->amount_withdraw }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.requistion.fields.initiating_staff') }}
                    </th>
                    <td>
                        {{ $requistion->initiating_staff->name ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.requistion.fields.status') }}
                    </th>
                    <td>
                        {{ App\Requistion::STATUS_SELECT[$requistion->status] }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.requistion.fields.accountant') }}
                    </th>
                    <td>
                        {{ App\Requistion::ACCOUNTANT_SELECT[$requistion->accountant] }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.requistion.fields.acc_conf_date') }}
                    </th>
                    <td>
                        {{ $requistion->acc_conf_date }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.requistion.fields.gm') }}
                    </th>
                    <td>
                        {{ App\Requistion::GM_SELECT[$requistion->gm] }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.requistion.fields.gm_conf_date') }}
                    </th>
                    <td>
                        {{ $requistion->gm_conf_date }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.requistion.fields.ceo') }}
                    </th>
                    <td>
                        {{ App\Requistion::CEO_SELECT[$requistion->ceo] }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.requistion.fields.ceo_conf_date') }}
                    </th>
                    <td>
                        {{ $requistion->ceo_conf_date }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.requistion.fields.is_returned') }}
                    </th>
                    <td>
                        {{ App\Requistion::IS_RETURNED_SELECT[$requistion->is_returned] }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.requistion.fields.return_user') }}
                    </th>
                    <td>
                        {{ $requistion->return_user->name ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.requistion.fields.return_date') }}
                    </th>
                    <td>
                        {{ $requistion->return_date }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection