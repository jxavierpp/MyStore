<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    protected $primaryKey = 'product_id';
    //tabla personalizada
    protected $table = 'PRODUCTS';
    //atributos del modelo
    protected $fillable = ['id','product_name','product_price','product_stock','category_fk','is_active'];

    /**
     * Relacion muchos a uno
     */
    public function category() {
        return $this->belongsTo('App\Category');
    }
}
