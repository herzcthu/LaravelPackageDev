<?php

namespace Tests\Unit;

use Goutte\Client;
use Herzcthu\ExchangeRates\CrawlBank;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    public function testAgdTest()
    {
        $client = new Client();
        $crawl = new CrawlBank($client);

        $data = $crawl->getRates('agd','buy')->original;

        $this->assertArrayHasKey('status', $data);
        $this->assertArrayHasKey('info', $data);
        $this->assertArrayHasKey('description', $data);
        $this->assertEquals('Success', $data['status']);
    }
}
