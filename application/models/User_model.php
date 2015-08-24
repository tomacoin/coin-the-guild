<?php

class User_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function login( $username, $password )
	{
		$this->db->where("username",$username);
		$this->db->where("password",$password);

		$query=$this->db->get("users");
		
		if($query->num_rows()>0)
		{
			foreach($query->result() as $rows)
			{
				//add all data to session
				$newdata = array(
					'uid'  => $rows->uid,
					'username'  => $rows->username,
					'email'    => $rows->email,
					'logged_in'  => TRUE,
				);
			}
			$this->session->set_userdata($newdata);
			return true;
		}		
		return false;
	}

	function create_user () 
	{
		$data = array(
			'username' => $this->input->post( 'username' ),
			'email' => $this->input->post( 'email' ),
			'password' => md5( $this->input->post( 'password' ) )
		);
		$this->db->insert( 'users', $data );
	}

	function change_password ( $uid, $oldpass, $newpass ) 
	{
		$this->db->where('uid', $uid);
		$this->db->where('password', md5( $oldpass ) ); 

		$query = $this->db->get();

		// Check oldpass correct
		if ($query->num_rows() > 0)
		{
			$this->db->where('uid', $uid);
			$this->db->update('users', array( 'password' => md5( $newpass ) ) ); 
			return true;
		}
		else
		{
			return false;
		}

	}

	function change_email ( $uid, $newemail ) 
	{
		$this->db->where('uid', $uid);
		$this->db->update('users', array( 'email' => $newemail ) ); 
	}

	function set_profile ( &$data ) 
	{

	}

	function set_settings ( &$data ) 
	{

	}

	function get_profile ( $uid ) 
	{

	}

	function get_settings ( $uid ) 
	{

	}

	function get_username ( $uid ) 
	{
		$query = $this->db->where('uid', $uid)->get();

		if ($query->num_rows() > 0)
		{
		   $row = $query->row();
		   return $row->username;
		}
	}

	function get_uid ( $username ) 
	{
		$query = $this->db->where('username', $username)->get();

		if ($query->num_rows() > 0)
		{
		   $row = $query->row();
		   return $row->uid;
		}
	}

}