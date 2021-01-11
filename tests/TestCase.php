<?php

namespace Tests;

use Illuminate\Foundation\Mix;
//use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\BrowserKitTesting\TestCase as BaseTestCase;


abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use RefreshDatabase;

    public $baseUrl = 'http://tall-stack-app.test';

    public function setUp(): void
    {
        parent::setUp();
        cache()->clear();
    }


}
