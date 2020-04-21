@extends('layouts.admin.master')
@section('title','Categories List')
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
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $id=>$category)
	                                <tr>
	                                    <td>{{$categories->firstItem() + $id }}</td>
	                                    <td>{{ $category->name}}</td>
	                                    <td>{{ $category->description }}</td>
	                                    <td>{{ $category->status }}</td>
	                                    <td>
	                                    	<a href="{{route('category.edit',$category->id)}}"><button class="btn btn-primary btn-sm">Edit</button></a>
	                                    	<form action="{{ route('category.destroy',$category->id)}}" method="post">
	                                    		@csrf
	                                    		@method('delete')
	                                    	<button class="btn btn-info btn-sm" onclick="return confirm('Are you sure delete this?')">Delete</button>

	                                    	</form>
	                                	</td>
	                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- {{ $categories->links()}} -->
                        <div class="text-center">
                        {{ $categories->render()}}                        	
                        </div>>
                    </div>
                </div>
            </div>
        </div>
	</div>
@endsection