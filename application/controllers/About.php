<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	public function index()
	{		
		$this->load->model('guild_model' );
		
		$settings = $this->guild_model->get_settings( 1 );
		$this->load->view( 'about', array (
				'name' => $settings->name,
				'description' => $settings->description,
				'about' => $settings->about,
				'rules' => json_decode( $settings->rules ),
				'join' => $settings->join,
			)
		);
	}
}
