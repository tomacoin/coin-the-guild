<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model' );
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
		$member_log = $this->guild_model->get_recent_members( 1 );
		$this->load->view('admin/home', array (
				'members' => $members
			)
		);
	}
}
