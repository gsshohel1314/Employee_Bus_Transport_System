<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\RequestBus;
use App\AdminMessage;
use App\EmployeeMessage;
use App\BusRoute;

class AdminController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
      // $this->middleware('admin');
    }

    public function index(){
      $totalUser=User::count();
      $totalRequest=RequestBus::count();
      $totalMessage=AdminMessage::count();
      $totalAdminMessage=EmployeeMessage::count();
      $totalBus=BusRoute::count();
      return view('admin.dashboard.home',compact('totalUser','totalRequest','totalMessage','totalAdminMessage','totalBus'));
    }
}
