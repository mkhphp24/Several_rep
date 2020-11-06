<?php

namespace kollex\Dataprovider\Assortment;
use kollex\Services\ValidationData;
use kollex\Entiry\ProductMapper;
use kollex\Entiry\StorageAdapter;

class CsvProvider extends RepositoryRead implements DataProvider
{
    /**
     * @return array
     */
    const ID=0;
    const GTIN=1;
    const MANUFACTURER=2;
    const NAME=3;
    const PACKAGING=5;
    const BASEPRODUCTPACKAGING=6;
    const BASEPRODUCTUNIT=7;
    const BASEPRODUCTAMOUNT=8;
    const BASEPRODUCTQUANTITY=9;

    /**
     * @return array
     */
    public function getProducts(): array
    {
        $data=explode("\n", $this->data);
        try {
            return $this->csvMapper( $data ) ;
        } catch (\Exception $e) {
            die( $e->getMessage() );

        }
    }

    /**
     * @param array $csvLines
     * @return array Product::class
     */
    private function csvMapper(array $csvLines) :array {
        $data=[];
        foreach ( $csvLines as $key=>$line )  {

            if($line === '') continue;
            if($key === 0) continue;

            $datavalidate=new ValidationData( $this->csvLineToArray($line) );
            $validationData=$datavalidate->validateCheck();

            if(empty($validationData['Error'])) {
                $data[]=$this->csvLineToArray($line);
            } else     die( json_encode($validationData['Error'],true ) );

        }

        $storage = new StorageAdapter($data);
        $mapper = new ProductMapper($storage);
        return $mapper->findAll();

    }

    /**
     * @param string $Csvline
     * @param string $determinal
     * @return array
     */
    private function csvLineToArray( string $Csvline,$determinal=';'):array {
        $linefield=explode(';',$Csvline);
        return [
            'id' => $linefield[Self::ID],
            'gtin' => $linefield[self::GTIN],
            'manufacturer' =>$linefield[self::MANUFACTURER],
            'name' => $linefield[self::NAME],
            'packaging' => $linefield[self::PACKAGING],
            'baseProductPackaging' =>$linefield[self::BASEPRODUCTPACKAGING],
            'baseProductUnit' => $linefield[self::BASEPRODUCTUNIT],
            'baseProductAmount' => $linefield[self::BASEPRODUCTAMOUNT],
            'baseProductQuantity' => $linefield[self::BASEPRODUCTQUANTITY],
        ];

    }

}

