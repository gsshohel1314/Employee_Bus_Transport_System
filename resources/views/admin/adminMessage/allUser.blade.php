@extends('layouts.admin')
@section('title','All User')
@section('content')

@component('admin.dashboard.bredcumb')
  @slot('title')
    All User
  @endslot
  <li><a href="{{url('admin/adminMessage')}}">All</a></li>
@endcomponent

<div class="row">
  <div class="col-md-12">
      <div class="panel panel-default">
          <div class="panel-heading">

            <div class="row">
              <div class="col-md-8">
                <h3 class="panel-title"><i class="fa fa-cubes"></i> All User Information</h3>
              </div>
              <div class="col-md-4 text-right">
                {{-- <a href="{{url('admin/user/create')}}" class="btn btn-sm btn-primary btn-panel-head"><i class="fa fa-th"></i> User Registration</a> --}}
              </div>
              <div class="clearfix">
            </div>
            </div>

          </div>
          <div class="panel-body">
              <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                      <table id="datatable" class="table table-striped table-bordered">
                          <thead>
                              <tr>
                                  {{-- <th>ID</th> --}}
                                  <th>Name</th>
                                  <th>Email</th>
                                  <th>Phone</th>
                                  <th>User Role</th>
                                  {{-- <th>Status</th> --}}
                                  <th>Manage</th>
                              </tr>
                          </thead>

                          <tbody>

                            @foreach ($allUser as $key => $value)
                              <tr>
                                  {{-- <td>{{$key + 1}}</td> --}}
                                  <td>{{$value->name}}</td>
                                  <td>{{$value->email}}</td>
                                  <td>{{$value->phone}}</td>
                                  <td>{{$value->roleName->name}}</td>
                                  {{-- <td>
                                    @if($value->status==true)
                                      <span class="badge bg-primary">Approved</span>
                                    @else
                                      <span class="badge bg-danger">Pending</span>
                                    @endif
                                  </td> --}}
                                  <td>
                                    <a href="{{url('admin/adminMessage/send/'.$value->id)}}"><i class="fa fa-check-square fa-lg"></i></a>
                              </tr>
                            @endforeach

                          </tbody>
                      </table>

                  </div>
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


<!-- Modal for Delete -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="" method="post" id="delete">
        @csrf
        @method('delete')
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> <p class="text-danger">Are you sure!</p></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p class="text-danger">Do you really want to move recycle bin these records?</p>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-info" data-dismiss="modal">No, Cancel</button>
          <button type="submit" class="btn btn-danger">Yes, Move</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal for approve -->
<div class="modal fade" id="exampleModalApprove" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="" method="post" id="status">
        @csrf
        @method('put')
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> <p class="text-danger">User Request</p></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <h4><p class="text-danger">Are you sure?</p></h4>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-info" data-dismiss="modal">No</button>
              <button type="submit" class="btn btn-danger">Yes</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection
