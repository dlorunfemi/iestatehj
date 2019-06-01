@extends('layouts.admin')
@section('content')
<div class="card">
<div class="card-header">
        {{ trans('global.receipt.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('global.payment.fields.property') }}
                        </th>
                        <th>
                            {{ trans('global.payment.fields.landlord') }}
                        </th>
                        <th>
                            {{ trans('global.payment.fields.tenant') }}
                        </th>
                        <th>
                            {{ trans('global.payment.fields.apartment') }}
                        </th>
                        <th>
                            {{ trans('global.payment.fields.annual_charge') }}
                        </th>
                        <th>
                            {{ trans('global.payment.fields.amount_paid') }}
                        </th>
                        <th>
                            {{ trans('global.payment.fields.rent_from') }}
                        </th>
                        <th>
                            {{ trans('global.payment.fields.rent_to') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($receipts as $key => $receipt)
                        <tr data-entry-id="{{ $receipt->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $receipt->property->name ?? '' }}
                            </td>
                            <td>
                                {{ $receipt->landlord->name ?? '' }}
                            </td>
                            <td>
                                {{ $receipt->tenant->name ?? '' }}
                            </td>
                            <td>
                                {{ $receipt->apartment->name ?? '' }}
                            </td>
                            <td>
                                {{ $receipt->annual_charge ?? '' }}
                            </td>
                            <td>
                                {{ $receipt->amount_paid ?? '' }}
                            </td>
                            <td>
                                {{ $receipt->rent_from ?? '' }}
                            </td>
                            <td>
                                {{ $receipt->rent_to ?? '' }}
                            </td>
                            <td>
                                @can('payment_show')
                                    <a class="btn btn-xs btn-primary" href="#" data-remoe="{{ route('admin.receipts.show', $receipt->id) }}" data-toggle="modal" data-target="#exampleModal">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('payment_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.receipts.downloadPDF', $receipt->id)}}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection
@section('scripts')
<script>
    $('#exampleModal').on('show.bs.modal', function (e) {
        $('.wrapper').fadeOut();
        
        var a = $(e.relatedTarget);
        var modal = $(this);
        
        // load content from HTML string
        //modal.find('.modal-body').html("Nice modal body baby...");
        
        // or, load content from value of data-remote url
        modal.find('.modal-body').load(a.data("remoe"));

    });
    $('#exampleModal').on('hide.bs.modal', function (e) {
        // location.reload(); 
        $('.wrapper').fadeIn();
    })

</script>
@endsection