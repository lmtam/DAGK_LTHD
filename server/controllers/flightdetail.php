<?php
	require_once "models/flightdetail.php";
	class FlightDetail_Controller
	{
		private $model;
		
		public function __construct()
		{
			$this->model=new FlightDetail_Model();
		}
		public function createFlightDetail($macb,$hang,$mucgia)
		{
			$params=array(
			"macb"=>$macb,
			"hang"=>$hang,
			"mucgia"=>$mucgia
			);
			return $this->model->createFlightDetail($params);
			
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
		
	}
?>