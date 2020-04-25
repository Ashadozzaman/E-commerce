@extends('layouts.front.master')
@section('title','Home Page')

@section('content')
   <!-- banner part start-->
    <section class="banner_part" >
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="banner_slider">
                        <div class="single_banner_slider">
                            <div class="banner_text">
                                <div class="banner_text_iner">
                                    <h5>Winter Fasion</h5>
                                    <h1>Fashion Collection 2019</h1>
                                    <a href="#" class="btn_1">shop now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner part start-->

    <!-- feature_part start-->
    <section class="feature_part pt-4">
        <div class="container-fluid p-lg-0 overflow-hidden">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-4 col-sm-6">
                    <div class="single_feature_post_text">
                        <img src="{{ asset('img/front/feature_1.png')}}" alt="#">
                        <div class="hover_text">
                            <a href="single-product.html" class="btn_2">shop for male</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="single_feature_post_text">
                        <img src="{{ asset('img/front/feature_2.png')}}" alt="#">
                        <div class="hover_text">
                            <a href="single-product.html" class="btn_2">shop for male</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="single_feature_post_text">
                        <img src="{{ asset('img/front/feature_3.png')}}" alt="#">
                        <div class="hover_text">
                            <a href="single-product.html" class="btn_2">shop for male</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- upcoming_event part start-->

    <!-- new arrival part here -->
    <section class="new_arrival section_padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="arrival_tittle">
                        <h2 class="text-center"> New Product arrival</h2>

                    </div>
                </div>
                
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="new_arrival_iner filter-container">
                        
                        @foreach($new_products as $product)
                        <div class="single_arrivel_item weidth_3 mix shoes women" >
                            <img style="width: 500px;height: 450px" src="{{ asset($product->product_images[0]->image)}}" alt="#">
                            <div class="hover_text">
                                <p>{{ $product->category->name }}</p>
                                <a href="single-product.html">
                                    <h3>{{ $product->name }}</h3>
                                </a>
                                <div class="rate_icon">
                                    <a href="#"> <i class="fa fa-star"></i> </a>
                                    <a href="#"> <i class="fa fa-star"></i> </a>
                                    <a href="#"> <i class="fa fa-star"></i> </a>
                                    <a href="#"> <i class="fa fa-star"></i> </a>
                                    <a href="#"> <i class="fa fa-star"></i> </a>
                                </div>
                                <h5>${{ $product->unit_price }}</h5>
                                <div class="social_icon">
                                    <a href="#"><i class="fa fa-heart"></i></a>
                                    <a href="#" <i class="fa fa-shopping-bag" ></i>
                                    </a>
                                </div>
                                <br>
                                <button class="btn btn-info addToCart"
                                        cus-product-id="{{ $product->id}}"
                                        cus-product-name="{{ $product->name}}"
                                        cus-product-price="{{ $product->unit_price}}"
                                        @if(isset($product->product_images[0]))
                                        cus-product-image="{{ $product->product_images[0]->image}}"
                                        @else
                                        cus-product-image="{{ asset(img/unnamed.png)}}"
                                        @endif
                                        >Add to cart</button>
                            </div>
                        </div>    
                        @endforeach
                    </div>
                </div> 
            </div>
        </div>
    </section>
    <!-- new arrival part end -->

    <!-- new category products shipping here -->
<section class="new_arrival">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="arrival_tittle">
                        <h2 class="text-center">{{$new_category_products->name}} Category Products</h2>
                    </div>    
                </div>
                
            </div>
        </div>
        <div class="container-fluid">
            <div class="col-lg-12">
                <div class="row">
                    
                    @foreach($new_category_products->product as $item)
                    <div class="col-md-4">
                        <div class="new_arrival_iner">
                            <div class="single_arrivel_item " >
                                @if(isset($item->product_images[0]))
                                <img style="width: 500px;height: 400px" src="{{ asset($item->product_images[0]->image)}}" alt="#">
                                @endif
                                <div class="hover_text">
                                    <p>{{$item->category->name}}</p>
                                    <a href="single-product.html"><h3>{{$item->name}}</h3></a>
                                    <div class="rate_icon">
                                        <a href="#"> <i class="fa fa-star"></i> </a>
                                        <a href="#"> <i class="fa fa-star"></i> </a>
                                        <a href="#"> <i class="fa fa-star"></i> </a>
                                        <a href="#"> <i class="fa fa-star"></i> </a>
                                        <a href="#"> <i class="fa fa-star"></i> </a>
                                    </div>
                                    <h5>${{$item->unit_price}}</h5>
                                    <div class="social_icon">
                                        <a href="#"><i class="fa fa-heart"></i></a>
                                        <a href="#"><i class="fa fa-shopping-bag"></i></a>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                    @endforeach   
                </div> 
            </div>
        </div>
    </section>
    <!-- free shipping end -->
    <!-- subscribe_area part start-->
    <section class="instagram_photo">
        <div class="container-fluid>
            <div class="row">
                <div class="col-lg-12">
                    <div class="instagram_photo_iner">
                        <div class="single_instgram_photo">
                            <img src="{{ asset('img/front/instagram/inst_1.png')}}" alt="">
                            <a href="#"><i class="ti-instagram"></i></a> 
                        </div>
                        <div class="single_instgram_photo">
                            <img src="{{ asset('img/front/instagram/inst_2.png')}}" alt="">
                            <a href="#"><i class="ti-instagram"></i></a> 
                        </div>
                        <div class="single_instgram_photo">
                            <img src="{{ asset('img/front/instagram/inst_3.png')}}" alt="">
                            <a href="#"><i class="ti-instagram"></i></a> 
                        </div>
                        <div class="single_instgram_photo">
                            <img src="{{ asset('img/front/instagram/inst_4.png')}}" alt="">
                            <a href="#"><i class="ti-instagram"></i></a> 
                        </div>
                        <div class="single_instgram_photo">
                            <img src="{{ asset('img/front/instagram/inst_5.png')}}" alt="">
                            <a href="#"><i class="ti-instagram"></i></a> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--::subscribe_area part end::-->
@endsection
