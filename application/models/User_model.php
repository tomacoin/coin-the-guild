<?php

class User_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function login( $username, $password )
	{
		$this->db->where("username", $username);
		$this->db->where("password", $password);

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
			$this->session->set_userdata( $newdata );
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

	function change_email ( $uid, $newemail ) 
	{
		$this->db->where('uid', $uid);
		$this->db->update('users', array( 'email' => $newemail ) ); 
	}

	function set_profile ( &$data ) 
	{

	}

	function get_profile ( $uid ) 
	{

	}

	function get_settings ( $uid )  
	{
        $this->db->where('users.uid', $uid);
        $this->db->from('users');
        $this->db->join('membership', 'membership.uid = users.uid');
        $query = $this->db->get()->result();
        return $query[0];
	}

	function set_settings () 
	{
		$uid = $this->session->userdata('uid');
		$gid = 1;
        $membership_data = array(
            'motto'   => $this->input->post( 'motto' ),
            'location'   => $this->input->post( 'location' )
        );
        $this->db->where( 'uid', $uid);
        $this->db->where( 'gid', $gid);
        $this->db->update( 'membership', $membership_data );

        $account_data = array(
            'email'   => $this->input->post( 'email' ),
        );
        if( $this->input->post( 'password' ) )
        {
        	$account_data['password'] = md5( $this->input->post( 'password' ) );
        }
        $this->db->where( 'uid', $uid);
        $this->db->update( 'users', $account_data );
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