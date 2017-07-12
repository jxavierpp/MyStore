<?php

use Illuminate\Database\Seeder;

class CategorysTableSeeder extends Seeder {

    public function run() {
        $faker = Faker\Factory::create();

        for($i = 0; $i < 5; $i++) {
            DB::table('CATEGORYS')->insert([
                'category_name' => $faker->name,
                'category_description' => $faker->text(20),
                'is_active' => boolval(true)
            ]);
        }
    }
}
