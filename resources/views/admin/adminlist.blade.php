@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-xs-12">
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Admin List</h3>
  </div>
  <div class="box-body">
    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                        <thead>
                          <tr role="row">
                            <th class="sorting_desc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" aria-sort="descending">Admin Name</th>
  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Admin Email</th>


                          </thead>
                        <tbody>
                      @foreach($admins as $admin)
                        <tr role="row" class="odd">
                            <td class="sorting_1"> 
                              {{$admin->name}}
                            </td>
                              <td>{{$admin->email}}</td>
                              <td><a class="btn btn-warning" href="{{route('admins.edit',$admin->id)}}">Edit</a></td>
                              
                              <td>
                                <form action="{{route('admins.destroy',$admin->id)}}" method="post">
                                  @csrf 
                                  @method('DELETE');
                                <button type="submit" class="btn btn-danger" >Delete</button>
                                </form>
                              </td>

                       
                          </tr>
                          @endforeach
                        </tbody>

                      </table>
                    </div>
                  </div>
                  <div class="row">
                    <!-- <div class="col-sm-5">
                      <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                    </div> -->
                    <div class="col-lg-8 text-center">
                      <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
              {{$admins->links()}}
                  </div>
                </div>
              </div>
            </div>
  </div>
</div>
    </div>
  </div>




@endsection