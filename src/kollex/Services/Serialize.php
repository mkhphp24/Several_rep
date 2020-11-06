<?php

namespace kollex\Services;
class Serialize
{
private $produts;

    /**
     * Serialize constructor.
     * @param $produts
     */
    public function __construct($produts)
    {
        $this->produts = $produts;
    }

    public function productsArray(){
        $result=[];

        foreach ( $this->produts as $product)
            {
                $result[]=[
                      "id" => $product->getId(),
                      "gtin"=> $product->getGtin(),
                      "manufacturer"=> $product->getManufacturer(),
                      "name"=> $product->getName(),
                      "packaging"=> $product->getPackaging(),
                      "baseProductPackaging"=> $product->getBaseProductPackaging(),
                      "baseProductUnit"=> $product->getBaseProductUnit(),
                      "baseProductAmount"=> $product->getBaseProductAmount(),
                      "baseProductQuantity"=> $product->getBaseProductQuantity()
                    ];

            }

            return $result;

    }
}



