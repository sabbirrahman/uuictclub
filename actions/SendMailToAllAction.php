<?php require_once "../includes/config.php"; ?>
<?php
	$missing 	= "";
	if(isset($_POST['sendmail'])){
		foreach ($_POST as $key => $value) {
			$value = pure_it($value);
			(empty($value)) ? $missing = true : $$key = $value;
		}
		if($missing){
			header("Location: ../admin/sendmail.php?missing=1&subject=$subject&message=$message");
			exit;
		} else {
			require_once "../classes/Database.php";
			require_once "../classes/Member.php"  ;
			$DB = new Database();
			$sql = "SELECT UID FROM userids";
			$result = $DB->query($sql);
			while ($row = $DB->fetch($result)) {
				if($row['UID'] == "UIC-000") continue;
				$Member = new Member($row['UID']);
				$Member->sendMail($subject, $message);
			}
			header('Location: ../admin/sendmail.php?mailSent=1');
			exit;
		}
	}
?>