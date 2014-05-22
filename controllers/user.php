<?php

class User extends Controller {

    function __construct() {
        parent::__construct('user');
    }
    
    function index(){
		if(!$this->has_privilege(4))
			header('Location: '.URL.'error/e401');
        $this->view->title = 'Kinabalu Residential College';
        $this->view->render('userindex');
    }
    
    function index2()
    {
        $this->view->title = '2';
        $this->view->render('userindex');
    }
    
    function index3()
    {
        $this->view->title = '3';
        $this->view->render('userindex');
    }
	
	function signin()
	{
		$p = $this->validate_param('account,password');
		$user = $this->model->sign_in($p['account'], $p['password']);
		
		if($user != false)
		{
			$_SESSION['user'] = $user;
			header('Location:'.URL);
			$this->resp_success(array('user' => $user));
		}
		else
			$this->resp_fail('Incorrect username or password');
	}
	
	function signin2()
	{
		$user = $this->model->sign_in('JTK-kk8', '123');
		
		if($user != false)
		{
			$_SESSION['user'] = $user;
			header('Location:'.URL);
		}
		else
			$this->resp_fail('Incorrect username or password');
	}
	
	function signout(){
		session_destroy();
		header('Location: ' . $this->referer);
	}
}