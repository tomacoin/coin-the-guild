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
		$page = 1;
		$data = $this->fm->get_threads( 1, $page );
		$count = $this->fm->get_thread_count( 1 );
		$top_posters = $this->fm->get_top_posters( 1 );
		$top_threads = $this->fm->get_top_threads( 1 );
		$this->load->view('forum', array ( 
			'threads' => $data, 
			'page' => $page, 
			'count' => $count,
			'top_posters' => $top_posters,
			'top_threads' => $top_threads
			 ) );
	}

	public function page( $page )
	{
		if ( !$page || !is_numeric( $page ) )
		{
			$page = 1;
		}
		$data = $this->fm->get_threads( 1, $page );
		$count = $this->fm->get_thread_count( 1 );
		$top_posters = $this->fm->get_top_posters( 1 );
		$top_threads = $this->fm->get_top_threads( 1 );
		$this->load->view('forum', array ( 
			'threads' => $data, 
			'page' => $page, 
			'count' => $count,
			'top_posters' => $top_posters,
			'top_threads' => $top_threads
			 ) );
	}

	public function thread( $tid, $page = 'page-1' )
	{
		$page = substr( $page, 5 );
		if ( !$page || !is_numeric( $page ) )
		{
			$page = 1;
		}
		if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			if ( $tid === "new" ) {
				$this->load->library( 'form_validation' );
				$this->form_validation->set_rules( 'title', 'Title', 'trim|required|min_length[10]' );
				$this->form_validation->set_rules( 'content', 'Post', 'trim|required|min_length[10]' );

				if($this->form_validation->run() == FALSE)
				{
					$this->load->view( 'thread_new' );
					return;
				}
				else
				{
					$title =  $this->input->post( 'title' );
					$content =  $this->input->post( 'content' ); 
					$this->fm->create_thread( 1, $title, $content );
					redirect( '/forum/' );
				}
			}
			else
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
		}

		if ( $tid === "new" ) {
			$this->load->view( 'thread_new' );
			return;
		}

		$thread = $this->fm->get_thread( $tid );
		$replies = $this->fm->get_replies( $tid, $page );
		$count = $this->fm->get_reply_count( $tid );
		$this->load->view( 'thread', array ( 'thread' => $thread, 'replies' => $replies, 'page' => $page, 'count' => $count ) );
		
		
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
