<?php

class DatabaseConnection {

	protected $db_name = 'twitdeck';
	protected $db_user = 'root';
	protected $db_pass = '';
	protected $db_host = 'localhost';

	//connect to database
	public function connect() {
		$connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);

		if($connection)
			return $connection;
		else
			return connection;
	}

	//return rows
	public function retrieveRecords($rowSet, $singleRow=false)
	{
		$resultArray = array();
		while($row = mysqli_fetch_assoc($rowSet))
		{
			array_push($resultArray, $row);
		}

		if($singleRow === true)
			return $resultArray[0];

		return $resultArray;
	}

	//select record from db
	public function selectRecord($table, $where) {
		$sql = "SELECT * FROM $table WHERE $where";
		$result = mysqli_query($this->connect(), $sql);
		if(mysqli_num_rows($result) == 1)
			return $this->retrieveRecords($result, true);

		return $this->retrieveRecords($result);
	}

	//update a record in database
	public function updateRecord($data, $table, $where) {
		foreach ($data as $column => $value) {
			$sql = "UPDATE $table SET $column = $value WHERE $where";
			mysqli_query($sql) or die(mysqli_error());
		}
		return true;
	}

	//insert into database
	public function insertRecord($data, $table) {

		$columns = "";
		$values = "";

		foreach ($data as $column => $value) {
			$columns .= ($columns == "") ? "" : ", ";
			$columns .= $column;
			$values .= ($values == "") ? "" : ", ";
			$values .= $value;
		}

		$sql = "insert into $table ($columns) values ($values)";

		mysqli_query($sql) or die(mysqli_error());

		//return the ID of the user in the database.
		return mysqli_insert_id();

	}

}

?>