 <div class="form-group-inner color">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <label class="login2 pull-right pull-right-pro">Name</label>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <input type="text" name="name" value="{{ old('name',isset($user->name)?$user->name:null)}}" class="form-control" />
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
            <input type="text" name="email"
            @isset($user) disabled="disabled" style="color: #000" @endisset 
            value="{{ old('email',isset($user->email)?$user->email:null)}}" class="form-control" />
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
            @if(isset($user) && $user->image != null)
            <img src="{{ asset($user->image)}}" class="img-fluid">
            @endif
        </div>
    </div>
</div>