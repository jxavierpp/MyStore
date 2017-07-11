<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller {
    public function index($id = null){
        if($id == null){
            return Category::orderBy('category_id','asc')->get();
        }else{
            return $this->show($id);
        }
    }
    public function store(Request $request){
        $category = new Category;
        $category->category_name = $request->input('category_name');
        $category->category_description = $request->input('category_description');
        $category->is_active = true;
        $category->save();
        return 'Category record succesfully created with id #' .$category->id;
    }
    public function show($id){
        return Category::find($id);
    }
    public function update(Request $request, $id){
        $category = Category::find($id);
        $category->category_name = $request->input('category_name');
        $category->category_description = $request->input('category_description');
        $category->save();
        return 'Category record succesfully updated with id #' .$category->id;
    }
    public function destroy($id){
        $category = Category::find($id);
        $category->is_active = false;
        $category->save();
        return 'Category record succesfully deleted';
    }
}
