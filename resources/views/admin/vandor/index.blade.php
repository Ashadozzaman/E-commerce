@extends('layouts.admin.master')
@section('title','Vandors List')
@section('content')
	<div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="sparkline8-list tableCollor">
                <div class="sparkline8-hd">
                    <div class="main-sparkline8-hd">
                        <h1 class="h1collor">Vandors List</h1>
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
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($vandors as $id=>$vandor)
	                                <tr>
	                                    <td>{{ $vandors->firstItem() + $id}}</td>
	                                    <td>{{ $vandor->name}}</td>
	                                    <td>{{ $vandor->email }}</td>
                                        <td>{{ $vandor->address }}</td>

	                                    <td>{{ $vandor->status }}</td>
	                                    <td>
	                                    	<a href="{{route('vandor.edit',$vandor->id)}}"><button class="btn btn-primary btn-sm">Edit</button></a>
	                                    	<form action="{{ route('vandor.destroy',$vandor->id)}}" method="post">
	                                    		@csrf
	                                    		@method('delete')
	                                    	<button class="btn btn-info btn-sm" onclick="return confirm('Are you sure delete this?')">Delete</button>

	                                    	</form>
	                                	</td>
	                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- {{ $vandors->links()}} -->
                        <div class="text-center">
                        {{ $vandors->render()}}                        	
                        </div>>
                    </div>
                </div>
            </div>
        </div>
	</div>
@endsection