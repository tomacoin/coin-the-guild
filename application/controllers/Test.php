<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index ()
	{
		if(($this->session->userdata('user_name')!=""))
		{
			$this->welcome();
		}
		else{
			$data['title']= 'Home';
			$this->load->view('test',$data);
		}
	}
	
	public function login ()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));

		$result = $this->user_model->login($username,$password);
		if($result) {
			$this->index();
		} else  {
			echo "Incorrect Login";
			$this->index();
		}
	}

	public function register ()
	{
		$this->load->library( 'form_validation' );

		$this->form_validation->set_rules( 'username', 'Username', 'trim|required|min_length[4]' );
		$this->form_validation->set_rules( 'email', 'Email', 'trim|required|valid_email' );
		$this->form_validation->set_rules( 'password', 'Password', 'trim|required|min_length[4]|max_length[32]' );
		$this->form_validation->set_rules( 'password2', 'Password Confirmation', 'trim|required|matches[password]' );

		if($this->form_validation->run() == FALSE)
		{
			$this->index();
		}
		else
		{
			$this->user_model->create_user();
			$this->index();
		}
	}

	public function logout()
	{
		$newdata = array(
			'uid'   =>'',
			'username'  =>'',
			'email'     => '',
			'logged_in' => FALSE,
		);
		$this->session->unset_userdata($newdata );
		$this->session->sess_destroy();
		$this->index();
	}
}
