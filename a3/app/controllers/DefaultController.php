<?php
/**
 * Copyright Jack Harris
 * Peninsula Interactive - RMIT_Web_Programming
 * Last Updated - 16/02/2022
 */

namespace app\controllers;


use app\models\Booking;
use app\models\Movie;
use app\models\Seat;

class DefaultController
{

    public function __construct(String $endpoint){

        //load the movies from JSON to a global variable
        $GLOBALS["movies"] = $this->loadMovies();
        //load seats from JSOn into global
        $GLOBALS["seating"] =  $this->loadSeats();

        switch ($endpoint) {
            case "/":
                include(VIEWS . "index.php");
                break;
            case "/booking":
                if(isset($_GET["code"])){
                    $film = $this->findFilm($_GET["code"]);
                    if($film == null){
                        header("Location: ./");
                    }
                }else{
                    header("Location: ./");
                }

                include(VIEWS . "booking.php");
                break;

            case "/booking-validation":

                //start the session
                session_start();

                //lock this end point to post only, else redirect to home page
                if($_SERVER["REQUEST_METHOD"] != "POST"){
                    header("Location: ./");
                }

                //validate the film
                $validFilm = false;
                $film = $this->findFilm($_POST["movie_code"]);
                if($film != false){
                    $validFilm = true;
                }

                //validate the date and time
                $validDateTime = false;
                $dateTimeArray = json_decode($_POST["date"], true);
                if($film->checkValidTime($dateTimeArray["day"],$dateTimeArray["time"])){
                    $validDateTime = true;
                }

                //validate seat and check that the quantity is not a float
                $validSeat = false;
                $seatData = json_decode($_POST["seat-code"], true);
                $seat = $this->findSeat($seatData["seat_code"]);
                if($seat != false){
                    if($_POST["quantity"] > 0){
                        $validSeat = true;
                    }
                }else{
                    Header("Location: ./booking?film=$film");
                }

                //validate name
                $validName = preg_match('/^[A-Za-z0-9]+/', $_POST["name"]);

                //validate email
                $validEmail = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);

                $validPhone = false;
                //validateMobile
                if($_POST["mobile_number"] > 7){
                    $validPhone = true;
                }


                if($validPhone && $validSeat && $validDateTime && $validFilm && $validName && $validEmail){

                $_SESSION["booking"] = new Booking($_POST["movie_code"],$_POST["name"], $_POST["email"],$_POST["mobile_number"],$dateTimeArray["day"],$dateTimeArray["time"], $seat, $_POST["quantity"]);

                Header("Location: ./confirmation");

                }

                break;

            case "/confirmation":

                session_start();

                include VIEWS."confirmation.php";

                break;
        }
    }

    public function render(){
        //render method is not used in this controller but is needed as the application will call it as some controllers use view loading into a variable not including, these files must be
        //included as they need to process php, this does not occur if we use file_get_contents then echo.
    }

    //load the movies
    private function loadMovies(): array
    {
        //load movies and seats from Json file
        $moviesJson = file_get_contents(RESOURCES."movies.json");
        $movies = [];

        //perfrom a foreach loop to decode the json into a php array and create a movie object based of it
        foreach (json_decode($moviesJson) as $movie){
            $movies[] = new Movie((array)$movie);
        }

        return $movies;
    }

    //load the seats
    private function loadSeats(): array
    {
        $seatsJson = file_get_contents(RESOURCES."seating.json");
        $seating = [];

        //perform the foreach loop to decode the json and create the seat objects and place them in the seating array
        foreach(json_decode($seatsJson) as $seat){
            $seating[] = new Seat((array)$seat);
        }

        return $seating;
    }

    //find film function
    private function findFilm(string $code){
        $result = false;

        foreach ($GLOBALS["movies"] as $movie){
            if($movie->getCode() == $code){
                $result = $movie;
            }
        }

        return $result;
    }

    //find seat function
    private function findSeat(string $code){
        $result = false;

        foreach ($GLOBALS["seating"] as $seat){
            if($seat->getCode() == $code){
                $result = $seat;
            }
        }

        return $result;

    }

}