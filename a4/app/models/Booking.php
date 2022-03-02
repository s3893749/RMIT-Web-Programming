<?php
/**
 * Copyright Jack Harris
 * Peninsula Interactive - RMIT_Web_Programming
 * Last Updated - 17/02/2022
 */

namespace app\models;

use JetBrains\PhpStorm\ArrayShape;

class Booking
{
    private $orderDate;
    private $name;
    private $email;
    private $mobile;
    private $movieCode;
    private $movieTitle;
    private $dayOfMovie;
    private $timeOfMovie;
    private $seat;
    private $seatQuantity;
    private $file;
    private $totalCost;
    private $gstIncluded;

    public function __construct(string $movieCode, string $moveTitle , string $name, string $email, string $mobile, string $dayOfMovie, string $timeOfMovie, Seat $seat, int $seatQuantity){

        $this->orderDate = date("Y-m-d h:i:sa", time());
        $this->name = $name;
        $this->email = $email;
        $this->mobile = $mobile;
        $this->movieCode = $movieCode;
        $this->dayOfMovie = $dayOfMovie;
        $this->timeOfMovie = $timeOfMovie;
        $this->seat = $seat;
        $this->seatQuantity = $seatQuantity;
        $this->movieTitle = $moveTitle;

        $this->file = ROOT."bookings.txt";

        $this->calculateTotalCost();

        $this->save();

    }

    private function calculateTotalCost(){

        $pricePerSeat = $this->seat->getPrice();

        $discountTimes = (array)$this->seat->getDiscountTimes()[0];

        if(array_key_exists($this->dayOfMovie,$discountTimes)){
            $pricePerSeat = $this->seat->getDiscountedPrice();
        }

        $this->totalCost = $pricePerSeat*$this->seatQuantity;
        $this->gstIncluded = $this->totalCost*0.10;
    }

    private function save(){
        $csv_line = $this->name.",".$this->email.",".$this->mobile.",".$this->movieCode.",".$this->dayOfMovie.",".$this->timeOfMovie." (24 Hour Time),".$this->seat->getCode().",".$this->seatQuantity.",".$this->totalCost.",".$this->gstIncluded.",".PHP_EOL;

        if(is_writable($this->file)){
            $steam = fopen($this->file,'a');
            if(fwrite($steam, $csv_line) === false){
                echo "fatal error, cannot save booking to file";
            }

            fclose($steam);

        }

    }

    #[ArrayShape(["name" => "string", "email" => "string", "phone" => "string"])] public function getCustomer(): array
    {
        return [
            "name" => $this->name,
            "email" => $this->email,
            "phone" => $this->mobile,
        ];
    }

    #[ArrayShape(["title" => "string", "code" => "string"])] public function getMovie(): array{
     return [
         "title" => $this->movieTitle,
         "code" => $this->movieCode
     ];
    }

    public function getDate(): string
    {
        return $this->dayOfMovie;
    }

    public function getTime(): string
    {
        return $this->timeOfMovie;
    }

    public function getSeat(): Seat
    {
        return $this->seat;
    }

    public function getQuantity(): int
    {
        return $this->seatQuantity;
    }

    public function getTotal(){
        return $this->totalCost;
    }

    public function getGST(){
        return $this->gstIncluded;
    }

    public function getOrderDate(): string
    {
        return $this->orderDate;
    }

}