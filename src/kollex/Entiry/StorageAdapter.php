<?php

namespace kollex\Entiry;
class StorageAdapter
{
    private  $data = [];

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @param int $id
     *
     * @return array|null
     */
    public function find(int $id)
    {
        if (isset($this->data[$id])) {
            return $this->data[$id];
        }

        return null;
    }

    public function findAll(){

        if (isset($this->data)) {
            return $this->data;
        }
        return null;
    }
}
