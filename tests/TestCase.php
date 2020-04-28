<?php

declare(strict_types=1);

namespace Tests;

use Jurager\Exchange\ExchangeServiceProvider;

/**
 * Class TestCase.
 */
abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * @var bool
     */
    public $mockConsoleOutput = false;

    /**
     * @var string
     */
    protected const PACKAGE_PROVIDER = ExchangeServiceProvider::class;

    /**
     * Get package providers.  At a minimum this is the package being tested, but also
     * would include packages upon which our package depends, e.g. Cartalyst/Sentry
     * In a normal app environment these would be added to the 'providers' array in
     * the config/app.php file.
     *
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [self::PACKAGE_PROVIDER];
    }
}
