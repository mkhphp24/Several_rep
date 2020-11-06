<?php

use PHPUnit\Framework\TestCase;
use kollex\Dataprovider\Assortment\CsvProvider;
use kollex\Entiry\ObjProduct;

class CsvProviderTest  extends TestCase
{
    private $csvprovider;

    protected function setUp()
    {
        parent::setUp();
        $this->csvprovider=new CsvProvider('./data/test.csv');
    }


    public function testGetProducts(){

        $productArray=[
            'id'=>'ABC12345678',
            'gtin'=>'05449000061704',
            'manufacturer'=>'Beverages Ltd',
            'name'=>'Beverage 23, 6x 0.75 L',
            'packaging'=>'CA',
            'baseProductPackaging'=>'BO',
            'baseProductUnit'=>'LT',
            'baseProductAmount'=>'0.75',
            'baseProductQuantity'=>'6'
        ];
        $productObj=new ObjProduct($productArray);
        $this->assertEquals([$productObj], $this->csvprovider->getProducts());
    }

}
