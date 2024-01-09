<?php

namespace ApiTools\ApiVersionManager\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use ApiTools\ApiVersionManager\ApiVersionManagerServiceProvider;

abstract class TestCase extends BaseTestCase
{
    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return array<int, class-string<ApiVersionManagerServiceProvider>>
     */
    protected function getPackageProviders($app)
    {
        return [ApiVersionManagerServiceProvider::class];
    }
}
