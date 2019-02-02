<?php namespace models;

use app\models\Product;

class ProductTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
        for ($i = 1; $i <= 10; $i++) {
            $product = new Product();
            $product->setAttributes([
                'title' => "Title {$i}",
                'brand' => "Brand {$i}",
                'price' => $i + 55,
                'stock' => $i
            ]);
            $product->save(false);
        }
    }

    protected function _after()
    {
        for ($i = 1; $i <= 10; $i++) {
            Product::deleteAll(['title' => `Title {$i}`]);
        }
    }


    // tests
    public function testValidateNewProduct()
    {
        $product = new Product();
        $product->brand = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusamus amet autem beatae dignissimos on';
        $product->price = -15;
        $product->stock = -25;

        expect_not($product->validate());

        expect($product->errors)->hasKey('title');
        expect($product->errors)->hasKey('brand');
        expect($product->errors)->hasKey('price');
        expect($product->errors)->hasKey('stock');
    }

    public function testFindProduct()
    {
        expect_that($product = Product::findOne(['title' => 'Title 1']));
        expect_that($product = Product::findOne(['brand' => 'Brand 1']));

        expect_not($product = Product::findOne(['brand' => 'Brand 11']));
        expect_not($product = Product::findOne(['price' => 0]));
    }
}