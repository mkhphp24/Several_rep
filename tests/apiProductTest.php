<?php
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;


class apiProductTest extends TestCase
{
    private $client;

    protected function setUp()
    {
        $this->client = new Client(['base_uri' => 'http://localhost:8000']);
    }

    public function testProductApi()
    {
        $response = $this->client->request('GET', '/product');
        $this->assertEquals(200, $response->getStatusCode());
    }

}
