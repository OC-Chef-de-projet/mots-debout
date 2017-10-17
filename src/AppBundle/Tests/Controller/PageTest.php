<?php
/**
 * Created by PhpStorm.
 * User: psa
 * Date: 14/10/17
 * Time: 11:02.
 */

namespace Tests\AppBundle\Service;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PageTest extends WebTestCase
{
    public function testHaveView()
    {
        $client = static::createClient();
        $client->enableProfiler();

        $crawler = $client->request('GET', '/formation');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $crawler = $client->request('GET', '/expositions');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $crawler = $client->request('GET', '/residence');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $crawler = $client->request('GET', '/cours_collectifs');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $crawler = $client->request('GET', '/cours_particuliers');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $crawler = $client->request('GET', '/spectacles');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $crawler = $client->request('GET', '/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}
