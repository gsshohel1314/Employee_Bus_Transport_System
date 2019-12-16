@extends('layouts.admin')
@section('title', $pickUp->pickPoint)
@section('content')

@component('admin.dashboard.bredcumb')
  @slot('title')
    Edit Pick Up
  @endslot
  <li><a href="{{url('admin/pickUp/'.$pickUp->id.'/edit')}}">{{$pickUp->pickPoint}}</a></li>
@endcomponent

<div class="row">
    <div class="col-md-12">
      <form class="form-horizontal" action="{{url('admin/pickUp/'.$pickUp->id)}}" method="post">
        @csrf
        @method('put')
          <div class="panel panel-default">
              <div class="panel-heading">
                  <div class="row">
                    <div class="col-md-8">
                      <h3 class="panel-title"><i class="fa fa-cubes"></i> Update Pick Up Information</h3>
                    </div>
                    <div class="col-md-4 text-right">
                      <a href="{{url('admin/pickUp')}}" class="btn btn-sm btn-primary btn-panel-head"><i class="fa fa-th"></i> All Pick Up Point</a>
                    </div>
                    <div class="clearfix">
                  </div>
                  </div>
              </div>

              <div class="panel-body">

                <div class="form-group {{$errors->has('pickPoint')? 'has-error':''}}">
                    <label class="col-sm-3 control-label">Pick Up Point and Time </label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="pickPoint" value="{{$pickUp->pickPoint}}">
                      @if ($errors->has('pickPoint'))
                        <span class="invalid-feedback mb-0" role="alert">
                            <strong>{{ $errors->first('pickPoint') }}</strong>
                        </span>
                      @endif
                    </div>
                </div>


                    {{-- <div class="form-group {{$errors->has('name')? 'has-error':''}}">
                        <label class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" name="name" value="{{$pickUp->name}}">
                          @if ($errors->has('name'))
      											<span class="invalid-feedback mb-0" role="alert">
      													<strong>{{ $errors->first('name') }}</strong>
      											</span>
      									  @endif
                        </div>
                    </div> --}}

              </div>

              <div class="panel-footer text-center">
                <button type="submit" class="btn btn-sm btn-primary">UPDATE</button>
              </div>
            </div>
        </form>
    </div>
</div>
@endsection
