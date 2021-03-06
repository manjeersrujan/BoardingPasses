<?php

require_once("travel/TravelPlannerImpl.php");
require_once("boarding/BoardingPassImpl.php");
require_once("vehicle/Bus.php");
require_once("vehicle/RentalCar.php");
require_once("vehicle/Ship.php");
require_once("vehicle/Flight.php");
require_once("vehicle/Cab.php");


use travel\TravelPlannerImpl;
use boarding\BoardingPassImpl;
use vehicle\Bus;
use vehicle\RentalCar;
use vehicle\Cab;
use vehicle\Flight;
use vehicle\Ship;

$list = array(
    new BoardingPassImpl("A", "B", new \booking\Booking(array(
        Bus::SEAT_NUMBER => "45B",
        Bus::PICKUP_LOCATION => "Your home"
    )), " Please be on time.", new Bus("SampleTravel-1", "volvo", 55, "KA53MB4616", " This bus has mobile charging socket. ")
    ),
    new BoardingPassImpl("C", "D", new \booking\Booking(array(
        Bus::SEAT_NUMBER => "45B",
        Bus::PICKUP_LOCATION => "Your home"
    )), " Please be on time", new Bus("SampleTravel-1", "volvo", 55, "KA53MB4617", "This bus doesn't have mobile charging socket. ")
    ),
    new BoardingPassImpl("B", "C", null, " This is automatic car. ", new RentalCar("Zoomcar", "mercedes", 55, "KA53MB4617", " Please submit Driving License Copy.")
    ),
    new BoardingPassImpl("M", "N", new \booking\Booking(array(
        Ship::SEAT_NUMBER => "45B",
        Ship::PICKUP_LOCATION => "Your swimming pool"
    )), "Please be on time", new Ship("Titanic", "2345", "Need to know swimming. No life jackets available.")
    ),
    new BoardingPassImpl("N", "O", new \booking\Booking(array(
        Flight::SEAT_NUMBER => "45B",
        Flight::PICKUP_LOCATION => "Dubai Airport"
    )), "Please be on time. Boarding closes before 24 hours", new Flight("Emirates", "ABC26", "boeing", 200, " This flight has one extra engine.")
    ),
    new BoardingPassImpl("L", "M", new \booking\Booking(array(
        Flight::SEAT_NUMBER => "45B",
        Flight::PICKUP_LOCATION => "Dubai Airport"
    )), "Please be on time. Boarding closes before 24 hours", new Flight("Emirates", "ABC25", "boeing", 200, " This flight has no extra engine.")
    ),
    new BoardingPassImpl("D", "E", null, "Come at anytime. But your time starts at booking time", new RentalCar("Zoomcar", "volvo", 55, "KA53MB4618", " Please submit Driving License Copy.")
    ),
    new BoardingPassImpl("F", "G", new \booking\Booking(array(
        RentalCar::PICKUP_LOCATION => "Dubai Airport"
    )), "Come at anytime. But your time starts at booking time", new RentalCar("Zoomcar", "volvo", 55, "KA53MB4619", " Please submit Driving License Copy.")
    ),
    new BoardingPassImpl("J", "K", null, "Come at anytime. But your time starts at booking time", new RentalCar("Zoomcar", "volvo", 55, "KA53MB4620", " Please submit Driving License Copy.")
    ),
    new BoardingPassImpl("E", "F", new \booking\Booking(array(
        Bus::SEAT_NUMBER => "45B",
        Bus::PICKUP_LOCATION => "Your home"
    )), " Please be on time", new Bus("SampleTravel-3", "volvo", 55, "KA53MB4630", "This bus doesn't have mobile charging socket. ")
    ),
    new BoardingPassImpl("G", "H", new \booking\Booking(array(
        Cab::PICKUP_LOCATION => "Your home"
    )), " Please be on time", new Cab("SampleTravel-4", "volvo", 55, "KA53MB4640", 200)
    ),
    new BoardingPassImpl("I", "J", new \booking\Booking(array(
        Ship::SEAT_NUMBER => "45B",
        Ship::PICKUP_LOCATION => "My swimming pool"
    )), "Please be on time", new Ship("Titanic", "2346", "Need to know swimming. No life jackets available.")
    ),
    new BoardingPassImpl("K", "L", new \booking\Booking(array(
        Ship::SEAT_NUMBER => "45B",
        Ship::PICKUP_LOCATION => "At the middle of Atlantic Ocean"
    )), "Please be on time", new Ship("Titanic", "2347", "Need to know swimming. No life jackets available.")
    ),
    new BoardingPassImpl("H", "I", new \booking\Booking(array(
        Flight::SEAT_NUMBER => "45B",
        Flight::PICKUP_LOCATION => "Dubai Airport"
    )), "Please be on time. Boarding closes before 24 hours", new Flight("Emirates", "ABC29", "boeing", 200, " This flight has one extra engine.")
    )
);


$ob = new TravelPlannerImpl();

echo "-------------------------------------------The Un-sorted boarding passes-----------------------------------------------";
echo PHP_EOL.PHP_EOL;
foreach ($list as $boarding_pass){
    echo $boarding_pass. PHP_EOL;
}
echo PHP_EOL.PHP_EOL.PHP_EOL;


/*
 * Below line is the starting point for the Algorithm.
 */
$travel = $ob->get_travel_plan($list);



echo "-------------------------------------------The Sorted boarding passes-----------------------------------------------";
echo PHP_EOL.PHP_EOL;

echo $travel->print_travel_plan();
