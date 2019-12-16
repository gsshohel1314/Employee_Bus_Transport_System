@extends('layouts.admin')
@section('title', $adminMessage->name)
@section('content')

@component('admin.dashboard.bredcumb')
  @slot('title')
    View Message
  @endslot
  <li><a href="{{url('admin/adminMessage/'.$adminMessage->id)}}">{{$adminMessage->name}}</a></li>
@endcomponent

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                  <div class="col-md-8">
                    <h3 class="panel-title"><i class="fa fa-cubes"></i> View An Employee Message</h3>
                  </div>
                  <div class="col-md-4 text-right">
                    <a href="{{url('admin/allAdminMessage')}}" class="btn btn-sm btn-primary btn-panel-head"><i class="fa fa-th"></i> All Message</a>
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
                        <td>Name</td>
                        <td>:</td>
                        <td>{{$adminMessage->name}}</td>
                      </tr>

                      <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td>{{$adminMessage->email}}</td>
                      </tr>

                      <tr>
                        <td>User Role</td>
                        <td>:</td>
                        <td>{{$adminMessage->role}}</td>
                      </tr>

                      <tr>
                        <td>Subject</td>
                        <td>:</td>
                        <td>{{$adminMessage->subject}}</td>
                      </tr>

                      <tr>
                        <td>Description</td>
                        <td>:</td>
                        <td>{{$adminMessage->description}}</td>
                      </tr>
                    </table>
                  </div>
                  <div class="col-md-2"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
