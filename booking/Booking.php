<?php

namespace booking;

/**
 * Class Booking
 * @package booking
 *
 * This class is a place holder booking metadata. It can contain any kind of data to store booking details.
 */
class Booking
{
    /**
     * Booking constructor.
     * @param $booking_metadata
     */
    public function __construct($booking_metadata)
    {
        $this->booking_metadata = $booking_metadata;
    }

    /**
     * @return mixed
     */
    public function getBookingMetadata()
    {
        return $this->booking_metadata;
    }

    /**
     * @param mixed $booking_metadata
     */
    public function setBookingMetadata($booking_metadata)
    {
        $this->booking_metadata = $booking_metadata;
    }
    /**
     * @var
     *
     * An array which stores all booking related data. Like seat number, pick up place etc.
     */
    private $booking_metadata;

}