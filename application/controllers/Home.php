<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('home_model');
		$this->load->model('forum_model');
		$this->load->model('event_model');
	}

	public function index()
	{
		if( $this->home_model->is_first_time() )
		{
			$this->load->view( 'setup' );
			return;
		}
		$blogs = $this->home_model->get_blogs( 1 );
		foreach( $blogs as $blog )
		{
			$blog->replies = $this->forum_model->get_reply_count( $blog->tid );
		}
		$events = $this->event_model->get_events( 1, 3 );
		$activities = $this->home_model->get_posts( 1 );
		$this->load->view( 'home', array( 
			'blogs' => $blogs, 
			'events' => $events, 
			'activities' => $activities
			 ) );
	}
}
