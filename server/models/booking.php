<?php
	require_once("databases/dbconnect.php");
	class Booking_Model
	{
		private $con;
		public function __construct()
		{
			$temp=new dbConnection();
			$this->con=$temp->Connection();
		}
		public function Disconnection()
		{
			$this->con=null;
		}
		public function generateUniqueID()
		{
			$str=implode(range(0,9));
			$shuffle=str_shuffle($char);
			return substr($shuffle,0,6);
		}
		public function createBooking($madc)
		{
			
			$sql="Insert into datcho values(:madc,:thoigian,:tongtien,:trangthai)";
			try
			{
				$madc=$this->generateUniqueID();
				date_default_timezone_set("Asia/Bangkok");
				$thoigian=date("Y-m-d");
				
				$a=$this->con->prepare($sql);
				
				$a->bindParam(":madc",$madc);
				$a->bindParam(":thoigian",$thoigian);
				$a->bindParam(":tongtien",0);
				$a->bindParam(":trangthai",0);
				$a->execute();
				$this->Disconnection();
				return true;
			}
			catch(Exception $e)
			{
				echo "Caught Exception: ".$e->getMessage();
				return false;
			}
		}
		public getBookingInfo()
		{
			$sql="SELECT * FROM datcho";
			try
			{
				$a=$this->con->prepare($sql);
				$a->execute();
				$list=$a->fetchAll(PDO::FETCH_BOTH);
				$this->Disconnection();
				return $list;
			}
			catch(Exception $e)
			{
				echo "Caught Exception: ".$e->getMessage();
			    return false;
			}
		}
		public function updateBooking($madc,$para_name,$para_value)
		{
			$sql="UPDATE datcho SET :paraname=:paravalue WHERE Madatcho=:madc";
			try
			{
				$a=$this->con->prepare($sql);
				$a->bindParam("paraname",$para_name);
				$a->bindParam("paravalue",$para_value);
				$a->execute();
				$this->Disconnection();
				return true;
			}
			catch(Exception $e)
			{
				echo "Caught Exception: ".$e->getMessage();
				return false;
			}
		}

	}
?>