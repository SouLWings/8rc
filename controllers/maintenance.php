<?php

class Maintenance extends Controller {

    function __construct() {
        parent::__construct('maintenance');
    }
    
    function index()
    {
		if($this->has_privilege(4)){
			$this->listing();
		}
		else if($this->has_privilege(1) || $this->has_privilege(3)){
			$this->report();
		}
		else{
			header("Location:/");
			die();
		}
    }
    
	function report()
	{
		//$matric = $_SESSION['user']['matric'];
		$matric = 'IER130003';
		$this->view->maintenances = $this->model->get_all_maintenance($matric);
        $this->view->title = 'Maintenance';
        $this->view->render('maintenance');
	}
    
	function listing()
	{
		$this->view->maintenances = $this->model->get_all_maintenance();
        $this->view->title = 'Maintenance';
        $this->view->render('maintenance_list');
	}
	
	function delete()
	{
		$maintenance = $this->validate_param('maintenance_id');
		if($this->model->delete_maintenance($maintenance['maintenance_id']))
			$this->resp_success();
		else
			$this->resp_fail('Internal error');
	}
	
	function edit()
	{
		$maintenance = $this->validate_param('maintenance_id,issue,location,desc');
		if($this->model->edit_maintenance($maintenance['maintenance_id'], $maintenance['issue'], $maintenance['location'], $maintenance['desc'], ''))
			$this->resp_success();
		else
			$this->resp_fail('Internal error');
	}
	
	function add()
	{
		$maintenance = $this->validate_param('matric,issue,location,desc');
		if($this->model->add_maintenance($maintenance['matric'], $maintenance['issue'], $maintenance['location'], $maintenance['desc'], ''))
			$this->resp_success();
		else
			$this->resp_fail('Internal error');
	}
    
	//need test
	function get()
	{
		$matric = $this->validate_param('matric');
		if($result = $this->model->get_all_maintenance($matric['matric']))
			$this->resp_success(array('maintenance'=>$result));
		else
			$this->resp_fail('Internal error');
	}
}