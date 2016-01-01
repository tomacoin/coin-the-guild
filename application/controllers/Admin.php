<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model' );
		$this->load->model('user_model' );
		$this->load->model('guild_model' );
		$this->load->model('forum_model' );
	}

	public function index()
	{
		$member_log = $this->guild_model->get_recent_members( 1 );
		$post_log = $this->forum_model->get_recent_posts( 1 );
		$this->load->view('admin/home', array (
				'member_log' => $member_log, 
				'post_log' => $post_log, 
			)
		);
	}

	public function users()
	{
		$members = $this->guild_model->get_members( 1 );
		$this->load->view('admin/users', array (
				'members' => $members
			)
		);
	}

	public function kick( $username )
	{
		$uid = $this->user_model->get_uid( $username );
		$members = $this->guild_model->leave( 1, $uid );
		$this->session->set_flashdata('kicked', $username );
		redirect('admin/users');

	}

	public function layout()
	{
		$config['upload_path'] 		= './images/';
		$config['allowed_types'] 	= 'gif|jpg|png';
		$config['max_size']			= '4048';
		$config['max_width']  		= '1200';
		$config['max_height']  		= '500';
		$config['encrypt_name']		= false;
        $config['file_name']	 	= "1-banner.png";

		$this->load->library('upload', $config);
		if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$this->guild_model->set_banner();
			if(  $_FILES && $_FILES['banner']['name'] && !$this->upload->do_upload( 'banner' ) )
			{
				$this->session->set_flashdata('alert', 'Upload failed.' );
			}
			else
			{				
				$this->session->set_flashdata('success', 'Upload successful.' );
			}
		}

		$banner = $this->guild_model->get_banner( 1 );
		$this->load->view( 'admin/layout', array(
			'banner'	=> $banner
		));
	}

	public function settings()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$this->guild_model->set_settings( 1 );
		}
		$settings = $this->guild_model->get_settings( 1 );
		$this->load->view('admin/settings', array (
				'name' => $settings->name,
				'description' => $settings->description,
				'about' => strip_tags( $settings->about ),
				'rules' => json_decode( strip_tags( $settings->rules ) ),
				'join' => $settings->join,
			)
		);
	}

	public function post()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$title = $this->input->post( 'title' );
			$content = $this->input->post( 'content' );
			$this->forum_model->create_thread ( 1, $title, $content, 'Y' );
			$this->session->set_flashdata('success', 'Blog post published.' );
		}
		$this->load->view('admin/post');
	}
}
