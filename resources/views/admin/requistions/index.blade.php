@extends('layouts.admin')
@section('content')
@can('requistion_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.requistions.create") }}">
                {{ trans('global.add') }} {{ trans('global.requistion.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('global.requistion.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('global.requistion.fields.property') }}
                        </th>
                        <th>
                            {{ trans('global.requistion.fields.landlord') }}
                        </th>
                        <th>
                            {{ trans('global.landlord.fields.account') }}
                        </th>
                        <th>
                            {{ trans('global.requistion.fields.amount_withdraw') }}
                        </th>
                        <th>
                            {{ trans('global.requistion.fields.initiating_staff') }}
                        </th>
                        <th>
                            {{ trans('global.requistion.fields.status') }}
                        </th>
                        <th>
                            {{ trans('global.requistion.fields.accountant') }}
                        </th>
                        <th>
                            {{ trans('global.requistion.fields.acc_conf_date') }}
                        </th>
                        <th>
                            {{ trans('global.requistion.fields.gm') }}
                        </th>
                        <th>
                            {{ trans('global.requistion.fields.gm_conf_date') }}
                        </th>
                        <th>
                            {{ trans('global.requistion.fields.ceo') }}
                        </th>
                        <th>
                            {{ trans('global.requistion.fields.ceo_conf_date') }}
                        </th>
                        <th>
                            {{ trans('global.requistion.fields.is_returned') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($requistions as $key => $requistion)
                        <tr data-entry-id="{{ $requistion->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $requistion->property->name ?? '' }}
                            </td>
                            <td>
                                {{ $requistion->landlord->name ?? '' }}
                            </td>
                            <td>
                                {{ $requistion->landlord->account ?? '' }}
                            </td>
                            <td>
                                {{ $requistion->amount_withdraw ?? '' }}
                            </td>
                            <td>
                                {{ $requistion->initiating_staff->name ?? '' }}
                            </td>
                            <td>
                                {{ App\Requistion::STATUS_SELECT[$requistion->status] ?? '' }}
                            </td>
                            <td>
                                {{ App\Requistion::ACCOUNTANT_SELECT[$requistion->accountant] ?? '' }}
                            </td>
                            <td>
                                {{ $requistion->acc_conf_date ?? '' }}
                            </td>
                            <td>
                                {{ App\Requistion::GM_SELECT[$requistion->gm] ?? '' }}
                            </td>
                            <td>
                                {{ $requistion->gm_conf_date ?? '' }}
                            </td>
                            <td>
                                {{ App\Requistion::CEO_SELECT[$requistion->ceo] ?? '' }}
                            </td>
                            <td>
                                {{ $requistion->ceo_conf_date ?? '' }}
                            </td>
                            <td>
                                {{ App\Requistion::IS_RETURNED_SELECT[$requistion->is_returned] ?? '' }}
                            </td>
                            <td>
                                @can('requistion_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.requistions.show', $requistion->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('requistion_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.requistions.edit', $requistion->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('requistion_delete')
                                    <form action="{{ route('admin.requistions.destroy', $requistion->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.requistions.massDestroy') }}",
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
@can('requistion_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection