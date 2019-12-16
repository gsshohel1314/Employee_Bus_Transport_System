<?php

namespace App\Http\Controllers\admin;

use App\PickUp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Session;

class PickUpController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
      $this->middleware('admin');
    }

    public function index()
    {
        $allPick=PickUp::orderBy('id','DESC')->get();
        return view('admin.pickUp.all',compact('allPick'));
    }

    public function create()
    {
        return view('admin.pickUp.add');
    }

    public function store(Request $request)
    {
      $insert=PickUp::insert([
        //'workshift'=>$_POST['workshift'],
        'pickPoint'=>$_POST['pickPoint'],
        // 'pickTime'=>$_POST['pickTime'],
        'created_at'=>Carbon::now()->toDateTimeString(),
      ]);

      if($insert){
        Toastr::success('Pick up point and time registration successfull', 'Success');
        return back();
      }else{
        Toastr::error('Pick up point and time registration failed', 'Error');
        return back();
      }
    }

    public function show(PickUp $pickUp)
    {

    }

    public function edit(PickUp $pickUp)
    {
      // $allRole=UserRole::where('status',1)->get();
      // $allPick=PickUp::orderBy('id','DESC')->get();
      return view('admin.pickUp.edit',compact('pickUp'));
    }

    public function update(Request $request, PickUp $pickUp)
    {
        $pickUp->pickPoint=$request->pickPoint;
        $pickUp->save();

        Toastr::success('Pick up point and time registration update successfull', 'Success');
        return back();

        Toastr::error('Pick up point and time registration update failed', 'Error');
        return back();
    }

    public function destroy(PickUp $pickUp)
    {
      $delete = $pickUp->delete();

      if($delete){
        Toastr::success('Pick up Information delete Successfull', 'Success');
        return back();
      }else{
        Toastr::error('Pick up Information delete failed', 'Error');
        return back();
      }
    }
}
