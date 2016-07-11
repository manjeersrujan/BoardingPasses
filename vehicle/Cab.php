<?php

namespace vehicle;
use booking\Booking;

/**
 * Class Cab
 * @package vehicle
 * A subclass of Cab with its own data and fields. This abstracts the vehicle details completely from external classes.
 */
class Cab extends Vehicle
{
    /**
     * @var
     *
     * Cab Company name
     */
    private $cab_company_name;

    /**
     * @var
     *
     * Cab type (Economy, Luxury etc )
     */
    private $cab_type;

    /**
     * @var
     *
     * Number of seats in cab. Max number of people that can sit.
     *
     */
    private $number_of_seats;

    /**
     * @var
     *
     * Minimum fare of a cab.
     */
    private $min_price;

    /**
     * Cab constructor.
     * @param $cab_company_name
     * @param $number
     * @param $cab_type
     * @param $number_of_seats
     * @param $min_price
     */
    public function __construct($cab_company_name, string $number, string $cab_type, string $number_of_seats, int $min_price)
    {
        $this->cab_company_name = $cab_company_name;
        $this->cab_type = $cab_type;
        $this->number_of_seats = $number_of_seats;
        $this->min_price = $min_price;
        $this->number = $number;
    }

    /**
     * @return string
     *
     * Get the booked vehicle details.
     */
    public function get_vehicle_details()
    {
        return $this->cab_company_name .
            ' Cab with number ' . $this->number .
            '. Total number of seats are ' . $this->number_of_seats .
            '. Minimum fare is ' . $this->min_price;
    }


    /**
     * @param Booking $booking
     * @return string
     *
     * Reservation details from reservation metadata
     */
    public function get_reservation_details(Booking $booking = null)
    {
        if (is_null($booking) || is_null($booking->getBookingMetadata())) {
            return;
        }

        $reservation_details = '';
        if(array_key_exists(self::PICKUP_LOCATION,$booking->getBookingMetadata()) && empty($booking->getBookingMetadata()[self::PICKUP_LOCATION]) ){
            $reservation_details = $reservation_details . ' You will be picked up at ' . $booking->getBookingMetadata()[self::PICKUP_LOCATION].'.';
        }

        return $reservation_details;
    }

    /**
     * @inheritDoc
     */
    function __toString()
    {
        return $this->get_vehicle_details();
    }


    /**
     * @return mixed
     */
    public function getCabCompanyName()
    {
        return $this->cab_company_name;
    }

    /**
     * @param mixed $cab_company_name
     */
    public function setCabCompanyName($cab_company_name)
    {
        $this->cab_company_name = $cab_company_name;
    }

    /**
     * @return mixed
     */
    public function getCabType()
    {
        return $this->cab_type;
    }

    /**
     * @param mixed $cab_type
     */
    public function setCabType($cab_type)
    {
        $this->cab_type = $cab_type;
    }

    /**
     * @return mixed
     */
    public function getNumberOfSeats()
    {
        return $this->number_of_seats;
    }

    /**
     * @param mixed $number_of_seats
     */
    public function setNumberOfSeats($number_of_seats)
    {
        $this->number_of_seats = $number_of_seats;
    }

    /**
     * @return mixed
     */
    public function getMinPrice()
    {
        return $this->min_price;
    }

    /**
     * @param mixed $min_price
     */
    public function setMinPrice($min_price)
    {
        $this->min_price = $min_price;
    }


}