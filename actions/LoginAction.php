<?php require_once "../includes/config.php"	 ; ?>
<?php // Login Validation & Action Script
	if(isset($_POST['ac'])){
		$uid = strtoupper(pure_it($_POST['uid']));
		$pwd = pure_it($_POST['pwd']);
		if(empty($uid)) {
			$uid_missing = "Enter Your User Name";
			header("Location: ../login.php?fp=0&uid_missing=$uid_missing");
			exit();
		}
		if(empty($pwd)){
			$pwd_missing = "Enter Your Password";
			header("Location: ../login.php?fp=0&uid=$uid&pwd_missing=$pwd_missing");
			exit();
		}
		if(!empty($uid) && !empty($pwd)){
			require_once BASE_PATH . "/classes/Member.php";
			if(!Member::getUser($uid)){
				$uid_err = "User Id Not Found";
				header("Location: ../login.php?fp=0&uid=$uid&uid_err=$uid_err");
				exit();
			} elseif(Member::checkPassword($uid)!=ROT13($pwd)) {
				$pwd_err = "Wrong Password!";
				header("Location: ../login.php?fp=0&uid=$uid&pwd_err=$pwd_err");
				exit();
			} elseif(!$uid_err && !$pwd_err){
				$Member = new Member($uid);
				$_SESSION["user_name"] 	= $Member->getFirstName();
				$_SESSION["user_id"] 	= $Member->getUserID();
				$_SESSION["user_image"] = $Member->getImage();
				if(isset($_POST['keepme']) && $_POST['keepme']){
					setcookie('user_name' , $_SESSION["user_name"]	, time() + 60*60*24*365, '/');
					setcookie('user_id'   , $_SESSION["user_id"]	, time() + 60*60*24*365, '/');
					setcookie('user_image', $_SESSION["user_image"]	, time() + 60*60*24*365, '/');
				}
				header('Location: ' . BASE_URL);
				exit;
			}
		}
	}
?>