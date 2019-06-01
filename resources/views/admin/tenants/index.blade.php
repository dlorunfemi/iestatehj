@extends('layouts.admin')
@section('content')
@can('tenant_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.tenants.create") }}">
                {{ trans('global.add') }} {{ trans('global.tenant.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('global.tenant.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('global.tenant.fields.name') }}
                        </th>
                        <th>
                            {{ trans('global.tenant.fields.property') }}
                        </th>
                        <th>
                            {{ trans('global.tenant.fields.apartment') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tenants as $key => $tenant)
                        <tr data-entry-id="{{ $tenant->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $tenant->name ?? '' }}
                            </td>
                            <td>
                                {{ $tenant->property->name ?? '' }}
                            </td>
                            <td>
                                {{ $tenant->apartment->description ?? '' }}
                            </td>
                            <td>
                                @can('tenant_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.tenants.show', $tenant->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('tenant_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.tenants.edit', $tenant->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('tenant_delete')
                                    <form action="{{ route('admin.tenants.destroy', $tenant->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.tenants.massDestroy') }}",
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
@can('tenant_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection
