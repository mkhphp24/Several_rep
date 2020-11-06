<?php

use kollex\Entiry\ObjProduct;

use PHPUnit\Framework\TestCase;
use kollex\Services\ValidationData;

class ValidationDataTest extends TestCase
{
    public function testCanMapUserFromStorage()
    {

        $productArray=[
            'id'=>'05449000061704',
            'gtin'=>'05449000061704',
            'manufacturer'=>'Beverages Ltd',
            'name'=>'Beverage 23, 6x 0.75 L',
            'packaging'=>'CA',
            'baseProductPackaging'=>'BO',
            'baseProductUnit'=>'LT',
            'baseProductAmount'=>'0.75',
            'baseProductQuantity'=>'6'
        ] ;

        $datavalidate=new ValidationData( $productArray );
        $validationData=$datavalidate->validateCheck();
        $this->assertEquals([], $validationData['Error']);

        $productArray=[
            'id'=>'',
            'gtin'=>'05449000061704',
            'manufacturer'=>'Beverages Ltd',
            'name'=>'Beverage 23, 6x 0.75 L',
            'packaging'=>'CA',
            'baseProductPackaging'=>'BO',
            'baseProductUnit'=>'LT',
            'baseProductAmount'=>'0.75',
            'baseProductQuantity'=>'6'
        ] ;


        $datavalidate=new ValidationData( $productArray );
        $validationData=$datavalidate->validateCheck();
        $this->assertEquals([0 =>["nameProperty"=>"[id]","message"=>"This value should not be blank.","value"=>""]], $validationData['Error']);


        $productArray=[
            'id'=>'05449000061704',
            'gtin'=>'',
            'manufacturer'=>'Beverages Ltd',
            'name'=>'Beverage 23, 6x 0.75 L',
            'packaging'=>'CA',
            'baseProductPackaging'=>'BO',
            'baseProductUnit'=>'LT',
            'baseProductAmount'=>'0.75',
            'baseProductQuantity'=>'6'
        ] ;

        $datavalidate=new ValidationData( $productArray );
        $validationData=$datavalidate->validateCheck();
        $this->assertEquals([0 =>["nameProperty"=>"[gtin]","message"=>"This value should be of type digit.","value"=>""]], $validationData['Error']);


        $productArray=[
            'id'=>'05449000061704',
            'gtin'=>'05449000061704',
            'manufacturer'=>'',
            'name'=>'Beverage 23, 6x 0.75 L',
            'packaging'=>'CA',
            'baseProductPackaging'=>'BO',
            'baseProductUnit'=>'LT',
            'baseProductAmount'=>'0.75',
            'baseProductQuantity'=>'6'
        ] ;

        $datavalidate=new ValidationData( $productArray );
        $validationData=$datavalidate->validateCheck();
        $this->assertEquals([0 =>["nameProperty"=>"[manufacturer]","message"=>"This value should not be blank.","value"=>""]], $validationData['Error']);




    }
}
