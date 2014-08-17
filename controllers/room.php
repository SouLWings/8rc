<?php

class Room extends Controller {

    function __construct() {
        parent::__construct('student');
    }
    
	//list all merit
    function index()
    {
		$this->view->floors = $this->model->get_floors();
		$this->view->rooms = $this->model->get_rooms();
		//$this->view->room_assignment = $this->model->get_room_assignment();
		$this->view->room_occupancy = $this->model->get_room_occupancy();
        $this->view->title = 'Room';
        $this->view->render('room_index');
    }
	
	function add()
	{
		$student = $this->validate_param('name,matric,ic,race,sel,room');
		//blm siap
	}
	
	
}