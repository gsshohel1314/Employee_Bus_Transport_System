@extends('layouts.admin')
@section('title', 'Send Messages')
@section('content')

{{-- @component('admin.dashboard.bredcumb')
  @slot('title')
    Send Messages
  @endslot
  <li><a href="{{url('admin/adminMessage/send/'.$data->name)}}">Send</a></li>
@endcomponent --}}

<div class="row">
    <div class="col-md-12">
      <form class="form-horizontal" action="{{url('admin/adminMessage')}}" method="post">
        @csrf
          <div class="panel panel-default">
              <div class="panel-heading">
                  <div class="row">
                    <div class="col-md-8">
                      <h3 class="panel-title"><i class="fa fa-cubes"></i> Send Message To Employee</h3>
                    </div>
                    <div class="col-md-4 text-right">
                      <a href="{{url('admin/adminMessage')}}" class="btn btn-sm btn-primary btn-panel-head"><i class="fa fa-th"></i> All users</a>
                    </div>
                    <div class="clearfix">
                  </div>
                  </div>
              </div>

              <div class="panel-body">

                <div class="form-group {{$errors->has('name')? 'has-error':''}}">
                    <label class="col-sm-3 control-label">Name</label>
                    <div class="col-sm-7">

                      <input type="text" class="form-control" name="name"
                      @foreach ($data as $value)
                       value="{{$value->name}}"
                      @endforeach
                      readonly >

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

                      <input type="email" class="form-control" name="email"
                      @foreach ($data as $value)
                       value="{{$value->email}}"
                      @endforeach
                      readonly >

                      @if ($errors->has('email'))
                        <span class="invalid-feedback mb-0" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                      @endif
                    </div>
                </div>

                <div class="form-group {{$errors->has('role')? 'has-error':''}}">
                    <label class="col-sm-3 control-label">User Role</label>
                    <div class="col-sm-7">

                      <input type="text" class="form-control" name="role"
                      @foreach ($data as $value)
                       value="{{$value->roleName->name}}"
                      @endforeach
                      readonly >

                      @if ($errors->has('role'))
                        <span class="invalid-feedback mb-0" role="alert">
                            <strong>{{ $errors->first('role') }}</strong>
                        </span>
                      @endif
                    </div>
                </div>


                    <div class="form-group {{ $errors->has('subject') ? ' has-error' : '' }}">
                        <label class="col-sm-3 control-label">Subject</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" name="subject" value="">
                          @if ($errors->has('subject'))
      											<span class="invalid-feedback mb-0" role="alert">
      													<strong>{{ $errors->first('subject') }}</strong>
      											</span>
      									  @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                        <label class="col-sm-3 control-label">Description</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" name="description" value="">
                          @if ($errors->has('description'))
      											<span class="invalid-feedback mb-0" role="alert">
      													<strong>{{ $errors->first('description') }}</strong>
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
