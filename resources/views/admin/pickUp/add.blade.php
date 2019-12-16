@extends('layouts.admin')
@section('title', 'Add Pick Up Information')
@section('content')

@component('admin.dashboard.bredcumb')
  @slot('title')
    Add Pick Up Information
  @endslot
  <li><a href="{{url('admin/pickUp/create')}}">Add</a></li>
@endcomponent

<div class="row">
    <div class="col-md-12">
      <form class="form-horizontal" action="{{url('admin/pickUp')}}" method="post">
        @csrf
          <div class="panel panel-default">
              <div class="panel-heading">
                  <div class="row">
                    <div class="col-md-8">
                      <h3 class="panel-title"><i class="fa fa-cubes"></i> Add Pick Up Information</h3>
                    </div>
                    <div class="col-md-4 text-right">
                      <a href="{{url('admin/pickUp')}}" class="btn btn-sm btn-primary btn-panel-head"><i class="fa fa-th"></i> All Pick Up Infoformation</a>
                    </div>
                    <div class="clearfix">
                  </div>
                  </div>
              </div>

              <!--sweetalert start-->
              {{-- @if(Session::has('success'))
                  <script>
                      swal({ title: "Success!", text: "User Registration Success.", timer:5000, icon: "success",});
                  </script>
                  @endif

                  @if(Session::has('error'))
                  <script>
                      swal({ title: "Opps!", text: "Registration failed.", timer:5000, icon: "warning",});
                  </script>
                  @endif --}}
              <!--sweetalert end-->

              <div class="panel-body">

                    {{-- <div class="form-group {{$errors->has('workshift')? 'has-error':''}}">
                        <label class="col-sm-3 control-label">Work Shift</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" name="workshift" value="{{old('name')}}">
                          @if ($errors->has('workshift'))
      											<span class="invalid-feedback mb-0" role="alert">
      													<strong>{{ $errors->first('workshift') }}</strong>
      											</span>
      									  @endif
                        </div>
                    </div> --}}

                    <div class="form-group {{$errors->has('pickPoint')? 'has-error':''}}">
                        <label class="col-sm-3 control-label">Pick Up Point and Time </label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" name="pickPoint" value="{{old('name')}}">
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
                          <input type="text" class="form-control" name="pickTime" value="{{old('name')}}">
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
        </form>
    </div>
</div>
@endsection
