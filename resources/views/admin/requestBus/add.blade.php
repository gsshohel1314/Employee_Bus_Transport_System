@extends('layouts.admin')
@section('title', 'Add Request')
@section('content')

@component('admin.dashboard.bredcumb')
@slot('title')
Add Request
@endslot
<li><a href="{{url('admin/requestBus/create')}}">Add</a></li>
@endcomponent

<div class="row">
    <div class="col-md-12">
        <form class="form-horizontal" action="{{url('admin/requestBus')}}" method="post">
            @csrf

            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="panel-title"><i class="fa fa-cubes"></i>Add Bus Request Information</h3>
                        </div>
                        <div class="col-md-4 text-right">
                            {{-- <a href="{{url('admin/requestBus')}}" class="btn btn-sm btn-primary btn-panel-head"><i class="fa fa-th"></i> All Bus Request Infoformation</a> --}}
                        </div>
                        <div class="clearfix">
                        </div>
                    </div>
                </div>

                <div class="panel-body">

                    {{-- sweetalert start
              @if(Session::has('success'))
                  <script>
                      swal({ title: "Success!", text: "User Registration Success.", timer:5000, icon: "success",});
                  </script>
                  @endif

                  @if(Session::has('error'))
                  <script>
                      swal({ title: "Opps!", text: "Registration failed.", timer:5000, icon: "warning",});
                  </script>
                  @endif
              sweetalert end --}}

                    <div class="form-group {{$errors->has('name')? 'has-error':''}}">
                        <label class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}"readonly>
                            @if ($errors->has('name'))
                            <span class="invalid-feedback mb-0" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{$errors->has('email')? 'has-error':''}}">
                        <label class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-7">
                            <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}"readonly>
                            @if ($errors->has('email'))
                            <span class="invalid-feedback mb-0" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    {{-- <div class="form-group {{$errors->has('pickPoint')? 'has-error':''}}">
                    <label class="col-sm-3 control-label">Pick Up Point</label>
                    <div class="col-sm-7">
                        <select class="form-control" name="pickPoint">
                            <!--<option value="">Select Pick Up Point</option>-->
                            @foreach ($users as $user)
                            <option value="{{$user->name}}" disabled @if ($user->name==$user->name) selected
                            @endif >
                            {{$user->name}}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('pickPoint'))
                        <span class="invalid-feedback mb-0" role="alert">
                            <strong>{{ $errors->first('pickPoint') }}</strong>
                        </span>
                        @endif

                    </div>
                </div> --}}

                <div class="form-group {{$errors->has('pickPoint')? 'has-error':''}}">
                    <label class="col-sm-3 control-label">Pick Up Point</label>
                    <div class="col-sm-7">
                        <select class="form-control" name="pickPoint">
                            <option value="">Select Pick Up Point</option>
                            @foreach ($allPick as $value)
                            <option value="{{$value->pickPoint}}">{{$value->pickPoint}}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('pickPoint'))
                        <span class="invalid-feedback mb-0" role="alert">
                            <strong>{{ $errors->first('pickPoint') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

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
