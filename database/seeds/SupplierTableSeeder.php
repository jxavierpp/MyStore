<?php

use Illuminate\Database\Seeder;

class SupplierTableSeeder extends Seeder {

    public function run() {
        $faker = Faker\Factory::create();

        for($i = 0; $i < 5; $i++) {
            DB::table('SUPPLIERS')->insert([
                'supplier_name' => $faker->firstName,
                'supplier_email' => $faker->email,
                'supplier_phone' => $faker->phoneNumber,
                'is_active' => boolval(true)
            ]);
        }
    }
}
