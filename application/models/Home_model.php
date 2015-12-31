<?php

class Home_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function is_first_time()
    {
    	$this->db->select( 'gid' );
    	$this->db->from('guilds');

    	$result = $this->db->get();
    	if( $result->num_rows() > 0 )
    	{
    		return false;
    	}
		return true;
    }

	function get_blogs( $gid )
	{
		$this->db->select('
			tid,
			title, 
			content, 
			posted, 
			edited, 
			avatar,
			motto,
			location,
			username
		');

		$this->db->from('threads');
		$this->db->join('users', 'users.uid = threads.poster');
		$this->db->join('membership', 'users.uid = membership.uid AND membership.gid = 1');
		$this->db->where( 'blog', 'Y' );
		$this->db->limit( 2 );

		$result = $this->db->get()->result();
		return $result;
	}

	function get_posts( $gid )
	{
		$this->db->from( 'threads' );
		$this->db->order_by( 'posted', 'desc' );
		$this->db->limit( 3 );

		$result = $this->db->get()->result();
		return $result;
	}

}