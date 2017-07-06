<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

    public function up() {
        Schema::create('PRODUCTS', function (Blueprint $table) {
            $table->increments('product_id');
            $table->string('product_name');
            $table->double('price', 15, 2);
            $table->integer('stock');
            $table->integer('category_fk')->unsigned();
            $table->foreign('category_fk')->references('category_id')->on('CATEGORYS');
            $table->boolean('is_active');
            $table->timestamps()->nullable();
        });
    }

    public function down() {
        Schema::drop('PRODUCTS');
    }
}
