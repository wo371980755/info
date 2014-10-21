<?php
@include 'utils/Tools.php';
class SQLUtils {
	private $con;
	private $host;
	private $username;
	private $password;
	private $database;
	private function getConn() {
		$con = mysql_connect ( $this->host, $this->username, $this->password );
		$this->con = $con;
		if (! $con) {
			die ( 'Could not connect: ' . mysql_error () );
		}
		return $con;
	}
	public function closeConn() {
		mysql_close ( $this->con );
	}
	function __construct($database, $host = "localhost", $username = "root", $password = "root") {
		$this->host = $host;
		$this->username = $username;
		$this->password = $password;
		$this->database = $database;
		$this->selectDB();
	}
	private function selectDB() {
		mysql_select_db ( $this->database, $this->getConn () );
	}
	public function select($table, $column = null, $where = null) {
		if (Tools::isEmpty ( $table )) {
			die ( "table is null" );
		}
		$sql = "select ";
		if ($column) {
			$sql .= $column;
		} else {
			$sql .= " * ";
		}
		$sql .= " from " . $table;
		if ($where) {
			" where " . $where;
		}
		$result = mysql_query ( $sql );
		return $result;
	}
	public function insert($table, $column = null, $value = null) {
		if (Tools::isEmpty ( $value )) {
			$this->show_error ( "SQL error : ", "Value is empty!" );
		}
		$sql = " insert into " . $table;
		if (! $column) {
			$sql .= "(" . $column . ")";
		}
		$sql .= " values ( " . $value . " )";
		$this->query ( $sql );
	}
	public function update($table, $value = null, $where = null) {
		$this->selectDB ();
		if (Tools::isEmpty ( $value )) {
			$this->show_error ( "SQL error : ", "Value is empty!" );
		}
		$sql = " update " . $table . " set (" . $value . " ) ";
		if ($where) {
			$sql .= " where " . $where;
		}
		$this->closeConn ();
		return $result;
	}
	public function delete($table, $where = null) {
		$this->selectDB ();
		$sql = " delete " . $table;
		if ($where) {
			$sql .= " where " . $where;
		}
		// TODO delete
		$this->closeConn ();
		return $result;
	}
	public function create_database($database_name) {
		$database = $database_name;
		$sql = 'create database ' . $database;
		$this->query ( $sql );
	}
	public function query($sql) {
		if (Tools::isEmpty ( $sql )) {
			$this->show_error ( "SQL error : ", "SQL is empty!" );
		}
		$result = mysql_query ( $sql, $this->getConn () );
		
		if (! $result) {
			if ($this->show_error) {
				$this->show_error ( "SQL error : ", $sql );
			}
		}
		return $result;
	}
}
?>