<?php
	function makeID($num){
		$num = intval($num);
		if($num<9) $uid = 'UIC-00' . ++$num;
		else if($num<99) $uid = 'UIC-0' . ++$num;
		else $uid = 'UIC-' . ++$num;
		return $uid;
	}
	function formatDate($Date){
		$D = new DateTime($Date);
		return $D->format('jS F, Y');
	}
	function generateRandomString($length = 8) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, strlen($characters) - 1)];
		}
		return $randomString;
	}
	function format_position($number){
		$number = intval($number);
		if($number%10==1){
			$number.='<sup>st</sup>';
		} elseif($number%10==2){
			$number.='<sup>nd</sup>';
		} elseif($number%10==3){
			$number.='<sup>rd</sup>';
		} else {
			$number.='<sup>th</sup>';
		}
		return $number;
	}
	// Validation Functions:
	function validate_email($email, &$error){
		$validemail = filter_var($email, FILTER_VALIDATE_EMAIL);
		if (!$validemail) {
			$error = true;
			return "Invalid email address!";
		}
		return "";
	}
	function validate_image_size($Image, &$error){
		if($Image>256000){
			$error = true;
			return "Size exceeded. Maximum size is: 256 KB";
		}
		return "";
	}
	function validate_image_type($Image, &$error){
		if($Image != "image/jpeg" && $Image != "image/jpg"){
			$error = true;
			return "Invalid image type. Only .jpg allowed";
		}
		return "";
	}
	function isStudentIDExist($ID, $tableName, &$error){
		$db = new Database();
		$sql = "SELECT StudentID FROM $tableName WHERE StudentID = '" . $ID . "'";
		$result = $db->query($sql);
		if(!$result) return;
		$row = $db->fetch($result);
		$db->close();
		if($ID == $row['StudentID']){
			$error = true;
			return "This Student ID is already registered.";
		} else return "";
	}
	function isEmailExist($email, $tableName, &$error){
		$db = new Database();
		$sql = "SELECT eMail FROM $tableName WHERE eMail = '" . $email . "'";
		$result = $db->query($sql);
		if(!$result) return;
		$row = $db->fetch($result);
		$db->close();
		if($email == $row['eMail']){
			$error = true;
			return "This Email is already registered.";
		} else return "";
	}
	function isStudentIDExistInGamers($ID, $gameName, &$error){
		$db = new Database();
		$sql = "SELECT StudentID FROM gamingcontest WHERE StudentID = '" . $ID . "' AND Game = '" . $gameName . "'";
		$result = $db->query($sql);
		if(!$result) return;
		$row = $db->fetch($result);
		$db->close();
		if($ID == $row['StudentID']){
			$error = true;
			return "This Student ID is already registered for this game.";
		} else return "";
	}
	function isEmailExistInGammers($email, $gameName, &$error){
		$db = new Database();
		$sql = "SELECT eMail FROM gamingcontest WHERE eMail = '" . $email . "' AND Game = '" . $gameName . "'";
		$result = $db->query($sql);
		if(!$result) return;
		$row = $db->fetch($result);
		$db->close();
		if($email == $row['eMail']){
			$error = true;
			return "This eMail is already registered for this game.";
		} else return "";
	}
	function passwordMatch($UID, $PWD, &$error){
		$db = new Database();
		$sql = "SELECT PWD FROM userids WHERE UID = '" . $UID . "'";
		$result = $db->query($sql);
		$row = $db->fetch($result);
		$db->close();
		if($PWD != $row['PWD']){
			$error = true;
			return "Wrong Password!";
		} else return "";
	}
	function validateStudentID($ID, &$error){
		if(strlen($ID) !== 12){ $error = true; return "Invalid Student ID!"; }
		$Dept = substr($ID, 5, 2);
		if($Dept != "21"){
			$error = true;
			return "Only CSE students are allowed!";
		}
		else return "";
	}
	function isExist($item, $tableName, $value, &$error){
		$db = new Database();
		$sql = "SELECT $item FROM $tableName WHERE $item = '$value'";
		$result = $db->query($sql);
		if(!$result) return;
		$row = $db->fetch($result);
		$db->close();
		if($value == $row[$item]){
			$error = true;
			return true;
		} else return false;
	}
	// Validation Functions!
?>