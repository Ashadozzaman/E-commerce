 <div class="form-group-inner color">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <label class="login2 pull-right pull-right-pro">Name</label>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <input type="text" name="name" value="{{ old('name',isset($vandor->name)?$vandor->name:null)}}" class="form-control" />
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
            <input type="text" name="email" value="{{ old('email',isset($vandor->email)?$vandor->email:null)}}" class="form-control" />
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
            <label class="login2 pull-right pull-right-pro">Address</label>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <input type="text" name="address" value="{{ old('address',isset($vandor->address)?$vandor->address:null)}}" class="form-control" />
         @error('address')
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
            <label class="login2 pull-right pull-right-pro">Status</label>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <select name="status" class="form-control">
                <option value="">Select Status</option>>
                <option 
                @if(old('status',isset($vandor)?$vandor->status:null) == 'active') selected @endif
                value="active">Published
                </option>
                <option
                @if(old('status',isset($vandor)?$vandor->status:null) == 'inactive') selected @endif

                    value="inactive">Unpublished
                </option>
            </select>
            @error('status')
            <div class="text-danger">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
</div>