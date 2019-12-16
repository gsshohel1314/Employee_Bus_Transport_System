<?php

namespace App\Http\Controllers\admin;

use App\RequestBus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewRequest;
use App\Notifications\EmployeeRequestApproved;
use App\Notifications\EmployeeRequestRejected;
use App\Notifications\Assign;
use App\PickUp;
use App\User;
use App\BusRoute;
use App\AssignBus;
use Carbon\Carbon;
use Session;

class RequestBusController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
      // $this->middleware('admin');
    }

    public function index()
    {
        $allPick=RequestBus::orderBy('id','DESC')->get();
        return view('admin.requestBus.all',compact('allPick'));
    }

    public function create()
    {
        $allPick=PickUp::orderBy('id','DESC')->get();
        $users=User::orderBy('id','DESC')->get();
        //return $users;
        return view('admin.requestBus.add',compact('allPick','users'));
    }

    public function store(Request $request)
    {
      $insert=RequestBus::insert([
        'name'=>$_POST['name'],
        'email'=>$_POST['email'],
        'pickPoint'=>$_POST['pickPoint'],
        'created_at'=>Carbon::now()->toDateTimeString(),
      ]);

      //Notification send
      $users=User::where('role_id',1)->get();
      Notification::send($users, new NewRequest($insert));
      //Notification send end

      if($insert){
        Toastr::success('Bus Request Success', 'Success');
        return back();
      }else{
        Toastr::error('Bus Request Failed', 'Error');
        return back();
      }
    }

    public function show(RequestBus $requestBus)
    {
        return view('admin.requestBus.view',compact('requestBus'));
    }

    public function edit(RequestBus $requestBus)
    {
        //
    }

    public function update(Request $request, RequestBus $requestBus)
    {
        //
    }

    public function pending()
    {
      $busRequest=RequestBus::where('is_approved',false)->get();
      return view('admin.requestBus.pending',compact('busRequest'));
    }

    public function approve($id)
    {
      $busRequest=RequestBus::find($id);

      if($busRequest->is_approved==false){
        $busRequest->is_approved=true;
        $busRequest->save();

        //notification send
        $busRequest->notify(new EmployeeRequestApproved($busRequest));
        //notification end
        Toastr::success('Request approved Successfull', 'Success');
        return back();
      }else{
        $busRequest->is_approved=false;
        $busRequest->save();

        $busRequest->notify(new EmployeeRequestApproved($busRequest));

        Toastr::success('Request approved Successfull', 'Success');
        return back();
      }
      // return view('admin.requestBus.pending',compact('busRequest'));
      //return $id;
    }

    public function destroy(RequestBus $requestBus)
    {
      $delete = $requestBus->delete();

      if($delete){
        Toastr::success('Bus Request delete Successfull', 'Success');
        return back();
      }else{
        Toastr::error('Bus Request delete failed', 'Error');
        return back();
      }
    }





    public function assign($id){
      $busRequest=RequestBus::where('id',$id)->get();
      $bus=BusRoute::all();
      $pick=PickUp::all();
      return view('admin.requestBus.assign',compact('busRequest','bus','pick'));
    }

    public function assignBus(Request $request){
      $data = new AssignBus();
      $data->name=$request->name;
      $data->email=$request->email;
      $data->busName=$request->busName;
      $data->busRoute=$request->busRoute;
      $data->pickPoint=$request->pickPoint;
      $data->pickTime=$request->pickTime;
      $data->save();

      $data->notify(new Assign($data));

      Toastr::success('Bus Assign Successfull', 'Success');
      return redirect()->back();

      Toastr::error('Bus Assign Failed', 'Error');
      return redirect()->back();
    }
}
