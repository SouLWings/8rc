<?php
class Model{
    public function __construct() {
		$this->db = new Database();
	}
	
	//return an associate array of first row from the given query
	public function get_first_row($qry)
	{
		$row = array();
		if($result = $this->query($qry))
		{
			$row = $result->fetch_assoc();
			$result->free();
		}
		return $row;
	}
	//return an associate array of all rows from the given query
	public function select($qry)
	{
		$rows = array();
		if($result = $this->query($qry))
		{
			while ($row = $result->fetch_assoc())
				$rows[] = $row;
			$result->free();
		}
		return $rows;
	}
	
	//insert a new row with provided values, into a given table
	public function insert_row($values, $table)
	{
		return $this->query("INSERT INTO `$table` VALUES($values)");
	}
	
	//count the number of rows of result of a given query
	public function row_count($qry)
	{
		return $this->query($qry)->num_rows;
	}
	
	public function query($qry){
		Log::q($qry);
		return $this->db->con->query($qry);
	}	
	

}
?>