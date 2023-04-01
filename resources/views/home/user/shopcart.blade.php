@extends('layouts.frontbase')

@section('title', 'User Shopcart')


@section('content')
    <div class="row">
        <div class="col-sm-3">
            <div class="left-sidebar">
                <h2>Category</h2>
                <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                    <div class="panel panel-default">
                        @php
                            $mainCategories = \App\Http\Controllers\HomeController::maincategorylist()
                        @endphp
                        @foreach($mainCategories as $rs)
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordian" href="#{{$rs->title}}">
                                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                        {{$rs->title}}
                                    </a>
                                </h4>
                            </div>
                            <div id="{{$rs->title}}" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        @if(count($rs->children))
                                            @include('home.categorytree',['children' =>$rs->children])
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordian" href="#mens">
                                    <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                    Mens
                                </a>
                            </h4>
                        </div>
                        <div id="mens" class="panel-collapse collapse">
                            <div class="panel-body">
                                <ul>
                                    <li><a href="#">Fendi</a></li>
                                    <li><a href="#">Guess</a></li>
                                    <li><a href="#">Valentino</a></li>
                                    <li><a href="#">Dior</a></li>
                                    <li><a href="#">Versace</a></li>
                                    <li><a href="#">Armani</a></li>
                                    <li><a href="#">Prada</a></li>
                                    <li><a href="#">Dolce and Gabbana</a></li>
                                    <li><a href="#">Chanel</a></li>
                                    <li><a href="#">Gucci</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>


                </div><!--/category-products-->
                @include('home.user.usermenu')


                <div class="price-range"><!--price-range-->
                    <h2>Price Range</h2>
                    <div class="well text-center">
                        <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                        <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
                    </div>
                </div><!--/price-range-->

                <div class="shipping text-center"><!--shipping-->
                    <img src="{{asset('assets')}}/images/home/shipping.jpg" alt="" />
                </div><!--/shipping-->

            </div>
        </div>

        <div class="col-sm-9 padding-right">
            <div class="table-responsive">
                <table class="table table-bordered" style="width: 100%">
                    <thead>
                    <tr class="cart_menu">
                        <td>Item</td>
                        <td>Item Name</td>
                        <td>Price</td>
                        <td>Quantity</td>
                        <td>Delete</td>
                        <td>Total</td>
                    </tr>
                    </thead>
                    <tbody>
                    @php($total=0)
                    @foreach($data as $rs)
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
                                <form action="{{route('shopcart.update',['id'=>$rs->id])}}" method="post">
                                    @csrf
                                    <input name="quantity" type="number" value="{{$rs->quantity}}" class="form-control" min="1" max="{{$rs->product->quantity}}" onchange="this.form.submit()">
                                </form>
                            </td>
                            <td>
                                <a href="{{route('shopcart.destroy',['id'=>$rs->id])}}"><button type="submit" class="btn-danger btn">X</button></a>
                            </td>
                            <td>
                                <p>{{$rs->quantity * $rs->product->price}}</p>
                            </td>
                        </tr>
                        @php($total+=$rs->product->price * $rs->quantity)
                    @endforeach
                    <tr>
                        <td colspan="5">Subtotal:</td>
                        <td>{{$total}}</td>
                    </tr>
                    <tr>
                        <td colspan="5">Order:</td>
                        <td style="text-align: center;">
                            <form action="{{route("shopcart.order")}}" method="post">
                                @csrf
                                <input type="text" name="total" value="{{$total}}" hidden>
                                <button type="submit " class="btn  btn-warning">Order</button>
                            </form>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>





        </div>
    </div>
    </div>
@endsection
