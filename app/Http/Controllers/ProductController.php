<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller {
    public function index() {
        $prod = Product::orderBy('id','asc')->get();
        return view('productos')->with('productos',$prod);
    }
    public function store(Request $request) {
        $supplier = new Supplier;
        $supplier->supplierName = $request->input('supplierName');
        $supplier->supplierEmail = $request->input('supplierEmail');
        $supplier->supplierPhone = $request->input('supplierPhone');
        $supplier->is_active = true;
        $supplier->save();
        return 'Supplier record succesfully created with id #' .$supplier->id;
    }
    public function show($id) {
        return Supplier::find($id);
    }
    public function update(Request $request, $id) {
        $supplier = Supplier::find($id);
        $supplier->supplierName = $request->input('supplierName');
        $supplier->supplierEmail = $request->input('supplierEmail');
        $supplier->supplierPhone = $request->input('supplierPhone');
        $supplier->is_active = $request->input('is_active');
        $supplier->save();
        return 'Supplier record succesfully updated with id #' .$supplier->id;
    }
    public function destroy($id) {
        $supplier = Supplier::find($id)->delete();
        return 'Supplier record succesfully deleted';
    }
}
