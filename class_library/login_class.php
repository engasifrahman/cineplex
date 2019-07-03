<?php
	require_once('db_connect_class.php');
	class All_Login extends DB_Connection
	{		
		public function login($data)
		{
			$email 			= $data['email'];
			$password 		= $data['password'];

			if(isset($data['remember']))
			{
				$remember   = $data['remember'];
			}
			
			$sql_check ="SELECT * FROM customer_info WHERE email='$email'";
			
			$result=$this->connect->query($sql_check);
			
			if($this->connect->error)
			{
				die('Error: '.$this->connect->error);
			}
			else
			{
				if($result->num_rows > 0)
				{
					$data=$result->fetch_assoc();
					$u_pass=$data['password'];

					$user_info=array(
						'name'				=>$data['name'],
						'username'			=>$data['username'],
						'email'				=>$data['email'],
						'gender'			=>$data['gender'],
						'dob'				=>$data['dob'],
						'contact'			=>$data['contact'],
						'address'			=>$data['address'],
						'password'			=>$data['password'],
						);
									
					if(md5($password)==$u_pass)
					{  
						############ COOkie Settings #############
 						if(isset($remember))
						{
							if($remember==='Y')
							{
								$c_time= 60*3*60*24;
								$set_cookietime= time()+ $c_time;
								setcookie('email',$email,$set_cookietime,'/');
								setcookie('password',$password,$set_cookietime,'/');
							}
							else
							{
								setcookie('email','',0,'/');
								setcookie('password','',0,'/');
							}
						}
						else
						{
							setcookie('email','',0,'/');
							setcookie('password','',0,'/');
						}
						
						############ Session Settings #############
						$_SESSION['u_info']=$user_info;
						header('Location: user/u_dashboard.php');
						//echo "<br>You successfully login"; 
					}
					else
					{
						//echo '<br>Password Does Not Match';
						$pass_error='Password Does Not Match';
						return array("pass_error"=>$pass_error);
					}				
				}
				else
				{
					$sql_check ="SELECT * FROM admin_info WHERE email='$email'";

					$result=$this->connect->query($sql_check);

					if($this->connect->error)
					{
						die('Error: '.$this->connect->error);
					}
					else
					{
						if($result->num_rows > 0)
						{
							$data=$result->fetch_assoc();
							$ad_pass=$data['password'];

							$admin_info=array(
							'name'				=>$data['name'],
							'username'			=>$data['username'],
							'email'				=>$data['email'],
							'contact'			=>$data['contact'],
							'password'			=>$data['password'],
							);

							if(md5($password)==$ad_pass)
							{  
								############ COOkie Settings #############
								if(isset($remember))
								{
									if($remember==='Y')
									{
										$c_time= 60*360*24;
										$set_cookietime= time()+ $c_time;
										setcookie('email',$email,$set_cookietime,'/');
										setcookie('password',$password,$set_cookietime,'/');
									}
									else
									{
										setcookie('email','',0,'/');
										setcookie('password','',0,'/');
									}
								}
								else
								{
									setcookie('email','',0,'/');
									setcookie('password','',0,'/');
								}

								############ Session Settings #############
								$_SESSION['ad_info']=$admin_info;
								header('Location: admin/ad_dashboard.php');
								//echo "<br>You successfully login"; 
							}
							else
							{
							//echo '<br>Password Does Not Match';
								$pass_error='Password Does Not Match';
								return array("pass_error"=>$pass_error);
							}				
						}
						else
						{
							//echo '<br>Email Does Not Match';
							$email_error='Email Does Not Match';
							return array("email_error"=>$email_error);
						}
					}
				}
			}

		}	
		public function logout()
		{
			session_unset();
			session_destroy();
			header('Location:../login.php');
			//echo 'successfully logout';
		}
	}
?>