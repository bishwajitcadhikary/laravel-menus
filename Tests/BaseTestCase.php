<?php

namespace WovoSchool\Menus\Tests;

use Collective\Html\HtmlServiceProvider;
use WovoSchool\Menus\MenusServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

abstract class BaseTestCase extends OrchestraTestCase
{
    public function setUp() : void
    {
        parent::setUp();

        // $this->setUpDatabase();
    }

    protected function getPackageProviders($app)
    {
        return [
            HtmlServiceProvider::class,
            MenusServiceProvider::class,
        ];
    }

    /**
     * Set up the environment.
     *
     * @param \Illuminate\Foundation\Application $app
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('menus', [
            'styles' => [
                'metronic' => \WovoSchool\Menus\Presenters\Metronic\MetronicHorizontalMenuPresenter::class,
            ],

            'ordering' => false,
        ]);
    }
}
