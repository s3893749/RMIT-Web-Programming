<?php
/**
 * Copyright Jack Harris
 * Peninsula Interactive - RMIT_Web_Programming
 * Last Updated - 16/02/2022
 */

namespace App\Core;

use JetBrains\PhpStorm\ArrayShape;

class Router
{
    private array $routes;

    public function __construct(){
        $this->routes = [];
    }

    public function addRoutes(array $routes){

        $this->routes = $routes;
    }

    #[ArrayShape(["status" => "bool", "controller" => "mixed", "endpoint" => "mixed"])] public function analyseRoute(): array
    {

        $url = $this->processUrl();

        $callback = ["status" => false];

        if(array_key_exists($url, $this->routes)){

            $GLOBALS["endpoint"] = $url;

            $callback["status"] = true;
            $callback["endpoint"] = $url;
            $callback["controller"] = $this->routes[$url];
        }

        return $callback;

    }

    //converts the URL string into an array that is processed by the route service provide
    private function processUrl(): string
    {
        //create blank array, needed in the event no url is passed
        $url = [];

        $uri = explode("?", $_SERVER["REQUEST_URI"]);

        $url = explode("/",$uri[0]);
        foreach ($url as $key => $item) {
            $url[$key] = "/".$item;
        }

        //returns the url array with the first value removed, this is important as we do not want to look at the first "/", it will default to 1  "/" regardless
        return array_slice($url,1,count($url)-1)[2];
    }

}