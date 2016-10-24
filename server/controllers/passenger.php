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
			if(!$list)
			{
				return $list;
			    
			}
			else
			{
				return json_encode($list);
			}
		}
		public function createPassenger($danhxung,$ho,$ten)
		{
			$params=array(
			"danhxung"=>$danhxung,
			"ho"=>$ho,
			"ten"=>$ten
			);
			return $this->model->createPassenger($params);
		}
	}
?>