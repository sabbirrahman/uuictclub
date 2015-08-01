<?php
	class Database {
		// Private Properties:
		private $db;
		
		// Constructor:
		function __construct(){
			$this->connect();
		}
		
		// Public Methods:
		public function connect(){
			$this->db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		}
		public function query($sql){
			return $this->db->query($sql);
		}
		public function fetch($result){
			return mysqli_fetch_assoc($result);
		}
		public function select_all($tableName){
			$sql = "SELECT * FROM $tableName";
			return $this->query($sql);
		}
		public function select_one($column, $tableName){
			$sql = "SELECT $column FROM $tableName";
			$result = $this->query($sql);
			$row = $this->fetch($result);
			return $row[$column];
		}
		public function search_all($tableName, $criteria, $value){
			$sql = "SELECT * FROM $tableName WHERE $criteria='$value'";
			$result = $this->query($sql);
			return $this->fetch($result);
		}
		public function search_one($item, $tableName, $criteria, $value){
			$sql = "SELECT $item FROM $tableName WHERE $criteria='$value'";
			$result = $this->query($sql);
			$row = $this->fetch($result);
			return $row[$item];
		}
		public function insert($tableName, $data){
			$len = count($data);
			$i = 1;
			$sql1 = "INSERT INTO $tableName(";
			$sql2 = ") VALUES(";
			foreach($data as $column => $value){
				$sql1 .= $column;
				$sql2 .= "'" . $value . "'";
				if($i == $len) continue;
				$sql1 .= ", ";
				$sql2 .= ", ";
				$i++;
			}
			$sql = $sql1 . $sql2 . ")";
			return $this->query($sql);
		}
		public function update($tableName, $data, $criteria, $value){
			$len = count($data);
			$i = 1;
			$sql = "UPDATE $tableName SET ";
			foreach($data as $column => $val){
				$sql .= $column . "='" . $val . "'";
				if($i == $len) continue;
				$sql .= ", ";
				$i++;
			}
			$sql .= " WHERE $criteria='$value'";
			return $this->query($sql);
		}
		public function delete($tableName, $criteria, $value){
			$sql = "DELETE FROM $tableName WHERE $criteria = '$value'";
			return $this->query($sql);
		}
		public function close(){
			$this->db->close();
		}
	}
?>