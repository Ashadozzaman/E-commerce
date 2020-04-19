@extends('layouts.admin.master')
@section('title','Edit Admin User details')
@section('content')
	
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="sparkline12-list">
            <div class="sparkline12-hd">
                <div class="main-sparkline12-hd">
                    <h1 style="color: #fff">Edit Form</h1>
                </div>
            </div>
            <div class="sparkline12-graph">
                <div class="basic-login-form-ad">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="all-form-element-inner">
                                <form action="{{route('user.update',$user->id)}}" method="post" enctype="multipart/form-data">
                                	@csrf
                                    @method('put')
                                   @include('admin.user._form')
                                    <div class="form-group-inner color">
                                        <div class="login-btn-inner">
                                            <div class="row">
                                                <div class="col-lg-3"></div>
                                                <div class="col-lg-9">
                                                    <div class="login-horizental cancel-wp pull-left">
                                                        <button class="btn btn-white" type="submit">Cancel</button>
                                                        <button class="btn btn-sm btn-primary login-submit-cs" type="submit">Update</button>
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