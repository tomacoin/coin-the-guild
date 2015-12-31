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
			$this->session->set_flashdata( 'new_member', true );
		}

		redirect('/');
	}

	public function setup()
	{
		$this->load->model('user_model');
		$this->load->library( 'form_validation' );

		$this->form_validation->set_rules( 'guild_name', 'Guild Name', 'trim|required|min_length[4]' );
		$this->form_validation->set_rules( 'guild_desc', 'Guild Description', 'trim' );

		$this->form_validation->set_rules( 'username', 'Username', 'trim|required|min_length[4]' );
		$this->form_validation->set_rules( 'email', 'Email', 'trim|required|valid_email' );
		$this->form_validation->set_rules( 'password', 'Password', 'trim|required|min_length[4]|max_length[32]' );
		$this->form_validation->set_rules( 'password2', 'Password Confirmation', 'trim|required|matches[password]' );

		if( $this->form_validation->run() == FALSE )
		{
			$this->load->view( 'setup' );
		}
		else
		{
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));

			$this->user_model->create_user();
			$this->user_model->login( $username, $password );
			$this->gm->create_guild();
			$this->index();
		}
	}
}
