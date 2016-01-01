<?php

class Guild_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function create_guild() 
    {
        $this->load->model('user_model');
        $this->load->model('guild_model');
        $owner = $this->user_model->get_uid( $this->input->post( 'username' ) );
        $data = array(
            'gid' => 1,
            'name' => $this->input->post( 'guild_name' ),
            'owner' => $owner,
            'description' => $this->input->post( 'guild_desc' )
        );
        $this->db->insert( 'guilds', $data );
        $data = array(
            'fid' => 1,
            'gid' => 1,
            'name' => $this->input->post( 'guild_name' ),
            'description' => $this->input->post( 'guild_desc' )
        );
        $this->db->insert( 'forums', $data );
        $this->guild_model->join( 1, $owner, 3 );
        return;
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

    function get_banner ( $gid )
    {
        $banner = glob( "images/{$gid}-banner.*" );
        if( !empty( glob( "images/{$gid}-banner.*" ) ) )
        {
            return $banner[0];
        }
        return 'images/default-banner.png';
    }

    function set_banner ()
    {
        $this->load->helper('file');        
        $this->load->model('guild_model');

        if( $_FILES && $_FILES['banner']['name'] )
        {
            $current = $this->guild_model->get_banner( 1 );
            if( $current != "images/default-banner.png" )
            {
                unlink( $current );
            }
        }

        $upload = $this->upload->data();
        if( $upload )
        {
            $this->load->library('image_lib');
            $config['source_image'] = 'images/' . $upload['file_name'];
            $config['maintain_ratio'] = TRUE;
            $config['width']     = 1200;
            $config['height']   = 500;

            $this->image_lib->initialize($config);
            $this->image_lib->resize();
            $this->image_lib->clear();

            //unlink( 'images/' . $avatar );
        }
    }

    function get_members ( $gid ) 
    {
        $this->db->select('users.uid, users.username, users.last_on, membership.avatar, membership.joined, membership.role, membership.posts');
        $this->db->where('gid', $gid);
        $this->db->from('membership');
        $this->db->join('users', 'users.uid = membership.uid');
        $this->db->order_by('role', 'asc');
        $query = $this->db->get()->result();
        return $query;
    }

    function get_recent_members ( $gid )
    {
        $this->db->select('users.uid, users.username, users.last_on, membership.avatar, membership.joined, membership.role');
        $this->db->where('gid', $gid);
        $this->db->from('membership');
        $this->db->join('users', 'users.uid = membership.uid');
        $this->db->order_by('joined', 'desc');
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

    function join( $gid, $uid, $role = 0 ) 
    {
        $data = array(
            'gid' => $gid,
            'uid' => $uid,
            'role' => $role
        );
        $this->db->insert( 'membership', $data );

        $newdata = array(
            'avatar'    => 'default.jpg',
            'role'      => $role
        );
        $this->session->set_userdata( $newdata );
    }

    function leave ( $gid, $uid ) 
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