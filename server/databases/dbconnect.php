<?php
	require_once dirname(__FILE__).'/constant.php';
	class dbConnection
	{
		private $con;
		public function Connection()
		{
			try
			{
				$this->con=new PDO(db_path,db_username,db_password);
				return $this->con;
			}
			catch(Exception $e)
			{
				echo "Caught Exception: ".$e->getMessage();
			}
		}
		
	}
?>