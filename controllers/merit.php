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
				
				$this->view->code = $code;
				$this->view->title = 'Welcome';
				$this->view->render_singlepage('event_signin');
				//session_destroy();
			}
			else if($type=='out')
			{
				$code = md5('kk8event'.$event['id'].'out');
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