<?php

namespace WebPlatform\AseagleBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CompanyPatentControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'seller/{seller_id}/company_patent');
    }

    public function testNew()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'seller/{seller_id}/company_patent/new');
    }

    public function testEdit()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'seller/{seller_id}/company_patent/{id}/edit');
    }

    public function testDestroy()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'seller/{seller_id}/company_patent/{id}/destroy');
    }

}
