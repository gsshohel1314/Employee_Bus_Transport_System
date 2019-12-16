@extends('layouts.admin')
@section('title','All Bus Route')
@section('content')

@component('admin.dashboard.bredcumb')
  @slot('title')
    All Bus Route
  @endslot
  <li><a href="{{url('admin/route')}}">All</a></li>
@endcomponent

<div class="row">
  <div class="col-md-12">
      <div class="panel panel-default">
          <div class="panel-heading">

            <div class="row">
              <div class="col-md-8">
                <h3 class="panel-title"><i class="fa fa-cubes"></i> All Bus Route Infoformation</h3>
              </div>
              <div class="col-md-4 text-right">
                <a href="{{url('admin/route/create')}}" class="btn btn-sm btn-primary btn-panel-head"><i class="fa fa-th"></i> Add Bus Route</a>
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
                                  <th>Bus Name</th>
                                  <th>Bus Route</th>
                                  <th>Time</th>
                                  <th>Manage</th>
                              </tr>
                          </thead>


                          <tbody>

                            @foreach ($allRoute as $value)
                              <tr>
                                  <td>{{$value->busName}}</td>
                                  <td>{{$value->busRoute}}</td>
                                  <td>{{$value->created_at}}</td>
                                  <td>
                                    <a href="{{url('admin/route/'.$value->id)}}"><i class="fa fa-plus-square fa-lg"></i></a>

                                    <a href="{{url('admin/route/'.$value->id.'/edit')}}"><i class="fa fa-pencil-square fa-lg"></i></a>

                                    <a class="routedelete" data-url="{{url('admin/route/'.$value->id)}}" href="#" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-trash fa-lg"></i></a>
                                  </td>
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
      <form action="" method="post" id="routedelete">
        @csrf
        @method('delete')
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> <p class="text-danger">Are you sure!</p></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p class="text-danger">Do you really want to permanently delete these records?</p>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-info" data-dismiss="modal">No, Cancel</button>
          <button type="submit" class="btn btn-danger">Yes, Delete</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection
