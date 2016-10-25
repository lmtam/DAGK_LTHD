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
			if(empty($tongtien))
			{
				echo "Tiền không được NULL";
				return false;
			}
			elseif(empty($danhxung))
			{
				echo "Danh xưng không được NULL";
				return false;
			}
			elseif(empty($hoten))
			{
				echo "Họ tên không được NULL";
				return false;
			}
			elseif(empty($sdt))
			{
				echo "SĐT không được NULL";
				return false;
			}
			elseif(empty($email))
			{
				echo "Email không được NULL";
				return false;
			}
			else
			{
				return $this->model->createBooking($tongtien,$danhxung,$hoten,$sdt,$email);
			}
			
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