<?php
	require_once("databases/dbconnect.php");
	class FlightDetail_Model
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
			$sql="SELECT * FROM chitietchuyenbay";
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
		public function createFlightDetail($params)
		{
			$sql="INSERT INTO chitietchuyenbay VALUES(:madc,:macb,:ngay,:hang,:mucgia)";
			try
			{
				date_default_timezone_set("Asia/Bangkok");
				$ngay=date("Y-m-d");
				$a=$this->con->prepare($sql);
				$a->bindParam("madc",$_SESSION["madc"]);
				$a->bindParam("macb",$params["macb"]);
				$a->bindParam("ngay",$ngay);
				$a->bindParam("hang",$params["hang"]);
				$a->bindParam("mucgia",$params["mucgia"]);
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