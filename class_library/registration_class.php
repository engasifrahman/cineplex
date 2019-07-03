<?php

	require_once('db_connect_class.php');
	
	class Registraion extends DB_Connection
	{
		
		
		public function reg_data_insert($data)
		{
			
			$name				= $data['name'];
			$username			= $data['username'];
			$gender				= $data['gender'];
			$dob				= $data['dob'];
			$address			= $data['address'];
			$contact 			= $data['contact'];
			$balance 			= $data['balance'];
			$email				= $data['email'];
			$password			= $data['password'];
			$password_confirm	= $data['confirmPassword'];				

			$error=NULL;
			$db_error=NULL;
			$name_error=NULL;
			$dob_error=NULL;
			$gender_error=NULL;
			$contact_error=NULL;
			$email_error=NULL;
			$pass_error=NULL;
			$cpass_error=NULL;
		
			################### Data Validation #####################

			// validation for job_seeker Full Name
			if(strlen($name) >=6 && str_word_count($name)>=2 && preg_match('/^[a-zA-Z. ]/',$name))
			{
				//echo $full_name.'<br>';
			}
			else
			{
				$name_error="Name will be more then one word and 6 letter";
				$error="1";
			}

			// validation for User Gender
			if($gender == 'male' || $gender == 'hemale' || $gender == 'other')
			{
				//echo $gender.'<br>';
			}
			else
			{
				$gender_error="GENDER: Don't try to be smart";
				$error= "1";
			}

			// validation for Date of Birth
			list($y, $m, $d) = explode('-', $dob);

			if(checkdate($m, $d, $y))
			{
				//echo $d.'-'.$m.'-'.$y. '<br>';
			}
			else
			{
				$dob_error="DOB: Don't try to be smart";
				$error="1";
			}

			// validation for Contact Number
			if(strlen($contact)>=11 && strlen($contact)<=15 && preg_match('/[0-9+]/',$contact))
			{
				//echo $contact_number.'<br>';
			}
			else
			{
				$contact_error='Contact Number will be Numarical Number & in between 11 to 15 characters';
				$error="1";
			}

			// validation for User Email
			if(filter_var($email,FILTER_VALIDATE_EMAIL))
			{
				//echo $email.'<br>';
			}
			else
			{
				$email_error='Only valid email can be insert';
				$error="1";
			}
			
			// validation for User Password
			if(strlen($password)>=4 && strlen($password)<=50 && str_word_count($password)<=1)
			{
				if($password==$password_confirm)
				{
					//echo $password.'<br>';
				}
				else
				{
					$cpass_error= 'Confirm password does not match';
					$error="1";
				}
				
			}
			else
			{
				$pass_error= 'Password will be in a word with 6-50 characters and no space';
				$error="1";
			}
			
			###########   Data Inserting Query ###########################		
			if(!$error)
			{
				
				$db_connt=$this->connect;

				$password			= md5($data['password']);
				$password_confirm	= md5($data['confirmPassword']);

				$sql_insert="INSERT INTO customer_info(username, name, email, gender, dob, contact, address, password) VALUES ('$username','$name','$email','$gender','$dob','$contact','$address','$password_confirm')";

				$result=$db_connt->query($sql_insert);

				if($db_connt->error)
				{
					//echo 'Error:'.$db_connt->error;
					$db_error ='Error:'.$db_connt->error;
					$error="1";
					return array("db_error"=>$db_error,"error"=>$error);
				}
				else
				{
					$sql_insert2="INSERT INTO account_info(username, amount) VALUES ('$username','$balance')";

					$result2=$db_connt->query($sql_insert2);

					if($db_connt->error)
					{
						//echo 'Error:'.$db_connt->error;
						$db_error ='Error:'.$db_connt->error;
						$error="1";
						return array("db_error"=>$db_error,"error"=>$error);
					}
					else
					{
						//echo '<br> You are successfully registered';
						$reg_success = 'You are successfully registered';
						return array("reg_success"=>$reg_success);
						$db_connt->close();
					}
				}
			}
			else
			{
				//echo '<br>Error: <br>'.$error;
				return array(
					"name_error"=>$name_error,
					"dob_error"=>$dob_error,
					"gender_error"=>$gender_error,
					"contact_error"=>$contact_error,
					"email_error"=>$email_error,
					"pass_error"=>$pass_error,
					"cpass_error"=>$cpass_error,
					"error"=>$error
				);
			}
	  	}
	}// Employer_Registraion class ending
?>