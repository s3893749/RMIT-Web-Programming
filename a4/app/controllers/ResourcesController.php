<?php
/**
 * Copyright Jack Harris
 * Peninsula Interactive - RMIT_Web_Programming
 * Last Updated - 16/02/2022
 */

namespace app\controllers;


class ResourcesController
{
    private string|false $view;
    private string $header;

    public function __construct(String $endpoint)
    {

        if(!isset($_GET["file"])){
            $target = "";
        }else{
            $target = $_GET["file"];
        }

            switch ($endpoint) {
                case "/resources_css":
                    if(file_exists(RESOURCES."css".DIRECTORY_SEPARATOR.$target.".css")){
                        $this->header = 'Content-type: text/css';
                        $this->view = file_get_contents(RESOURCES."css".DIRECTORY_SEPARATOR.$target.".css");
                    }
                break;
                case "/resources_json":
                    if(file_exists(RESOURCES.$target.".json")){
                        $this->header = 'Content-type: text/json';
                        $this->view = file_get_contents(RESOURCES.$target.".json");
                    }
                    break;
                case "/resources_js":
                    if(file_exists(RESOURCES."javascript".DIRECTORY_SEPARATOR.$target.".js")){
                        $this->header = 'Content-type: text/javascript';
                        $this->view = file_get_contents(RESOURCES."javascript".DIRECTORY_SEPARATOR.$target.".js");
                    }
                    break;
                default:
                    echo "404";
                    $this->header = 'Content-type: text/html';
                    break;
            }

    }

    public function render(){
        if(isset($this->header) && isset($this->view)){
            Header($this->header);
            echo $this->view;
        }else{
            echo "404";
        }

    }

}