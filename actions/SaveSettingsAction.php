<?php require_once "../includes/config.php"; ?>
<?php
	if(isset($_POST['Save_Settings'])){
		// Configs:
		$file = "../config/contest_config.json";
	    $contest_json    = file_get_contents($file);
	    $contest_config  = json_decode($contest_json, true);

		$contest_config['PCONTEST'	] = isset($_POST['PCONTEST'	])	? true : false;
		$contest_config['GCONTEST'	] = isset($_POST['GCONTEST'	])	? true : false;
		$contest_config['QUIZ'		] = isset($_POST['QUIZ'		]) && isset($_POST['GCONTEST'	]) ? true : false;
		$contest_config['NFSM'		] = isset($_POST['NFSM'		]) && isset($_POST['GCONTEST'	]) ? true : false;
		$contest_config['FIFA'		] = isset($_POST['FIFA'		]) && isset($_POST['GCONTEST'	]) ? true : false;
		$contest_config['COD4'		] = isset($_POST['COD4'		]) && isset($_POST['GCONTEST'	]) ? true : false;
		$contest_config['CHESS'		] = isset($_POST['CHESS'	]) && isset($_POST['GCONTEST'	]) ? true : false;
		$contest_config['CARROM'	] = isset($_POST['CARROM'	]) && isset($_POST['GCONTEST'	]) ? true : false;
		$contest_config['TTENNIS'	] = isset($_POST['TTENNIS'	]) && isset($_POST['GCONTEST'	]) ? true : false;

		file_put_contents($file, json_encode($contest_config));
    	extract($contest_config);

    	// Password:
		$OLD_PWD	=	pure_it($_POST['OLD_PWD']);
		$NEW_PWD	=	pure_it($_POST['NEW_PWD']);
		$RE_PWD		=	pure_it($_POST['RE_PWD'] );
		if($OLD_PWD){
			// Password Check:
			require_once "../includes/functions.php";
			$Invalid_Pass = passwordMatch($_SESSION['user_id'], ROT13($OLD_PWD), $error);
			if($Invalid_Pass){
				header("Location: ../admin/index.php?Invalid_Pass=$Invalid_Pass");
				exit;
			}
			
			// Password Match Check:
			if($NEW_PWD != $RE_PWD){
				header("Location: ../admin/index.php?Miss_Match=Password doesn't match!");
				exit;
			}
			
			// Updating Password:
			$data = array();
			($NEW_PWD) 	? $data['PWD']	 = ROT13($NEW_PWD): '';
			require_once "../classes/Member.php";
			$Member = new Member($_SESSION['user_id']);
			$Member->updateUserInfo($data);
		}
		header("Location: ../admin/index.php?success=1");
		exit;
	}
?>