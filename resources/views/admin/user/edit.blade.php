@extends('layouts.admin')
@section('title', $user->name)
@section('content')

@component('admin.dashboard.bredcumb')
@slot('title')
Edit User
@endslot
<li><a href="{{url('admin/user/'.$user->id.'/edit')}}">{{$user->name}}</a></li>
@endcomponent

<div class="row">
    <div class="col-md-12">
        <form class="form-horizontal" action="{{url('admin/user/'.$user->id)}}" method="post">
            @csrf
            @method('put')
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="panel-title"><i class="fa fa-cubes"></i> Update User Information</h3>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="{{url('admin/user')}}" class="btn btn-sm btn-primary btn-panel-head"><i class="fa fa-th"></i> All users</a>
                        </div>
                        <div class="clearfix">
                        </div>
                    </div>
                </div>

                <!--sweetalert start
                  @if(Session::has('error'))
                      <script>
                          swal({ title: "Opps!", text: "Update failed.", timer:5000, icon: "warning",});
                      </script>
                  @endif
              sweetalert end-->
                <div class="panel-body">

                    <div class="form-group {{$errors->has('name')? 'has-error':''}}">
                        <label class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="name" value="{{$user->name}}">
                            @if ($errors->has('name'))
                            <span class="invalid-feedback mb-0" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-7">
                            <input type="email" class="form-control" name="email" value="{{$user->email}}" disabled>
                        </div>
                    </div>

                    <div class="form-group {{$errors->has('phone')? 'has-error':''}}">
                        <label class="col-sm-3 control-label">Phone</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="phone" value="{{$user->phone}}">
                            @if ($errors->has('phone'))
                            <span class="invalid-feedback mb-0" role="alert">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{$errors->has('role')? 'has-error':''}}">
                        <label class="col-sm-3 control-label">User Role</label>
                        <div class="col-sm-7">
                            <select class="form-control" name="role">
                                <option value="">Select User Role</option>
                                @foreach ($allRole as $value)
                                <option value="{{$value->id}}" @if($value->id==$user->role_id) selected
                                    @endif >{{$value->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('role'))
                            <span class="invalid-feedback mb-0" role="alert">
                                <strong>{{ $errors->first('role') }}</strong>
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
