<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Http\Requests\AdminLoginRequest;
use App\Http\Requests\ResetAdminPasswordRequest;
use App\Mail\ResetAdminPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
class AdminController extends Controller
{
    public function home(){
        return view('admin.home');
    }

    public function login(){
        return view('admin.login');
    }
    public function dologin(AdminLoginRequest $request){

              $remember=request()->remember==1 ? true : false;
          $email=$request->email;
          $password=$request->password;
        if (Auth::guard('admin')->attempt(['email'=>$email,'password'=>$password],$remember)) {
            return redirect('/admin');
        }else {
            return redirect('/admin/login');
        }
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect(route('loginPage'));
    }
    
public function forget(){
    return view('admin.forget');
}
public function sendpasswordemail(){
    $admin=Admin::where('email',request()->email)->first();
if ($admin) {
    DB::transaction(function() use($admin){
        $admin->Password_token=Admin::generateToken();
        $admin->save();
    });
    Mail::to($admin->email)->send(new ResetAdminPassword($admin));
        return redirect(route('dashboard'));

    session()->flash('success','please check your mail to reset your password');
}else {
    return redirect(route('Aviewforget'));
}}

public function verify($token){
    $admin=Admin::where('Password_token',$token)->firstOrFail();
    if($admin){
        $admin->Password_token=null;
        $admin->save();
        return redirect(route('newresetpassword',$admin->id));
    }else{
        return redirect(route('Aviewforget'));
    }
}

public function viewNewReset(Admin $admin){
    return view('admin.resetpage')->with('admin',$admin);
}

public function doreset(ResetAdminPasswordRequest $request){
$admin=Admin::where('email',$request->email)->firstOrFail();
if($admin){
    $admin->password=bcrypt($request->password);
    $admin->save();
    
    return redirect(route('loginPage'));
}else {
    return redirect(route('Aviewforget'));
}


}
}
