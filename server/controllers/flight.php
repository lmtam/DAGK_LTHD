<?php
	require_once "models/flight.php";
	class Flight_Controller
	{
		private $model;
		public function __construct()
		{
			$this->model=new Flight_Model();
			
		}
		public function showDepartureAirportList()
		{
			$list=$this->model->getDepartureAirportList();
			echo json_encode($list);
		}
		public function showArrivalAirportList($noidi)
		{
			
			if(empty($noidi))
			{
				echo "Xin chọn sân bay đi";
				return;
			}
			$list=$this->model->getArrivalAirportList($noidi);
			echo json_encode($list);
		}
		public function updateSeat($macb,$soluong)
		{
			if(empty($macb))
			{
				echo "Xin nhập mã chuyến bay";
				return;
			}
			if($soluong<0)
			{
				echo "Số lương không được âm";
				return;
			}
			$this->model->updateSeat($macb,$soluong);
		}
	}
?>