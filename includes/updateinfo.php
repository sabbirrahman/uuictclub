<?php
	$Member = new Member($_SESSION['user_id']);
	$u_missing = "";
	$error = false;
	
	$u_errors = array();
	$u_errors['Invalid_Mail'	] 	= 	"";
	$u_errors['Email_Exist'		] 	= 	"";
	$u_errors['ImageSize_err'	] 	= 	"";
	$u_errors['ImageType_err'	] 	= 	"";
	$u_errors['Invalid_Pass'	]	= 	"";
	$u_errors['Miss_Match'		]	=	"";
	extract($u_errors);
	
	$u_values = array();
	$u_values['NamePrefix'	]	=	"";
	$u_values['FirstName'	]	=	"";
	$u_values['LastName'	]	=	"";
	$u_values['NickName'	]	=	"";
	$u_values['DateOfBirth'	]	=	"";
	$u_values['Phone'		]	=	"";
	$u_values['Mail'		]	=	"";
	$u_values['Facebook'	]	=	"";
	extract($u_values);
	
	$u_optional = array('NamePrefix', 'NickName', 'OLD_PWD', 'NEW_PWD', 'RE_PWD', 'Facebook');
	if(isset($_POST['Update_Info'])){
		foreach($_POST as $key => $value){
			$value = pure_it($value);
			if(!in_array($key, $u_optional)) {
				(empty($value)) ? $u_missing = "Please fill out all the fields marked with an (*) asterisk!" : $$key = $value;
			} else {
				$$key = $value;
			}
		}
		if(!$u_missing){
			if(!empty($Mail) && $Member->getEmail() != $Mail) {
				// Email Validation:
				$Invalid_Mail = validate_email($Mail, $error);
				if(!$Invalid_Mail)
					// Checking if Email Exist:
					$Email_Exist = isEmailExist($Mail, $error);
			}
			if($_FILES["Image"]["size"]){
				// Checking if File Size Exceded Limit:
				$ImageSize_err = validate_image_size($_FILES["Image"]["size"], $error);
				// Checking if the File is Invalid:
				$ImageType_err = validate_image_type($_FILES["Image"]["type"], $error);
			}
			
			if($OLD_PWD){
				// Password Check:
				$Invalid_Pass = passwordMatch($_SESSION['user_id'], ROT13($OLD_PWD), $error);
				// Password Match Check:
				if(!empty($OLD_PWD) && !$Invalid_Pass) {
					$Miss_Match = ($NEW_PWD == $RE_PWD) ? "" : "Password doesn't match!";
					$error 		= ($Miss_Match)			? true : false;
				}
			}
		}
		if(!$u_missing && !$error){
			$Image = $_FILES["Image"]["name"];
			$extension = end(explode(".", $Image));
			$newFileName = "members/" . $Member->getUserID() . "." . $extension;
			move_uploaded_file($_FILES["Image"]["tmp_name"], '../' . $newFileName);
			
			// Updating UserIDs Table:
			$data = array();
			($NEW_PWD) 	? $data['PWD']	 = ROT13($NEW_PWD): '';
			($Image) 	? $data['Image'] = $newFileName	: '';
			$data['NamePrefix'	]	= $NamePrefix	;
			$data['FirstName'	] 	= $FirstName	;
			$data['LastName'	]	= $LastName		;
			$data['NickName'	]	= $NickName		;
			$data['DateOfBirth'	]	= $DateOfBirth	;
			$data['ContactNo'	] 	= $Phone		;
			$data['eMail'		] 	= $Mail			;
			$data['Facebook'	] 	= $Facebook		;
			$Member->updateUserInfo($data);
			
			header("Location: ../member");
			exit;
		}
	}
?>