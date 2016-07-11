<?php
/**
 * Created by PhpStorm.
 * User: z001v3f
 * Date: 6/28/16
 * Time: 8:41 PM
 */

namespace boarding;
use vehicle\Vehicle;


/**
 * Interface BoardingPass
 * @package boarding
 *
 * Interface to handle Boarding pass details
 */
interface BoardingPass
{
    /**
     * @return string
     */
    public function get_full_description();

    /**
     * @return string
     */
    public function getSource();

    /**
     * @param string $source
     */
    public function setSource($source);

    /**
     * @return string
     */
    public function getDestination();

    /**
     * @param string $destination
     */
    public function setDestination($destination);

    /**
     * @return Vehicle
     */
    public function getVehicle();

    /**
     * @param Vehicle $vehicle
     */
    public function setVehicle(Vehicle $vehicle);

    /**
     * @return string
     */
    public function getExtraDescription();

    /**
     * @param string $extra_description
     */
    public function setExtraDescription($extra_description);
}