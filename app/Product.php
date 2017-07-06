<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    protected $primaryKey   = 'product_id';
    //tabla personalizada
    protected $table = 'PRODUCTS';
    //atributos del modelo
    protected $fillable = ['id','name','price','stock','category_id','is_active'];

    /**
     * Relacion muchos a uno
     */
    public function categorys() {
        return $this->belongsTo('App\Category','category_id');
    }
}
