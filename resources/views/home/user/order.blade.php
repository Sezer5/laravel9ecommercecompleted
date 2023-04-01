@extends('layouts.frontbase')

@section('title', 'Order Page')


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

                <div class="brands_products"><!--brands_products-->
                    <h2>Brands</h2>
                    <div class="brands-name">
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#"> <span class="pull-right">(50)</span>Acne</a></li>
                            <li><a href="#"> <span class="pull-right">(56)</span>Grüne Erde</a></li>
                            <li><a href="#"> <span class="pull-right">(27)</span>Albiro</a></li>
                            <li><a href="#"> <span class="pull-right">(32)</span>Ronhill</a></li>
                            <li><a href="#"> <span class="pull-right">(5)</span>Oddmolly</a></li>
                            <li><a href="#"> <span class="pull-right">(9)</span>Boudestijn</a></li>
                            <li><a href="#"> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
                        </ul>
                    </div>
                </div><!--/brands_products-->

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
        <form action="{{route("shopcart.storeorder")}}" method="post">
            @csrf
            <div class="col-sm-4 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Payment Informations</h2>
                    <table>
                        <tr>
                            <td>Total:</td>
                            <td><input type="text" name="total" value="{{$total}}" readonly></td>
                        </tr>
                        <tr>
                            <td>Card Holder</td>
                            <td><input type="text" name="holder"></td>
                        </tr>
                        <tr>
                            <td>Card Number:</td>
                            <td><input type="text" name="number"></td>
                        </tr>
                        <tr>
                            <td>Exp. Date:</td>
                            <td><input type="text" name="date"></td>
                        </tr>
                        <tr>
                            <td>Sec. Code:</td>
                            <td><input type="text" name="code"></td>
                        </tr>
                    </table>
                </div><!--features_items-->





            </div>
            <div class="col-sm-5 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Shipping Information</h2>

                    <table>
                        <tr>
                            <td>Name:</td>
                            <td><input type="text" name="name" value="{{Auth::user()->name}}"></td>
                        </tr>
                        <tr>
                            <td>E-mail:</td>
                            <td><input type="text" name="email"></td>
                        </tr>
                        <tr>
                            <td>Telephone:</td>
                            <td><input type="text" name="phone"></td>
                        </tr>
                        <tr>
                            <td>Adress:</td>
                            <td><input type="text" name="address"></td>
                        </tr>
                        <tr>

                            <td colspan="2"><button type="submit" class="btn-warning btn" style="float: right">Apply Order</button></td>
                        </tr>

                    </table>

                </div><!--features_items-->
            </div><!--features_items-->
        </form>



    </div>
    </div>
    </div>
@endsection
