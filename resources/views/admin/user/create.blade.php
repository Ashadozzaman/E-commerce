@extends('layouts.admin.master')
@section('title','Create New Admin')
@section('content')
	
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="sparkline12-list">
            <div class="sparkline12-hd">
                <div class="main-sparkline12-hd">
                    <h1 style="color: #fff">All Form Element</h1>
                </div>
            </div>
            <div class="sparkline12-graph">
                <div class="basic-login-form-ad">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="all-form-element-inner">
                                <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
                                	@csrf
                                    <div class="form-group-inner color">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <label class="login2 pull-right pull-right-pro">Name</label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                <input type="text" name="name" value="{{ old('name')}}" class="form-control" />
                                             @error('name')
		                                        <div class="text-danger">
		                                        	{{ $message }}
		                                        </div>
	                                        @enderror
                                            </div>
                                        </div>
                                       
                                    </div>

                                    <div class="form-group-inner color">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <label class="login2 pull-right pull-right-pro">Email</label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
		                                        <input type="text" name="email" value="{{ old('email')}}" class="form-control" />
		                                        @error('email')
		                                        <div class="text-danger">
		                                        	{{ $message }}
		                                        </div>
		                                        @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group-inner color">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <label class="login2 pull-right pull-right-pro">Password</label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                <input type="password" name="password"  class="form-control" />
		                                        @error('password')
		                                        <div class="text-danger">
		                                        	{{ $message }}
		                                        </div>
		                                        @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group-inner color">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <label class="login2 pull-right pull-right-pro">Confirm Password</label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                <input type="password" name="password_confirmation"  class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                     <div class="form-group-inner color">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <label class="login2 pull-right pull-right-pro">Image</label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
		                                        <input type="file" name="image"  class="form-control" />
		                                        @error('image')
		                                        <div class="text-danger">
		                                        	{{ $message }}
		                                        </div>
		                                        @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group-inner color">
                                        <div class="login-btn-inner">
                                            <div class="row">
                                                <div class="col-lg-3"></div>
                                                <div class="col-lg-9">
                                                    <div class="login-horizental cancel-wp pull-left">
                                                        <button class="btn btn-white" type="submit">Cancel</button>
                                                        <button class="btn btn-sm btn-primary login-submit-cs" type="submit">Save User</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
	
@endsection