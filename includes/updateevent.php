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
	$e_values['FirstPlace'  ]	=	'';
	$e_values['SecondPlace' ]	=	'';
	$e_values['ThirdPlace'  ]	=	'';
	extract($e_values);

	$e_optional = array('Rules', 'LinkName', 'Link', 'FirstPlace', 'SecondPlace', 'ThirdPlace');
	if(isset($_POST['Update_Event'])){
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
			}
		}
		if(!$e_missing && !$e_error){
			$date = new DateTime($Date.$Time);
			$TimeNDate = $date->format('Y-m-d H:i');
			$Event = new Event(pure_it($_GET['Event_ID']));
			move_uploaded_file($_FILES["Image"]["tmp_name"], '../' . $Event->EventInfo["Image"]);
			$data = array();
			$data['Title'		] 	=	$Title				;
			$data['TimeNDate'	]	=	$TimeNDate			;
			$data['Venue'		]	=	$Venue				;
			$data['Rules'		]	=	nl2br($Rules)		;
			$data['LinkName'	]	=	$LinkName			;
			$data['Link'		]	=	$Link				;
			$data['Description' ]	=	nl2br($Description)	;
			$data['FirstPlace'  ]	=	$FirstPlace			;
			$data['SecondPlace' ]	=	$SecondPlace		;
			$data['ThirdPlace'  ]	=	$ThirdPlace			;
			
			$e_success = $Event->updateEventInfo($data);
		}
	}
?>