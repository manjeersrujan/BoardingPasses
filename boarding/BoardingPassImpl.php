<?php

namespace boarding;
require_once("BoardingPass.php");
require_once("vehicle/vehicle.php");
require_once("booking/Booking.php");

use boarding\BoardingPass;
use booking\Booking;
use vehicle\Vehicle;


/**
 * Class BoardingPassImpl
 * @package boarding
 *
 * Implementations of boarding passes. It contains only Vehicle, Booking details, and some extra comments.
 *
 * Completely independent of vehicle and booking meta data.
 */
class BoardingPassImpl implements BoardingPass
{
    /**
     * @var string
     *
     * Source station
     */
    private $source;

    /**
     * @var string
     *
     * Destination station
     */
    private $destination;

    /**
     * @var Booking
     *
     * Reservation details. Like seat number, Time etc
     */
    private $booking;

    /**
     * @var Vehicle
     *
     * Vehicle details whcih is booked.
     */
    private $vehicle;

    /**
     * @var string
     *
     * If there is any extra description specific to this boarding. Like "please be at picking place before 15 mins"
     */
    private $extra_description;


    /**
     * BoardingPassImpl constructor.
     * @param string $source
     * @param string $destination
     * @param Booking $booking
     * @param string $extra_description
     * @param Vehicle $vehicle
     */
    public function __construct(string $source, string $destination, Booking $booking = null, string $extra_description = null, Vehicle $vehicle)
    {
        $this->source = $source;
        $this->destination = $destination;
        $this->booking = $booking;
        $this->extra_description = $extra_description;
        $this->vehicle = $vehicle;
    }

    /**
     * @return string
     */
    function __toString()
    {
        return $this->get_full_description();
    }

    /**
     * @return string
     *
     * Get ful description of the boarding pass.
     */
    public function get_full_description()
    {
        $full_description = $this->source. ' ===> ' .$this->destination;

        $full_description = $full_description . " Take " . $this->vehicle .
            " from " . $this->source .
            " to " . $this->destination .
            ". ";

        $reservation_details = $this->vehicle->get_reservation_details($this->booking);


        if (!is_null($reservation_details)) {
            $full_description = $full_description . $reservation_details;
        }

        if (!is_null($this->extra_description)) {
            $full_description = $full_description . $this->extra_description;
        }

        $vehicle_extra_description = $this->vehicle->getExtraDescription();
        if (!is_null($vehicle_extra_description)) {
            $full_description = $full_description . $vehicle_extra_description;
        }


        return $full_description;
    }


    /**
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param string $source
     */
    public function setSource($source)
    {
        $this->source = $source;
    }

    /**
     * @return string
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * @param string $destination
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;
    }

    /**
     * @return Vehicle
     */
    public function getVehicle()
    {
        return $this->vehicle;
    }

    /**
     * @param Vehicle $vehicle
     */
    public function setVehicle(Vehicle $vehicle)
    {
        $this->vehicle = $vehicle;
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

    /**
     * @return Booking
     */
    public function getBookingDetails()
    {
        return $this->booking;
    }

    /**
     * @param Booking $booking
     */
    public function setBookingDetails(Booking $booking)
    {
        $this->booking = $booking;
    }


}