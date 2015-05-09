<?php

namespace WebPlatform\AseagleBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CompanyHonorAwardControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'seller/{seller_id}/company_honor_award');
    }

    public function testNew()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'seller/{seller_id}/company_honor_award/new');
    }

    public function testEdit()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'seller/{seller_id}/company_honor_award/{id}/edit');
    }

    public function testDestroy()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'seller/{seller_id}/company_honor_award/{id}/destroy');
    }

}
