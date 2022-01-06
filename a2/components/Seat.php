<?php
/**
 * Copyright Jack Harris
 * Peninsula Interactive - RMIT_Web_Programming
 * Last Updated - 6/01/2022
 */

namespace components;

class Seat
{
    private string $type;
    private int $price;
    private int $discountPrice;
    private string $code;
    private string $image;
    private array $discountTimes;

    public function __construct(array $seatData){
        $this->type = $seatData["type"];
        $this->price = $seatData["price"];
        $this->discountPrice = $seatData["discounted-price"];
        $this->code = $seatData["code"];
        if($seatData["photo"] != null){
            $this->image = $seatData["photo"];

        }
        $this->discountTimes = $seatData["discount-times"];
    }

    public function renderType(string $style = null){
        if($style == "h1"){
            echo "<h1>$this->type</h1>";
        }else if($style == "h2"){
            echo "<h2>$this->type</h2>";
        }else if($style == "h3"){
            echo "<h3>$this->type</h3>";
        }else if($style == "h4"){
            echo "<h4>$this->type</h4>";
        }else if($style == "h5"){
            echo "<h5>$this->type</h5>";
        }else{
            echo "<p>$this->type</p>";
        }
    }

    public function renderPrice(){
        echo "<p>$ $this->price</p>";
    }

    public function renderDiscountTimes(){
        foreach ($this->discountTimes as $discountTime){
            echo "$discountTime\n";
        }

    }

    public function renderDiscountedPrice(){
        echo "<p>$ $this->discountPrice</p>";
    }

    public function hasImage(): bool{

        if(isset($this->image)) {
            $outcome = true;
        }else{
            $outcome = false;
        }

        return $outcome;
    }

    public function renderImage(){
        if(isset($this->image)) {
            echo "<img src='$this->image' alt='$this->type Seating Photo'>";
        }
    }



}