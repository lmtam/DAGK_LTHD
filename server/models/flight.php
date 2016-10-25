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
			$sql="SELECT DISTINCT CB.Noidi, SB.tensanbay FROM chuyenbay CB join sanbay SB on CB.noidi = SB.Masanbay";
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
            $sql="SELECT DISTINCT CB.machuyenbay,CB.Noiden, SB.tensanbay FROM chuyenbay CB join sanbay SB on CB.Noiden = SB.masanbay where CB.Noidi=:noidi ";

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
			$sql="SELECT * FROM chuyenbay WHERE Noidi=:noidi AND Noiden=:noiden  AND Soluongghe>=:soluongkhach AND Ngay=:ngay AND Hang =:hang";
			try
			{
				$a=$this->con->prepare($sql);
				$a->bindParam("noidi",$params["noidi"],PDO::PARAM_STR);
				$a->bindParam("noiden",$params["noiden"],PDO::PARAM_STR);
				$a->bindParam("ngay",$params["ngay"],PDO::PARAM_STR);
				$a->bindParam("soluongkhach",$params["soluongkhach"],PDO::PARAM_STR);
				$a->bindParam("hang",$params["hang"],PDO::PARAM_STR);
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
			$sql="UPDATE chuyenbay SET Soluongghe=:soghe WHERE Machuyenbay=:macb AND Hang=:hang AND Mucgia=:mucgia";
			try
			{
				$a=$this->con->prepare($sql);
				$a->bindParam("soghe",$soluong,PDO::PARAM_INT);
				$a->bindParam("macb",$macb,PDO::PARAM_STR);
				$a->bindParam("hang",$hang,PDO::PARAM_STR);
				$a->bindParam("mucgia",$muc,PDO::PARAM_STR);
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