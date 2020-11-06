<?php

use PHPUnit\Framework\TestCase;
use kollex\Entiry\StorageAdapter;
use kollex\Entiry\ProductMapper;
use kollex\Entiry\ObjProduct;


class ProuductMapperTest  extends TestCase
{
    public function testCanMapUserFromStorage()
    {
        $productArray=[1 =>[
            'id'=>'ABC12345678',
            'gtin'=>'05449000061704',
            'manufacturer'=>'Beverages Ltd',
            'name'=>'Beverage 23, 6x 0.75 L',
            'packaging'=>'CA',
            'baseProductPackaging'=>'BO',
            'baseProductUnit'=>'LT',
            'baseProductAmount'=>'0.75',
            'baseProductQuantity'=>'6'
        ] ];

        $storage = new StorageAdapter($productArray);
        $mapper = new ProductMapper($storage);

        $product = $mapper->findById(1);
        $this->assertInstanceOf(ObjProduct::class, $product);

        $products = $mapper->findAll();
        $this->assertEquals([$product], $products);

    }
}
