<?php
	session_start();
	require_once "models/flight.php";
	class Flight_Controller
	{
		private $model;
		public function __construct()
		{
			$this->model=new Flight_Model();
			
		}
		
		public function generateUniqueID()
		{
			$str=implode(range(0,9));
			$shuffle=str_shuffle($str);
			return substr($shuffle,0,6);
		}
		public function getList()
		{
			$madc=$this->generateUniqueID();
			$_SESSION["madc"]=$madc;
			
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
		public function showDepartureAirportList()
		{
			
			$list=$this->model->getDepartureAirportList();
			if(!$list)
			{
			    return $list;
		    } 
			else
			{
		        
				return json_encode($list);
				
		    }
			
			
		}
		public function showArrivalAirportList($noidi)
		{
			
			if(empty($noidi))
			{
				return "Xin chọn sân bay đi";

			}
			$list=$this->model->getArrivalAirportList($noidi);

			if(!$list)
			{
				return $list; 
            } 
			else
			{
                return json_encode($list);
            }
			
			
		}
		public function updateSeat($macb,$hang,$muc,$soluong)
		{
			if(empty($macb))
			{
				return"Xin nhập mã chuyến bay";

			}
			elseif($soluong<0)
			{
				return "Số lương không được âm";

			}
			elseif(empty($hang))
			{
				return "Xin nhập hạng vé";
			}
			elseif(empty($muc))
			{
				return "Xin nhập mức giá vé";
			}
			else
			{
				$this->model->updateSeat($macb,$hang,$muc,$soluong);
				return true;
			}
			
		}
		public function findFlightWithCondition($noidi,$noiden,$ngaydi,$soluongkhach,$hang)
		{
			$params=array(
            "noidi"=>$noidi,
            "noiden"=>$noiden,
            "ngay"=>$ngaydi,
            "soluongkhach"=>$soluongkhach,
            "hang"=>$hang
            );
            $list=$this->model->findFlightWithCondition($params);
            return json_encode($list);
		}
	}
?>