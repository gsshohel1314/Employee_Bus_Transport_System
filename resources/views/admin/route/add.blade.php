@extends('layouts.admin')
@section('title', 'Add Route')
@section('content')

@component('admin.dashboard.bredcumb')
  @slot('title')
    Add Route
  @endslot
  <li><a href="{{url('admin/route/create')}}">Add</a></li>
@endcomponent

<div class="row">
    <div class="col-md-12">
      <form class="form-horizontal" action="{{url('admin/route')}}" method="post">
        @csrf
          <div class="panel panel-default">
              <div class="panel-heading">
                  <div class="row">
                    <div class="col-md-8">
                      <h3 class="panel-title"><i class="fa fa-cubes"></i> Add Bus Route Information</h3>
                    </div>
                    <div class="col-md-4 text-right">
                      <a href="{{url('admin/route')}}" class="btn btn-sm btn-primary btn-panel-head"><i class="fa fa-th"></i> All Bus Route</a>
                    </div>
                    <div class="clearfix">
                  </div>
                  </div>
              </div>

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

              <div class="panel-body">

                    <div class="form-group {{$errors->has('busName')? 'has-error':''}}">
                        <label class="col-sm-3 control-label">Bus Name</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" name="busName" value="{{old('busName')}}">
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
                          <input type="text" class="form-control" name="busRoute" value="{{old('busRoute')}}">
                          @if ($errors->has('busRoute'))
      											<span class="invalid-feedback mb-0" role="alert">
      													<strong>{{ $errors->first('busRoute') }}</strong>
      											</span>
      									  @endif
                        </div>
                    </div>

              </div>

              <div class="panel-footer text-center">
                <button type="submit" class="btn btn-sm btn-primary">SUBMIT</button>
              </div>
            </div>
        </form>
    </div>
</div>
@endsection
