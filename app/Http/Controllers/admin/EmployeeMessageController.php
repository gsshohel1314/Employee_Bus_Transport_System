<?php

namespace App\Http\Controllers\admin;

use App\EmployeeMessage;
use App\AdminMessage;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\Notifiable;
use App\Notifications\NewAdminMessage;

class EmployeeMessageController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
      $this->middleware('employee');
    }

    // public function index()
    // {
    //   $data=EmployeeMessage::orderBy('id','DESC')->get();
    //   return view('admin.employeeMessage.allMessage',compact('data'));
    // }

    public function create()
    {
      return view('admin.employeeMessage.employeeMessageSend');
    }

    public function store(Request $request)
    {
      $data=new AdminMessage();
      $data->name=$request->name;
      $data->email=$request->email;
      $data->role=$request->role;
      $data->subject=$request->subject;
      $data->description=$request->description;
      $data->save();

      $users=User::where('role_id',1)->get();
      Notification::send($users, new NewAdminMessage ($data));

      Toastr::success('Message send successfull', 'Success');
      return redirect()->back();

      Toastr::error('Message send failed', 'Error');
      return redirect()->back();
    }

    // public function show(EmployeeMessage $employeeMessage)
    // {
    //   return view('admin.employeeMessage.viewMessage',compact('employeeMessage'));
    // }


    public function edit(EmployeeMessage $employeeMessage)
    {

    }


    public function update(Request $request, EmployeeMessage $employeeMessage)
    {

    }


    public function destroy(EmployeeMessage $employeeMessage)
    {

    }
}
