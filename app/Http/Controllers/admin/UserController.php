<?php

namespace App\Http\Controllers\admin;

use App\Notifications\CreateNewUser;
use Illuminate\Support\Facades\Notification;
use App\Notifications\RegistrationApproveUser;
use App\Notifications\RegistrationRejectUser;

use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;
use Brian2694\Toastr\Facades\Toastr;

use Illuminate\Support\Facades\Crypt;

use App\UserRole;
use App\User;
use Carbon\Carbon;
use Session;

class UserController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
      $this->middleware('admin');
    }

    public function index()
    {
      $allUser=User::orderBy('id','DESC')->get();
      return view('admin.user.all',compact('allUser'));
    }



    public function create()
    {
      $allRole=UserRole::where('status',1)->get();
      return view('admin.user.add',compact('allRole'));
    }



    public function store(Request $request)
    {
      $this->validate($request,[
        'name'=>'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'role' => 'required',
        //'phone' => 'required|min:11|regex:/^01[3-9]\d{8}$/|unique:users',
        'password' => 'required|string|min:6|confirmed',
      ],[
        'name.required'=>'Please enter your name.',
        'email.required'=>'Please enter your email address.',
        'role.required'=>'Please select user role.',
        //'phone.required'=>'Please enter your phone number.',
      ]);

        $user = new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->role_id=$request->role;
        $user->phone=$request->phone;
        $user->password=Crypt::encrypt($request->password);
        $user->save();

        $user->notify(new CreateNewUser($user));

        Toastr::success('User Registration Success', 'Success');
        return redirect()->back();

        Toastr::error('User Registration Failed', 'Error');
        return redirect()->back();

      // $inserts=User::create([
      //   'name'=>$request['name'],
      //   'email'=>$request['email'],
      //   'role_id'=>$request['role'],
      //   'phone'=>$request['phone'],
      //   'password'=>Hash::make($request['password']),
      //   'created_at'=>Carbon::now()->toDateTimeString(),
      // ]);

      //Notification send
       //$inserts->notify(new CreateNewUser($inserts));
      //Notification send end

      // if($inserts){
      //   //$insert->notify(new CreateNewUser($insert));
      //   Toastr::success('User Registration Success', 'Success');
      //   return redirect('admin/user/create');
      // }else{
      //   Toastr::error('User Registration Failed', 'Error');
      //   return redirect('admin/user/create');
      // }
    }



    public function show(User $user)
    {
      //return $user;
      //$data=User::where('id',$id)->firstOrFail(); //resource controller create korle o sathe model bole dile ei line auto metic laravel kore dey $user variable er majei.
      return view('admin.user.view',compact('user'));
    }


    public function edit(User $user)
    {
      $allRole=UserRole::where('status',1)->get();
      return view('admin.user.edit',compact('user','allRole'));
    }


    public function update(Request $request, User $user)
    {
      $this->validate($request,[
        'name'=>'required|string|max:255',
        'role' => 'required',
        //'phone' => 'required|min:11|regex:/^01[3-9]\d{8}$/|unique:users',
      ],[
        'name.required'=>'Please enter your name.',
        'role.required'=>'Please select user role.',
        //'phone.required'=>'Please enter your phone number.',
      ]);

      $user->name=$request->name;
      $user->role_id=$request->role; //ei role hole html form er name role.
      $user->phone=$request->phone;

      $update=$user->save();

      if($update){
        Toastr::success('User Update Successfull', 'Success');
        return redirect('admin/user/'.$user->id);
        //return redirect('admin/user/'.$user->id.'/edit');
        //return back();
      }else{
        Toastr::error('User Update Failed', 'Error');
        return redirect('admin/user/'.$user->id.'/edit');
        //return back();
      }
    }


    public function destroy(User $user)
    {
      $delete = $user->delete();

      if($delete){
        Toastr::success('Soft Delete Successfull', 'Success');
        return back();
      }else{
        Toastr::error('Soft Delete Failed', 'Error');
        return back();
      }
    }


    public function pending()
    {
      $users=User::where('status',false)->get();
      return view('admin.user.pendingUser',compact('users'));
    }


    public function status($id){
      $users=User::find($id);

      if($users->status==false){
        $users->status=true;
        $users->save();

        //notification send
        $users->notify(new RegistrationApproveUser($users));
        //notification end
        Toastr::success('Request approved successfull', 'Success');
        return back();
      }else{
        $users->status=false;
        $users->save();

        $users->notify(new RegistrationRejectUser($users));

        // Toastr::error('Request rejected successfull', 'Error');
        Toastr::success('Request rejected successfull', 'Success');
        return back();
      }
    }
}
