<?php
	$g_success = false;
	$g_error = false;
	$g_missing = "";
	$g_Invalid_Mail = "";
	$g_Email_Exist = "";
	$g_StudentID_Exist = "";
	$g_values = array();
	$g_values['gamerName'	]	=	"";
	$g_values['gamerID'		]	=	"";
	$g_values['gamerBatch'	]	=	"";
	$g_values['gamerDept'	]	=	"";
	$g_values['gamerPhone'	]	=	"";
	$g_values['gamerMail'	]	=	"";
	$g_values['GAME'		]	=	"";
	extract($g_values);
	if(isset($_POST['gaming'])){
		foreach($_POST as $key => $value){
			$value = pure_it($value);
			(empty($value)) ? $g_missing = "Please fill out all the fields!" : $$key = $value;
		}
		if(!$g_missing){
			// Email Validation:
			$g_Invalid_Mail = validate_email($gamerMail, $g_error);
			
			// Checking if Email & Student ID Exist for a Specific Game:
			$g_StudentID_Exist = isStudentIDExistInGamers($gamerID, $GAME, $g_error);
			$g_Email_Exist = isEmailExistInGammers($gamerMail, $GAME, $g_error);
		}
		if(!$g_missing && !$g_error){
			$db = new Database();
			$data = array();
			$data['Game'		]	=	$GAME;
			$data['Name'		]	=	$gamerName;
			$data['StudentID'	]	=	$gamerID;
			$data['Batch'		]	=	$gamerBatch;
			$data['Department'	]	=	$gamerDept;
			$data['ContactNo'	]	=	$gamerPhone;
			$data['eMail'		]	=	$gamerMail;
			$g_success = $db->insert('gamingcontest', $data);
			$db->close();
		}
	}
?>