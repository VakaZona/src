<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class GameControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();
        $client->request('GET', '/');

        $this->assertResponseIsSuccessful();
//        $this->assertSelectorTextContains('h2', 'Games');
    }

    public function testGamePage()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $this->assertCount(2, $crawler->filter('h4'));

        $client->clickLink('View');

        $this->assertPageTitleContains('Factorio 2');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h2', 'Factorio 2');
        $this->assertSelectorExists('div:contains("There are 1 comments")');
    }
}
