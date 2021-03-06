<?php


namespace vehicle;
use booking\Booking;

/**
 * Class Flight
 * @package vehicle
 *
 * A subclass of Flight with its own data and fields. This abstracts the vehicle details completely from external classes.
 */
class Flight extends Vehicle
{
    /**
     * @var
     * The Airlines name
     */
    private $airlines_name;

    /**
     * @var
     * Type of flight
     */
    private $flight_type;

    /**
     * @var string
     *
     * Extra description
     */
    private $extra_description;

    /**
     * @var
     * Optional param: number of seats in flight
     */
    private $number_of_seats;

    /**
     * Flight constructor.
     * @param $airlines_name
     * @param $number
     * @param $flight_type
     * @param $number_of_seats
     * @param $extra_description
     */
    public function __construct(string $airlines_name, string  $number, string $flight_type, int $number_of_seats, string $extra_description)
    {
        $this->airlines_name = $airlines_name;
        $this->flight_type = $flight_type;
        $this->number_of_seats = $number_of_seats;
        $this->extra_description = $extra_description;
        $this->number = $number;
    }

    /**
     * @return string
     *
     * Get the booked vehicle details.
     */
    public function get_vehicle_details()
    {
        $vehicle_details = $this->airlines_name . " Ship with number " . $this->number . '. Flight type is ' . $this->flight_type;

        if (!is_null($this->number_of_seats)) {
            $vehicle_details = $vehicle_details . ' Total number of seats in flight is ' . $this->number_of_seats;
        }

        return $vehicle_details;

    }


    /**
     * @param Booking $booking
     * @return string|void
     *
     * Reservation details from reservation metadata.
     */
    public function get_reservation_details(Booking $booking = null)
    {
        if (is_null($booking) || is_null($booking->getBookingMetadata())) {
            return;
        }

        $reservation_details = '';

        if (array_key_exists(self::SEAT_NUMBER, $booking->getBookingMetadata()) && empty($booking->getBookingMetadata()[self::SEAT_NUMBER])) {
            $reservation_details = $reservation_details . ' Sit in seat ' . $booking->getBookingMetadata()[self::SEAT_NUMBER].'.';
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
    public function getAirlinesName()
    {
        return $this->airlines_name;
    }

    /**
     * @param mixed $airlines_name
     */
    public function setAirlinesName($airlines_name)
    {
        $this->airlines_name = $airlines_name;
    }

    /**
     * @return mixed
     */
    public function getFlightType()
    {
        return $this->flight_type;
    }

    /**
     * @param mixed $flight_type
     */
    public function setFlightType($flight_type)
    {
        $this->flight_type = $flight_type;
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


}