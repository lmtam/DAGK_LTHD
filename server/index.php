<?php
//use json_decode for php file and jQuery.parseJSON() for html file
	require "libraries/vendor/autoload.php";
	require_once ("controllers/flight.php");
	require_once ("controllers/flightdetail.php");
	$app=new \Slim\App();
	

	//$con->showDepartureAirportList();
	//$con->showArrivalAirportList("SGN");
	
	$app->get("/flight",function($request,$response)
	{
	    $con = new Flight_Controller();
        $result = $con->showDepartureAirportList();
         echo $result;

	});
	$app->run();
?>