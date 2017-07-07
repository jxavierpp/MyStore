<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategorysTable extends Migration {

    public function up() {
        Schema::create('CATEGORYS', function (Blueprint $table) {
            $table->increments('category_id');
            $table->string('category_name');
            $table->string('category_description')->unique();
            $table->boolean('is_active');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::drop('CATEGORYS');
    }
}
