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
	
	public function set_event_QR($id, $qr, $signtype)
	{
		$column = ($signtype == 'in') ? 'startQR' : 'endQR';
		$qry = "UPDATE `merit_event` SET `$column` = '$qr' WHERE id = $id";
		return $this->query($qry);
	}
	
	public function get_event_by_qr($qr, $signtype)
	{
		$column = ($signtype == 'i') ? 'startQR' : 'endQR';
		$qry = "SELECT * FROM `merit_event` WHERE `$column` = '$qr'";
		return $this->get_first_row($qry);
	}
	
	public function check_attendance($matric, $eid, $signtype)
	{
		$status = ($signtype == 'i') ? 'signedin\' OR `status` = \'valid' : 'valid';
		$qry = "SELECT * FROM `participation` WHERE `merit_event_id` = $eid AND `student_matric` = '$matric' AND `status` = '$status'";
		$result = $this->query($qry);
		if($result && $result->num_rows > 0)
			return true;
		return false;
	}
	
	public function add_attendance($matric, $merit_id, $event_id)
	{
		$qry = "INSERT INTO `participation` VALUES('','$matric',$merit_id,0,$event_id,'signedin',now())";
			//$qry = "UPDATE `participation` SET `status` = 'valid' WHERE "
		return $this->query($qry);
	}
	
	public function validate_attendance($matric, $event_id)
	{
		$qry = "UPDATE `participation` SET `status` = 'valid' WHERE `student_matric` = '$matric' AND `merit_event_id` = $event_id";
		return $this->query($qry);
	}
	
	public function validate_matric($matric)
	{
		$qry = "SELECT * FROM `student` WHERE `matric` = '$matric'";
		$result = $this->query($qry);
		if($result && $result->num_rows > 0)
			return true;
		return false;
	}
	
	public function get_mark($matric)
	{
		$qry = "SELECT sum(mt.mark) as total FROM `participation` p INNER JOIN `merit_type` mt ON p.merit_type_id = mt.id WHERE p.student_matric = '$matric' AND p.status = 'valid'";
		$result = $this->select($qry);
		if(sizeof($result) > 0)
			return $result[0];
		return false;
	}
}

?>