<?php

class Error extends Controller {

    function __construct($code = '404'){
        parent::__construct();
		$this->code = $code;
    }
    
    function index() 
    {
		if($this->code == '404'){
			$this->view->title = '404 Not found';
			$this->view->render('error404');
		}
		else{
			$this->view->title = '401 Access denied.';
			$this->view->render('error401');
		}
    }
}