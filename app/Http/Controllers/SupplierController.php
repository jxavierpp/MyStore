<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Supplier;

class SupplierController extends Controller {
    public function index($id = null){
        if($id == null){
            return Supplier::orderBy('supplier_id','asc')->get();
        }else{
            return $this->show($id);
        }
    }
    public function store(Request $request){
        $supplier = new Supplier;
        $supplier->supplier_name = $request->input('supplier_name');
        $supplier->supplier_email = $request->input('supplier_email');
        $supplier->supplier_phone = $request->input('supplier_phone');
        $supplier->is_active = true;
        $supplier->save();
        return 'Supplier record succesfully created with id #' .$supplier->id;
    }
    public function show($id){
        return Supplier::find($id);
    }
    public function update(Request $request, $id){
        $supplier = Supplier::find($id);
        dd($supplier);
        $supplier->supplierName = $request->input('supplierName');
        $supplier->supplierEmail = $request->input('supplierEmail');
        $supplier->supplierPhone = $request->input('supplierPhone');
        $supplier->save();
        return 'Supplier record succesfully updated with id #' .$supplier->id;
    }
    public function destroy($id){
        $supplier = Supplier::find($id);
        $supplier->is_active = false;
        $supplier->save();
        return 'Supplier record succesfully deleted';
    }
}
