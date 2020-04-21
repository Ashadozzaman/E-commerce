 <div class="form-group-inner color">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <label class="login2 pull-right pull-right-pro">Name</label>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <input type="text" name="name" value="{{ old('name',isset($product->name)?$product->name:null)}}" class="form-control" />
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
            <label class="login2 pull-right pull-right-pro">Brand</label>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <input type="text" name="brand" value="{{ old('brand',isset($product->brand)?$product->brand:null)}}" class="form-control" />
         @error('brand')
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
            <label class="login2 pull-right pull-right-pro">Vandor Name</label>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <select name="vandor_id" class="form-control">
                <option value="">Select Vandor</option>

                @foreach($vandors as $vandor)
                <option value="{{$vandor->id}}">{{$vandor->name}} </option>
                @endforeach
            </select>
         @error('vandor_id')
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
            <label class="login2 pull-right pull-right-pro">Category Name</label>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">

            <select name="category_id" class="form-control">
                <option value="">Select Category</option>

                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}} </option>
                @endforeach
            </select>
         @error('category_id')
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
            <label class="login2 pull-right pull-right-pro">Description</label>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <textarea name="description" class="form-control">{{ old('description',isset($product->description)?$product->description:null)}}</textarea> 
            @error('description')
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
            <label class="login2 pull-right pull-right-pro">Unit price</label>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <input type="number" step=".01" name="unit_price" value="{{ old('unit_price',isset($product->unit_price)?$product->unit_price:null)}}" class="form-control" />
         @error('unit_price')
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
            <label class="login2 pull-right pull-right-pro">Stock</label>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <input type="number" min="1" name="stock" value="{{ old('stock',isset($product->stock)?$product->stock:null)}}" class="form-control" />
         @error('stock')
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
                <option 
                @if(old('status',isset($product)?$product->status:null) == 'active') selected @endif
                value="active">Published
                </option>
                <option
                @if(old('status',isset($product)?$product->status:null) == 'inactive') selected @endif

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
<div class="form-group-inner color">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <label class="login2 pull-right pull-right-pro">Image</label>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <input type="file" multiple name="image[]" class="form-control" />
         @error('image')
            <div class="text-danger">
                {{ $message }}
            </div>
        @enderror
        @if(isset($prodect) && $product->image != null)
            <img src="{{ asset($product-image)}}}">
        @endif
        </div>
    </div>
</div>