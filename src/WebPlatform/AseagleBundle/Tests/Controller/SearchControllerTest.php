<?php

namespace WebPlatform\AseagleBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SearchControllerTest extends WebTestCase
{
    public function testGet_list_product_search()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/get_list_product_search');
    }

}
