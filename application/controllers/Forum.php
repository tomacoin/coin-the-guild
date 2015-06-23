<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Forum_model', 'fm');
	}

	public function index()
	{
		$data = $this->fm->get_threads( 1 );
		$this->load->view('forum', array ( 'threads' => $data ) );
	}

	public function thread( $tid )
	{
		$thread = $this->fm->get_thread( $tid );
		$replies = $this->fm->get_replies( $tid );
		$this->load->view( 'thread', array ( 'thread' => $thread, 'replies' => $replies ) );
	}
}
