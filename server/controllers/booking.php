<?php
	require_once("models/booking.php");
	class Booking_Controller
	{
		private $model;
		public function __construct()
		{
			$this->model=new Booking_Model();
		}
		public function createBooking($madc)
		{
			return $this->model->createBooking($madc);
		}
		public function getBookingInfo()
		{
			$list =  $this->model->getBookingInfo();
			if($list != false){
                return json_encode($list);
            } else{
                return $list;
            }
		}
		public function updateBooking($madc,$para_name,$para_value)
		{
			if(empty($para_name))
			{
				return;
			}
			if(empty($para_value))
			{
				return;
			}
			return $this->model->updateBooking($madc,$para_name,$para_value);
		}
		
	}
?>