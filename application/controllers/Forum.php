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
		if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$tid =  $this->input->post( 'thread' );

			$this->load->library( 'form_validation' );
			$this->form_validation->set_rules( 'reply', 'Reply', 'trim|required|min_length[10]' );

			if($this->form_validation->run() == FALSE)
			{

			}
			else
			{
				$tid =  $this->input->post( 'thread' );
				$content =  $this->input->post( 'reply' ); 
				$this->fm->create_reply( $tid, $content );
			}
		}

		$thread = $this->fm->get_thread( $tid );
		$replies = $this->fm->get_replies( $tid );
		$this->load->view( 'thread', array ( 'thread' => $thread, 'replies' => $replies ) );
		
		
	}

	public function reply()
	{
		$tid =  $this->input->post( 'thread' );

		$this->load->library( 'form_validation' );
		$this->form_validation->set_rules( 'reply', 'Reply', 'trim|required|min_length[10]' );

		if($this->form_validation->run() == FALSE)
		{
			redirect($_SERVER['HTTP_REFERER']);
		}
		else
		{
			$tid =  $this->input->post( 'thread' );
			$content =  $this->input->post( 'reply' ); 
			$this->fm->create_reply( $tid, $content );
			redirect($_SERVER['HTTP_REFERER']);
		}
		
	}
}
