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
		$data=$request->getParsedBody();


		$con=new Booking_Controller();
		
		
		$result=$con->createBooking($data['tongtien'],$data['danhxung'],$data['hoten'],$data['sdt'],$data['email']);
		
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
		$data = $request->getParsedBody();
		$con=new FlightDetail_Controller();
		$macb=$data["macb"];
		$ngay = $data["ngay"];
		$hang=$data["hang"];
		$mucgia=$data["mucgia"]
		
		$result=$con->createFlightDetail($macb,$ngay,$hang,$mucgia);
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
	    $data = $request->getParsedBody();
		$con=new Passenger_Controller();
		$danhxung=$data["danhxung"];
		$ho=$data["ho"];
		$ten=$data["ten"];
		$result=$con->createPassenger($danhxung,$ho,$ten);
		echo $result;
	});
	$app->get("/flights/{noidi}/{noiden}/{ngaydi}/{soluong}/{hang}",function($request,$response,$args)
	{
		$noidi=$args["noidi"];
		$noiden=$args["noiden"];
		$ngaydi=$args["ngaydi"];
		$soluong=$args["soluong"];
		$hang=$args["hang"];
		$con=new Flight_Controller();
		$result=$con->findFlightWithCondition($noidi,$noiden,$ngaydi,$soluong,$hang);
		echo $result;
	});
	$app->run();
?>