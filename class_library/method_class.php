<?php
	require_once('db_connect_class.php');

	class Methods extends DB_Connection
	{ 
		############# Movie Data Insert ###########
		public function movie_data_insert($data)
		{

			$name         = $data['name'];
			$director     = $data['director'];
			$genre        = $data['genre'];
			$release      = $data['release_date'];
			$cast         = $data['cast'];     

			$db_error=NULL;
			$add_success=NULL;

	      ###########   Data Inserting Query ###########################    

			$db_connt=$this->connect;

			$sql_insert="INSERT INTO movie_info(name, director, genre, cast, release_date) VALUES ('$name','$director','$genre','$cast','$release')";

			$result=$db_connt->query($sql_insert);

			if($db_connt->error)
			{
	          //echo 'Error:'.$db_connt->error;
				$db_error ='Error:'.$db_connt->error;
				return array("db_error"=>$db_error);
			}
			else
			{
	            //echo '<br> You added movie successfully';
				$add_success = 'You added movie successfully';
				return array("add_success"=>$add_success);
				$db_connt->close();
			}
		}

		############# Movie Data View ###########
		public function movie_data_view()
		{

			$db_connt=$this->connect;

			$db_error=NULL;

			$sql_view="SELECT * FROM movie_info";
			
			$result= $db_connt->query($sql_view);
			
			if($db_connt->error)
			{
				$db_error = 'DB Error:'.$db_connt->error;
				return $db_error;
			}
			else
			{
				return $result;

					//colse DB connection
				$db_connt->close();
			}
		}
		################ Movie Data Delete ###########################
		
		public function movie_data_delete()
		{
			$del_id=$_GET['del_id'];
			
			$db_connt=$this->connect;

			$sql_del = "DELETE FROM movie_info WHERE id='$del_id'";
			
			$result = $db_connt->query($sql_del);
			
			if($db_connt->error)
			{
					echo 'DB Error:'.$db_connt->error;
			}
			else
			{
				
				header('Location:ad_movie_list.php');
				
				$db_connt->close();

			}
			
			
		}

		############# Booking Data Insert ###########
		public function booking_data_insert($data)
		{
			$cus_email    = $_SESSION['u_info']['email'];
			$movie_name   = $data['name'];
			$show_date    = $data['date'];
			$show_time    = $data['time'];
			$total_seat   = $data['seat'];
			$total_bill   = intval($total_seat)*250;     

			$db_error=NULL;
			$buy_success=NULL;

	      ###########   Data Inserting Query ###########################    

			$db_connt=$this->connect;

			$sql_insert="INSERT INTO booking_info(cus_email, movie_name, total_seat, show_date, show_time, total_bill) VALUES ('$cus_email','$movie_name','$total_seat','$show_date','$show_time','$total_bill')";

			$result=$db_connt->query($sql_insert);

			if($db_connt->error)
			{
	          //echo 'Error:'.$db_connt->error;
				$db_error ='Error:'.$db_connt->error;
				return array("db_error"=>$db_error);
			}
			else
			{
	            //echo '<br> You added movie successfully';
				$buy_success = 'You successfully buy ticket';
				return array("buy_success"=>$buy_success);
				$db_connt->close();
			}
		}

		############# Booked Movie Data View ###########
		public function booked_data_view()
		{

			$db_connt=$this->connect;

			$db_error=NULL;

			$email=$_SESSION['u_info']['email'];

			$sql_view="SELECT * FROM booking_info WHERE cus_email='$email'";
			
			$result= $db_connt->query($sql_view);
			
			if($db_connt->error)
			{
				$db_error = 'DB Error:'.$db_connt->error;
				return $db_error;
			}
			else
			{
				return $result;

				//colse DB connection
				$db_connt->close();
			}
		}
	}
?>