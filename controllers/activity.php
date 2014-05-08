<?php

class Activity extends Controller {

    function __construct() {
        parent::__construct('activity');
    }
    
    function index()
    {
		header('Location:'.URL);
    }
    
    function delete()
    {
		sleep(1);
		$activity = $this->validate_param('id');
		if($this->model->delete_activity($activity['id']))
			$this->resp_success();
		else
			$this->resp_fail('Internal error');
	}
    
    function edit()
    {
		sleep(1);
		$activity = $this->validate_param('id,name');
		if($this->model->edit_activity($activity['id'], $activity['name']))
			$this->resp_success();
		else
			$this->resp_fail('Internal error');
	}
	
    function create()
    {
		sleep(1);
		$activity = $this->validate_param('type,name');
		switch ($activity['type']) {
            case 'sukmum':
                if($this->model->add_activity($activity['name'],ACADEMIC_SESSION,$activity['type'],''))
					$this->resp_success();
				else
					$this->resp_fail('Internal error');
                break;
				
            default:
				$this->resp_fail('Activity not defined');
                break;
        }
    }
    
    function project()
    {
		$this->view->activities = $this->model->get_all_projects();
		$this->view->pastactivities = $this->model->get_past_projects();
        $this->view->title = 'Projects';
        $this->view->render('project');
    }
    
    function sukmum()
    {
		$this->view->activities = $this->model->get_all_sukmum();
		$this->view->pastactivities = $this->model->get_past_sukmum();
        $this->view->title = 'SUKMUM';
        $this->view->render('sukmum');
    }
    
    function event()
    {
		$this->view->events = $this->model->get_all_events();
        $this->view->title = 'Event';
        $this->view->render('event');
    }
}