<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index()
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
	
	public function login()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));

		$result = $this->user_model->login($username,$password);
		if($result) {
			redirect('/');
		} else  {
			$this->load->view( 'login', array( 'error' => 'Invalid username or password' ) );
		}
	}

	public function register()
	{
		$this->load->library( 'form_validation' );

		$this->form_validation->set_rules( 'username', 'Username', 'trim|required|min_length[4]' );
		$this->form_validation->set_rules( 'email', 'Email', 'trim|required|valid_email' );
		$this->form_validation->set_rules( 'password', 'Password', 'trim|required|min_length[4]|max_length[32]' );
		$this->form_validation->set_rules( 'password2', 'Password Confirmation', 'trim|required|matches[password]' );

		if( $this->form_validation->run() == FALSE )
		{
			$this->load->view( 'register' );
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
		$this->session->unset_userdata( $newdata );
		$this->session->sess_destroy();
		redirect('/');
	}

	public function settings()
	{
		$this->load->library( 'form_validation' );

		$this->form_validation->set_rules( 'motto', 'Motto', 'trim' );
		$this->form_validation->set_rules( 'location', 'Location', 'trim' );
		$this->form_validation->set_rules( 'email', 'Email', 'trim|required|valid_email' );

		$config['upload_path'] 		= './uploads/';
		$config['allowed_types'] 	= 'gif|jpg|png';
		$config['max_size']			= '2048';
		$config['max_width']  		= '250';
		$config['max_height']  		= '250';

		$this->load->library('upload', $config);

		if( $this->form_validation->run() == FALSE ||  !$this->upload->do_upload() )
		{
			$this->load->view( 'user' );
		}
		else
		{
			$data = array( 'avatar_data' => $this->upload->data() );
			$this->user_model->set_settings();
			$this->index();
		}
	}
}
