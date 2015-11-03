<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('home_model');
	}

	public function index()
	{
		$blogs = $this->home_model->get_blogs( 1 );
		$events = array();
		$activities = array();
		$this->load->view( 'home', array( 
			'blogs' => $blogs, 
			'events' => $events, 
			'activities' => $activities
			 ) );
	}
}
