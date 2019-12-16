@extends('layouts.admin')
@section('title', $requestBus->name)
@section('content')

@component('admin.dashboard.bredcumb')
@slot('title')
View User
@endslot
<li><a href="{{url('admin/requestBus/'.$requestBus->id)}}">{{$requestBus->name}}</a></li>
@endcomponent

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="panel-title"><i class="fa fa-cubes"></i> View User Information</h3>
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="{{url('admin/requestBus')}}" class="btn btn-sm btn-primary btn-panel-head"><i class="fa fa-th"></i> All Request</a>
                    </div>
                    <div class="clearfix">
                    </div>
                </div>
            </div>

            {{-- <!--sweetalert start
               @if(Session::has('success'))
                  <script>
                      swal({ title: "Success!", text: "Update Success.", timer:5000, icon: "success",});
                  </script>
                @endif
            sweetalert end--> --}}

            <div class="panel-body">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <table class="table table-striped table-bordered view-table-custom">
                            <tr>
                                <td>Name</td>
                                <td>:</td>
                                <td>{{$requestBus->name}}</td>
                            </tr>

                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td>{{$requestBus->email}}</td>
                            </tr>

                            <tr>
                                <td>Pick Up Point</td>
                                <td>:</td>
                                <td>{{$requestBus->pickPoint}}</td>
                            </tr>

                            <tr>
                                <td>Is Approved</td>
                                <td>:</td>
                                <td>
                                    @if($requestBus->is_approved==true)
                                        <span class="badge bg-primary">Approved</span>
                                        @else
                                        <span class="badge bg-danger">Pending</span>
                                        @endif
                                </td>
                            </tr>


                        </table>
                    </div>
                    <div class="col-md-2"></div>
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
@endsection
