@extends('layouts.admin')
@section('content')
<div class="box-header">
    <h3 class="box-title">Create new service</h3>
  </div>
<form role="form" action="{{isset($service)?route('services.update',$service->id):route('services.store')}}" method="post" enctype="multipart/form-data">
  @csrf
@if(isset($service))
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
                      <label for="title">Title</label>
                      <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="enter title" value="{{isset($service)?$service->title:''}}">
                    </div>

<div class="form-group">
  <label for="description">Description</label>
<textarea name="description" class="form-control" id="" cols="30" rows="10" placeholder="enter description" value="" >{{isset($service)?$service->description:''}}</textarea></div>
<div class="form-group">
  <label for="type">Type</label>
  <input type="text" name="type" class="form-control"  placeholder="enter type" value="{{isset($service)?$service->type:''}}">
</div>
<div class="form-group">
  <label for="type">Link</label>
  <input type="text" name="link" class="form-control"  placeholder="enter link" value="{{isset($service)?$service->link:''}}">
</div>
<div class="form-group">
                      <button type="submit" class="btn btn-primary">{{isset($service)?'update':'Add new service'}}</button>
    </div>
                </form>

@endsection