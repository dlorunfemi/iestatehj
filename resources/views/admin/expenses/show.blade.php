@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.expense.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.expense.fields.expense_category') }}
                    </th>
                    <td>
                        {{ $expense->expense_category->name ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.expense.fields.entry_date') }}
                    </th>
                    <td>
                        {{ $expense->entry_date }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.expense.fields.amount') }}
                    </th>
                    <td>
                        ${{ $expense->amount }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.expense.fields.description') }}
                    </th>
                    <td>
                        {{ $expense->description }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection