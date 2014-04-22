<?php

class Controller {

	public $curr_location = '';
	public $referer = '';
	
    function __construct($model = 'Base') {
		session_start();
		$this->curr_location = $_SERVER['SCRIPT_NAME'];

		if(isset($_SERVER['HTTP_REFERER']))
			$this->referer = $_SERVER['HTTP_REFERER'];
		else
			$this->referer = $this->curr_location;
			
		$this->loadModel($model);
        $this->view = new View($this->is_logged_in());
    }
    
    public function loadModel($name, $modelPath = 'models/') {
        
        $path = $modelPath . $name.'_model.php';
        if (file_exists($path)) {
            require $modelPath .$name.'_model.php';
            
            $modelName = $name . '_Model';
            $this->model = new $modelName();
        }        
    }
		
	public function get_secured($input)
	{
		return mysql_real_escape_string(stripslashes(htmlentities($input)));
	}

	//check whether the user is logged in
	public function is_logged_in()
	{
		if(isset($_SESSION['user']) && isset($_SESSION['user']['aid']) && isset($_SESSION['user']['privilege']) && isset($_SESSION['user']['fullname']))
			return true;
		else
			return false;
	}

	//getting today, yesterday message from a given time
	public function get_last_visited_msg($time)
	{
		//date_default_timezone_set ('Asia/Singapore');
		$lastvisitedmsg = 'Your last login: ';
		if((date('d',time())-date('d',strtotime($time)))=='0')
			$lastvisitedmsg .= 'Today ';
		else if((date('d',time())-date('d',strtotime($time)))=='1')
			$lastvisitedmsg .= 'Yesterday';
		else
			$lastvisitedmsg .= date('Y-m-d ', strtotime($time));
			
		$lastvisitedmsg .= date('g:i a', strtotime($time));
		
		return $lastvisitedmsg;
	}


	public function require_privilege($level, $orless = false)
	{
		if($this->is_logged_in())
		{
			$ul = $_SESSION['user']['privilege'];
			if($orless && $ul <= $level || $ul = $level)
				return true;
			else 
				return false;		
		}
		else
		{
			$this->view->title = '401 Access Denied';
			$this->view->render('error401');
			die();
		}
	}	

}