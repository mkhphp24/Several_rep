<?php

namespace kollex\Controller;
use kollex\Dataprovider\Assortment\GetRepository;
use kollex\Dataprovider\Assortment\CsvProvider;
use kollex\Dataprovider\Assortment\JsonProvider;
use kollex\Services\Serialize;

class HomeController {

    public function index()
    {
       //choose source
        //$repo   = new GetRepository(new JsonProvider('./data/wholesaler_b.json'));
        $repo   = new GetRepository(new CsvProvider('./data/wholesaler_a.csv'));

        $result = $repo->exceute();
        $serialize=new Serialize($result);

        return json_encode($serialize->productsArray(),true);

    }
}
