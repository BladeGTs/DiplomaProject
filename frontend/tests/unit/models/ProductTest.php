<?php
namespace frontend\tests\models;
use common\models\Product;
class ProductTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
        $this->tester->haveFixtures([
           'products'=>[
               'class'=> \frontend\tests\fixtures\ProductFixture::class,
               'dataFile'=> codecept_data_dir() . 'product.php'
           ] 
        ]);
    }

    /*
     * Тест добавления нового товара
     */
    public function testCreateProduct()
    {
        $product = new Product();
        $product->Name = 'FirstName';
        $product->barcode = '13546';
        $product->Units = 'FirstUnits';
        $product->Product_group = 'FirstGroup';
        $product->Manufacturer_Name = 'FirstManName';
        $product->Country_of_Origin = 'FirstCountry';
        expect_that($product->save());
    }
    /*
     * Форма выдает ошибку при попытке отправить пустые поля
     */
        public function testCreateEmptyFormSubmit()
    {
            $product = new Product();
            expect_not($product->validate());
            expect_not($product->save());
    }
    /**
     * Возможность удаления
     */
        public function testDelete()
    {
            $product = Product::findOne(1);
            expect_that($product !== null);
            expect_that($product->delete());
    }
    /**
     * Возможность изменить данные о товаре
     */
        public function testUpdate()
    {
            $product = Product::findOne(['Name'=>'testName']);
            expect_that($product !== null);
            $product->Name = 'newTestName';
            expect_that($product->save());
            $updatedProduct = Product::findOne(['Name'=>'newTestName']);
            expect_that($updatedProduct !== null);
            
    }
}