@extends('layouts.admin')

@section('content')

@component('admin.dashboard.bredcumb')
  @slot('title')
    Welcome!
  @endslot
@endcomponent

<div class="row">

  @if(Auth::user()->role_id=='1')
    <div class="col-md-6 col-sm-6 col-lg-3">
        <div class="mini-stat clearfix bx-shadow">
            <span class="mini-stat-icon bg-primary"><i class="ion-android-contacts"></i></span>
            <div class="mini-stat-info text-right text-muted">
                <span class="counter">
                  {{ $totalUser }}
                  {{-- @if($totalUser<2)
                    0{{$totalUser}}
                  @else
                    {{$totalUser}}
                  @endif --}}
                </span>
                  Total Users
            </div>
            <div class="tiles-progress">
                <div class="m-t-20">
                    <h5 class="text-uppercase"> Users <span class="pull-right"></span></h5>
                    {{-- <div class="progress progress-sm m-0">
                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                            <span class="sr-only">60% Complete</span>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-sm-6 col-lg-3">
        <div class="mini-stat clearfix bx-shadow">
            <span class="mini-stat-icon bg-success"><i class="fa fa-bus"></i></span>
            <div class="mini-stat-info text-right text-muted">
                <span class="counter">
                  {{ $totalRequest }}
                </span>
                  Total Request
            </div>
            <div class="tiles-progress">
                <div class="m-t-20">
                    <h5 class="text-uppercase"> Bus Request <span class="pull-right"></span></h5>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-sm-6 col-lg-3">
        <div class="mini-stat clearfix bx-shadow">
            <span class="mini-stat-icon bg-info"><i class="fa fa-envelope"></i></span>
            <div class="mini-stat-info text-right text-muted">
                <span class="counter">
                  {{ $totalMessage }}
                </span>
                  Total Message
            </div>
            <div class="tiles-progress">
                <div class="m-t-20">
                    <h5 class="text-uppercase"> Employee Message <span class="pull-right"></span></h5>
                </div>
            </div>
        </div>
    </div>
  @endif



  @if(Auth::user()->role_id=='2')
    <div class="col-md-6 col-sm-6 col-lg-3">
        <div class="mini-stat clearfix bx-shadow">
            <span class="mini-stat-icon bg-primary"><i class="fa fa-bus"></i></span>
            <div class="mini-stat-info text-right text-muted">
                <span class="counter">
                  {{ $totalBus }}
                </span>
                  Total Bus
            </div>
            <div class="tiles-progress">
                <div class="m-t-20">
                    <h5 class="text-uppercase"> Buses <span class="pull-right"></span></h5>

                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-sm-6 col-lg-3">
        <div class="mini-stat clearfix bx-shadow">
            <span class="mini-stat-icon bg-success"><i class="fa fa-envelope"></i></span>
            <div class="mini-stat-info text-right text-muted">
                <span class="counter">
                  {{ $totalAdminMessage }}
                </span>
                  Total Message
            </div>
            <div class="tiles-progress">
                <div class="m-t-20">
                    <h5 class="text-uppercase"> Admin Message <span class="pull-right"></span></h5>
                </div>
            </div>
        </div>
    </div>
  @endif

    {{-- <div class="col-md-6 col-sm-6 col-lg-3">
        <div class="mini-stat clearfix bx-shadow">
            <span class="mini-stat-icon bg-primary"><i class="ion-android-contacts"></i></span>
            <div class="mini-stat-info text-right text-muted">
                <span class="counter">5210</span>
                New Users
            </div>
            <div class="tiles-progress">
                <div class="m-t-20">
                    <h5 class="text-uppercase">Users <span class="pull-right">57%</span></h5>
                    <div class="progress progress-sm m-0">
                        <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100" style="width: 57%;">
                            <span class="sr-only">57% Complete</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</div>
@endsection
