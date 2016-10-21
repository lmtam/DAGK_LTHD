<?php
	require_once "models/flightdetail.php";
	class FlightDetail_Controller
	{
		private $model;
		
		public function __construct()
		{
			$this->model=new FlightDetail_Model();
		}
		public function createFlightDetail($madc,$macb,$hang,$mucgia)
		{
			$params=array(
			"madc"=>$madc,
			"macb"=>$macb,
			"hang"=>$hang,
			"mucgia"=>$mucgia
			);
			$this->model->createFlightDetail($params);
			
		}
		public function getList()
		{
			$list=$this->model->getList();
			echo json_encode($list);
		}
		
	}
?>