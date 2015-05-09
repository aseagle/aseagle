<?php

namespace WebPlatform\AseagleBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MainControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/index');
    }

    public function testGet_list_products_main()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/get_list_products_main');
    }

}
