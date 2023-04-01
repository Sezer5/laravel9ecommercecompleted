<!-- resources/views/child.blade.php -->

@extends('layouts.adminbase')

@section('title', 'Show Order')

@section('content')

    <!-- Right side column. Contains the navbar and content of the page -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Examples</a></li>
                <li class="active">Blank page</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">

            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Quick Example</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <div class="table-responsive">
                            <table class="table table-bordered" style="width: 100%">
                                <thead>
                                <tr class="cart_menu">
                                    <td>Item</td>
                                    <td>Item Name</td>
                                    <td>Price</td>
                                    <td>Quantity</td>
                                    <td>Total</td>

                                </tr>
                                </thead>
                                <tbody>
                                @php($total=0)
                                @foreach($orderproducts as $rs)
                                    <tr>
                                        <td>
                                            <img src="{{Storage::url($rs->product->image)}}" style="width:30px;">
                                        </td>
                                        <td>
                                            <h4><a href="">{{$rs->product->title}}</a></h4>
                                            <p>Web ID: 1089772</p>
                                        </td>
                                        <td>
                                            <p>${{$rs->product->price}}</p>
                                        </td>
                                        <td>

                                            {{$rs->quantity}}

                                        </td>
                                        <td>
                                            <p>{{$rs->quantity * $rs->product->price}}</p>
                                        </td>

                                    </tr>
                                    @php($total+=$rs->product->price * $rs->quantity)
                                @endforeach
                                <tr>
                                    <td colspan="4">Subtotal:</td>
                                    <td>{{$total}}</td>
                                </tr>
                                <tr>
                                    <td colspan="4">Order Status & Notes:</td>
                                    <form action="{{route('admin.order.update',['id'=>$order->id])}}" method="post">
                                        @csrf
                                        <td>
                                            <select name="status" class="form-control">
                                                <option selected>{{$order->status}}</option>
                                                <option value="New">New</option>
                                                <option value="Accepted">Accepted</option>
                                                <option value="Shipped">Shipped</option>
                                                <option value="Completed">Completed</option>
                                                <option value="Cancelled">Cancelled</option>
                                            </select>
                                        </td>
                                        <td>
                                            <textarea name="note" id="" cols="30" rows="10" class="form-control">{{$order->note}}</textarea>
                                        </td>
                                        <td><button class="btn btn-success" type="submit">Change</button></td>
                                    </form>
                                </tr>

                                </tbody>
                            </table>
                        </div>

                    </div><!-- /.box -->
                </div>
            </div>

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

@endsection
