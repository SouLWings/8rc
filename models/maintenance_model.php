<?php

class Maintenance_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
	
	public function add_maintenance($acc_id, $issue, $location, $desc, $photo_url)
	{
		$qry = "INSERT INTO `maintenance` VALUES('',$acc_id,'$issue','$location','$desc',now(),'$photo_url','pending')";
		if($result = $db->query($qry))
			return true;
		return false;
	}
	
	public function edit_maintenance($maintenance_id,  $issue, $location, $desc)
	{
		$qry = "UPDATE `maintenance` SET `issue` = '$issue', `issue` = '$location', `desc` = '$desc' WHERE id = $maintenance_id";
		if($result = $db->query($qry))
			return true;
		return false;
	}
	
	public function delete_maintenance($id)
	{
		$qry = "DELETE FROM `maintenance` WHERE id = $id";
	}
	
	public function get_all_mainenances($acc_id = '0')
	{
		if($acc_id == '0')
			$qry = "SELECT * FROM `maintenance` WHERE `session` = '".URL."'";
		else
			$qry = "SELECT * FROM `maintenance` WHERE `acc_id` = '$acc_id' AND `session` = '".URL."'";
		
		$result = $db->select($qry);
		if(sizeof($result) > 0)
			return true;
		return false;
	}
	
	
}