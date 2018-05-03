@extends('layouts.layout')
@section('title') E-Shopper @endsection
@section('content')
    <div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Последние товары</h2>
            @foreach($goods as $good)
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/home/{{ $good->image }}" width="225" height="240">
                                <h2>{{ $good->price }}$</h2>
                                <p><a href="{{ url('good/' . $good->id) }}">{{ $good->name }}</a></p>
                                <form action="{{ url('cart/add') }}" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="quantity" value="1">
                                    <input type="hidden" name="userId" value="{{ Auth::id() }}">
                                    <input type="hidden" name="goodId" value="{{ $good->id }}">
                                    <button class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</button>
                                </form>
                            </div>
                            @if($good->is_new)
                                <img src="{{ asset('images/home/new.png') }}" class="new" alt=""/>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div><!--features_items-->


        <div class="recommended_items"><!--recommended_items-->
            <h2 class="title text-center">Рекомендуемые товары</h2>

            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="item active">
                        @foreach($recommended as $good)
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{ asset('images/home/' . $good->image) }}">
                                            <h2>${{ $good->price }}</h2>
                                            <p>
                                                <a href="{{ url('good/' . $good->id) }}">
                                                    {{ $good->name }}
                                                </a>
                                            </p>
                                            <form action="{{ url('cart/add') }}" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="quantity" value="1">
                                                <input type="hidden" name="userId" value="{{ Auth::id() }}">
                                                <input type="hidden" name="goodId" value="{{ $good->id }}">
                                                <button class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div><!--/recommended_items-->
        </div>
    </div>
@endsection