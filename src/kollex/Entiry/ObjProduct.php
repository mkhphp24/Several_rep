<?php

namespace kollex\Entiry;

use kollex\Dataprovider\Assortment\Product;

class ObjProduct implements Product
{
    protected $id;
    protected $gtin;
    protected $manufacturer;
    protected $name;
    protected $packaging;
    protected $baseProductPackaging;
    protected $baseProductUnit;
    protected $baseProductAmount;
    protected $baseProductQuantity;


    public function __construct(array $product)
    {

        $this->id = $product['id'];
        $this->gtin = $product['gtin'];
        $this->manufacturer = $product['manufacturer'];
        $this->name = $product['name'];
        $this->packaging = $product['packaging'];
        $this->baseProductPackaging = $product['baseProductPackaging'];
        $this->baseProductUnit = $product['baseProductUnit'];
        $this->baseProductAmount = $product['baseProductAmount'];
        $this->baseProductQuantity = $product['baseProductQuantity'];

    }

    public static function fromState(array $state): self
    {
        // validate state before accessing keys!

        return new self([
            'id'=> $state['id'],
            'gtin'=>$state['gtin'] ,
            'manufacturer'=>$state['manufacturer'] ,
            'name'=>$state['name'] ,
            'packaging'=>$state['packaging'] ,
            'baseProductPackaging'=>$state['baseProductPackaging'] ,
            'baseProductUnit'=>$state['baseProductUnit'] ,
            'baseProductAmount'=>$state['baseProductAmount'] ,
            'baseProductQuantity'=>$state['baseProductQuantity']
           ]
        );
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getGtin(): string
    {
        return  $this->gtin;
    }

    public function getManufacturer(): string
    {
        return  $this->manufacturer;
    }

    public function getName(): string
    {
        return  $this->name;
    }

    public function getPackaging(): string
    {
        return  $this->packaging;
    }

    public function getBaseProductPackaging(): string
    {
        return  $this->baseProductPackaging;
    }

    public function getBaseProductUnit(): string
    {
        return  $this->baseProductUnit;
    }

    public function getBaseProductAmount(): string
    {
        return  $this->baseProductAmount;
    }

    public function getBaseProductQuantity(): int
    {
        return  $this->baseProductQuantity ;
    }


}
