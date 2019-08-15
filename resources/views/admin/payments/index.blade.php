@extends('layouts.admin')
@section('content')
@can('payment_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.payments.create") }}">
                {{ trans('global.add') }} {{ trans('global.payment.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('global.payment.title_singular') }} {{ trans('global.list') }}
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
                            {{ trans('global.payment.fields.annual_charge') }}
                        </th>
                        <th>
                            {{ trans('global.payment.fields.amount_paid') }}
                        </th>
                        <th>
                            {{ trans('global.payment.fields.tenancy') }}
                        </th>
                        <th>
                            {{ trans('global.status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($payments as $key => $payment)
                        <tr data-entry-id="{{ $payment->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $payment->property->name ?? '' }}
                            </td>
                            <td>
                                {{ $payment->tenant->name ?? '' }}
                            </td>
                            <td>
                                {{ $payment->annual_charge ?? '' }}
                            </td>
                            <td>
                                {{ $payment->amount_paid ?? '' }}
                            </td>
                            <td>
                                {{ $payment->rent_from ?? '' }} -<br/> {{ $payment->rent_to ?? '' }}
                            </td>
                            <td>
                                @if( $payment->is_confirmed == "Confirmed")
                                    {{ App\Payment::IS_CONFIRMED_SELECT["Confirmed"] }}
                                @else
                                    {{ App\Payment::IS_CONFIRMED_SELECT["Pending"] }}
                                @endif
                            </td>
                            <td>
                                @can('payment_confirm')
                                    @if( $payment->is_confirmed !== "Confirmed")
                                        <a class="btn btn-xs btn-success" href="{{ route('admin.payments.edit', $payment->id) }}">
                                            {{ trans('global.confirm') }}
                                        </a>
                                    @endif
                                @endcan
                                @can('payment_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.payments.show', $payment->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('payment_delete')
                                    <form action="{{ route('admin.payments.destroy', $payment->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
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
@can('payment_delete')
  // dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection
