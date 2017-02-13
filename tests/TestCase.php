<?php

namespace Indigoram89\Status\Test;

use DB;
use File;
use Illuminate\Database\Schema\Blueprint;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();

        $this->createDirectory();

        $this->setupDatabase();

        $this->runMigrations();
    }

    /**
     * Load package service providers.
     *
     * @param  \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            \Indigoram89\Status\StatusServiceProvider::class,
        ];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'sqlite');

        $app['config']->set('database.connections.sqlite', [
            'driver'   => 'sqlite',
            'database' => $this->getTempDirectory('/database.sqlite'),
            'prefix'   => '',
        ]);
    }

    /**
     * Create temp directory for database.
     *
     * @return void
     */
    protected function createDirectory()
    {
        $directory = $this->getTempDirectory();

        if (File::isDirectory($directory)) {
            File::deleteDirectory($directory);
        }

        File::makeDirectory($directory);
    }

    /**
     * Run migrations.
     *
     * @return void
     */
    protected function setupDatabase()
    {
        file_put_contents($this->getTempDirectory('/database.sqlite'), null);

        DB::connection()->getSchemaBuilder()->create('test_models', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status_id')->nullable();
            $table->text('name')->nullable();
        });
    }

    /**
     * Get temp directory path.
     *
     * @param  string|null $path
     * @return string
     */
    protected function getTempDirectory(string $path = null) : string
    {
        return __DIR__.'/temp' . $path;
    }

    /**
     * Run migrations.
     *
     * @return void
     */
    protected function runMigrations()
    {
        $this->artisan('migrate', [
            '--database' => 'sqlite',
        ]);
    }
}
