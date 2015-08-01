<?php
	$e_success = false;
	$e_missing = "";
	$e_error = false;

	$errors = array();
	$errors['ImageSize_err'	]	= 	"";
	$errors['ImageType_err'	]	= 	"";
	extract($errors);

	$e_values = array();
	$e_values['Title'		]	=	'';
	$e_values['Time'		]	=	'';
	$e_values['Date'		]	=	'';
	$e_values['Venue'		]	=	'';
	$e_values['Rules'		]	=	'';
	$e_values['LinkName'	]	=	'';
	$e_values['Link'		]	=	''; 
	$e_values['Description'	]	=	'';
	$e_optional = array('Rules', 'LinkName', 'Link');
	extract($e_values);
	if(isset($_POST['Add_Event'])){
		foreach($_POST as $key => $value){
			$value = pure_it($value);
			if(!in_array($key, $e_optional)) {
				(empty($value)) ? $e_missing = "Please fill out all the fields marked with an (*) asterisk!" : $$key = $value;
			} else {
				$$key = $value;
			}
		}
		if(!$e_missing){
			if($_FILES["Image"]["size"]){
				// Checking if File Size Exceded Limit:
				$ImageSize_err = validate_image_size($_FILES["Image"]["size"], $e_error);
				
				// Checking if the File is Invalid:
				$ImageType_err = validate_image_type($_FILES["Image"]["type"], $e_error);
			} else {
				$e_missing = "Please fill out all the fields marked with an (*) asterisk!";	
			}
		}
		if(!$e_missing && !$e_error){
			$date = new DateTime($Date.$Time);
			$TimeNDate = $date->format('Y-m-d H:i');
			
			$db = new Database();
			$Event_ID = $db->select_one("MAX(Event_ID)", "events");

			$newFileName = "events/evt" . ++$Event_ID . "_" . generateRandomString(10) . ".jpg";
			move_uploaded_file($_FILES["Image"]["tmp_name"], "../" . $newFileName);

			$data = array();
			$data['Event_ID'	]	=	$Event_ID			;
			$data['Title'		]	=	$Title				;
			$data['TimeNDate'	]	=	$TimeNDate			;
			$data['Venue'		]	=	$Venue				;
			$data['Rules'		]	=	nl2br($Rules)		;
			$data['LinkName'	]	=	$LinkName			;
			$data['Link'		]	=	$Link 				;
			$data['Description'	]	=	nl2br($Description) ;
			$data['Image'		]	=	$newFileName 		;
			$e_success = $db->insert('events', $data);
			$db->close();
			
			if($e_success){
				header("Location: events.php");
				exit;
			}
		}
	}
?>