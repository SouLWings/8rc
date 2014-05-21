<?php

class Merit extends Controller {

    function __construct() {
        parent::__construct('activity');
    }
    
    function index()
    {
		if($this->has_privilege(3) || $this->has_privilege(4))
		{
			header("Location: merit/all");
			//$this->all();
		}
		else
		{
			$this->view->title = 'Student\'s Merit';
			$this->view->render('merit');
		}
    }
    
	//list all merit
    function all()
    {
		$this->view->merits = $this->model->get_merit_list();
        $this->view->title = 'Student\'s Merit';
        $this->view->render('merit_list');
    }
	
    function event($id = 0, $type = 'in')
    {
		$event = $this->model->get_event($id);
		if(sizeof($event)>0)
		{
			$this->view->event = $event;
			if($type=='in')
			{
				$code = md5('kk8event'.$event['id'].'in');
				$this->model->set_event_QR($id, $code, 'in');
				$code = 'i'.$code;
				
				$this->view->code = $code;
				$this->view->title = 'Welcome';
				$this->view->render_singlepage('event_signin');
				//session_destroy();
			}
			else if($type=='out')
			{
				$code = md5('kk8event'.$event['id'].'out');
				$this->model->set_event_QR($id, $code, 'out');
				$code = 'o'.$code;
				
				$this->view->code = $code;
				$this->view->title = 'Thank you';
				$this->view->render_singlepage('event_signout');
				//session_destroy();
			}
			else{
				header('Location:'.URL.'error');
			}
		}
		else{
			header('Location:'.URL.'error');
		}
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
	
	function attendance()
	{
		sleep(1);
		
		//check post parameter: student matric, event qr
		$p = $this->validate_param('matric,qr');
		
		//check whether matric exist
		if(!$this->model->validate_matric($p['matric']))
			$this->resp_fail('Matric number not found');
		
		//set the 'sign' to the first character of qr, either i or o
		$p['sign'] = $p['qr'][0];
		
		//set the qr = 32 character, without the i or o infront
		$p['qr'] = substr($p['qr'],1);
		
		//call to model to get the event details with the qr
		$e = $this->model->get_event_by_qr($p['qr'], $p['sign']);
		
		//if the event not exist, fail
		if(sizeof($e) <= 0)
			$this->resp_fail('Event does not exist');
		
		//check if attendance already taken
		if($this->model->check_attendance($p['matric'], $e['id'], $p['sign']))
			$this->resp_fail('You have already signed');
		
		//every tests passed if reach here
		//if qr is to sign in event
		if($p['sign'] == 'i')
		{
			//add a record of attendance with the status "signed"
			//a participation with status "signed" is not counted when displaying merit mark
			if($this->model->add_attendance($p['matric'],$e['merittype_id'],$e['id']))
				$this->resp_success(array('event'=>$e));
			else
				$this->resp_fail('Internal server error');
		}
		//if qr is to sign out event
		else if($p['sign'] == 'o')
		{
			//change the status of participation of the student to "signed
			if($this->model->check_attendance($p['matric'], $e['id'], 'i'))
				if($this->model->validate_attendance($p['matric'],$e['id']))
					$this->resp_success();
				else
					$this->resp_fail('Internal server error');
			else
				$this->resp_fail('You have not signed in');
		}
		else
			$this->resp_fail('Incorrect parameter value');
	}
    
	function check($matric = '')
	{
		if(!$this->model->validate_matric($matric))
			$this->resp_fail('Matric number not found');
		
		if($involvements = $this->model->get_involvement($matric))
		{
			$this->resp_success(array('merit'=>$involvements));
		}
		else
			$this->resp_fail('Internal error');
	}
	
	//not capable in handling 
	function add($type = '')
	{
		$participation = $this->validate_param('matric,merittypeid,id');
		$activity_id = $participation['id'];
		if($type == 'event')
		{
			//need to check whether an record exist before
			/*
			if($this->model->validate_matric($participation['matric'])){
				if($this->model->add_attendance($participation['matric'], $participation['merittypeid'], $activity_id))
					if($this->model->validate_attendance($participation['matric'], $activity_id))
						header("Location: ".URL."activity/event";
					else
						$this->resp_fail('Internal error 2');
				else
					header("Location: ".URL."activity/event?id=$activity_id&msg=Internal error 1");
			}
			else
				header("Location: ".URL."activity/event?id=$activity_id&msg=Matric number not found.");*/
		}
		else
		{
			if(!$this->model->check_participation($participation['matric'], $activity_id))
				if($this->model->validate_matric($participation['matric']))
					if($this->model->add_participation($participation['matric'], $participation['merittypeid'], $activity_id))
						header("Location: ".URL."activity/sukmum?id=$activity_id");
					else
						$this->resp_fail('Internal error');
				else
					header("Location: ".URL."activity/sukmum?id=$activity_id&msg=Matric number not found.");
			else
				header("Location: ".URL."activity/sukmum?id=$activity_id&msg=Participation record already exist.");
		}
	}
	
	function remove($type = '')
	{
		$activityoreventid = -1;
		$participation_id = -1;
		if($type != ''){
			$p = $this->validate_param('activityoreventid');
			$activityoreventid = $p['activityoreventid'];
		}
		else{
			$p = $this->validate_param('participationid');
			$participation_id = $p['participationid'];
		}
		
		if($this->model->remove_participants_of($activityoreventid, $participation_id))
			$this->resp_success();
		else
			$this->resp_fail('Internal error');
	}
}