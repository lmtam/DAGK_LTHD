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
			if($list != false){
			    return json_encode($list);
		    } else{
		        return $list;
		    }
		}
		public function showArrivalAirportList($noidi)
		{
			
			if(empty($noidi))
			{
				return "Xin chọn sân bay đi";

			}
			$list=$this->model->getArrivalAirportList($noidi);

			if($list != false){
                return json_encode($list);
            } else{
                return $list;
            }
		}
		public function updateSeat($macb,$soluong)
		{
			if(empty($macb))
			{
				return "Xin nhập mã chuyến bay";

			}
			if($soluong<0)
			{
				return "Số lương không được âm";

			}
			$this->model->updateSeat($macb,$soluong);
		}
	}
?>