<?php


namespace vehicle;

use booking\Booking;

/**
 * Class Bus
 * @package vehicle
 *
 * A subclass of Bus with its own data and fields. This abstracts the vehicle details completely from external classes.
 */
class Bus extends Vehicle
{

    /**
     * @var string
     *
     * Travels name
     */
    private $travel_name;

    /**
     * @var string
     *
     * Type of bus like (Sleeper, Semi sleeper, etc)
     */
    private $bus_type;

    /**
     * @var string
     *
     * Extra description
     */
    private $extra_description;

    /**
     * @var int
     *
     * Total number of seats. This is optional in this case.
     */
    private $number_of_seats;


    /**
     * Bus constructor.
     * @param string $travel_name
     * @param string $bus_type
     * @param int $number_of_seats
     * @param string $number
     * @param $extra_description
     */
    public function __construct(string $travel_name, string $bus_type, int $number_of_seats, string $number, string $extra_description)
    {
        $this->travel_name = $travel_name;
        $this->bus_type = $bus_type;
        $this->number_of_seats = $number_of_seats;
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
        return $this->travel_name . " Bus with number " . $this->number;
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
     * @return string
     */
    function __toString()
    {
        return $this->get_vehicle_details();
    }

    /**
     * @return string
     */
    public function getTravelName()
    {
        return $this->travel_name;
    }

    /**
     * @param string $travel_name
     */
    public function setTravelName($travel_name)
    {
        $this->travel_name = $travel_name;
    }

    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param string $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @return string
     */
    public function getBusType()
    {
        return $this->bus_type;
    }

    /**
     * @param string $bus_type
     */
    public function setBusType($bus_type)
    {
        $this->bus_type = $bus_type;
    }

    /**
     * @return int
     */
    public function getNumberOfSeats()
    {
        return $this->number_of_seats;
    }

    /**
     * @param int $number_of_seats
     */
    public function setNumberOfSeats($number_of_seats)
    {
        $this->number_of_seats = $number_of_seats;
    }

    /**
     * @return string
     */
    public function getExtraDescription()
    {
        return $this->extra_description;
    }

    /**
     * @param string $extra_description
     */
    public function setExtraDescription($extra_description)
    {
        $this->extra_description = $extra_description;
    }


}