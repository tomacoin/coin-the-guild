<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Event_model', 'em');
	}

	public function index()
	{
		$data = $this->em->get_events( 1 );
		$this->load->view('events', array ( 'events' => $data ) );
	}
}
