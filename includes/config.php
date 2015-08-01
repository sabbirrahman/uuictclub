<?php
	// Setting the TimeZone
	date_default_timezone_set('Asia/Dhaka');
	
	// Functions for Security Purpose:
	function pure_it($data){
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	function getCurrentFolder(){
		$name = $_SERVER['PHP_SELF'];
		$name = explode('/', $name);
		array_pop($name);
		return end($name);
	}
	function ROT13($str){
		$out = "";
		$len = strlen($str);
		for($i=0; $i<$len; $i++){
		    if((ord($str[$i])>=65 && ord($str[$i])<=77) || (ord($str[$i])>=97 && ord($str[$i])<=109)){
		        $out .= chr(ord($str[$i])+13);
		    } else if((ord($str[$i])>=78 && ord($str[$i])<=90) || (ord($str[$i])>=110 && ord($str[$i])<=122)){
		        $out .= chr(ord($str[$i])-13);
		    } else if(ord($str[$i])>=48 && ord($str[$i])<=52){
		        $out .= chr(ord($str[$i])+5);
		    } else if(ord($str[$i])>=53 && ord($str[$i])<=57){
		        $out .= chr(ord($str[$i])-5);
		    } else {
		        $out .= $str[$i];
		    }
		}
		return $out;
	}

	// Constants:
	if(getCurrentFolder() == "admin" || getCurrentFolder() == "member" || getCurrentFolder() == "actions"){
		$json_string = file_get_contents("../config/uuictclub_config.json");
	} else {
		$json_string = file_get_contents("config/uuictclub_config.json");
	}
	$config  = json_decode($json_string, true);
	define('BASE_URL', 	$config['BASE_URL'	]);
	define('BASE_PATH', $config['BASE_PATH'	]);
	define('DB_HOST', 	$config['DB_HOST'	]);
	define('DB_USER', 	$config['DB_USER'	]);
	define('DB_PASS', 	$config['DB_PASS'	]);
	define('DB_NAME', 	$config['DB_NAME'	]);
	
	// Session:
	session_start();
	if(isset($_COOKIE['user_name'])){
		$_SESSION['user_name']  = $_COOKIE['user_name'];
		$_SESSION['user_id']    = $_COOKIE['user_id'];
		$_SESSION['user_image'] = $_COOKIE['user_image'];
	}
	elseif(!isset($_SESSION['user_name'])){
		$_SESSION['user_name']  = "uunotlogged";
		$_SESSION['user_id']    = NULL;
		$_SESSION['user_image'] = NULL;
	}
?>
<?php require_once BASE_PATH . "classes/Database.php" ?>