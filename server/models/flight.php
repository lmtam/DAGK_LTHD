<?php
	require_once("databases/dbconnect.php");
	class Flight_Model
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
		public function getList()
		{
			$sql="SELECT * FROM chuyenbay";
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
		public function getDepartureAirportList()
		{
			$sql="SELECT DISTINCT Noidi  FROM chuyenbay";
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
		public function getArrivalAirportList($noidi)
		{
			$sql="SELECT DISTINCT Noiden FROM chuyenbay WHERE Noidi=:noidi";
			try
			{
				$a=$this->con->prepare($sql);
				$a->bindParam(":noidi",$noidi,PDO::PARAM_STR);
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
		public function findFlightWithCondition($params)
		{
			$sql="SELECT * FROM chuyenbay WHERE Noidi=:noidi AND Noiden=:noiden  AND Soghe>=:soluongkhach AND Ngay=:ngay";
			try
			{
				$a=$this->con->prepare($sql);
				$a->bindParam("noidi",$params["noidi"]);
				$a->bindParam("noiden",$params["noiden"]);
				$a->bindParam("ngay",$params["ngay"]);
				$a->bindParam("soluongkhach",$params["soluongkhach"]);
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
		public function updateSeat($macb,$hang,$muc,$soluong)
		{
			$sql="UPDATE chuyenbay SET Soghe=:soghe WHERE Machuyenbay=:macb AND Hang=:hang AND Mucgia=:mucgia";
			try
			{
				$a=$this->con->prepare($sql);
				$a->bindParam("soghe",$soluong);
				$a->bindParam("macb",$macb);
				$a->bindParam("hang",$hang);
				$a->bindParam("mucgia",$muc);
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