<?php
	require_once "models/flightdetail.php";
	class FlightDetail_Controller
	{
		private $model;
		
		public function __construct()
		{
			$this->model=new FlightDetail_Model();
		}
		public function createFlightDetail($macb,$ngay,$hang,$mucgia)
		{
			if(empty($macb))
			{
				echo "Xin nhập mã chuyến bay";
				return false;
			}
			elseif(empty($hang))
			{
				echo "Xin nhập hạng vé";
				return false;
			}
			elseif(empty($mucgia))
			{
				echo "Xin nhập mức giá vé";
				return false;
			}
			elseif(empty($ngay))
			{
				echo "Xin nhập ngày";
				return false;
			}
			else
			{
				$params=array(
					"macb"=>$macb,
					"hang"=>$hang,
					"mucgia"=>$mucgia,
					"ngay"=>$ngay
					);
				return $this->model->createFlightDetail($params);
			}
			
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