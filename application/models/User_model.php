<?php

class User_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function login( $username, $password )
	{
		$this->db->where( 'username', $username );
		$this->db->where( 'password', $password );

		$query = $this->db->get( 'users' );
		
		if( $query->num_rows() > 0 )
		{
			$user = $query->first_row();
			$avatar = '';
			$role = '';

			$this->db->where( 'uid', $user->uid );
			$this->db->where( 'gid', 1 );
			$query = $this->db->get( 'membership');

			if( $query->num_rows() > 0 )
			{
				$member = $query->first_row();
				$avatar = $member->avatar;
				$role = $member->role;
			}

			$newdata = array(
				'uid'  		=> $user->uid,
				'username'  => $user->username,
				'email'    	=> $user->email,
				'avatar'	=> $avatar,
				'role'		=> $role,
				'logged_in' => TRUE,
			);
			$this->session->set_userdata( $newdata );
			return true;
		}		
		return false;
	}

	function create_user() 
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
		$this->load->helper('file');

		$uid = $this->session->userdata('uid');
		$upload = $this->upload->data();
		$gid = 1;
        $membership_data = array(
            'motto'   => $this->input->post( 'motto' ),
            'location'   => $this->input->post( 'location' )
        );
        if( $upload )
        {
        	$this->load->library('image_lib');
        	$config['source_image'] = 'images/' . $upload['file_name'];
        	$config['maintain_ratio'] = TRUE;
		    $config['width']     = 200;
		    $config['height']   = 200;
		    $this->image_lib->initialize($config);
    		$this->image_lib->resize();
    		$this->image_lib->clear();

    		$this->db->where('uid', $uid);
    		$this->db->where('gid', 1 );
    		$this->db->from('membership');
    		$query = $this->db->get();
			if ($query->num_rows() > 0)
			{
			   $row = $query->row();
			   $avatar = $row->avatar;
			   unlink( 'images/' . $avatar );
			}

        	$membership_data['avatar'] = $upload['file_name'];
        }
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
		$query = $this->db->from('users')->where('uid', $uid)->get();

		if ($query->num_rows() > 0)
		{
		   $row = $query->row();
		   return $row->username;
		}
	}

	function get_uid ( $username ) 
	{
		$query = $this->db->from('users')->where('username', $username)->get();

		if ($query->num_rows() > 0)
		{
		   $row = $query->row();
		   return $row->uid;
		}
		return false;
	}

}