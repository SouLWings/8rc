<?php

class Error extends Controller {

    function __construct(){
        parent::__construct();
    }
    
    function index() 
    {
		$this->e404();
    }
    
    function e404() 
    {
		$this->view->title = '404 Not found';
		$this->view->render('error404');
	}
    
    function e401() 
    {
		$this->view->title = '401 Access denied.';
		$this->view->render('error401');
	}
}