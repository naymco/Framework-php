<?php

use Application\Providers\Doctrine;
use Application\Controllers\HomeController;
use Application\Controllers\ContactController;
use Application\Providers\View;

return [
    'config.database' => function () {
        return parse_ini_file(base_path('App/Config/database.ini'));
    },
    Doctrine::class => function (\Psr\Container\ContainerInterface $container) {
        return new Doctrine($container);
    },

    HomeController::class => \DI\create()->constructor(\DI\get(Doctrine::class)),
    ContactController::class => \DI\create()->constructor(\DI\get(Doctrine::class)),
    View::class => \DI\create(View::class)
];

