<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guild extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Guild_model', 'gm');
	}

	public function index()
	{
		 redirect('/', 'refresh');
	}

	public function join()
	{
		if( !$this->gm->is_member( 1, $this->session->userdata('uid') ) )
		{
			$this->gm->join( 1, $this->session->userdata('uid') );
			$this->session->set_flashdata( 'new', true );
		}
		
		redirect('/');
	}
}
