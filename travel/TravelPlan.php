<?php

namespace travel;
use vehicle\Vehicle;
use SplStack;

/**
 * Class TravelPlan
 * @package travel
 *
 * A class to hold the entire information needed for the travel.
 */
class TravelPlan
{

    /**
     * TravelPlan constructor.
     * @param SplStack $boarding_passes_stack
     */
    public function __construct(SplStack $boarding_passes_stack)
    {
        $this->boarding_passes_stack = $boarding_passes_stack;
    }


    /**
     * @return SplStack
     */
    public function get_boarding_passes()
    {
        return $this->boarding_passes_stack;
    }


    /**
     * Prints the travel plan.
     */
    public function print_travel_plan()
    {
        $count = 1;
        while (!$this->boarding_passes_stack->isEmpty())
        {
            echo $count . ") " . $this->boarding_passes_stack->top() . PHP_EOL;
            $count++;
            $this->boarding_passes_stack->pop();
        }
    }

    /**
     * @var SplStack
     *
     * stack of boarding passes where the first borading pass will be the top of the stack.
     */
    private $boarding_passes_stack;

}