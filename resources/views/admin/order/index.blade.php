@extends('layouts.admin.master')
@section('title','Orders List')
@section('content')
	<div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="sparkline8-list tableCollor">
                <div class="sparkline8-hd">
                    <div class="main-sparkline8-hd">
                        <div class="row"> 
                            <div class="col-md-6">
                                <h1 class="h1collor">Order List</h1>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <form class="form-group" action="">
                                        <div class="col-md-10 ">
                                            <input type="text" value="{{ request()->search}}" name="search" class="form-control" placeholder="Search here.... ">
                                        </div>
                                        <div class="col-md-2">
                                            <button class="btn btn-info" type="submit">Search</button>
                                        </div>
                                    </form>

                                </div>
                            </div>

                        </div>
                        @include('layouts.admin._message')
                    </div>
                </div>
                <div class="sparkline8-graph tableCollor">
                    <div class="static-table-list">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th>Invoice Id</th>
                                    <th>Client</th>
                                    <th>Shipping Address</th>
                                    <th>Total amount</th>
                                    <th>Payment Status</th>
                                    <th>Order Status</th>
                                    <th>Order Date</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $id=>$order)
	                                <tr>
	                                    <td>{{ $orders->firstItem() + $id }}</td>
	                                    <td>{{ $order->invoice_id}}</td>
                                        @if(isset($order->client->name))
                                        <td>{{ $order->client->name}}</td>
                                        @else
                                        <td>Null</td>
                                        @endif
                                        @if(isset($order->client->name))
                                        <td>{{ $order->client->address}}</td>
                                        @else
                                        <td>Null</td>
                                        @endif
                                        <td>{{ $order->total_ammount}}</td>
                                        <td>{{ $order->payment_status}}</td>
                                        <td>{{ $order->status}}</td>
	                                    <td>{{ $order->created_at }}</td>
                                        <td>
                                            <button class="btn btn-info btn-sm">View</button>
                                        </td>
	                                    
	                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="text-center">
                        {{ $orders->render()}}                        	
                        </div>>
                    </div>
                </div>
            </div>
        </div>
	</div>
@endsection