<?php

	require(__DIR__.'/../db_details.php');
	
	class DB_Connection
	{
		
		private $db_host = DB_Host;
		private $db_user = DB_User;
		private $db_pass = DB_Pass;
		private $db_name = DB_Name;
		
		protected $connect;
		
		public function __construct()
		{			
			$this->db_connect();
		}
		
		private function db_connect()
		{
			$this->connect= new mysqli($this->db_host,$this->db_user,$this->db_pass,$this->db_name);	
			
			if($this->connect->connect_error)
			{
				die('Error: '.$this->connect->connect_error);
			}
			
			//echo 'Database Connect Successfully';
			
		}
	}
	//$check_DB_class = new DB_Connection();
?>