<?php
	$p_missing = "";
	$p_error = false;
	$p_success = false;
	$p_TeamName = "";
	$p_Invalid_Mail1 = "";
	$p_Invalid_Mail2 = "";
	$p_Invalid_Mail3 = "";
	$p_NonDept_err1 = "";
	$p_NonDept_err2 = "";
	$p_NonDept_err3 = "";
	$p_StudentID_Exist1 = "";
	$p_StudentID_Exist2 = "";
	$p_StudentID_Exist3 = "";
	$p_Email_Exist1 = "";
	$p_Email_Exist2 = "";
	$p_Email_Exist3 = "";
	$p_TeamName_err = "";
	$p_StudentID_err = "";
	$p_email_err = "";
	$p_values = array('TeamName' => "", 'Name1' => "", 'ID1' => "", 'eMail1' => "", 'Phone1' => "",
										'Name2' => "", 'ID2' => "", 'eMail2' => "", 'Phone2' => "",
										'Name3' => "", 'ID3' => "", 'eMail3' => "", 'Phone3' => "");
	extract($p_values);
	if(isset($_POST['prog'])){
		foreach($_POST as $key => $value){
			$value = pure_it($value);
			(empty($value)) ? $p_missing = "Please fill out all the fields!" : $$key = $value;
		}
		if(!$p_missing){
			// Email Validation:
			$p_Invalid_Mail1 = validate_email($eMail1, $p_error);
			$p_Invalid_Mail2 = validate_email($eMail2, $p_error);
			$p_Invalid_Mail3 = validate_email($eMail3, $p_error);
			
			// Checking if Team Name Exist:
			$p_TeamName_err = "This Team Name is already registered!";
			$p_TeamName = isExist('TeamName', 'programmingcontest', $TeamName, $p_error);
			
			// Checking if the Student is from Dept. of CSE:
			$p_NonDept_err1 = validateStudentID($ID1, $p_error);
			$p_NonDept_err2 = validateStudentID($ID2, $p_error);
			$p_NonDept_err3 = validateStudentID($ID3, $p_error);
			
			// Checking if Student ID Exist:
			$p_StudentID_err = "This Student ID is already registered!";
			$SExist1 = isExist('ID1', 'programmingcontest', $ID1, $p_error);
			$SExist2 = isExist('ID2', 'programmingcontest', $ID1, $p_error);
			$SExist3 = isExist('ID3', 'programmingcontest', $ID1, $p_error);
			$p_StudentID_Exist1 = ($SExist1 || $SExist2 || $SExist3);
			
			$SExist1 = isExist('ID1', 'programmingcontest', $ID2, $p_error);
			$SExist2 = isExist('ID2', 'programmingcontest', $ID2, $p_error);
			$SExist3 = isExist('ID3', 'programmingcontest', $ID2, $p_error);
			$p_StudentID_Exist2 = ($SExist1 || $SExist2 || $SExist3);
			
			$SExist1 = isExist('ID1', 'programmingcontest', $ID3, $p_error);
			$SExist2 = isExist('ID2', 'programmingcontest', $ID3, $p_error);
			$SExist3 = isExist('ID3', 'programmingcontest', $ID3, $p_error);
			$p_StudentID_Exist3 = ($SExist1 || $SExist2 || $SExist3);
			
			// Checking if Email Exist:
			$p_email_err = "This eMail is already registered!";
			$EExist1 = isExist('eMail1', 'programmingcontest', $eMail1, $p_error);
			$EExist2 = isExist('eMail2', 'programmingcontest', $eMail1, $p_error);
			$EExist3 = isExist('eMail3', 'programmingcontest', $eMail1, $p_error);
			$p_Email_Exist1 = ($EExist1 || $EExist2 || $EExist3);
			
			$EExist1 = isExist('eMail1', 'programmingcontest', $eMail2, $p_error);
			$EExist2 = isExist('eMail2', 'programmingcontest', $eMail2, $p_error);
			$EExist3 = isExist('eMail3', 'programmingcontest', $eMail2, $p_error);
			$p_Email_Exist2 = ($EExist1 || $EExist2 || $EExist3);
			
			$EExist1 = isExist('eMail1', 'programmingcontest', $eMail3, $p_error);
			$EExist2 = isExist('eMail2', 'programmingcontest', $eMail3, $p_error);
			$EExist3 = isExist('eMail3', 'programmingcontest', $eMail3, $p_error);
			$p_Email_Exist3 = ($EExist1 || $EExist2 || $EExist3);
		}
		if(!$p_missing && !$p_error){
			$db = new Database();
			$data = array('TeamName'=>$TeamName, 'Name1'=>$Name1, 'ID1'=>$ID1, 'eMail1'=>$eMail1, 'Phone1' => $Phone1,
												 'Name2'=>$Name1, 'ID2'=>$ID2, 'eMail2'=>$eMail2, 'Phone2' => $Phone2,
												 'Name3'=>$Name3, 'ID3'=>$ID3, 'eMail3'=>$eMail3, 'Phone3' => $Phone3);
			$p_success = $db->insert('programmingcontest', $data);
			$db->close();
		}
	}
?>