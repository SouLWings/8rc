<?php

class Merit extends Controller {

    function __construct() {
        parent::__construct('activity');
    }
    
    function index()
    {
		if($this->has_privilege(3) || $this->has_privilege(4))
		{
			$this->all();
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
        $this->view->title = 'Student\'s Merit';
        $this->view->render('merit_list');
    }
    
    function download()
    {
        $this->view->title = 'Student\'s Merit';
        $this->view->render('merit');
    }
	
	function attendance()
	{
		sleep(1);
		//post: student matric, event qr, start/end
		
		$p = $this->validate_param('matric,qr');
		
		if(!$this->model->validate_matric($p['matric']))
			$this->resp_fail('Matric number not found');
		
		$p['sign'] = $p['qr'][0];
		$p['qr'] = substr($p['qr'],1);
		
		$e = $this->model->get_event_by_qr($p['qr'], $p['sign']);
		if(sizeof($e) <= 0)
			$this->resp_fail('Event does not exist');
		
		if($this->model->check_attendance($p['matric'], $e['id'], $p['sign']))
			$this->resp_fail('You have signed for this event');
		
		if($p['sign'] == 'i')
		{
			if($this->model->add_attendance($p['matric'],$e['merittype_id'],$e['id']))
				$this->resp_success();
			else
				$this->resp_fail('Internal server error');
		}
		else if($p['sign'] == 'o')
		{
			if($this->model->validate_attendance($p['matric'],$e['id']))
				$this->resp_success();
			else
				$this->resp_fail('Internal server error');
		}
		else
			$this->resp_fail('Incorrect parameter value');
	}
    
	function check($matric = '')
	{
		if(!$this->model->validate_matric($matric))
			$this->resp_fail('Matric number not found');
		
		if($mark = $this->model->get_mark($matric))
		{
			if($mark['total'] == '')
				$mark['total'] = '0';
			$this->resp_success(array('merit'=>$mark['total']));
		}
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
				$code = 'o'.md5('kk8event'.$event['id'].'out');
				$this->model->set_event_QR($id, $code, 'out');
				
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
}