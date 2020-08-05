@extends('layouts.admin')
@section('content')
<form role="form" action="{{isset($admin)?route('admins.update',$admin->id):route('admins.store')}}" method="post" enctype="multipart/form-data">
  @csrf
@if(isset($admin))
@method('PUT')
@endif
  @if($errors->any())
  <div class="callout callout-danger">
<h4>Warning!</h4>
@foreach($errors->all() as $error)

<p>{{$error}}</p>
@endforeach
</div>
  @endif
                  <div class="box-body">
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="enter admin name" value="{{isset($admin)?$admin->name:''}}">
                    </div>

<div class="form-group">
  <label for="name">Email</label>
  <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="enter admin email" value="{{isset($admin)?$admin->email:''}}">
</div>
<div class="form-group">
  <label for="password">Password</label>
  <input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="{{isset($admin)?'update admin password' : 'enter admin password'}}" value="">
</div>
<div class="form-group">
                      <button type="submit" class="btn btn-primary">{{isset($admin)?'update':'Add new admin'}}</button>
    </div>
                </form>

@endsection