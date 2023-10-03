<?php

namespace :uc:vendor\:uc:package\Tests;

use :uc:vendor\:uc:package\:uc:packageServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [:uc:packageServiceProvider::class];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('settings.db', 'testbench');
    }
}
