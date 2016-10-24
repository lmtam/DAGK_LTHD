<?php
//use json_decode for php file and jQuery.parseJSON() for html file
	require "libraries/vendor/autoload.php";
	require_once ("controllers/flight.php");
	require_once ("controllers/flightdetail.php");
	require_once ("controllers/booking.php");
	require_once ("controllers/passenger.php");
	$app=new \Slim\App();
	$app->get("/flights",function()
	{
		$con=new Flight_Controller();
		$result=$con->getList();
		echo $result;
	});
	$app->get("/departureairports",function($request,$response,$args)
	{
	    $con = new Flight_Controller();
        $result = $con->showDepartureAirportList();
        echo $result;
	

	});
	$app->get("/arrivalairports/{departureairport}",function($request,$response,$args)
	{
		$da=$args["departureairport"];
		$con=new Flight_Controller();
		$result=$con->showArrivalAirportList($da);
		echo $result;
	});
	$app->post("/booking",function($request,$response,$args)
	{
		$tongtien=$request["tongtien"];
		
		$con=new Booking_Controller();
		
		
		$result=$con->createBooking($tongtien);
		
		echo $result;
	});
	$app->put("/flights/{macb}/{hang}/{muc}",function($request,$response,$args)
	{
		$macb=$args["macb"];
		$hang=$args["hang"];
		$muc=$args["muc"];
		$input=$request->getParsedBody();
		$veconlai=$input["veconlai"];
		
		$con=new Flight_Controller();
		$result=$con->updateSeat($macb,$hang,$muc,$veconlai);
		
	});
	$app->get("/flightdetails",function($request,$response,$args)
	{
		$con=new FlightDetail_Controller();
		$result=$con->getList();
		echo $result;
	});
	$app->post("/flightdetails",function($request,$response,$args)
	{
		$con=new FlightDetail_Controller();
		$macb=$request["macb"];
		$hang=$request["hang"];
		$mucgia=$request["mucgia"];
		
		$result=$con->createFlightDetail($macb,$hang,$mucgia);
		echo $result;
	});
	$app->get("/passengers",function($request,$response,$args)	
	{
		$con=new Passenger_Controller();
		$result=$con->getList();
		echo $result;
	});
	$app->post("/passengers",function($request,$response,$args)
	{
		$con=new Passenger_Controller();
		$danhxung=$request["danhxung"];
		$ho=$request["ho"];
		$ten=$request["ten"];
		$result=$con->createPassenger($danhxung,$ho,$ten);
		echo $result;
	});
	$app->get("/flights/{noidi}/{noiden}/{ngaydi}/{soluong}",function($request,$response,$args)
	{
		$noidi=$args["noidi"];
		$noiden=$args["noiden"];
		$ngaydi=$args["ngaydi"];
		$soluong=$args["soluong"];
		$con=new Flight_Controller();
		$result=$con->findFlightWithCondition($noidi,$noiden,$ngaydi,$soluong);
		echo $result;
	});
	$app->run();
?>