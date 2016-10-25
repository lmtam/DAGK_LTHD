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

		public function createBooking($tongtien,$danhxung,$hoten,$sdt,$email)
		{

			$sql="INSERT INTO datcho VALUES(:madc,:thoigian,:tongtien,:trangthai,:danhxung,:hoten,:sdt,:email)";

			try
			{
				
				date_default_timezone_set("Asia/Bangkok");
				$thoigian=date("Y-m-d H-i-s");
				
				$a=$this->con->prepare($sql);
				$a->bindParam("madc",$_SESSION['madc'],PDO::PARAM_STR);
				$a->bindParam("thoigian",$thoigian,PDO::PARAM_STR);
				$a->bindParam("tongtien",$tongtien,PDO::PARAM_STR);
				$a->bindParam("trangthai",$x = 1,PDO::PARAM_STR);
				$a->bindParam("danhxung",$danhxung,PDO::PARAM_STR);
				$a->bindParam("hoten",$hoten,PDO::PARAM_STR);
				$a->bindParam("sdt",$sdt,PDO::PARAM_STR);
				$a->bindParam("email",$email,PDO::PARAM_STR);
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
		public function getBookingInfo()
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


	}
?>