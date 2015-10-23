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
		return $result = $this->db->where('gid', $gid)->get('forums');
	}

	function get_threads ( $fid, $page )
	{
		$this->db->select(' 
			threads.tid,
			threads.title as \'thread_title\',
			threads.posted as \'thread_time\',
			threaduser.username as \'thread_poster\',
			replyuser.username as \'reply_poster\',
			(
			SELECT COUNT(tid) FROM replies WHERE replies.tid = threads.tid GROUP BY tid
			) as reply_count,
			(
			SELECT posted FROM replies WHERE replies.tid = threads.tid ORDER BY replies.posted DESC LIMIT 1
			) as reply_time
			FROM threads
			LEFT JOIN users AS threaduser ON threaduser.uid = threads.poster
			LEFT JOIN users AS replyuser ON replyuser.uid = 
				(
				SELECT poster FROM replies WHERE replies.tid = threads.tid ORDER BY replies.posted DESC LIMIT 1
				)
			WHERE fid = 1'
		);
		$this->db->limit( 10 );
		if( $page )
		{
			$this->db->offset( $page * 10 );
		}

		$result = $this->db->get()->result();
		return $result;
	}

	function get_thread ( $tid )
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
		$this->db->where( "tid = {$tid}" );

		$result = $this->db->get()->result();
		return $result[0];
	}

	function get_replies ( $tid, $page )
	{		
		$this->db->select('
			content,
			posted,
			edited,
			avatar,
			motto,
			location,
			username
		');

		$this->db->from('replies');
		$this->db->join('users', 'users.uid = replies.poster');
		$this->db->join('membership', 'users.uid = membership.uid AND membership.gid = 1');
		$this->db->where( "tid = {$tid}" );
		if( $page > 1 )
		{
			$this->db->limit( 10 );
		}
		else
		{
			$this->db->limit( 9 );
		}
		if( $page )
		{
			$this->db->offset( ( $page - 1 ) * 10 );
		}
		$result = $this->db->get()->result();
		return $result;
	}

	function get_reply_count ( $tid )
	{
		$this->db->select('COUNT(*) as count');
		$this->db->from( 'replies');
		$this->db->where( "tid = {$tid}" );
		$result = $this->db->get()->result();

		return $result[0]->count;
	}
}