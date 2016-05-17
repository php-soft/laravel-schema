<?php
class TestCase extends Orchestra\Testbench\TestCase
{
    // protected function getPackageProviders($app)
    // {
    //     return array('Leeduc\JsonApiBuilder\JsonApiBuilderServiceProvider');
    // }
    protected function getPackageAliases($app)
    {
        return array(
            'LaravelSchema' => 'Autn\Schema\Console\Commands\DumpSql'
        );
    }

    public function setUp()
    {
        parent::setUp();
    }

    protected function getEnvironmentSetUp($app)
    {
        // Setup default database to use sqlite :memory:
        $app['config']->set('database.default', 'mysql');
        $app['config']->set('database.connections.mysql', [
            'driver' => 'mysql',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '3306'),
            'database' => 'schema_test',
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'strict' => false,
            'engine' => null,
        ]);
    }

    protected function resolveApplicationConsoleKernel($app)
    {
        $app->singleton('Illuminate\Contracts\Console\Kernel', 'Autn\Schema\Console\Kernel');
    }

    public function testExample()
    {

    }
}
