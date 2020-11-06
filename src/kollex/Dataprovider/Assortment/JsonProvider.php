<?php

namespace kollex\Dataprovider\Assortment;

use kollex\Entiry\ProductMapper;
use kollex\Entiry\StorageAdapter;
use kollex\Services\ValidationData;

class JsonProvider  extends RepositoryRead implements DataProvider
{

    /**
     * @return array Product::class
     */
    public function getProducts(): array
    {
        $data=json_decode( $this->data, true);
        return $this->JsonMapper( $data['data'] ) ;

    }


    /**
     * @param array $jsonItems
     * @return array
     */
    private function JsonMapper(array $jsonItems):array {
        $data=[];
        foreach ( $jsonItems as $key=>$item )  {
            $datavalidate=new ValidationData( $this->JsonToArray($item) );
            $validationData=$datavalidate->validateCheck();
            if(empty($validationData['Error'])) {
                $data[]=$this->JsonToArray($item);
            } else   die( json_encode($validationData['Error'],true ) );
        }

        $storage = new StorageAdapter($data);
        $mapper = new ProductMapper($storage);
        return $mapper->findAll();
    }

    /**
     * @param array $jsonItem
     * @return array
     */
    private function JsonToArray( array $jsonItem):array {

        return [
            'id' => $jsonItem["PRODUCT_IDENTIFIER"],
            'gtin' => $jsonItem["EAN_CODE_GTIN"],
            'manufacturer' =>$jsonItem["BRAND"],
            'name' => $jsonItem["NAME"],
            'packaging' => $jsonItem["PACKAGE"],
            'baseProductPackaging' =>$jsonItem["ADDITIONAL_INFO"],
            'baseProductUnit' => $jsonItem["VESSEL"],
            'baseProductAmount' => $jsonItem["LITERS_PER_BOTTLE"],
            'baseProductQuantity' => $jsonItem["BOTTLE_AMOUNT"],
        ];
    }
}


