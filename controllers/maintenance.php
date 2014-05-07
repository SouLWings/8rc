<?php

class Activity extends Controller {

    function __construct() {
        parent::__construct('activity');
    }
    
    function index()
    {
		if($this->has_privilege(4)){
			$this->listing();
		}
		else if($this->has_privilege(2) || $this->has_privilege(3)){
			$this->report();
		}
		else{
			header("Location:/");
			die();
		}
    }
    
	function report()
	{
		$this->view->maintenances = $this->model->get_all_mainenances($acc_id);
        $this->view->title = 'Maintenance';
        $this->view->render('maintenance');
	}
    
	function listing()
	{
		$this->view->maintenances = $this->model->get_all_mainenances();
        $this->view->title = 'Maintenance';
        $this->view->render('maintenance_list');
	}
	
	function add($acc_id, $issue, $location, $desc, $photo_url){
		$maintenance = $this->validate_param('issue,location,desc');
	}
    
}