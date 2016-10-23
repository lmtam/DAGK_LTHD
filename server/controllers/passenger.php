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
			if($list != false){
			    return json_encode($list);
			}
			else{
			    return $list;
			}
		}
		public function createPassenger($madc,$danhxung,$ho,$ten)
		{
			$params=array(
			"madc"=>$madc,
			"danhxung"=>$danhxung,
			"ho"=>$ho,
			"ten"=>$ten
			);
			return $this->model->createPassenger($params);
		}
	}
?>