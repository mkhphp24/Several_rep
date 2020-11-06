<?php


namespace kollex\Dataprovider\Assortment;
use kollex\Entiry\ObjProduct;

interface Product
{
    public static function fromState(array $state):ObjProduct;
    public function getId(): string;
    public function getManufacturer(): string;
    public function getName(): string;
    public function getPackaging(): string;
    public function getBaseProductPackaging(): string;
    public function getBaseProductUnit(): string;
    public function getBaseProductAmount(): string;
    public function getBaseProductQuantity(): int;

}
