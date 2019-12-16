<?php

namespace App\Http\Controllers\admin;

use App\BusRoute;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Session;

class BusRouteController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
      $this->middleware('admin');
    }

    public function index()
    {
      $allRoute=BusRoute::orderBy('id','DESC')->get();
      return view('admin.route.all',compact('allRoute'));
    }

    public function create()
    {
        return view('admin.route.add');
    }

    public function store(Request $request)
    {
      $insert=BusRoute::insert([
        'busName'=>$_POST['busName'],
        'busRoute'=>$_POST['busRoute'],
        'created_at'=>Carbon::now()->toDateTimeString(),
      ]);

      if($insert){
        Toastr::success('Bus name and route registration successfull', 'Success');
        return back();
      }else{
        Toastr::error('Bus name and route registration failed', 'Error');
        return back();
      }
    }

    public function show(BusRoute $busRoute, $id)
    {
        $data=BusRoute::where('id',$id)->firstOrFail();
        // return $data;
        return view('admin.route.view',compact('data'));
    }

    public function edit(BusRoute $busRoute, $id)
    {
      $data=BusRoute::where('id',$id)->firstOrFail();
      // return $data;
      return view('admin.route.edit',compact('data'));
    }

    public function update(Request $request, BusRoute $busRoute)
    {
      // $busRoute->busName=$request->busName;
      // $busRoute->busRoute=$request->busRoute;
      // $busRoute->save();

      $id=$request['id'];
      $update=BusRoute::where('id',$id)->update([
        'busName'=>$request['busName'],
        'busRoute'=>$request['busRoute'],
        'updated_at'=>Carbon::now()->toDateTimeString(),
      ]);

      if($update){
        Toastr::success('Bus route and name registration update successfull', 'Success');
        return back();
      }else {
        Toastr::error('Bus route and name registration update failed', 'Error');
        return back();
      }

    }

    public function destroy(BusRoute $busRoute, $id)
    {
      $data=BusRoute::where('id',$id)->firstOrFail();
      $delete = $data->delete();

      if($delete){
        Toastr::success('Bus Route Information delete Successfull', 'Success');
        return back();
      }else{
        Toastr::error('Bus Route Information delete failed', 'Error');
        return back();
      }
    }
}
