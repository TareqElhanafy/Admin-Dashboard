<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Http\Requests\AddAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index(){
        return view('admin.adminlist')->with('admins',Admin::paginate(4));
    }
    public function create(){
        return view('admin.new');
    }
    public function store(AddAdminRequest $request){
           Admin::create([
               'name'=>$request->name,
               'email'=>$request->email,
               'password'=>Hash::make($request->password)
           ]);
           return redirect(route('admins.index'));
    }

    public function edit(Admin $admin){
        return view('admin.new')->with('admin',$admin);
    }

    public function update(UpdateAdminRequest $request, Admin $admin){
     
       $data=request()->only(['name','email','password']);
       $data['password']=Hash::make($request->password);

        $admin->update($data);
        return redirect(route('admins.index'));
    }
    public function destroy(Admin $admin){
        $admin->delete();
        return redirect(route('admins.index'));
    }
}
