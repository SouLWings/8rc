<?php

class Maintenance_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
	
	public function add_maintenance($acc_id, $issue, $location, $desc, $photo_url)
	{
		$qry = "INSERT INTO `maintenance` VALUES('','$acc_id','$issue','$location','$desc',now(),'$photo_url','pending','".ACADEMIC_SESSION."',NULL,'-','-')";
		if($result = $this->query($qry))
			return true;
		return false;
	}
	
	public function edit_maintenance($maintenance_id,  $issue, $location, $desc)
	{
		$qry = "UPDATE `maintenance` SET `location` = '$location', `description` = '$desc' WHERE id = $maintenance_id";
		if($result = $this->query($qry))
			return true;
		return false;
	}
	
	public function delete_maintenance($id)
	{
		$qry = "DELETE FROM `maintenance` WHERE id = $id";
		if($result = $this->query($qry))
			return true;
		return false;
	}
	
	public function get_all_maintenance($acc_id = '0')
	{
		if($acc_id == '0')
			$qry = "SELECT * FROM `maintenance` WHERE `session` = '".ACADEMIC_SESSION."'";
		else
			$qry = "SELECT * FROM `maintenance` WHERE `student_matric` = '$acc_id' AND `session` = '".ACADEMIC_SESSION."' ORDER BY id desc";
		$result = $this->select($qry);
		if(sizeof($result) > 0)
			return $result;
		return false;
	}
	
	
}