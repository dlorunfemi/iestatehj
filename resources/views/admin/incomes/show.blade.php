@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.income.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.income.fields.income_category') }}
                    </th>
                    <td>
                        {{ $income->income_category->name ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.income.fields.entry_date') }}
                    </th>
                    <td>
                        {{ $income->entry_date }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.income.fields.amount') }}
                    </th>
                    <td>
                        ${{ $income->amount }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.income.fields.description') }}
                    </th>
                    <td>
                        {{ $income->description }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection