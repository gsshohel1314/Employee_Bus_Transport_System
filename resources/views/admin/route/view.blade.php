@extends('layouts.admin')
@section('title', $data->busName)
@section('content')

@component('admin.dashboard.bredcumb')
  @slot('title')
    View Route
  @endslot
  <li><a href="{{url('admin/route/'.$data->id)}}">{{$data->busName}}</a></li>
@endcomponent

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                  <div class="col-md-8">
                    <h3 class="panel-title"><i class="fa fa-cubes"></i> View Bus Route Information</h3>
                  </div>
                  <div class="col-md-4 text-right">
                    <a href="{{url('admin/route/')}}" class="btn btn-sm btn-primary btn-panel-head"><i class="fa fa-th"></i> All Bus Route</a>
                  </div>
                  <div class="clearfix">
                </div>
                </div>
            </div>

            <div class="panel-body">
                <div class="row">
                  <div class="col-md-2"></div>
                  <div class="col-md-8">
                    <table class="table table-striped table-bordered view-table-custom">
                      <tr>
                        <td>Bus Name</td>
                        <td>:</td>
                        <td>{{$data->busName}}</td>
                      </tr>

                      <tr>
                        <td>Bus Route</td>
                        <td>:</td>
                        <td>{{$data->busRoute}}</td>
                      </tr>
                    </table>
                  </div>
                  <div class="col-md-2"></div>
                </div>
            </div>

            {{-- <div class="panel-footer">
              <a href="#" class="btn btn-sm btn-primary">PRINT</a>
              <a href="#" class="btn btn-sm btn-warning">PDF</a>
              <a href="#" class="btn btn-sm btn-info">CSV</a>
            </div> --}}

        </div>
    </div>
</div>
@endsection
