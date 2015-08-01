<?php
	$m_missing = "";
	$mail_error = "";
	$c_values = array('email'=>'', 'subject'=>'', 'message'=>'');
	extract($c_values);
	if(isset($_POST['contactus'])){	
		$suspect = false;
		$pattern = '/Content-Type:|Bcc:|Cc:/i';
		
		function isSuspect($val, $pattern, &$suspect) {
			foreach($val as $item){
				$suspect = (preg_match($pattern, $item)) ? true : false;
			}
		}
		isSuspect($_POST, $pattern, $suspect);
		
		if(!$suspect) {
			foreach ($_POST as $key => $value) {
				$value = pure_it($value);
				(empty($value)) ? $m_missing = "Please fill out all the fileds." : $$key = $value;
			}
		}
		
		$headers = "";
		
		if (!$suspect && !empty($email)) {
			$validemail = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
			if ($validemail) {
				$headers .= "From: $validemail\r\n";
			} else {
				$mail_error = "Invalid email address!";
			}
		}
		if (!$suspect && !$m_missing && !$mail_error) {
			$to = 'uuictclub@gmail.com';
			$headers .= "Content-type: text/plain; charset=utf-8";
			$message = wordwrap($message, 70);
			$mailSent = mail($to, $subject, $message, $headers);
			if ($mailSent) {
				header('Location: index.php?mailSent=1');
				exit;
			}
		}
	}
?>