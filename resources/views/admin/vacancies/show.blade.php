@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.vacancy.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.vacancy.fields.property') }}
                    </th>
                    <td>
                        {{ $vacancy->property->name ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.vacancy.fields.property_tag') }}
                    </th>
                    <td>
                        {{ $vacancy->property_tag->name ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.vacancy.fields.is_vacant') }}
                    </th>
                    <td>
                        {{ App\Vacancy::IS_VACANT_SELECT[$vacancy->is_vacant] }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.vacancy.fields.description') }}
                    </th>
                    <td>
                        {!! $vacancy->description !!}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.vacancy.fields.rent') }}
                    </th>
                    <td>
                        ${{ $vacancy->rent }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.vacancy.fields.created_by') }}
                    </th>
                    <td>
                        {{ $vacancy->created_by->name ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.vacancy.fields.updated_by') }}
                    </th>
                    <td>
                        {{ $vacancy->updated_by->name ?? '' }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection