@extends('layouts.admin.master')
@section('title','Products List')
@section('content')
	<div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="sparkline8-list tableCollor">
                <div class="sparkline8-hd">
                    <div class="main-sparkline8-hd">
                        <h1 class="h1collor">User List</h1>
                        @include('layouts.admin._message')
                    </div>
                </div>
                <div class="sparkline8-graph tableCollor">
                    <div class="static-table-list">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th>Name</th>
                                    <th>Brand</th>
                                    <th>Category</th>
                                    <th>Vandor</th>
                                    <th>Unit Price</th>
                                    <th>Stock</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $id=>$product)
	                                <tr>
	                                    <td>{{ $products->firstItem() + $id }}</td>
	                                    <td>{{ $product->name}}</td>
                                        <td>{{ $product->brand}}</td>
                                        <td>{{ $product->category->name}}</td>
                                        <td>{{ $product->vandor->name}}</td>
                                        <td>{{ $product->unit_price}}</td>
                                        <td>{{ $product->stock}}</td>
	                                    <td>{{ $product->description }}</td>
	                                    <td>{{ $product->status }}</td>
	                                    <td>
                                            <div>
                                                <a href="{{route('product.show',$product->id)}}"><button class="btn btn-primary btn-sm">View</button></a>
                                                <a href="{{route('product.edit',$product->id)}}"><button class="btn btn-primary btn-sm">Edit</button></a>
                                                <form action="{{ route('product.destroy',$product->id)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                <button class="btn btn-info btn-sm" onclick="return confirm('Are you sure delete this?')">Delete</button>

                                                </form>
                                                
                                            </div>
	                                	</td>
	                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- {{ $products->links()}} -->
                        <div class="text-center">
                        {{ $products->render()}}                        	
                        </div>>
                    </div>
                </div>
            </div>
        </div>
	</div>
@endsection