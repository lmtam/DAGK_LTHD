<?php
	require_once("databases/dbconnect.php");
	class Passenger_Model
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
			$sql="SELECT * FROM hanhkhach";
			try
			{
				$a=$this->con->prepare($sql);
				$a->execute();
				$list=$a->fetchAll(PDO::FETCH_ALL);
				$this->Disconnection();
				return $list;
			}
			catch(Exception $e)
			{
				echo "Caught Exception: ".$e->getMessage();
				return false;
			}
		}
		public function createPassenger($params)
		{
			$sql="INSERT INTO hanhkhach VALUES(:madc,:danhxung,:ho,:ten)";
			try
			{
				$a=$this->con->prepare($sql);
				$a->bindParam("madc",$_SESSION["madc"]);
				$a->bindParam("danhxung",$params["danhxung"]);
				$a->bindParam("ho",$params["ho"]);
				$a->bindParam("ten",$params["ten"]);
				$a->excute();
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