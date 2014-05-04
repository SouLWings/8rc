<?php

class User_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
	
	public function sign_in($un, $pw)
	{
		//$pw = md5($pw);
		$query = "SELECT a.id, a.acctype_id, a.fullname, a.status FROM account a WHERE a.username = '$un' AND a.password = '$pw'";
		if($result = $this->select($query))
		{
			//if 0 row or more than 1 rows return, log in = fail
			if(sizeof($result) != 1)
			{
				return false;
			}
			//user autenticated, getting data for the user
			else
			{
				//retrieving a row from the resultset
				$row = $result[0];
				
				//store infomation into a $user array to be returned
				$user['aid'] = $row['id'];
				$user['privilege'] = $row['acctype_id'];
				$user['status'] = $row['status'];
				$user['fullname'] = $row['fullname'];
				
				/*
				$result = $this->con->query("SELECT time FROM loginlog WHERE account_ID = $user[id] ORDER BY time DESC LIMIT 1");
				if($result->num_rows > 0)
					$user['time'] = $result->fetch_assoc()["time"];
				$result->free();
				
				
				//getting extra info for employer and jobsseeker account
				if($user['privilege'] == '1')
				{
					$result = $this->con->select("SELECT id FROM staff WHERE account_ID = $user[aid]");
					if(sizeof($result) == 1)
					{	
						$user['eid'] = $result["id"];
					}
				}
				else if($user['privilege'] == '4')
				{
					$result = $this->con->select("SELECT id, matric FROM jobseeker WHERE account_ID = $user[aid]");
					if(sizeof($result) == 1)
					{	
						$user['jsid'] = $result["id"];
						$user['matric'] = $result["matric"];
					}
				}
				
				//update loginlog and printing some debugging log
				if($this->con->query("INSERT INTO loginlog VALUES(NULL,$id,CURRENT_TIMESTAMP)"))
					echo 'loginlog';
				else
					echo 'no log';
				
				//update the user status to online and printing some debugging log
				if($this->con->query("UPDATE account SET onlinestatus = 'online' WHERE id = $id"))
					echo 'online-ed';
				else
					echo 'online status unchanged';
					*/
				return $user;
			}
		}
		else
			return false;
	}

}

?>