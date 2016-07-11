<?php

namespace vehicle;
use booking\Booking;

/**
 * Class Ship
 * @package vehicle
 *
 * A subclass of Ship with its own data and fields. This abstracts the vehicle details completely from external classes.
 */
class Ship extends Vehicle
{
    /**
     * @var
     *
     * Company name
     */
    private $company_name;

    /**
     * @var string
     *
     * Extra description
     */
    private $extra_description;

    /**
     * Ship constructor.
     * @param $company_name
     * @param $number
     * @param string $extra_description
     */
    public function __construct($company_name, string  $number, $extra_description)
    {
        $this->company_name = $company_name;
        $this->number = $number;
        $this->extra_description = $extra_description;
    }


    /**
     * @return string
     *
     * Get the booked vehicle details.
     */
    public function get_vehicle_details()
    {
        return $this->company_name . " Ship with number " . $this->number;
    }

    /**
     * @param Booking $booking
     * @return string|void
     *
     * Reservation details from reservation metadata
     */
    public function get_reservation_details(Booking $booking = null)
    {
        if(is_null($booking) || is_null($booking->getBookingMetadata())){
            return '';
        }

        $reservation_details = '';

        if(array_key_exists(self::SEAT_NUMBER,$booking->getBookingMetadata()) && empty($booking->getBookingMetadata()[self::SEAT_NUMBER]) ){
            $reservation_details = $reservation_details . ' Sit in seat ' . $booking->getBookingMetadata()[self::SEAT_NUMBER].'. ';
        }


        if(array_key_exists(self::PICKUP_LOCATION,$booking->getBookingMetadata()) && empty($booking->getBookingMetadata()[self::PICKUP_LOCATION]) ){
            $reservation_details = $reservation_details . ' You will be picked up at ' . $booking->getBookingMetadata()[self::PICKUP_LOCATION].'.';
        }
        /*
         * We van have any number of parameters and generate readable text here for this vehicle.
         */

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
    public function getCompanyName()
    {
        return $this->company_name;
    }

    /**
     * @param mixed $company_name
     */
    public function setCompanyName($company_name)
    {
        $this->company_name = $company_name;
    }

    
}