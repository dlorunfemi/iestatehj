@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.product.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.product.fields.landlord') }}
                    </th>
                    <td>
                        {{ $product->landlord->name ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Property Type
                    </th>
                    <td>
                        @foreach($product->categories as $id => $category)
                            <span class="label label-info label-many">{{ $category->name }}</span>
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.product.fields.is_new') }}
                    </th>
                    <td>
                        {{ App\Product::IS_NEW_SELECT[$product->is_new] }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.product.fields.name') }}
                    </th>
                    <td>
                        {{ $product->name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.product.fields.state') }}
                    </th>
                    <td>
                        {{ App\Product::STATE_SELECT[$product->state] }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.product.fields.bank_name') }}
                    </th>
                    <td>
                        {{ $product->bank_name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.product.fields.is_bank') }}
                    </th>
                    <td>
                        {{ App\Product::IS_BANK_SELECT[$product->is_bank] }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.product.fields.is_dormant') }}
                    </th>
                    <td>
                        {{ App\Product::IS_DORMANT_SELECT[$product->is_dormant] }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.product.fields.dormant_date') }}
                    </th>
                    <td>
                        {{ $product->dormant_date }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.product.fields.officer') }}
                    </th>
                    <td>
                        {{ $product->officer->name ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.product.fields.created_by') }}
                    </th>
                    <td>
                        {{ $product->created_by->name ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.product.fields.updated_by') }}
                    </th>
                    <td>
                        {{ $product->updated_by->name ?? '' }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection