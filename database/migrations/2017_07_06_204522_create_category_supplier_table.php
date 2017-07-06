<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategorySupplierTable extends Migration {

    public function up() {
        Schema::create('CATEGORYS_SUPPLIERS', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('supplier_fk')->unsigned();
            $table->foreign('supplier_fk')->references('supplier_id')->on('SUPPLIERS');
            $table->integer('category_fk')->unsigned();
            $table->foreign('category_fk')->references('category_id')->on('CATEGORYS');
            $table->timestamps()->nullable();
        });
    }

    public function down() {
        Schema::drop('CATEGORYS_SUPPLIERS');
    }
}
