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
			}
		}
		public function findFlightWithCondition($noidi,$noiden,$ngaydi,$soluongkhach)
		{
			
		}
		public function updateSeat($macb,$soluong)
		{
			$sql="UPDATE chuyenbay SET Soghe=:soghe WHERE Machuyenbay=:macb";
			try
			{
				$a=$this->con->prepare($sql);
				$a->bindParam("soghe",$soluong,PDO::PARAM_INT);
				$a->bindParam("macb",$macb,PDO::PARAM_STR);
				$a->execute();
				$this->Disconnection();
			}
			catch(Exception $e)
			{
				echo "Caught Exception: ".$e->getMessage();
			}
		}
	}
?>