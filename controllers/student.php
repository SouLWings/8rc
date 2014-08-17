<?php

class Student extends Controller {

    function __construct() {
        parent::__construct('student');
    }
    
	//list all merit
    function index()
    {
		$this->view->student = $this->model->get_student_list();
        $this->view->title = 'Student List';
        $this->view->render('student_list');
    }
	
	function add()
	{
		$student = $this->validate_param('name,matric,ic,race,sel,room');
		//blm siap
	}
	
	
	function signout(){
		session_destroy();
		header('Location: ' . $this->referer);
	}
	
    function download($type = '', $id = '')
    {
		require_once('util/PHPCsv/csv.php');
		if($type == '' && $id == '')
		{
			$data = $this->model->get_merit_list();

			header('Content-Type: text/csv');
			header('Content-Disposition: attachment;filename="merit_mark_list.csv"');
			header('Cache-Control: max-age=0');
			$file = new CsvWriter('php://output');
			$file->addline(array('Name','Matric','Merit'));
			foreach ($data as $line) {
				$file->addLine($line);
			}
		}
		else if($type == 'activity' && intval($id) > 0)
		{
			$data = $this->model->get_merit_list_of_activity($id);
			$activity = $this->model->get_activity($id);
			header('Content-Type: text/csv');
			header('Content-Disposition: attachment;filename="'.$activity['name'].'_list.csv"');
			header('Cache-Control: max-age=0');
			$file = new CsvWriter('php://output');
			$file->addline(array('Name','Matric','Position'));
			foreach ($data as $line) {
				$file->addLine($line);
			}
		}
    }
    
    function upload($type = '')
	{
		$activity_id = $this->validate_param('id');
		$activity_id = $activity_id['id'];
		
		print_r($this->validate_param('id'));
		print_r('<br>');
		print_r($activity_id);
		print_r('<br>');
		print_r($_POST);
		print_r('<br>');
		print_r($_FILES);
		require('util/PHPCsv/csv.php');
		if($_FILES["csvfile"]["type"] == "application/vnd.ms-excel")
		{
			$lines = new CsvReader($_FILES['csvfile']['tmp_name']);
			foreach ($lines as $line_number => $columms)
			{
				$matric = $columms[0];
				$merit_id = $this->model->get_merit_id($columms[1]);
				//TO-DO check for participation type == activity type
				if($this->model->validate_matric($matric) && !$this->model->check_participation($matric, $activity_id))
				{
					switch($type){
						case('event'):
							if(!$this->model->check_attendance($matric, $activity_id, 'i')){
								$this->model->add_attendance($matric,$merit_id,$activity_id);
								$this->model->validate_attendance($matric,$activity_id);
							}
							break;
							
						case('sukmum'):
							$this->model->add_participation($matric, $merit_id, $activity_id);
							break;
							
						case('feseni'):
							$this->model->add_participation($matric, $merit_id, $activity_id);
							header("Location: ".URL."activity/feseni");
							break;
							
						case('mproject'):
							$merit_id = $this->model->get_merit_id($columms[1], "(MEGA)");
							$this->model->add_participation($matric, $merit_id, $activity_id);
							$type = 'project';
							break;
							
						case('nproject'):
							$merit_id = $this->model->get_merit_id($columms[1]);
							$this->model->add_participation($matric, $merit_id, $activity_id);
							$type = 'project';
							break;
							
						default:
							echo 'oh no';
					}
				}
				else
				{
					echo 'merit exist or ';
				}
			}
			header("Location: ".URL."activity/".$type."?id=$activity_id");
		}
		else
			echo 'Incorrect type';
			
    }
}