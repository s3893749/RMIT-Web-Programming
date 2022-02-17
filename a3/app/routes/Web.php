<?php

namespace App\Routes;

use app\controllers\DefaultController;
use app\controllers\RedirectController;
use app\controllers\ResourcesController;
use App\Core\Router;

class Web
{
    public function __construct(Router $router)
    {
        //Add Routes
        $routes = [
            //web routes
            "/" => DefaultController::class,
            "/booking" => DefaultController::class,
            "/confirmation" => DefaultController::class,
            //resource routes
            "/resources_css" => ResourcesController::class,
            "/resources_json" => ResourcesController::class,
            "/resources_js" => ResourcesController::class,
            //redirect routes
            "/index.php" => RedirectController::class,
            "/booking.php" => RedirectController::class,
            //booking validation page POST only
            "/booking-validation" => DefaultController::class
        ];
        $router->addRoutes($routes);

    }

}