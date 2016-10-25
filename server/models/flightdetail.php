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
				$a=$this->con->prepare($sql);
				$a->bindParam("madc",$_SESSION["madc"],PDO::PARAM_STR);
				$a->bindParam("macb",$params["macb"],PDO::PARAM_STR);
				$a->bindParam("ngay",$params["ngay"],PDO::PARAM_STR);
				$a->bindParam("hang",$params["hang"],PDO::PARAM_STR);
				$a->bindParam("mucgia",$params["mucgia"],PDO::PARAM_STR);
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