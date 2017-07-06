<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model {
    protected $primaryKey   = 'supplier_id';
    //tabla personalizada
    protected $table = 'SUPPLIERS';
    //atributos del modelo
    protected $fillable = ['supplier_id','supplier_name','supplier_email','supplier_phone','is_active'];

    /**
     * Relacion muchos a muchos
     */
    public function categorys(){
        return $this->belongsToMany('App\Category');
    }
}
