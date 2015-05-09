<?php

namespace WebPlatform\AseagleBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CompanyTrademarkControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'seller/{seller_id}/company_trademark');
    }

    public function testNew()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'seller/{seller_id}/company_trademark/new');
    }

    public function testEdit()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'seller/{seller_id}/company_trademark/{id}/edit');
    }

    public function testDestroy()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'seller/{seller_id}/company_trademark/{id}/destroy');
    }

}
