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
			$madc=$this->generateUniqueID();
			if(empty($madc))
			{
				echo "Mã đặt chỗ không được NULL";
				return;
			}
            $_SESSION["madc"]=$madc;
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
				 echo "Xin chọn sân bay đi";
				 return false;

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
				 echo "Xin nhập mã chuyến bay";
				 return false;

			}
			elseif($soluong<0)
			{
				 echo "Số lương không được âm";
				 return false;

			}
			elseif(empty($hang))
			{
				echo "Xin nhập hạng vé";
				return false;
			}
			elseif(empty($muc))
			{
				
				echo "Xin nhập mức giá vé";
				return false;
			}
			else
			{
				return $this->model->updateSeat($macb,$hang,$muc,$soluong);
				
			}
			
		}
		public function findFlightWithCondition($noidi,$noiden,$ngaydi,$soluongkhach,$hang)
		{
			if(empty($noidi))
			{
				 echo "Xin nhập mã sân bay đi";
				 return false;

			}
			elseif(empty($noiden))
			{
				 echo "Xin nhập mã sân bay đến";
				 return false;

			}
			elseif(empty($ngaydi))
			{
				echo "Xin nhập ngày đi";
				return false;
			}
			elseif($soluongkhach<=0)
			{
				
				echo "Số lượng khách tìm kiếm không được âm";
				return false;
			}
			elseif(empty($hang))
			{
				
				echo "Xin nhập hạng vé";
				return false;
			}
			else
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
	}
?>