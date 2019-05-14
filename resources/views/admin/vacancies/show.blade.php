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
                        Property
                    </th>
                    <td>
                        @foreach($vacancy->properties as $id => $property)
                            <span class="label label-info label-many">{{ $property->name }}</span>
                        @endforeach
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
                        Property Tag
                    </th>
                    <td>
                        @foreach($vacancy->property_tags as $id => $property_tag)
                            <span class="label label-info label-many">{{ $property_tag->name }}</span>
                        @endforeach
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