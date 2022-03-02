<?php
/**
 * Copyright Jack Harris
 * Peninsula Interactive - RMIT_Web_Programming
 * Last Updated - 17/02/2022
 */

namespace app\controllers;

class RedirectController
{

    public function __construct(string $endpoint)
    {

        switch ($endpoint) {
            case "/index.php":
                Header("Location: ./#about-us");
                break;
            case "/booking.php":
                Header("Location: ./booking");
                break;

        }
    }

    public function render(){

    }

}