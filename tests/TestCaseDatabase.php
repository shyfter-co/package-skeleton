<?php

namespace Shyfter\Settings\Tests;

namespace :uc:vendor\:uc:package\Tests;

class TestCaseDatabase extends TestCase
{

    protected function getEnvironmentSetUp($app)
    {
        parent::getEnvironmentSetUp($app);
        // Setup default database to use sqlite :memory:
        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);


        $app['config']->set('settings.db', 'testbench');
    }

    public function setUp(): void
    {
        parent::setUp();

        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

        $this->artisan(
            'migrate',
            ['--database' => 'testbench']
        )
            ->run();
    }
}
