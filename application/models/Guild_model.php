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

    function get_members ( $gid ) 
    {

    }

    function get_owner ( $gid ) 
    {

    }

    function get_admins ( $gid ) 
    {

    }

    function get_moderators ( $gid ) 
    {

    }

    function is_member ( $uid, $gid ) 
    {

    }

    function join ( $uid, $gid ) 
    {
        $data = array(
            'gid' => $gid,
            'uid' => $uid
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