<?php require_once "../includes/config.php"	 ; ?>
<?php
	if(isset($_POST['passret'])){
		$uid = strtoupper(pure_it($_POST['uid']));
		if(empty($uid)) {
			$uid_missing = "Enter Your User Name";
			header("Location: ../login.php?fp=1&uid_missing=$uid_missing");
			exit();
		}
		if(!empty($uid)){
			require_once BASE_PATH . "/classes/Member.php";
			if(!Member::getUser($uid)){
				$uid_err = "User Id Not Found";
				header("Location: ../login.php?fp=1&uid=$uid&uid_err=$uid_err");
				exit();
			} else {
				$M = new Member($uid);
				$M->mailPassword();
				header('Location: ' . BASE_URL . "?passsend=1");
				exit;
			}
		}
	}
?>