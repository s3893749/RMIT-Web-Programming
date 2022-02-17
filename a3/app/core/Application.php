<?php
/**
 * Copyright Jack Harris
 * Peninsula Interactive - RMIT_Web_Programming
 * Last Updated - 16/02/2022
 */

namespace app\core;


use app\models\Debugbar;
use App\Routes\Web;

class Application
{

    public function __construct(){
        //create the new debugbar object
        $debugbar = new Debugbar();
        //start the debugbar timer
        $debugbar->startTimer();

        //--------------- TIMER START ----------------------\\

        //create our route service provider
        $router = new Router();
        //create an instance of our api routes file
        new Web($router);

        $callback = $router->analyseRoute();

        if($callback["status"]){
            http_response_code(200);
            $controller =  new $callback["controller"]($callback["endpoint"]);
            $controller->render();

        }else{
            http_response_code(404);
            echo "404 Page not found";
        }

        //--------------- TIMER END ----------------------\\
        //stop the debugbar timer
        $debugbar->endTimer();

        //exclude the debug bar if we load the res controller
        if($callback["controller"] != "app\controllers\ResourcesController" && $_SERVER["REQUEST_METHOD"] != "POST"){
            $debugbar->render();
        }

    }


}