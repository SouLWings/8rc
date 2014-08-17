<?php

class Orientation extends Controller {

    function __construct() {
        parent::__construct('student');
    }
    
	//list all merit
    function index()
    {
		$this->view->student = $this->model->get_student_list();
        $this->view->title = 'Orientation Dashboard';
        $this->view->render('orientation');
    }
    
	function registration()
	{
		$this->view->errormsg = 0; //0 for no error 1 for no ic found 2 for already check in
		if(isset($_POST['ic']))
		{
			if($this->model->check_ic_exist($_POST['ic']))
			{	
				if($this->model->check_ic_checkedin($_POST['ic']))
				{
					$this->view->student = $this->model->get_student_by_ic($_POST['ic']);
					$this->view->title = 'Welcome';
					$this->view->render_singlepage('orientation_registration_form');
					exit();
				}
				else
				{
					$this->view->errormsg = 2;
				}
			}
			else
			{
				$this->view->errormsg = 1;
			}
		}
		$this->view->title = 'Welcome';
		$this->view->render_singlepage('orientation_registration');
	}
	
	//handle ajax call from /registration
	function check()
	{
		
		$ic = $this->validate_param('ic');
		echo $ic['ic'];
		if($this->model->check_ic_exist($ic['ic']))
			$this->resp_fail('Activity already exist');
			
		if(!$this->model->check_ic_checkedin($ic['ic']))
			$this->resp_fail('Activity already exist');
		
		$this->resp_success();
	}
}