<?php

namespace WebPlatform\AseagleBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CompanyOverseaOfficeControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'seller/company_oversea_office');
    }

    public function testNew()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'seller/{seller_id}/company_oversea_office/new');
    }

    public function testEdit()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'seller/{seller_id}/company_oversea_office/{id}/edit');
    }

    public function testDestroy()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'seller/{seller_id}/company_oversea_office/{id}/destroy');
    }

}
