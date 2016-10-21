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
				$this->con->Disconnection();
				return $list;
				
			}
			catch(Exception $e)
			{
				echo "Caught Exception: ".$e->getMessage();
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
				$a->bindParam("madc",$params["madc"],PDO::PARAM_STR);
				$a->bindParam("macb",$params["macb"],PDO::PARAM_STR);
				$a->bindParam("ngay",$ngay);
				$a->bindParam("hang",$params["hang"],PDO::PARAM_STR);
				$a->bindParam("mucgia",$params["mucgia"],PDO::PARAM_STR);
				$a->execute();
				$this->con->Disconnection();
				echo "Thêm thành công";
			}
			catch(Exception $e)
			{
				echo "Caught Exception: ".$e->getMessage();
			}
			
		}
	}
?>