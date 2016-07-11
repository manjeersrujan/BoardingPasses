<?php


namespace travel;
require_once("boarding/BoardingPass.php");
require_once("TravelPlan.php");
require_once("TravelPlanner.php");

use boarding\BoardingPass;
use SplStack;
use travel\TravelPlan;
use travel\TravelPlanner;

use Exception;

/**
 * Class TravelPlannerImpl
 * @package travel
 *
 * This is an implementation of TravelPlanner which provides the solution with algorithm of O(n) and Θ(n)
 */
class TravelPlannerImpl implements TravelPlanner
{
    /**
     * @param array $boarding_passes
     * @return \travel\TravelPlan
     * @throws Exception
     *
     * Get the TravelPlanner object which sorted boarding passes and the full data needed for the travel.
     */
    public function get_travel_plan(array $boarding_passes)
    {
        $this->validate_input($boarding_passes);
        return $this->sort_bording_passes($boarding_passes);
    }

    /**
     * @param array $boarding_passes
     * @throws Exception
     *
     * Validates the input. Does not need to be public
     *
     */
    private function validate_input(array $boarding_passes)
    {
        foreach ($boarding_passes as $boarding_pass) {
            if (!$boarding_pass instanceof BoardingPass) {
                echo "Input array is not valid. Containing an object which is not BoardingPass" . "<br>";
                throw new Exception('INVALID_INPUT_ARRAY');
            }
        }

    }

    /**
     * @param string $city
     * @param $visited
     * @param $stack
     * @param array $bp_hash
     *
     * An utility method to sort boarding passes. Does not need to be public
     *
     */
    private function sort_util(string $city, &$visited, $stack, array $bp_hash)
    {


        if (!array_key_exists($city, $bp_hash) || $visited[$city]) {
            return;
        }

        $visited[$city] = true;

        $next = $bp_hash[$city]->getDestination();

        if (array_key_exists($next, $visited) && !$visited[$next]) {
            $this->sort_util($next, $visited, $stack, $bp_hash);
        }

        if (array_key_exists($city, $bp_hash)) {
            $stack->push($bp_hash[$city]);
        }

    }

    /**
     * @param array $boarding_passes
     * @return \travel\TravelPlan
     *
     * An utility method to sort boarding passes. Does not need to be public
     */
    private function sort_bording_passes(array $boarding_passes)
    {
        $bp_hash = array();
        $visited = array();

        $stack = new SplStack();


        foreach ($boarding_passes as $boarding_pass) {
            $bp_hash[$boarding_pass->getSource()] = $boarding_pass;
            $visited[$boarding_pass->getSource()] = false;
        }


        foreach ($visited as $i => $value) {
            if (!$value) {
                $this->sort_util($i, $visited, $stack, $bp_hash);
            }
        }
        return new TravelPlan($stack);
    }


}
