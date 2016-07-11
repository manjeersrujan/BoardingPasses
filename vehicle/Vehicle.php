<?php

namespace vehicle;
use booking\Booking;

/**
 * Class Vehicle
 * @package vehicle
 *
 * Abstract class which is parent of every vehicle that can be booked.
 */
abstract class Vehicle
{
    /**
     * @var
     *
     * Vehicle number
     */
    protected $number;

    /**
     * @return mixed
     *
     * Get the booked vehicle details.
     */
    public abstract function get_vehicle_details();

    /**
     * Constant to set seat number in booking details.
     */
    const SEAT_NUMBER = 'seat_number';

    /**
     * Constant to set pickup location in booking details.
     */
    const PICKUP_LOCATION = 'pickup_location';


    /**
     * @param Booking $booking
     * @return mixed
     *
     * Get Reservation details as string from Booking object
     */
    public abstract function get_reservation_details(Booking $booking = null);

    /**
     * Override this method if there are any extra comments. This is optional.
     */
    public function getExtraDescription(){

    }

}

