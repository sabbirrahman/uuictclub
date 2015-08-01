<?php require_once "../includes/config.php"	 ; ?>
<?php
	// Logout Action Script
	if(isset($_POST['lgot'])){
		$_SESSION['user_name'] 	= NULL;
		$_SESSION['user_id'] 	= NULL;
		$_SESSION['user_image'] = NULL;
		if(isset($_COOKIE['user_name']) && isset($_COOKIE['user_id'])){
			setcookie('user_name'	, "", time() - 60*60*24*365, '/');
			setcookie('user_id'		, "", time() - 60*60*24*365, '/');
			setcookie('user_image'	, "", time() - 60*60*24*365, '/');
		}
		header("Location: " . BASE_URL);
		exit;
	}
?>