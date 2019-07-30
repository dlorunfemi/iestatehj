@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{ number_format($settings1['total_number']) }}</h3>

                  <p>{{ $settings1['chart_title'] }}</p>
                </div>
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
                <a href="{{ route("admin.landlords.index") }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{ number_format($settings2['total_number']) }}</h3>

                  <p>{{ $settings2['chart_title'] }}</p>
                </div>
                <div class="icon">
                  <i class="fa fa-users"></i>
                </div>
                <a href="{{ route("admin.tenants.index") }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning" style="color: white !important;">
                <div class="inner">
                  <h3>{{ number_format($settings3['total_number']) }}</h3>

                  <p>{{ $settings3['chart_title'] }}</p>
                </div>
                <div class="icon">
                  <i class="fa fa-building"></i>
                </div>
                <a href="{{ route("admin.properties.index") }}" class="small-box-footer" style="color: white !important;">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>{{ number_format($settings2['total_number']) }}</h3>

                  <p>{{ $settings2['chart_title'] }}</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->

          <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header border-transparent">
                        <h3 class="card-title">{{ $settings4['chart_title'] }}</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-widget="remove">
                            <i class="fa fa-times"></i>
                            </button>
                        </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped m-0">
                            <thead>
                            <tr>
                                @foreach($settings4['fields'] as $field)
                                    <th>
                                        {{ ucfirst($field) }}
                                    </th>
                                @endforeach
                            </tr>
                            </thead>
                            <tbody>
                                @forelse($settings4['data'] as $row)
                                    <tr>
                                        @foreach($settings4['fields'] as $field)
                                            @if($field=='property')
                                                <td>
                                                    {{ $row->{$field}->name }}
                                                </td>
                                            @elseif($field=='property_tag')
                                                <td>
                                                    {{ $row->{$field}->name }}
                                                </td>
                                            @elseif($field=='is_vacant')
                                                <td>
                                                    {{-- {{$row->$field}} --}}
                                                    @if( $row->$field  == 'Yes' )
                                                        <span class="badge badge-success">{{ $row->$field }}</span>
                                                    @else
                                                        <span class="badge badge-danger">{{ $row->$field }}</span>
                                                    @endif
                                                </td>
                                            @else
                                                <td>
                                                    {{ $row->{$field} }}
                                                </td>
                                            @endif
                                        @endforeach
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="{{ count($settings4['fields']) }}">{{ __('No entries found') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                        <a href="{{ route("admin.vacancies.create") }}" class="btn btn-sm btn-success float-left">Create New Vacancy</a>
                        <a href="{{ route("admin.vacancies.index") }}" class="btn btn-sm btn-secondary float-right">View All Vacancies</a>
                        </div>
                        <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->

                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ $settings5['chart_title'] }}</h3>

                            <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-widget="remove">
                                <i class="fa fa-times"></i>
                            </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped m-0">
                                    <thead>
                                        <tr>
                                            @foreach($settings5['fields'] as $field)
                                                <th>
                                                    {{ ucfirst($field) }}
                                                </th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($settings5['data'] as $row)
                                            <tr>
                                                @foreach($settings5['fields'] as $field)
                                                    @if($field=='property')
                                                        <td>
                                                            {{ $row->{$field}->name }}
                                                        </td>
                                                    @elseif($field=='status')
                                                        <td>
                                                            @if( $row->$field  == 'Pending' )
                                                                <span class="badge badge-warning">{{ $row->$field }}</span>
                                                            @elseif( $row->$field  == 'Withdrawn' )
                                                                <span class="badge badge-success">{{ $row->$field }}</span>
                                                            @else
                                                                <span class="badge badge-danger">{{ $row->$field }}</span>
                                                            @endif
                                                        </td>
                                                    @else
                                                        <td>
                                                            {{ $row->{$field} }}
                                                        </td>
                                                    @endif
                                                @endforeach
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="{{ count($settings5['fields']) }}">{{ __('No entries found') }}</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer text-center">
                            <a href="{{ route("admin.requistions.index") }}" class="uppercase">View Fund Requisition</a>
                        </div>
                        <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->
                </div>
          </div>


    {{-- <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="{{ $settings1['column_class'] }}">
                    <div class="info-box">
                        <span class="info-box-icon bg-red" style="display:flex; flex-direction: column; justify-content: center;">
                            <i class="fa fa-chart-line"></i>
                        </span>

                        <div class="info-box-content">
                            <span class="info-box-text">{{ $settings1['chart_title'] }}</span>
                            <span class="info-box-number">{{ number_format($settings1['total_number']) }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="{{ $settings2['column_class'] }}">
                    <div class="info-box">
                        <span class="info-box-icon bg-red" style="display:flex; flex-direction: column; justify-content: center;">
                            <i class="fa fa-chart-line"></i>
                        </span>

                        <div class="info-box-content">
                            <span class="info-box-text">{{ $settings2['chart_title'] }}</span>
                            <span class="info-box-number">{{ number_format($settings2['total_number']) }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="{{ $settings3['column_class'] }}">
                    <div class="info-box">
                        <span class="info-box-icon bg-red" style="display:flex; flex-direction: column; justify-content: center;">
                            <i class="fa fa-chart-line"></i>
                        </span>

                        <div class="info-box-content">
                            <span class="info-box-text">{{ $settings3['chart_title'] }}</span>
                            <span class="info-box-number">{{ number_format($settings3['total_number']) }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div> --}}
                {{-- Widget - latest entries --}}
                {{-- <div class="{{ $settings4['column_class'] }}">
                    <h3>{{ $settings4['chart_title'] }}</h3>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                @foreach($settings4['fields'] as $field)
                                    <th>
                                        {{ ucfirst($field) }}
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($settings4['data'] as $row)
                                <tr>
                                    @foreach($settings4['fields'] as $field)
                                        @if($field=='property')
                                            <td>
                                                {{ $row->{$field}->name }}
                                            </td>
                                        @elseif($field=='property_tag')
                                            <td>
                                                {{ $row->{$field}->name }}
                                            </td>
                                        @else
                                            <td>
                                                {{ $row->{$field} }}
                                            </td>
                                        @endif
                                    @endforeach
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="{{ count($settings4['fields']) }}">{{ __('No entries found') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div> --}}

                {{-- Widget - latest entries --}}
                {{-- <div class="{{ $settings5['column_class'] }}">
                    <h3>{{ $settings5['chart_title'] }}</h3>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                @foreach($settings5['fields'] as $field)
                                    <th>
                                        {{ ucfirst($field) }}
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($settings5['data'] as $row)
                                <tr>
                                    @foreach($settings5['fields'] as $field)
                                        @if($field=='property')
                                            <td>
                                                {{ $row->{$field}->name }}
                                            </td>
                                        @else
                                            <td>
                                                {{ $row->{$field} }}
                                            </td>
                                        @endif
                                    @endforeach
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="{{ count($settings5['fields']) }}">{{ __('No entries found') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div> --}}
        <example-component></example-component>
    {{-- </div> --}}
</div>
@endsection
@section('scripts')
@parent
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
@endsection
