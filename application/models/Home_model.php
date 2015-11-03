<?php

class Home_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
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

}