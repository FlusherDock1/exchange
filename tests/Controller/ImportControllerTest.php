<?php

declare(strict_types=1);

namespace Tests\Controller;

use Tests\TestCase;

class ImportControllerTest extends TestCase
{
    /**
     * Define environment setup.
     *
     * @param \Illuminate\Foundation\Application $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        // Setup default database to use sqlite :memory:
        $app['config']->set('exchange', require_once __DIR__.'./../../publish/config/exchange.php');
    }

    public function testRequest():void
    {
        $response = $this->call(
            'GET',
            config('exchange.path').'?type=catalog&mode=checkauth',
            [],
            [],
            [],
            [
                'PHP_AUTH_USER' => config('exchange.login'),
                'PHP_AUTH_PW'   => config('exchange.password'),
            ]
        );
        $response->assertStatus(200);
    }

    public function testLogicException():void
    {
        $response = $this->call(
            'GET',
            config('exchange.path').'?type=sale&mode=checkauth',
            [],
            [],
            [],
            [
                'PHP_AUTH_USER' => config('exchange.login'),
                'PHP_AUTH_PW'   => config('exchange.password'),
            ]
        );
        $response->assertStatus(500);
    }

    public function testLoginExchangeException():void
    {
        $response = $this->call(
            'GET',
            config('exchange.path').'?type=sale&mode=checkauth',
            [],
            [],
            [],
            [
                'PHP_AUTH_USER' => config('exchange.login'),
                'PHP_AUTH_PW'   => 'test',
            ]
        );
        $response->assertStatus(500);
    }

    public function testExchangeException():void
    {
        $response = $this->call(
            'GET',
            config('exchange.path').'?type=catalog&mode=testmode',
            [],
            [],
            [],
            [
                'PHP_AUTH_USER' => config('exchange.login'),
                'PHP_AUTH_PW'   => config('exchange.password'),
            ]
        );
        $response->assertStatus(500);
    }
}
