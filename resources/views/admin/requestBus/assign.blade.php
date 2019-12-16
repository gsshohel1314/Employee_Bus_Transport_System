@extends('layouts.admin')
@foreach($busRequest as $data)
@section('title', $data->name)
@endforeach
@section('content')

@component('admin.dashboard.bredcumb')
@slot('title')
Add Request
@endslot
<li><a href="{{url('admin/requestBus/assign/'.$data->id)}}">{{$data->name}}</a></li>
@endcomponent

<div class="row">
    <div class="col-md-12">
        <form class="form-horizontal" action="{{url('admin/requestBus/assign')}}" method="post">
            @csrf

            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="panel-title"><i class="fa fa-cubes"></i>Add Bus Request Information</h3>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="{{url('admin/requestBus')}}" class="btn btn-sm btn-primary btn-panel-head"><i class="fa fa-th"></i> All Bus Request</a>
                        </div>
                        <div class="clearfix">
                        </div>
                    </div>
                </div>

                <div class="panel-body">

                    <div class="form-group {{$errors->has('name')? 'has-error':''}}">
                        <label class="col-sm-3 control-label">Employee Name</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="name" value="{{$data->name}}"readonly>
                            @if ($errors->has('name'))
                            <span class="invalid-feedback mb-0" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{$errors->has('email')? 'has-error':''}}">
                        <label class="col-sm-3 control-label">Employee Email</label>
                        <div class="col-sm-7">
                            <input type="email" class="form-control" name="email" value="{{$data->email}}">
                            @if ($errors->has('email'))
                            <span class="invalid-feedback mb-0" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{$errors->has('busName')? 'has-error':''}}">
                        <label class="col-sm-3 control-label">Bus Name</label>
                        <div class="col-sm-7">
                            <select class="form-control" name="busName">
                                <option value="">Select Bus Name</option>
                                @foreach($bus as $data)
                                <option value="{{ $data->busName }}">{{ $data->busName }}</option>
                              @endforeach
                            </select>

                            @if ($errors->has('busName'))
                            <span class="invalid-feedback mb-0" role="alert">
                                <strong>{{ $errors->first('busName') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    {{-- <div class="form-group {{$errors->has('busRoute')? 'has-error':''}}">
                        <label class="col-sm-3 control-label">Bus Route</label>
                        <div class="col-sm-7">
                            <select class="form-control" name="busRoute">
                                <option value="">Select Pick Up Point</option>

                                <option value=""></option>

                            </select>

                            @if ($errors->has('busName'))
                            <span class="invalid-feedback mb-0" role="alert">
                                <strong>{{ $errors->first('busName') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div> --}}

                <div class="form-group {{$errors->has('pickPoint')? 'has-error':''}}">
                    <label class="col-sm-3 control-label">Pick Up Point</label>
                    <div class="col-sm-7">
                        <select class="form-control" name="pickPoint">
                            <option value="">Select Pick Up Point</option>
                            @foreach($pick as $data)
                            <option value="{{ $data->pickPoint }}">{{ $data->pickPoint }}</option>
                          @endforeach
                        </select>

                        @if ($errors->has('pickPoint'))
                        <span class="invalid-feedback mb-0" role="alert">
                            <strong>{{ $errors->first('pickPoint') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                {{-- <div class="form-group {{$errors->has('pickTime')? 'has-error':''}}">
                    <label class="col-sm-3 control-label">Pick Up Time</label>
                    <div class="col-sm-7">
                        <select class="form-control" name="pickTime">
                            <option value="">Select Pick Up Point</option>

                            <option value=""></option>

                        </select>

                        @if ($errors->has('pickTime'))
                        <span class="invalid-feedback mb-0" role="alert">
                            <strong>{{ $errors->first('pickTime') }}</strong>
                        </span>
                        @endif
                    </div>
                </div> --}}

            </div>

            <div class="panel-footer text-center">
                <button type="submit" class="btn btn-sm btn-primary">SUBMIT</button>
            </div>
    </div>
</div>
</form>
</div>
</div>
@endsection
