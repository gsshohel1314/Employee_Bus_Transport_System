@extends('layouts.admin')
@section('title','All Pick Up Infoformation')
@section('content')

@component('admin.dashboard.bredcumb')
  @slot('title')
    All Pick Up Infoformation
  @endslot
  <li><a href="{{url('admin/pickUp')}}">All</a></li>
@endcomponent

<div class="row">
  <div class="col-md-12">
      <div class="panel panel-default">
          <div class="panel-heading">

            <div class="row">
              <div class="col-md-8">
                <h3 class="panel-title"><i class="fa fa-cubes"></i> All Pick Up Infoformation</h3>
              </div>
              <div class="col-md-4 text-right">
                <a href="{{url('admin/pickUp/create')}}" class="btn btn-sm btn-primary btn-panel-head"><i class="fa fa-th"></i> Add Pick Up Infoformation</a>
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
                                  <th>Pick Up Point</th>
                                  {{-- <th>Pick Up Time</th> --}}
                                  <th>Time</th>
                                  <th>Manage</th>
                              </tr>
                          </thead>


                          <tbody>

                            @foreach ($allPick as $value)
                              <tr>
                                  <td>{{$value->pickPoint}}</td>
                                  {{-- <td>{{$value->pickTime}}</td> --}}
                                  <td>{{$value->created_at}}</td>
                                  <td>
                                    {{-- <a href=""><i class="fa fa-plus-square fa-lg"></i></a> --}}
                                    <a href="{{url('admin/pickUp/'.$value->id.'/edit')}}"><i class="fa fa-pencil-square fa-lg"></i></a>

                                    <a class="pickdelete" data-url="{{url('admin/pickUp/'.$value->id)}}" href="#" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-trash fa-lg"></i></a>
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
      <form action="" method="post" id="pickdelete">
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
