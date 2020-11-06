<?php

namespace kollex\Dataprovider\Assortment;

class GetRepository
{
    private $repository;

    /**
     * UseRepository constructor.
     */
    public function __construct(DataProvider $repository)
    {
        $this->repository=$repository;
    }

    /**
     * @param   string  $string
     *
     * @return array
     */
    public function exceute(): array
    {
        return $this->repository->getProducts();
    }

}
