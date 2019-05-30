@extends('layouts.admin')
@section('content')
@can('vacancy_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.vacancies.create") }}">
                {{ trans('global.add') }} {{ trans('global.vacancy.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('global.vacancy.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('global.vacancy.fields.property') }}
                        </th>
                        <th>
                            {{ trans('global.vacancy.fields.property_tag') }}
                        </th>
                        <th>
                            {{ trans('global.vacancy.fields.is_vacant') }}
                        </th>
                        <th>
                            {{ trans('global.vacancy.fields.rent') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vacancies as $key => $vacancy)
                        <tr data-entry-id="{{ $vacancy->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $vacancy->property->name ?? '' }}
                            </td>
                            <td>
                                {{ $vacancy->property_tag->name ?? '' }}
                            </td>
                            <td>
                                {{ App\Vacancy::IS_VACANT_SELECT[$vacancy->is_vacant] ?? '' }}
                            </td>
                            <td>
                                {{ $vacancy->rent ?? '' }}
                            </td>
                            <td>
                                @can('vacancy_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.vacancies.show', $vacancy->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('vacancy_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.vacancies.edit', $vacancy->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('vacancy_delete')
                                    <form action="{{ route('admin.vacancies.destroy', $vacancy->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.vacancies.massDestroy') }}",
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
@can('vacancy_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection