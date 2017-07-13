<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductAddTest extends TestCase {

    public function testAttitudeIsHandmade() {
        $this->visit('/productos');
        $this->press('Agregar');
        $this->type('Gatorade', 'product_name');
        $this->type('7.35', 'product_price');
        $this->type('7', 'product_stock');
        $this->select('', 'product_category');
        $this->press('Save Changes');
    }
}