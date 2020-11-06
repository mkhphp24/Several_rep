<?php

use PHPUnit\Framework\TestCase;
use kollex\Dataprovider\Assortment\JsonProvider;
use kollex\Entiry\ObjProduct;

class JsonProviderTest  extends TestCase
{
    private $jsonprovider;

    protected function setUp()
    {
        parent::setUp();
        $this->jsonprovider=new JsonProvider('./data/test.json');
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
        $productObj=new ObjProduct( $productArray );
        $this->assertEquals([$productObj], $this->jsonprovider->getProducts());
    }

}
