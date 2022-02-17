<?php
/**
 * Copyright Jack Harris
 * Peninsula Interactive - RMIT_Web_Programming
 * Last Updated - 16/02/2022
 */

//constant variables for directory locations
use app\core\Application;

define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR . "a3". DIRECTORY_SEPARATOR);
const APP = ROOT . 'app' . DIRECTORY_SEPARATOR;
const CORE = ROOT . 'app' . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR;
const MODELS = ROOT . 'app' . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR;
const ROUTES = ROOT . 'app' . DIRECTORY_SEPARATOR . 'routes' . DIRECTORY_SEPARATOR;
const VIEWS = ROOT. 'app' . DIRECTORY_SEPARATOR .'views'.DIRECTORY_SEPARATOR;
const RESOURCES = ROOT. 'app' .DIRECTORY_SEPARATOR .'resources'.DIRECTORY_SEPARATOR;
const CONTROLLERS = ROOT. 'app'.DIRECTORY_SEPARATOR.'controllers'.DIRECTORY_SEPARATOR;

//**** PHP CLASS AUTO LOADER ****\\
//create array of folders to be auto-loaded by PHP.
$modules = [ROOT,APP,CORE,ROUTES, VIEWS, RESOURCES, MODELS, CONTROLLERS];
//set to include path of each of the folders specified in the modules array
set_include_path(get_include_path() . PATH_SEPARATOR . implode(PATH_SEPARATOR, $modules));

//call spl auto-load register
spl_autoload_register(function($class) {
    include  str_replace('\\', '/', $class) . '.php';
});
//create a new instance of the application
new Application();

