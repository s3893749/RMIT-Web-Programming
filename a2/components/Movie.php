<?php
/**
 * Copyright Jack Harris
 * Peninsula Interactive - RMIT_Web_Programming
 * Last Updated - 5/01/2022
 */

namespace components;

class Movie
{
    private string $title;
    private string $url;
    private string $synopsis;
    private string $rating;
    private string $code;
    private array $times;

    public function __construct(array $movieData)
    {
        $this->title = $movieData["title"];
        $this->url = $movieData["poster"];
        $this->synopsis = $movieData["synopsis"];
        $this->rating = $movieData["rating"];
        $this->code = $movieData["code"];
        $this->times = $movieData["times"];

    }

    public function render(){

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
                        <a href='./booking.php?code=$this->code'><button class='button'>Book Now!</button></a>
                        </div>";
            echo '</div>';
        echo '</div>';

    }

}