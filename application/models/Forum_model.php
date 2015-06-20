<?php

class Forum_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

	function create_forum ( $gid, $name, $desc )
	{
		$data = array(
			'gid' => $gid,
			'name' => $name,
			'desciption' => $desc
		);
		$this->db->insert( 'forums', $data );
	}

	function edit_forum ( $fid, $name, $desc )
	{
		$data = array(
			'name' => $name,
			'desciption' => $desc
		);
		$this->db->where('fid', $fid);
		$this->db->update( 'forums', $data );
	}

	function delete_forum ( $fid )
	{
		$this->db->where('fid', $fid);
		$this->db->delete( 'forums' );
	}

	function create_thread ( $fid, $title, $content )
	{
		$data = array(
			'fid' 		=> $fid,
			'title' 	=> $title,
			'poster' 	=> $this->session->userdata('uid'),
			'posted' 	=> date('Y-m-d H:i:s'),
			'content' 	=> $content
		);
		$this->db->insert( 'threads', $data );
	}

	function edit_thread ( $tid, $title, $content )
	{
		$data = array(
			'title' 	=> $title,
			'content' 	=> $content,
			'edited' 	=> date('Y-m-d H:i:s')
		);
		$this->db->where('tid', $tid);
		$this->db->update( 'threads', $data );
	}

	function delete_thread ( $tid )
	{
		$this->db->where('tid', $tid);
		$this->db->delete( 'threads' );
	}

	function create_reply ( $tid, $content )
	{
		$data = array(
			'tid' => $tid,
			'content' => $content,
			'poster' 	=> $this->session->userdata('uid'),
			'posted' 	=> date('Y-m-d H:i:s')
		);
		$this->db->insert( 'replies', $data );
	}

	function edit_reply ( $rid, $content )
	{
		$data = array(
			'content' => $content
		);
		$this->db->where('rid', $rid);
		$this->db->update( 'threads', $data );
	}

	function delete_reply ( $rid )
	{
		$this->db->where('rid', $rid);
		$this->db->delete( 'threads' );
	}

	function get_forums ( $gid )
	{
		return $query = $this->db->where('gid', $gid)->get('forums');
	}

	function get_threads ( $fid )
	{
		$this->db->select(' 
			threads.tid,
			threads.title,
			threads.posted,
			threaduser.username as \'poster\',
			replyuser.username as \'replier\',
			(
			SELECT COUNT(tid) FROM replies WHERE replies.tid = threads.tid GROUP BY tid
			) as postcount,
			(
			SELECT posted FROM replies WHERE replies.tid = threads.tid ORDER BY replies.posted DESC LIMIT 1
			) as lastreplytime
			FROM threads
			LEFT JOIN users AS threaduser ON threaduser.uid = threads.poster
			LEFT JOIN users AS replyuser ON replyuser.uid = 
				(
				SELECT poster FROM replies WHERE replies.tid = threads.tid ORDER BY replies.posted DESC LIMIT 1
				)
			WHERE fid = 1'
		);

		$query = $this->db->get()->result();
		return $query;
	}

	function get_replies ( $tid )
	{
		return $query = $this->db->where('tid', $tid)->get('replies');
	}
}