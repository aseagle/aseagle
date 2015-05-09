<?php

namespace WebPlatform\AseagleBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MessageControllerTest extends WebTestCase
{
    public function testSending()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/messagecenter/send');
    }

    public function testListmail()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/messagecenter/list/{receiver_id}');
    }

    public function testOpenmail()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/messagecenter/open/{message_id}');
    }

    public function testMessageinteraction()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/messagecenter/update/{message_id}');
    }

}
