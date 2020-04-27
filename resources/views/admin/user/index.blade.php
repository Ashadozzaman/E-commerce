@extends('layouts.admin.master')
@section('title','Admin List')
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
                                    <th>Role</th>
                                    <th>Email</th>
                                    <th>Image</th>
                                    @can('admin', auth()->user())
                                    <th>Action</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $id=>$user)
	                                <tr>
	                                    <td>{{$users->firstItem() + $id }}</td>
	                                    <td>{{$user->name}}</td>
                                        <td>{{$user->role}}</td>

	                                    <td>{{$user->email }}</td>
	                                    <td><img style="width: 100px" class="img-fluid" src="{{ asset($user->image)}}" /></td>
                                        @can('admin', auth()->user())
                                        <td>
                                            <a href="{{route('user.edit',$user->id)}}"><button class="btn btn-primary btn-sm">Edit</button></a>
                                            <form action="{{ route('user.destroy',$user->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                            <button class="btn btn-info btn-sm" onclick="return confirm('Are you sure delete this?')">Delete</button>

                                            </form>
                                        </td>
                                        @endcan
	                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- {{ $users->links()}} -->
                        <div class="text-center">
                        {{ $users->render()}}                        	
                        </div>>
                    </div>
                </div>
            </div>
        </div>
	</div>
@endsection