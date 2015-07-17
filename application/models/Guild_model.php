<?php

class Guild_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function create_guild ( ) 
    {

        $data = array(
            'name' => $this->input->post( 'name' ),
            'owner' => $this->session->userdata('uid'),
            'description' => $this->input->post( 'description' ),
            'game' => $this->input->post( 'game' ),
        );
        $this->db->insert( 'users', $data );

    }

    function change_settings( &$data ) 
    {

    }

    function get_name ( $gid ) 
    {
        $this->db->
            select('name')->
            from('guilds')->
            where('gid', $gid);

        return $this->db->get()->row()->name;
    }

    function get_guild ( $gid ) 
    {
        $query = $this->db->where('gid', $gid)->get();

        if ($query->num_rows() > 0)
        {
           $row = $query->row();
           return $row;
        }
    }

    function get_settings ( $gid ) 
    {

    }

    function get_members ( $gid, $no_mods = false ) 
    {
        $this->db->where('gid', $gid);
        $this->db->from('membership');
        $query = $this->db->get()->result();
        return $query;
    }

    function get_owner ( $gid ) 
    {
        $this->db->
            select('owner')->
            from('guilds')->
            where('gid', $gid);

        return $this->db->get()->row()->owner;
    }

    function get_moderators ( $gid ) 
    {
        $this->db->where('gid', $gid);        
        $this->db->where('role', 2);
        $this->db->from('membership');
        $query = $this->db->get()->result();
        return $query;
    }

    function is_member ( $gid, $uid ) 
    {
        $this->db->
            from('membership')->
            where('gid', $gid)->
            where('uid', $uid);

        return $this->db->get()->num_rows();
    }

    function join ( $gid, $uid ) 
    {
        $data = array(
            'gid' => $gid,
            'uid' => $uid,
            'role' => 0
        );
        $this->db->insert( 'membership', $data );
    }

    function leave ( $uid, $gid ) 
    {
        $data = array(
            'gid' => $gid,
            'uid' => $uid
        );
        $this->db->delete( 'membership', $data );
    }

    function moderator ( $uid, $gid ) {

    }

    function unmoderator ( $uid, $gid ) {

    }
}