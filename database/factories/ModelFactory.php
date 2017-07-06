<?php

$factory->define(App\Supplier::class, function (Faker\Generator $faker) {
    return [
        'supplier_name' => $faker->firstNameMale,
        'supplier_email' => str_random(10).'@gmail.com',
        'supplier_phone' => $faker->phoneNumber
    ];
});
