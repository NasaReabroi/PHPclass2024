<?php
class Car {
    public $color;
    public $maker;
    public $model;
    public $year;
    public $status;

    function _construct()
{
    $this->status ="stopped";
}

function forward() {
        echo "The car is moving forward";
        $this->status ="forward";
}

function reverse(){
        echo "The car is going backwards";
        $this->status = "backward";
}

function stop(){
        echo "The car is stopped";
        $this->status ="stopped";
}

}

$myCar = new Car();
$myCar->color ='Yellow';
$myCar->make = 'Jeep';
$myCar->model ='Wrangler';
$myCar->year ='2010';

echo "My " . $myCar->make . " is a " . $myCar->year . "<br .><br />><br />>";
echo $myCar->reverse();
echo "<br /><br /><br />";
echo  $myCar->status;