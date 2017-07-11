<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller {
    public function index($id = null){
        if($id == null){
            return Product::orderBy('product_id','asc')->get();
        }else{
            return $this->show($id);
        }
    }
    public function store(Request $request){
        $product = new Product;
        $product->product_name = $request->input('product_name');
        $product->product_price = $request->input('product_price');
        $product->product_stock = $request->input('product_stock');
        $product->category_fk = $request->input('category_fk');
        $product->is_active = true;
        $product->save();
        return 'Product record succesfully created with id #' .$product->id;
    }
    public function show($id){
        return Product::find($id);
    }
    public function update(Request $request, $id){
        $product = Product::find($id);
        $product->product_name = $request->input('product_name');
        $product->product_price = $request->input('product_price');
        $product->product_stock = $request->input('product_stock');
        $product->category_fk = $request->input('category_fk');
        $product->save();
        return 'Product record succesfully updated with id #' .$product->id;
    }
    public function destroy($id){
        $product = Product::find($id);
        $product->is_active = false;
        $product->save();
        return 'Product record succesfully deleted';
    }
}
