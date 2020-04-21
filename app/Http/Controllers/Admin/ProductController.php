<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\Vandor;
use App\ProductImage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = Product::orderBy('id','desc')->paginate('4');
        // $data = Product::count();
        // dd($data);
        return view('admin.product.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::all();
        $data['vandors'] = Vandor::all();
        return view('admin.product.create',$data);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
            'name'=>'required',
            'category_id'=>'required',
            'vandor_id'=>'required',
            'brand'=>'required',
            'status'=>'required|enum:'.Product::ACTIVE_STATUS.','.Product::INACTIVE_STATUS,
            'description'=>'required',
            'stock'=>'required|int',
            'unit_price'=>'required',
            'image.*'=>'mimes:jpep,png,webp',

       ]);

       DB::beginTransaction();
       try{
            $data = $request->except(['_token']);
           // dd($data);
           $product = Product::create($data);

           if ($request->hasfile('image')) {
                foreach($request->image as $file){
                    $path = 'images/product';
                    $file_name = time().rand(0000,9999).'.'.$file->getClientOriginalExtension();
                    $file->move($path,$file_name);
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image' => $path.'/'.$file_name,
                    ]);    

                } 
            }
            DB::commit();

       }catch(\Exception $exception){
        DB::rollback();
        Log::error($exception->getMessage());
       }
       
       session()->flash('message','Product create successfully');
        return redirect()->route('product.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $data['product'] = $product;
        $data['categories'] = Category::all();
        $data['vandors'] = Vandor::all();
        return view('admin.product.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'=>'required',
            'category_id'=>'required',
            'vandor_id'=>'required',
            'brand'=>'required',
            'status'=>'required',
            'description'=>'required',
            'stock'=>'required',
            'unit_price'=>'required',
       ]);

       $data = $request->except(['_token']);
       // dd($data);
       $product->update($data);
       session()->flash('message','Product Update successfully');
        return redirect()->route('product.index');
        // if (file_exists($post->image))
        //     {
        //         unlink($post->image);
        //     }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
       $product->delete();
       session->flash('message','Deleted Product');
       return redirect()->back();
    }
}
