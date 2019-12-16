<?php

namespace App\Http\Controllers\admin;

use App\AdminMessage;
use App\EmployeeMessage;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\Notifiable;
use App\Notifications\NewEmployeeMessage;

class AdminMessageController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
      $this->middleware('admin');
    }

    public function index()
    {
      $allUser=User::orderBy('id','DESC')->get();
      return view('admin.adminMessage.allUser',compact('allUser'));
    }

    public function view($id)
    {
        $data=User::where('id',$id)->get();
        return view('admin.adminMessage.adminMessageSend',compact('data'));
    }


    public function create()
    {

    }


    public function store(Request $request)
    {
      $data=new EmployeeMessage();
       $data->name=$request->name;
       $data->email=$request->email;
       $data->role=$request->role;
       $data->subject=$request->subject;
       $data->description=$request->description;
       $data->save();

       $data->notify(new NewEmployeeMessage($data));

       Toastr::success('Message send successfull', 'Success');
       return redirect()->back();

       Toastr::error('Message send failed', 'Error');
       return redirect()->back();
    }

    public function allMessage()
    {
      $data=AdminMessage::all();
      return view('admin.adminMessage.allMessage',compact('data'));
    }

    public function show(AdminMessage $adminMessage)
    {
      return view('admin.adminMessage.viewMessage',compact('adminMessage'));
    }


    public function edit(AdminMessage $adminMessage)
    {

    }


    public function update(Request $request, AdminMessage $adminMessage)
    {

    }


    public function destroy(AdminMessage $adminMessage)
    {
      $delete = $adminMessage->delete();

      if($delete){
        Toastr::success('Message delete Successfull', 'Success');
        return back();
      }else{
        Toastr::error('Message delete failed', 'Error');
        return back();
      }
    }
}
