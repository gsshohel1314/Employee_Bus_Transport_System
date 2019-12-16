@extends('layouts.admin')
@section('title','All Bus Request')
@section('content')

@component('admin.dashboard.bredcumb')
  @slot('title')
    All Bus Request
  @endslot
  <li><a href="{{url('admin/requestBus')}}">All</a></li>
@endcomponent

<div class="row">
  <div class="col-md-12">
      <div class="panel panel-default">
          <div class="panel-heading">

            <div class="row">
              <div class="col-md-8">
                <h3 class="panel-title"><i class="fa fa-cubes"></i>All Bus Request Infoformation</h3>
              </div>
              <div class="col-md-4 text-right">
                <a href="{{url('admin/requestBus/create')}}" class="btn btn-sm btn-primary btn-panel-head"><i class="fa fa-th"></i> Add Request</a>
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
                                  <th>Name</th>
                                  <th>Email</th>
                                  <th>Pick Up Point</th>
                                  <th>Is Approve</th>
                                  <th>Time</th>
                                  <th>Manage</th>
                              </tr>
                          </thead>


                          <tbody>

                            @foreach ($busRequest as $value)
                              <tr>
                                  <td>{{$value->name}}</td>
                                  <td>{{$value->email}}</td>
                                  <td>{{$value->pickPoint}}</td>
                                  <td>
                                    @if($value->is_approved==true)
                                      <span class="badge bg-primary">Approved</span>
                                    @else
                                      <span class="badge bg-danger">Pending</span>
                                    @endif
                                  </td>
                                  <td>{{$value->created_at}}</td>
                                  <td>
                                    <button class="approve btn btn-success" data-approve="{{url('admin/requestBus/approve/'.$value->id)}}" href="#" data-toggle="modal" data-target="#exampleModalApprove">
                                      <i class="fa fa-check fa-lg"></i>
                                    </button>

                                    <a href="{{url('admin/requestBus/'.$value->id)}}">
                                      <i class="fa fa-plus-square fa-lg"></i>
                                    </a>

                                    <a href="">
                                      <i class="fa fa-pencil-square fa-lg"></i>
                                    </a>

                                    <a class="delete" data-rana="" href="#" data-toggle="modal" data-target="#exampleModal">
                                      <i class="fa fa-trash fa-lg"></i>
                                    </a>
                                  </td>
                              </tr>
                            @endforeach

                          </tbody>
                      </table>

                  </div>
              </div>
          </div>

          <div class="panel-footer">
            <a href="#" class="btn btn-sm btn-primary">PRINT</a>
            <a href="#" class="btn btn-sm btn-warning">PDF</a>
            <a href="#" class="btn btn-sm btn-info">CSV</a>
          </div>

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
      <form action="" method="post" id="approve">
        @csrf
        @method('put')
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> <p class="text-danger">Are you sure!</p></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p class="text-danger">Do you want to approve this request?</p>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-info" data-dismiss="modal">No, Cancel</button>
          <button type="submit" class="btn btn-danger">Yes, Approve</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection
