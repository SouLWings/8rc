<?php
class Database{
    function __construct() {
		$this->con = new Mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		
		if ($this->con->connect_errno)
			die("Unable to enstablish connection to database: " . $con->connect_error);
	}	
}