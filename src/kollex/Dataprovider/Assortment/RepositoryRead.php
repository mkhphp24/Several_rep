<?php

namespace kollex\Dataprovider\Assortment;
use Exception;

abstract  class RepositoryRead
{
    protected  $data;
    /**
     * RepositoryRead constructor.
     *
     * @param $data
     */
    public function __construct($path)
    {

        if (!$this->data = @file_get_contents($path)) {
            throw new \Exception('File Not found'.$path);
        }
    }

}
