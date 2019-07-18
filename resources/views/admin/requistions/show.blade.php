@extends('layouts.admin')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.requistions.index") }}">
                {{ trans('global.back') }} To {{ trans('global.requistion.title_singular') }}
            </a>
        </div>
    </div>
<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.requistion.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.requistion.fields.property') }}
                    </th>
                    <td>
                        {{ $requistion->property->name ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.requistion.fields.landlord') }}
                    </th>
                    <td>
                        {{ $requistion->landlord->name ?? '' }}
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
                        {{ isset($requistion->accountant) ? App\Requistion::ACCOUNTANT_SELECT[$requistion->accountant] : 'Waiting Approval'}}
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
                        {{ isset($requistion->gm) ? App\Requistion::GM_SELECT[$requistion->gm] : 'Waiting Approval' }}
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
                        {{ isset($requistion->ceo) ? App\Requistion::CEO_SELECT[$requistion->ceo] : 'Waiting Approval' }}
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
                        {{ isset($requistion->is_required) ? App\Requistion::IS_RETURNED_SELECT[$requistion->is_returned] : 'Waiting Approval' }}
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
