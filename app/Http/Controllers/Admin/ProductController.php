<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create(){
        $categories=Category::all();
        return view('admin.product.create',compact('categories'));
//        return redirect(route('create.product',compact('categories')));
    }
    public function store(Request $request){
        $this->validate($request,['title:required','desc'=>'required']);

        $filename='';
        if ($request->hasFile('default_picture')){
            $filename=$request->file('default_picture')->store('products',['disk'=>'public']);
        }
        $products=new Products();
        $products->category_id=$request->category_id;
        $products->title=$request->title;
        $products->desc=$request->desc;
        $products->price=$request->price;
        $products->stock=$request->stock;
        $products->default_picture=$filename;
//        dd($request->all());
        $products->save();

        return redirect(route('show.product'));
    }
    public function show(Request $request){
        $products=Products::when($request->category_id!='',function ($q) use ($request){
            return $q->where('category_id',$request->category_id);
        })->when($request->title!='',function ($q) use ($request){
            return $q->where('title','Like','%'.$request->title.'%');
        })->paginate(20);
//        $products=Products::all();


        $categories=Category::all();



        return view('admin.product.show',compact('products','categories'));
    }
}
