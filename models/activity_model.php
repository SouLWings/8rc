<?php

class Activity_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
	
	public function add_activity($name,$session,$type,$desc)
	{
		$qry = "INSERT INTO `activity` VALUES('','$name','$session','$type','$desc','','')";
		return $this->query($qry);
	}
	
	public function get_all_projects()
	{
		return $this->get_activities('project');
	}
	
	public function get_past_projects()
	{
		return $this->get_activities('project', true);
	}
	
	public function get_all_sukmum()
	{
		return $this->get_activities('sukmum');
	}
	
	public function get_past_sukmum()
	{
		return $this->get_activities('sukmum', true);
	}

	public function get_all_feseni()
	{
		return $this->get_activities('feseni');
	}
	
	public function get_past_feseni()
	{
		return $this->get_activities('feseni', true);
	}

	private function get_activities($type, $old = false){
		$cond = $old ? '<' : '=';
		$qry = "SELECT * FROM `activity` WHERE `type` LIKE '%$type' AND `session` $cond '".ACADEMIC_SESSION."'";
		if($result = $this->select($qry))
		{
			return $result;
		}
		return array();
	}

	public function get_event($id)
	{
		$qry = "SELECT * FROM `merit_event` WHERE id = $id";
		return $this->get_first_row($qry);
	}
	
	public function get_all_events()
	{
		$qry = "SELECT * FROM `merit_event` WHERE `session` = '".ACADEMIC_SESSION."'";
		if($result = $this->select($qry))
		{
			return $result;
		}
		return array();
	}
	
	public function set_event_QR($id, $code, $inorout)
	{
		$column = 'startQR';
		if($inorout = 'out')
			$type = 'endQR';
		$qry = "UPDATE `merit_event SET `$column` = '$code' WHERE id = $id";
		return $this->query($qry);
	}
}

?>