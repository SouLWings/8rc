<?php

class Controller {

	public $curr_location = '';
	public $referer = '';
	
    function __construct($model = 'Base') {
		session_start();
		$this->curr_location = $_SERVER['REQUEST_URI'];

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

	public function has_privilege($level, $orless = false)
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
			return false;
		}
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
			header('Location: '.URL.'error/e401');
		}
	}

	public function validate_param($param)
	{
		$params = explode(',',$param);
		$paramarray = array();
		$invalid = '';
		foreach($params as $p)
			if(!$paramarray[$p] = $this->param(trim($p,' ')))
				$invalid .= $p.' ';

		if($invalid!='')
		{
			$this->resp_fail("Invalid parameters: $invalid");
		}
		return $paramarray;
	}
	
	/* public function validate_matric($matric)
	{
		return $this->model->validate_matric($matric);
	} */
	
	public function param($p)
	{
		if(isset($_POST[$p]) && $_POST[$p] != '')
			return trim($_POST[$p],' ');
		else if(isset($_GET[$p]) && $_GET[$p] != '')
			return trim($_GET[$p],' ');
		else
			return false;
	}
	
	public function resp_success($arr = array())
	{
		$resp = array();
		$resp['status'] = 'success';
		foreach($arr as $k => $v)
			$resp[$k] = $v;
		echo json_encode($resp);
		exit();
	}
	
	public function resp_fail($msg)
	{
		echo json_encode(array('status'=>'fail','msg'=>$msg));
		exit();
	}
}