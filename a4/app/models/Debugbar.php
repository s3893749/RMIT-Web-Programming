<?php
/**
 * Copyright Jack Harris
 * Peninsula Interactive - RMIT_Web_Programming
 * Last Updated - 15/02/2022
 */

namespace app\models;

class Debugbar
{
    private int $startTime;
    private int $totalTime;

    public function __construct(){

    }

    public function startTimer(){
        //code snipped created by https://www.phpjabbers.com/measuring-php-page-load-time-php17.html
        $time = microtime();
        $time = explode(' ', $time);
        $time = $time[1] . $time[0];
        $this->startTime = $time;
    }


    public function endTimer(){
        //code snipped created by https://www.phpjabbers.com/measuring-php-page-load-time-php17.html
        $time = microtime();
        $time = explode(' ', $time);
        $time = $time[1] . $time[0];
        $finish = $time;
        $this->totalTime = round(($finish - $this->startTime), 4);
    }

    public function render(){
        echo '
        <!-- link script file above the debugbar, this is linked here instead of the head to ensure that the script is not present if the debugbar is not present -->
        <script src="./resources_js/?file=debugbar"></script>
        ';

        $total_time = $this->totalTime;

        include VIEWS."debugbar.php";
    }

}