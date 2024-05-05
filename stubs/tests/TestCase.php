<?php

namespace {{{{organizationName}}}}\{{{{packageName}}}}\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use {{{{organizationName}}}}\{{{{packageName}}}}\{{{{packageName}}}}ServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => '{{{{organizationName}}}}\\{{{{packageName}}}}\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            {{{{packageName}}}}ServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_example_table.php.stub';
        $migration->up();
        */
    }
}
