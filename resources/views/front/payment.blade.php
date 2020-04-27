@extends('layouts.front.master')
@section('title','Makeing Payment Page')
@section('content')
	  <!-- breadcrumb start-->
  <section class="breadcrumb breadcrumb_bg">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-lg-12">
                  <div class="breadcrumb_iner">
                      <div class="breadcrumb_iner_item">
                          <p>Home / tracking</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- breadcrumb start-->

  <!--================Tracking Box Area =================-->
  <section class="tracking_box_area section_padding">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-lg-12">
          <div class="tracking_box_inner">
            <form class="row tracking_form" action="#" method="post" novalidate="novalidate">
              <div class="col-md-12 form-group">
                <input type="text" class="form-control" id="order" name="order" placeholder="Order ID">
              </div>
              <div class="col-md-12 form-group">
                <input type="email" class="form-control" id="email" name="email" placeholder="Billing Email Address">
              </div>
              <div class="col-md-12 form-group">
                <a href="{{route('payment.init',$order->id)}}" class="btn_3">Making Payment</a>
              </div>
            </form>
          </div>
        </div>

      </div>

    </div>
  </section>
@endsection