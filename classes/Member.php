<?php
	class Member {
		// Protected Properties:
		protected $userId;
		protected $db;
		protected $info;
		
		// Constructor:
		function __construct($USERID){
			$this->userId = $USERID;
			$this->db = new Database();
			$this->getAllInfo();
		}
		
		// Destructor:
		function __destruct(){
			$this->db->close();
		}
		
		// Static Methods:
		public static function getUser($UserID){
			$db = new Database();
			$temp =  $db->search_one("UID", "userids", 'UID', $UserID);
			$db->close();
			return $temp;
		}
		public static function checkPassword($UID){
			$db = new Database();
			$result = $db->search_one("PWD", "userids", "UID", $UID);
			$db->close();
			return $result;
		}
		public static function count(){
			$db = new Database();
			$sql = "SELECT COUNT(UID) FROM userids";
			$result = $db->query($sql);
			$row = $db->fetch($result);
			$db->close();
			return intval($row['COUNT(UID)'])-1;
		}
		
		// Protected Method:
		protected function getAllInfo(){
			$sql = "SELECT * FROM userids WHERE UID = '" . $this->userId . "'";
			$result = $this->db->query($sql);
			$this->info = $this->db->fetch($result);
		}
		
		// Public Setter Methods:
		public function updateUserInfo($data) { return $this->db->update('userids', $data, 'UID', $this->userId); }
		
		// Public Getter Methods for Retriving Values from Database:
		public function getUserID()		{ 	return $this->info['UID'		 	] ; }
		public function getPassword()	{ 	return $this->info['PWD'		 	] ; }
		public function getImage()		{ 	return $this->info['Image'		 	] ; }
		public function getDateOfBirth(){ 	return $this->info['dateOfBirth' 	] ; }
		public function getNamePrefix()	{ 	return $this->info['NamePrefix'	 	] ; }
		public function getFirstName()	{ 	return $this->info['FirstName'	 	] ; }
		public function getLastName()	{ 	return $this->info['LastName'	 	] ; }
		public function getNickName()	{ 	return $this->info['NickName'	 	] ; }
		public function getStudentID()	{ 	return $this->info['StudentID'	 	] ; }
		public function getJoiningDate(){ 	return $this->info['JoiningDate' 	] ; }
		public function getContactNo()	{ 	return $this->info['ContactNo'	 	] ; }
		public function getEmail()		{ 	return $this->info['eMail'		 	] ; }
		public function getFacebook()	{ 	return $this->info['Facebook'	 	] ; }
		public function getPosition()	{ 	return $this->info['Responsibility'	] ; }
		
		// More Public Getter Methods:
		public function getFullName(){
			return $this->info['FirstName'] . " " . $this->info['LastName'];
		}
		public function getTotalFullName(){
			return $this->info['NamePrefix'] . " " . 
				   $this->info['FirstName' ] . " " .
				   $this->info['LastName'  ] . " " .
				   $this->info['NickName'  ];
		}
		public function getGender(){
			$ID = $this->getStudentID();
			return ($ID[0] == 'M')? 'Male' : 'Female';
		}
		public function getBatch(){
			$ID = $this->getStudentID();
			$admission_year = (intval($ID[1]) * 1000) + intval($ID[2] . $ID[3]);
			$admission_semester = intval($ID[4]);
			return $Y = (($admission_year-2004)*3)+1+$admission_semester;
		}
		public function getDepartment(){
			return "CSE";
		}

		// Public Methods:
		public function admission(){
			$ID = $this->getStudentID();
			if($ID[4] == '1'){
				$Admission = 'Spring, ';
			} elseif($ID[4] == '2') {
				$Admission = 'Summer, ';
			} elseif($ID[4] == '3') {
				$Admission = 'Fall, ';
			}
			$Year = intval($ID[1])*1000 + intval($ID[2].$ID[3]);
			return $Admission . $Year;
		}
		public function mailPassword(){
			$to 	 = $this->info["eMail"];
			$subject = 'Forget Password';
			$header  = "From: UU ICT CLUB <uuictclub@gmail.com>\r\n";
			$header .= "Reply-To: UU ICT CLUB <uuictclub@gmail.com>\r\n";
			$header .= "Content-type: text/plain; charset=utf-8";
			$message = "You've requested for your UU ICT CLUB account password. So, here it is:\r\n\r\nWebsite: " . BASE_URL . "\r\nUsername: $this->info['UID']\r\nPassword: $this->info['PWD']\r\n\r\nIf you haven't requested for password retriving for the account of UU ICT Club, please ignore this eMail and sorry for the inconvenience.";
			$message = wordwrap($message, 70);
			return mail($to, $subject, $message, $header);
		}
		public function sendMail($subject, $message){
			$to 	 = $this->info["eMail"];
			$header  = "From: UU ICT CLUB <uuictclub@gmail.com>\r\n";
			$header .= "Reply-To: UU ICT CLUB <uuictclub@gmail.com>\r\n";
			$header .= "Content-type: text/plain; charset=utf-8";
			$message = wordwrap($message, 70);
			return mail($to, $subject, $message, $header);
		}

		// Public Checker Methods:
		public function isPanelMember(){
			return ($this->info['Responsibility'] != "Member");
		}
	}

	class TempMember extends Member {
		// Constructor:
		function __construct($USERID){
			$this->userId = $USERID;
			$this->db = new Database();
			$this->getAllInfo();
		}
		
		// Destructor:
		function __destruct(){
			$this->db->close();
		}
		
		// Private Functions:
		protected function getAllInfo(){
			$sql = "SELECT * FROM userids_temp WHERE UID = '" . $this->userId . "'";
			$result = $this->db->query($sql);
			$this->info = $this->db->fetch($result);
		}
		private function makeID(){
			$sql    = "SELECT MAX(UID) FROM userids";
			$result = $this->db->query($sql);
			$row    = $this->db->fetch($result);
			$num    = $row['MAX(UID)'];
			$num    = intval($num[4] . $num[5] . $num[6]);
			if($num<9) $uid = 'UIC-00' . ++$num;
			else if($num<99) $uid = 'UIC-0' . ++$num;
			else $uid = 'UIC-' . ++$num;
			return $uid;
		}
		private function generateRandomString($length = 8) {
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$randomString = '';
			for ($i = 0; $i < $length; $i++) {
				$randomString .= $characters[rand(0, strlen($characters) - 1)];
			}
			return $randomString;
		}

		// Public Functions:
		public function accept(){
			// Creating the Values:
			$usid   	 = $this->makeID();
			$pwd    	 = $this->generateRandomString();
			$newFileName = "members/" . $usid . ".jpg";
			rename("../" . $this->info["Image"], "../" . $newFileName);
			
			// Inserting Values:
			$this->info["UID"	] = $usid;
			$this->info["PWD"	] = ROT13($pwd);
			$this->info["Image"	] = $newFileName;
			$this->db->insert('userids', $this->info);

			// Deleting/Updating Data from Temporary Table:
			$this->db->delete("userids_temp", "UID", $this->userId);

			// Sending Mail:
			$to = $this->info["eMail"];
			$subject = 'UU ICT Club Registration';
			$header = "From: UU ICT CLUB <uuictclub@gmail.com>\r\n";
			$header .= "Reply-To: UU ICT CLUB <uuictclub@gmail.com>\r\n";
			$header .= "Content-type: text/plain; charset=utf-8";
			$message = "You have been successfully registerd for UU ICT Club. You may login using the following username and password.\r\n\r\nWebsite: " . BASE_URL . "\r\nUsername: $usid\r\nPassword: $pwd\r\n\r\nWe recommend you to change your password as soon as you login to your profile.\r\n\r\nIf you haven't registered for the membership of UU ICT Club please ignore this eMail and sorry for the inconvenience.";
			$message = wordwrap($message, 70);
			return mail($to, $subject, $message, $header);
		}

		public function reject(){
			$this->db->delete("userids_temp", "UID", $this->userId);
			unlink("../". $this->getImage());
		}
	}
?>