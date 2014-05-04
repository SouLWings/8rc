<?php

class Activity extends Controller {

    function __construct() {
        parent::__construct('activity');
    }
    
    function index()
    {
		header('Location:'.URL);
    }
    
    function create()
    {
		$type = $this->validate_param('activitytype')[0];
		switch ($type) {
            case 'sukmum':
				$name = $this->validate_param('name')[0];
                if($this->model->add_activity($name,ACADEMIC_SESSION,$type,''))
					echo json_encode(array('status' => 'success'));
				else
					echo json_encode(array('status' => 'fail1'));
                break;
				
            default:
				echo json_encode(array('status' => 'fail2'));
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