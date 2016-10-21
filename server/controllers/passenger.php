<?php
	require_once "models/passenger.php";
	class Passenger_Controller
	{
		private $model;
		public function __construct()
		{
			$this->model=new Passenger_Model();
		}
		public function getList()
		{
			$list=$this->model->getList();
			echo json_encode($list);
		}
		public function createPassenger($madc,$danhxung,$ho,$ten)
		{
			$params=array(
			"madc"=>$madc,
			"danhxung"=>$danhxung,
			"ho"=>$ho,
			"ten"=>$ten
			);
			$this->model->createPassenger($params);
		}
	}
?>