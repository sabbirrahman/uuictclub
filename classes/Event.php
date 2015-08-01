<?php
	class Event {
		// Protected Properties:
		protected $Event_ID;
		protected $db;
		
		// Public Properties:
		public $EventInfo;
		
		// Constructor:
		function __construct($ID){
			$this->db = new Database();
			$this->Event_ID = $ID;
			$this->getEventInfo();
		}
		
		// Destructor:
		function __destruct(){
			$this->db->close();
		}
		
		// Static Method:
		public static function count(){
			$db = new Database();
			$sql = "SELECT COUNT(*) FROM events";
			$result = $db->query($sql);
			$row = $db->fetch($result);
			$db->close();
			return $row['COUNT(*)'];
		}

		// Protected Method:
		protected function getEventInfo(){
			return $this->EventInfo = $this->db->search_all('events', 'Event_ID', $this->Event_ID);
		}
		
		// Public Method:
		public function updateEventInfo($data){
			return $this->db->update('events', $data, 'Event_ID', $this->Event_ID);
		}
		public function deleteEvent(){
			unlink("../" . $this->EventInfo["Image"]);
			return $this->db->delete('events', 'Event_ID', $this->Event_ID);
		}
	}
?>
<?php
	class PastEvent extends Event {
		// Public Properties:
		public static $PastEvents;
		
		// Constructor:
		function __construct($ID){
			$this->db = new Database();
			$this->Event_ID = $ID;
			$this->getEventInfo();
		}
		
		// Static Method:
		public static function getPastEvents(){
			$db = new Database();
			$sql = "SELECT Event_ID FROM events WHERE TimeNDate<date(NOW()) ORDER BY TimeNDate DESC";
			self::$PastEvents = $db->query($sql);
			$db->close();
		}
		public static function count(){
			$db = new Database();
			$sql = "SELECT COUNT(*) FROM events  WHERE TimeNDate<date(NOW())";
			$result = $db->query($sql);
			$row = $db->fetch($result);
			$db->close();
			return $row['COUNT(*)'];
		}
	}
?>
<?php
	class UpcomingEvent extends Event {
		// Public Properties:
		public static $UpcomingEvents;
		
		// Constructor:
		function __construct($ID){
			$this->db = new Database();
			$this->Event_ID = $ID;
			$this->getEventInfo();
		}
		
		// Static Method:
		public static function getUpcomingEvents(){
			$db = new Database();
			$sql = "SELECT Event_ID FROM events WHERE TimeNDate>=date(NOW()) ORDER BY TimeNDate ASC";
			self::$UpcomingEvents = $db->query($sql);
			$db->close();
		}
	}
?>