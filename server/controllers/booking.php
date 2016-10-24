<?php
	require_once("models/booking.php");
	class Booking_Controller
	{
		private $model;
		public function __construct()
		{
			$this->model=new Booking_Model();
		}
		public function createBooking($tongtien)
		{
			return $this->model->createBooking($tongtien);
		}
		public function getBookingInfo()
		{
			$list =  $this->model->getBookingInfo();
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