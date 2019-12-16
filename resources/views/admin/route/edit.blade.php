@extends('layouts.admin')
@section('title', $data->busName)
@section('content')

@component('admin.dashboard.bredcumb')
  @slot('title')
    Edit User
  @endslot
  <li><a href="{{url('admin/route/'.$data->id.'/edit')}}">{{$data->busName}}</a></li>
@endcomponent

<div class="row">
    <div class="col-md-12">
      <form class="form-horizontal" action="{{url('admin/route/'.$data->id)}}" method="post">
        @csrf
        @method('put')
          <div class="panel panel-default">
              <div class="panel-heading">
                  <div class="row">
                    <div class="col-md-8">
                      <h3 class="panel-title"><i class="fa fa-cubes"></i> Update Bus Route Information</h3>
                    </div>
                    <div class="col-md-4 text-right">
                      <a href="{{url('admin/route')}}" class="btn btn-sm btn-primary btn-panel-head"><i class="fa fa-th"></i> All Bus Route</a>
                    </div>
                    <div class="clearfix">
                  </div>
                  </div>
              </div>

              <div class="panel-body">

                <div class="form-group {{$errors->has('busName')? 'has-error':''}}">
                    <label class="col-sm-3 control-label">Bus Name</label>
                    <div class="col-sm-7">
                      <input type="hidden" name="id" value="{{$data->id}}">
                      <input type="text" class="form-control" name="busName" value="{{$data->busName}}">
                      @if ($errors->has('busName'))
                        <span class="invalid-feedback mb-0" role="alert">
                            <strong>{{ $errors->first('busName') }}</strong>
                        </span>
                      @endif
                    </div>
                </div>

                <div class="form-group {{$errors->has('busRoute')? 'has-error':''}}">
                    <label class="col-sm-3 control-label">Bus Route</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="busRoute" value="{{$data->busRoute}}">
                      @if ($errors->has('busRoute'))
                        <span class="invalid-feedback mb-0" role="alert">
                            <strong>{{ $errors->first('busRoute') }}</strong>
                        </span>
                      @endif
                    </div>
                </div>
              </div>

              <div class="panel-footer text-center">
                <button type="submit" class="btn btn-sm btn-primary">UPDATE</button>
              </div>
            </div>
        </form>
    </div>
</div>
@endsection
