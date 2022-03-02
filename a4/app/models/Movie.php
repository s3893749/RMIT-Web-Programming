<?php
/**
 * Copyright Jack Harris
 * Peninsula Interactive - RMIT_Web_Programming
 * Last Updated - 5/01/2022
 */

namespace app\models;

class Movie
{
    private string $title;
    private string $url;
    private string $synopsis;
    private string $rating;
    private string $code;
    private array $times;
    private string $trailer;
    private array $time_24;

    public function __construct(array $movieData)
    {
        $this->title = $movieData["title"];
        $this->url = $movieData["poster"];
        $this->synopsis = $movieData["synopsis"];
        $this->rating = $movieData["rating"];
        $this->code = $movieData["code"];
        $this->times = $movieData["times"];
        $this->trailer = $movieData["trailer"];
        $this->time_24 = (array)$movieData["times_24"][0];

    }

    public function renderPreviewCard(){

        echo '<div class="card-container">';
            echo '<div class="card" tabindex="1234">';
                echo "<div class='front'>
                        <h4>$this->title</h4>
                        <div class='flex'>
                            <div class='left'>
                                <img src='$this->url' alt='$this->title Movie Poster'>
                                <p id='rating'>Rating: $this->rating</p>
                            </div>
                            <div class='right'>
                                <h5>Daily Times</h5>
                                ";
                                foreach ($this->times as $time){
                                    echo "<p>".$time."</p>";
                                }
                echo "
                                
                            </div>
                            
                        </div>
                      </div>";
                echo "<div class='back'>
                        <h4>Synopsis</h4>
                        <p>$this->synopsis</p>
                        <a href='./booking?code=$this->code'><button class='button'>Book Now!</button></a>
                        </div>";
            echo '</div>';
        echo '</div>';

    }

    public function getCode(): string{
        return $this->code;
    }

    public function getTitle(): string{
        return $this->title;
    }

    public function getTrailer(): string{
        return $this->trailer;
    }

    public function getTimes(): array{
        return $this->times;
    }

    public function getTime24(): array
    {
        return $this->time_24;
    }

    public function checkValidTime(string $date, string $time): bool
    {

        $outcome = false;
        if(array_key_exists($date, $this->time_24)){
            if($this->time_24[$date] == $time){
                $outcome = true;
            }
        }

        return $outcome;
    }

}