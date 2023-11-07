<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create_category(){
        return view('admin.category.create');
    }
    public function store_category(Request $request){
        $this->validate($request,['name'=>'required|min:3', 'desc' => 'required']);

        $category=new Category();
        $category->name=$request->name;
        $category->desc=$request->desc;
        $category->save();

        return redirect(route('view.category'))->with('success','Successfully created');
    }
    public function view_category(){
        $categories=Category::all();
        return view('admin.category.view',compact('categories'));
    }
    public function edit_category($id){
        $categories=Category::find($id);
        return view('admin.category.edit',compact('categories'));
    }
    public function update_category(Request $request,$id){
        $categories=new Category();
        $categories->name=$request->name;
        $categories->desc=$request->desc;
        $categories->update();

        return redirect(route('view.category'))->with('success','Successfully Updated !');
    }
    public function delete_category($id){
        $categories=Category::find($id);
        if ($categories){
            $categories->delete();
            return redirect(route('view.category',compact('categories')))->with('danger','Deleted Successully ! ');
        }
    }
}
