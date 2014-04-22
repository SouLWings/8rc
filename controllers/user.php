<?php

class User extends Controller {

    function __construct() {
        parent::__construct('user');
    }
    
    function index(){
		$this->require_privilege(4);
        $this->view->title = 'Kinabalu Residential College';
        $this->view->render('userindex');
    }
	
	//request to signin shld be in ajax form
	function signin()
	{
		if($this->is_logged_in())
		{
			header('Location: ' . $this->referer);
		}
		else
		{
			if(isset($_POST['account']) && !empty($_POST['account']) && isset($_POST['password']) && !empty($_POST['password'])){
				$un = $this->get_secured($_POST['account']);
				$pw = $this->get_secured($_POST['password']);
				$user = $this->model->sign_in($un, $pw);
				
				if($user != false)
				{
					$_SESSION['user'] = $user;
					$data = array('data' => 'success');
				}
				else
				{
					$data = array('data' => 'Incorrect username or password');
				}
				echo json_encode($data);
			}
			else //if user is logged in and access this URL
			{
				header('Location: ' . $this->referer);
			}
		}
	}
	
	function signout(){
		session_destroy();
		header('Location: ' . $this->referer);
	}
}