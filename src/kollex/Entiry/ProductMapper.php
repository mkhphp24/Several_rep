<?php

namespace kollex\Entiry;

use InvalidArgumentException;

class ProductMapper
{
    private  $adapter;

    public function __construct(StorageAdapter $storage)
    {
        $this->adapter = $storage;
    }

    /**
     * @param int $id
     * @return ObjProduct
     */
    public function findById(int $id): ObjProduct

    {
        $result = $this->adapter->find($id);

        if ($result === null) {
            throw new InvalidArgumentException("Prouduct #$id not found");
        }

        return $this->mapRowToProduct($result);
    }

    /**
     * @return array Product::class
     */

    public function findAll():array
    {
        $result=[];
        $products = $this->adapter->findAll();

        if ($products === null) {
            throw new InvalidArgumentException("Prouducts  not found");
        }

        foreach($products as $product){
            $result[]= $this->mapRowToProduct($product);
        }

        return $result;
    }


    /**
     * @param array $row
     * @return ObjProduct
     */
    private function mapRowToProduct(array $row): ObjProduct
    {
        return ObjProduct::fromState($row);
    }
}
