<?php
/**
 * Copyright Jack Harris
 * Peninsula Interactive - RMIT_Web_Programming
 * Last Updated - 16/02/2022
 */

namespace app\core;

class Console
{
    public static function log($output){
        if(is_array($output)){
            $output = json_encode($output);
        }else if(!is_int($output) || !is_string($output)){
            $output = var_dump($output);
        }

        echo "<script>console.log($output)</script>";
    }

}