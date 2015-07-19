<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Guild_model', 'gm');
	}

	public function index()
	{
		$data = $this->gm->get_members( 1 );
		$this->load->view('members', array ( 'members' => $data ) );
	}

}
