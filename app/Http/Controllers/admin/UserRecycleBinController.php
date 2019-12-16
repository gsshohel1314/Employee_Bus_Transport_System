<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\User;
use Session;
class UserRecycleBinController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
      $this->middleware('admin');
    }

    public function index(){
      $allUser=User::onlyTrashed()->latest()->get();
      return view('admin.userRecycle.all',compact('allUser'));
    }

    public function restore($id){
      $user=User::onlyTrashed()->findOrFail($id);
      $restore=$user->restore();

      if($restore){
        Toastr::success('User Restore Successfull', 'Success');
        return back();
      }else{
        Toastr::error('User Restore Failed', 'Error');
        return back();
      }
    }

    public function show($id){
      $user=User::onlyTrashed()->findOrFail($id);
      return view('admin.userRecycle.view',compact('user'));
    }

    public function delete($id){
      $user=User::onlyTrashed()->findOrFail($id);
      $delete=$user->forceDelete();

      if($delete){
        Toastr::success('User Permanently Delete Successfull', 'Success');
        return back();
      }else{
        Toastr::error('User Permanently Delete Failed', 'Error');
        return back();
      }
    }
}
