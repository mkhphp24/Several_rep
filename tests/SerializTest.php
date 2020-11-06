<?php
use kollex\Services\Serialize;
use PHPUnit\Framework\TestCase;
use kollex\Entiry\ObjProduct;

class SerializTest  extends TestCase
{

    public function testAproductsArray()
    {
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
        $serialize=new Serialize([$productObj]);
        $this->assertEquals([$productArray], $serialize->productsArray());
    }

}
