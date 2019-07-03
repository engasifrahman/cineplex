<?php
	session_start();
	if(isset($_GET['ad_logout']))
	{
        //require_once('../class_library/access_classes.php');
        require_once('../class_library/login_class.php');
		$logout = new All_Login;
		$logout ->logout();
	}
?>