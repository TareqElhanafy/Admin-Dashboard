@extends('layouts.admin')
@section('content')
@if(!$services->count()>0)
<strong>Sorry you should add some servcies first</strong>
<br>
 <a  href="{{route('services.create')}}">Click Here To add some services</a>
 @else
 <div class="box-header">
    <h3 class="box-title">Create new client</h3>
  </div>
<form role="form" action="{{isset($client)?route('clients.update',$client->id):route('clients.store')}}" method="post" enctype="multipart/form-data">
  @csrf
@if(isset($client))
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
                      <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="enter title" value="{{isset($client)?$client->title:''}}">
                    </div>

<div class="form-group">
  <label for="description">Description</label>
<textarea name="description" class="form-control" id="" cols="30" rows="10" placeholder="enter description" value="" >{{isset($client)?$client->description:''}}</textarea></div>
<div class="form-group">
  <label for="status">Status</label>
  <input type="text" name="status" class="form-control"  placeholder="enter status" value="{{isset($client)?$client->status:''}}">
</div>
<div class="form-group">
  <label for="status">Services</label>
  <select class="form-control " name="services[]" id="" multiple>
      @foreach($services as $service)
      <option value="{{$service->id}}">{{$service->type}}</option>
      @endforeach
  </select>
</div>
<div class="form-group">
  <label for="phone">Phone Number</label>
  <input type="number" name="phone" class="form-control"  placeholder="enter phone number" value="{{isset($client)?$client->phone:''}}">
</div>
<div class="form-group">
  <label for="date">Contract Start Date</label>
  <input type="date" name="contract_start_date" class="form-control"  placeholder="pick contract start date" value="{{isset($client)?$client->contract_start_date:''}}">
</div>
<div class="form-group">
  <label for="date">Contract End Date</label>
  <input type="date" name="contract_end_date" class="form-control" placeholder="pick contract end date" value="{{isset($client)?$client->contract_end_date:''}}">
</div>
<div class="form-group">
                      <button type="submit" class="btn btn-primary">{{isset($client)?'update':'Add new client'}}</button>
    </div>
                </form>
@endif
@endsection