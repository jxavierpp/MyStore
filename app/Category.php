<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {
    protected $primaryKey   = 'category_id';
    //tabla personalizada
    protected $table = 'CATEGORYS';
    //atributos del modelo
    protected $fillable = ['category_id','category_name','category_description','is_active'];

    /**
     * Relacion muchos a muchos
     */
    public function suppliers(){
        return $this->belongsToMany('App\Supplier');
    }
    public function products() {
        return $this->hasMany('App\Product');
    }
}