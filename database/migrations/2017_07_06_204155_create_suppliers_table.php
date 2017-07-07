<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration {

    public function up() {
        Schema::create('SUPPLIERS', function (Blueprint $table) {
            $table->increments('supplier_id');
            $table->string('supplier_name');
            $table->string('supplier_email')->unique();
            $table->string('supplier_phone');
            $table->boolean('is_active');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::drop('SUPPLIERS');
    }
}
