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
                            {{ trans('global.payment.fields.tenant') }}
                        </th>
                        <th>
                            {{ trans('global.payment.fields.amount_paid') }}
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
                                {{ $receipt->tenant->name ?? '' }}
                            </td>
                            <td>
                                {{ $receipt->amount_paid ?? '' }}
                            </td>
                            <td>
                                @if( $receipt->is_confirmed == "Confirmed")
                                    @can('receipt_print')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.receipts.show', $receipt->id) }}" >
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('receipt_download')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.receipts.download', $receipt->id) }}" target="_blank">
                                            {{ trans('global.print') }}
                                        </a>
                                    @endcan
                                @else
                                    <span class="text-muted">Payment not confirmed</span>
                                @endif
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
@parent
<script>
    $(function () {
    let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
    let deleteButton = {
        text: deleteButtonTrans,
        url: "{{ route('admin.payments.massDestroy') }}",
        className: 'btn-danger',
        action: function (e, dt, node, config) {
        var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
            return $(entry).data('entry-id')
        });

        if (ids.length === 0) {
            alert('{{ trans('global.datatables.zero_selected') }}')

            return
        }

        if (confirm('{{ trans('global.areYouSure') }}')) {
            $.ajax({
            headers: {'x-csrf-token': _token},
            method: 'POST',
            url: config.url,
            data: { ids: ids, _method: 'DELETE' }})
            .done(function () { location.reload() })
        }
        }
    }
    let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
    // @can('payment_delete')
    // // dtButtons.push(deleteButton)
    // @endcan

    $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    })

</script>

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
