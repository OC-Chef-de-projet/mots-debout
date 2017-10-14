<?php
/**
 * Created by PhpStorm.
 * User: psa
 * Date: 14/10/17
 * Time: 11:02
 */

namespace Tests\AppBundle\Service;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class ContactusTest extends WebTestCase
{
    public function testMailer()
    {
        $client = static::createClient();
        $client->enableProfiler();
        $crawler = $client->request('GET', '/nous-contacter');
        $client->followRedirects(true);

        // Response
        $this->assertEquals(200,  $client->getResponse()->getStatusCode());

        // Form
        $this->assertContains('contactus_name', $client->getResponse()->getContent());

        $form = $crawler->selectButton('contactus_send')->form();
        $values = $form->getPhpValues();
        $values['contactus']['name'] = 'MYNAME';
        $values['contactus']['email'] = 'nobody@nowhere.com';
        $values['contactus']['message'] = 'Message to tester';

        $crawler = $client->request($form->getMethod(), $form->getUri(), $values, $form->getPhpFiles());
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

}
