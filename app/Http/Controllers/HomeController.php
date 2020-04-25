<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        //egar loading with including
        $data['new_category_products'] = Category::with(['product'=>function($query){
            return $query->with(['product_images'=>function($query2){
                return $query2->get();
            }])->orderBy('id','desc')->limit(3)->active();
        }])->active()->first();

        $data['new_products'] = Product::with(['category','product_images'])->orderBy('id','desc')->limit(3)->get();
        // dd($data['new_category_products']->product[2]->product_images[0]->image);
        return view('front.home',$data);
    }

    public function shop(){
        $data['categories'] = Category::active()->orderBy('name')->get();
        $data['total_all_products'] = Product::all();
        $data['total_products'] = Product::with(['category','product_images'])->active()->orderBy('id','desc')->paginate('6');
        return view('front.shop',$data);
    }

    public function category( $category_id){
        // dd($category_id);
        $data['categories'] = Category::active()->orderBy('name')->get();
        
        $data['category_products'] = Product::with(['category','product_images'])->where('category_id', $category_id)->active()->orderBy('id','desc')->paginate('6');
        // dd($data);
        return view('front.category_wise',$data);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard');
    }
}
