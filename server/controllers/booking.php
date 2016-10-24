<?php
	require_once("models/booking.php");
	class Booking_Controller
	{
		private $model;
		public function __construct()
		{
			$this->model=new Booking_Model();
		}
		public function createBooking($tongtien,$danhxung,$hoten,$sdt,$email)
		{

			return $this->model->createBooking($tongtien,$danhxung,$hoten,$sdt,$email);
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