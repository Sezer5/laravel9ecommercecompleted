  <!-- resources/views/child.blade.php -->

  @extends('layouts.adminbase')

  @section('title', 'Order List')

  @section('content')

  <!-- Right side column. Contains the navbar and content of the page -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1>
              Order List
          </h1>
          <ol class="breadcrumb">
              <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="#">Examples</a></li>
              <li class="active">Blank page</li>
          </ol>
      </section>

      <!-- Main content -->
      <section class="content">

          <!-- Default box -->
          <div class="row">

                  <div class="col-md-12">
                      <div class="box">
                          <table class="table table-striped table-bordered">
                              <tbody>
                                  <tr>
                                      <th style="width: 10px">Id</th>
                                      <th>User</th>
                                      <th>Name</th>
                                      <th>E-mail</th>
                                      <th>Address</th>
                                      <th>Phone</th>
                                      <th>Status</th>
                                      <th>Edit</th>
                                      <th>Delete</th>
                                      <th>Show</th>
                                  </tr>
                                  @foreach($data as $rs)
                                  <tr>
                                      <td>{{$rs->id}}</td>
                                      <td>{{$rs->user->name}}</td>
                                      <td>{{$rs->name}}</td>
                                      <td>{{$rs->email}}</td>
                                      <td>{{$rs->address}}</td>
                                      <td>{{$rs->phone}}</td>
                                      <td>{{$rs->status}}</td>
                                      <td><a href="{{route('admin.order.edit',['id'=>$rs->id])}}">Edit</a></td>
                                      <td><a href="{{route('admin.order.destroy',['id'=>$rs->id])}}">Delete</a></td>
                                      <td><a href="{{route('admin.order.show',['id'=>$rs->id])}}">Show</a></td>


                                  </tr>
                                  @endforeach
                              </tbody>
                          </table>
                      </div><!-- /.box -->
                  </div>
              </div><!-- /.box-body -->
      </section><!-- /.content -->
  </div><!-- /.content-wrapper -->

  @endsection
