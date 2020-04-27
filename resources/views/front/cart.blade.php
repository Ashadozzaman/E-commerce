@extends('layouts.front.master')
@section('title','Cart Details Page')
    @section('custom-js')
    <script src="{{ asset('js/front/cart.js')}}"></script>
    @endsection
@section('content')
  <!-- breadcrumb start-->
  <section class="breadcrumb breadcrumb_bg">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-lg-12">
                  <div class="breadcrumb_iner">
                      <div class="breadcrumb_iner_item">
                          <p>Home/Shop/Single product/Cart list</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- breadcrumb start-->

  <!--================Cart Area =================-->
  <section class="cart_area section_padding">
    <div class="container">
      <div class="cart_inner">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
              </tr>
            </thead>
            <tbody id="showDetailsCart">
            </tbody>
          </table>
          <div class="col-lg-12">
          <h2>Billing Address</h2>
      	 		<div class="col-md-12">
                    <div class="form-group">
                      <input type="text" class="form-control" name="name" id="input-name" placeholder="Your Full name" />
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="email" class="form-control" name="email" id="input-email" placeholder="Email Address" />
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" class="form-control" name="phone" id="input-phone" placeholder="Phone Number" />
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <textarea class="form-control" name="address" id="input-address" rows="3" placeholder="Address"></textarea>
                    </div>
                  </div>
          </div>
          <div class="price" style="margin-left:  950px;">
          	<h3>Total Price:<span  class="total">0</span></h3>
          </div>
     
          <div class="checkout_btn_inner float-right">
            <a class="btn_1" href="#">Continue Shopping</a>
            <button class="btn_1 checkout_btn" id="checkoutBtn" cus-url="{{ route('checkout.submit')}}">Proceed to checkout</button>
          </div>
        </div>
      </div>
  </section>
  <url val="{{route('payment.index')}}"></url>
  <!--================End Cart Area =================-->
@endsection