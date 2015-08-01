<?php
	class PanelMember extends Member {
		// Private Properties:
		private $Responsibility;
		
		// Static Properties:
		public static $Designations = array(
			"Pres"		 =>	"President",
			"VP"		 =>	"Vice-President",
			"GS"		 =>	"General Secretary",
			"ConICT"	 =>	"Convenner",
			"ConCulture" =>	"Convenner",
			"ConGnS"	 =>	"Convenner",
			"SM1"		 =>	"Secretary Member",
			"SM2"		 =>	"Secretary Member",
			"SM3"		 =>	"Secretary Member",
			"SM4"		 =>	"Secretary Member"
		);
		public static $from;
		public static $to;
		
		// Constructor:
		function __construct($Responsibility){
			$this->db = new Database();
			$this->Responsibility = $Responsibility;
			$this->getResponsibility();
			$this->getAllInfo();
		}
		
		// Destructor:
		function __destruct(){
			$this->db->close();
		}
		
		// Static Method:
		public static function count(){
			$db = new Database();
			$sql = "SELECT COUNT(distinct session_group) FROM panelmembers";
			$result = $db->query($sql);
			$row = $db->fetch($result);
			$db->close();
			return intval($row['COUNT(distinct session_group)']);
		}
		public static function getFromTo($group){
			$DB = new Database();
			$sql = "SELECT session_from, session_to FROM panelmembers WHERE session_group ='" . $group . "'";
			$result = $DB->query($sql);
			$row = $DB->fetch($result);
			self::$from = $row['session_from'];
			self::$to = $row['session_to'];
		}
		public static function isCurrentPanelMembersArchived(){
			$DB = new Database();
			$sql = "SELECT UID FROM userids WHERE Responsibility != 'Member'";
			$result = $DB->query($sql);
			while($row = $DB->fetch($result)){
				$sql = "SELECT UID FROM panelmembers WHERE UID = '" . $row['UID'] . "'";
				$res = $DB->query($sql);
				$ret = $DB->fetch($res);
				if(!$ret['UID']) return false;
			}
			return true;
		}

		// Private Method:
		private function getResponsibility(){
			$this->userId = $this->db->search_one('UID', 'userids', 'Responsibility', $this->Responsibility);
		}
		
		// Public Method:
		public function updateResponsibility($res, $uid){
			$data = array('Responsibility' => 'Member');
			$this->db->update('userids', $data, 'UID', $this->userId);
			$data = array('Responsibility' => $res);
			$this->db->update('userids', $data, 'UID', $uid);
		}
		public function isArchived(){
			$sql = "SELECT UID FROM panelmembers WHERE UID = '" . $this->userId . "'";
			$result = $this->db->query($sql);
			$row = $this->db->fetch($result);
			if($row['UID']) return true;
			else return false;
		}
	}
?>