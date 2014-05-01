<?php

class Merit extends Controller {

    function __construct() {
        parent::__construct();
    }
    
    function index()
    {
        $this->view->title = 'Merit';
        $this->view->render('index');
    }
}