

Assumptions:
---------------
1) The input is completely valid. (Validations not done. However added a function to add validations at one place)

2) The boarding pass chain is not broken. It's connected graph. (No validation added)

3) No cycles in boarding pass chain. (No validation added)

4) Source and destinations strings are case-sensitive.

4) Added test case which is valid (TravelPlannerImpl.php). I tested with multiple tests.

5) Not used any external libraries to test due to time constraint.



Extendability:
-----------------
1) Vehicle (physical vehicle) is an abstract class which can extended by any new mode of transportation. So, vehicle details (like number, brand etc) are completely abstracted from others.

2) Booking object contains details (metadata like seat number, pickup point etc) related to booking. This is independent of the physical vehicle.

3) BoardingPass interface have few methods to generate details of a single boarding pass. It completely depends on vehicle and booking that it has.
We can change any details of vehicle or booking without effecting or touching BoardingPass implementations.

4) TravelPlan class contains all the info related to a complete travel with multiple boarding passes.
It can change its own functions in any way without effecting any other class.

5) TravelPlanner interface implementations are the actual places where the algorithm will be applied. (Inspired from Topological sorting)
It needs only list of boarding passes with source and destination. So, its completely independent from other.

6) So, with the above design all of the entities are loosely coupled.
 So, any individual entity can be extended/modified to a great extent without affecting other entities.
 The loosely coupled contract should be maintained.

 Algorithm:
 ------------
 1) Time Complexity: O(n). Assuming inserting and retrieving from an array(hash) is constant.
 2) Space complexity: Θ(n). Uses a array to store/map the Boarding passes



Procedure to run :
------------------
1) unzip TravelPlanning.zip
2) cd TravelPlanning/
3) php TravelPlannerTest.php


Procedure to see PHP-doc:
-------------------------
1) unzip TravelPlanning.zip
2) open "TravelPlanning/docs/api/index.html" with any browser.
3) Please see "Class Hierarchy Diagram" also for design of classes.

Note:
--------

1) I am not a PHP pro. Learned it for sometime before actually coding. So, language based optimizations/best practices might miss at some places.
