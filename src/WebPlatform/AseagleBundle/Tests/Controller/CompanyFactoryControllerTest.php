<?php

namespace WebPlatform\AseagleBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CompanyFactoryControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'seller/{seller_id}/company_factory');
    }

    public function testNew()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'seller/{seller_id}/company_factory/new');
    }

    public function testEdit()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'seller/{seller_id}/company_factory/{id}/edit');
    }

    public function testDestroy()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'seller/{seller_id}/company_factory/{id}/destroy');
    }

}
