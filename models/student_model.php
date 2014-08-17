<?php
//student info
class Student_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
	
	public function add_mhs_student($name, $matric, $ic, $race, $sel, $room)
	{
		$gender = $ic[strlen($ic)-1]%2 == 0 ? 'Female' : 'Male';
		return $this->add_student($name, $matric, $ic, '', '', '', '', $race, $gender, '', $sel, ACADEMIC_SESSION, '1');
	}
	
	public function add_student($name, $matric, $ic, $phone, $emergancyphone, $email, $address, $race, $gender, $nationality, $sel, $session, $semester)
	{
		$qry = "INSERT INTO `student` VALUES('','$name','$matric','$ic','$phone', '$emergancyphone', '$email', '$address', '$race', '$gender', '$nationality', '$sel', '$session', '$semester', '', '')";
		if($result = $this->query($qry))
			return true;
		return false;
	}
	
	public function edit_student($maintenance_id,  $issue, $location, $desc)
	{
		$qry = "UPDATE `maintenance` SET `location` = '$location', `description` = '$desc' WHERE id = $maintenance_id";
		if($result = $this->query($qry))
			return true;
		return false;
	}
	
	public function delete_student($id)
	{
		$qry = "DELETE FROM `maintenance` WHERE id = $id";
		if($result = $this->query($qry))
			return true;
		return false;
	}
	
	public function check_ic_exist($ic)
	{
		$qry = "SELECT * FROM `student` WHERE ic = '$ic' AND session = '" . ACADEMIC_SESSION ."'";
		if($result = $this->query($qry))
			if(sizeof($result) == 1)
				return true;
		return false;
	}
	
	public function check_ic_checkedin($ic)
	{
		$qry = "SELECT s.id FROM `student` s INNER JOIN room_occupancy ro on s.matric = ro.student_id WHERE s.ic = '$ic' AND ro.checkin_date > '0000-00-00'";
		if($result = $this->query($qry))
			if(sizeof($result) == 1)
				return true;
		return false;
	}
	
	public function get_student_list($session = '0')
	{
		if($session == '0')
			$qry = "SELECT * FROM `student` ORDER BY `session` DESC";
		else
			$qry = "SELECT * FROM `student` WHERE `session` = '".$session."' ORDER BY id desc";
		$result = $this->select($qry);
		if(sizeof($result) > 0)
			return $result;
		return false;
	}
	
	public function get_student_by_ic($ic)
	{
		$qry = "SELECT * FROM `student` s INNER JOIN room_occupancy ro ON ro.student_id = s.matric WHERE `ic` = '$ic'";
		$result = $this->select($qry);
		if(sizeof($result) > 0)
			return $result;
		return false;
	}
	
	public function get_floors()
	{
		$qry = "SELECT * from room GROUP BY floor";
		$result = $this->select($qry);
		if(sizeof($result) > 0)
			return $result;
		return false;
	}
	
	public function get_rooms()
	{
		$qry = "SELECT * from room";
		$result = $this->select($qry);
		if(sizeof($result) > 0)
			return $result;
		return false;
	}
	/* 
	public function get_room_assignment()
	{
		$qry = "SELECT * from room";
		$result = $this->select($qry);
		if(sizeof($result) > 0)
			return $result;
		return false;
	} */
	
	public function get_room_occupancy()
	{
		$qry = "SELECT * from room";
		$result = $this->select($qry);
		if(sizeof($result) > 0)
			return $result;
		return false;
	}
}