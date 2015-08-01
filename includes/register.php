<?php
	$r_success = false;
	$r_error = false;
	$r_missing = "";
	$errors = array();
	$errors['Invalid_Mail'		] 	= 	"";
	$errors['Email_Exist'		]	= 	"";
	$errors['StudentID_Exist'	]	= 	"";
	$errors['ImageSize_err'		]	= 	"";
	$errors['ImageType_err'		]	= 	"";
	$errors['NonDept_err'		]	=	"";
	extract($errors);
	
	$r_values = array();
	$r_values['FirstName'	]	=	"";
	$r_values['LastName'	]	=	"";
	$r_values['DOB'			]	=	"";
	$r_values['MOB'			]	=	"";
	$r_values['YOB'			]	=	"";
	$r_values['StudentID'	]	=	"";
	$r_values['Phone'		]	=	"";
	$r_values['Mail'		]	=	"";
	extract($r_values);
	
	if(isset($_POST['join'])){
		foreach($_POST as $key => $value){
			$value = pure_it($value);
			(empty($value)) ? $r_missing = "Please fill out all the fields!" : $$key = $value ;
		}
		if(!$r_missing){
			// Email Validation:
			$Invalid_Mail = validate_email($Mail, $r_error);
			
			// Checking if Email Already Registered:
			$Email_Exist = isEmailExist($Mail, 'userids', $r_error);
			
			// Checking if Email Exist in the Request Queue:
			if(!$Email_Exist){
				$Email_Exist = isEmailExist($Mail, 'userids_temp', $r_error);
				$Email_Exist = ($Email_Exist) ? "We already have this email in pending request" : "";
			}
			
			// Checking if Student ID Registered:
			$StudentID = strtoupper($StudentID);
			$StudentID_Exist = isStudentIDExist($StudentID, 'userids', $r_error);
			
			// Checking if Student ID Exist in the Request Queue:
			if(!$StudentID_Exist){
				$StudentID_Exist = isStudentIDExist($StudentID, 'userids_temp', $r_error);
				$StudentID_Exist = ($StudentID_Exist) ? "We already have this ID in pending request" : "";
			}
			
			// Checking if File Size Exceded Limit:
			$ImageSize_err = validate_image_size($_FILES["Image"]["size"], $r_error);
			
			// Checking if the File is Invalid:
			$ImageType_err = validate_image_type($_FILES["Image"]["type"], $r_error);
			
			// Checking if the Student is from Dept. of CSE:
			$NonDept_err = validateStudentID($StudentID, $r_error);
		}
		if(!$r_missing && !$r_error){
			// Creating the Values:
			$db = new Database();
			$sql = "SELECT MAX(UID) FROM userids_temp";
			$result = $db->query($sql);
			$row = $db->fetch($result);
			$num = intval($row['MAX(UID)']);

			// Inserting Values into Temporary UserIDs Table:
			$extension = end(explode(".", $_FILES["Image"]["name"]));
			$newFileName = "members/" . ++$num . "_temp." . $extension;
			move_uploaded_file($_FILES["Image"]["tmp_name"], $newFileName);
			$DateOfBirth = $_POST['YOB'] . "/" . $_POST['MOB'] . "/" . $_POST['DOB'];
			$data = array();
			$data['StudentID'	]	= $StudentID	;
			$data['Image'		]	= $newFileName	;
			$data['FirstName'	] 	= $FirstName	;
			$data['LastName'	]	= $LastName		;
			$data['dateOfBirth'	]	= $DateOfBirth	;
			$data['ContactNo'	] 	= $Phone		;
			$data['eMail'		] 	= $Mail			;
			$r_success = $db->insert('userids_temp', $data);

			$db->close();
		}
	}
?>