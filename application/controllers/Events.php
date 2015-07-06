<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Event_model', 'em');
	}

	public function index()
	{
		$data = $this->em->get_events( 1 );
		$this->load->view('events', array ( 'events' => $data ) );
	}

	public function create()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$this->load->library( 'form_validation' );
			$this->form_validation->set_rules( 'name', 'Name', 'trim|required|min_length[10]' );
			$this->form_validation->set_rules( 'desc', 'Description', 'trim|required|min_length[10]' );
			$this->form_validation->set_rules( 'occurence', 'Occurence', 'trim|required' );
			$this->form_validation->set_rules( 'startdate', 'Start Date', 'trim|required' );
			$this->form_validation->set_rules( 'enddate', 'End Date', 'trim|required' );

			if($this->form_validation->run() == FALSE)
			{
				$this->load->view( 'events_new' );
				return;
			}
			else
			{
				$gid =  1;
				$name = $this->input->post( 'name' );
				$desc = $this->input->post( 'desc' );
				$occurence = $this->input->post( 'occurence' );
				$times = array(
					"startdate" => $this->input->post( 'startdate' ),
					"starttime" => $this->input->post( 'starttime' ),
					"enddate" => $this->input->post( 'enddate' ),
					"endtime" => $this->input->post( 'endtime' )
				);
				$this->em->create_event(  $gid, $name, $desc, $times, $occurence );
				redirect( '/events/' );
			}
		}

		$this->load->view( 'events_new' );
		
	}
}
