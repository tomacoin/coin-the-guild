<?php

class Guild_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function create_guild ( &$data ) {

    	$data['owner'];
    	$data['name'];
    	$data['motto'];
    	$data['description'];
    	$data['game'];

    }

    function change_settings( &$data ) {

    }

    function get_guild ( $gid ) {

    }

    function get_settings ( $gid ) {

    }

    function get_members ( $gid ) {

    }

    function get_owner ( $gid ) {

    }

    function get_admins ( $gid ) {

    }

    function get_moderators ( $gid ) {

    }

    function is_member ( $uid, $gid ) {

    }

    function join ( $uid, $gid ) {

    }

    function leave ( $uid, $gid ) {

    }

    function moderator ( $uid, $gid ) {

    }

    function unmoderator ( $uid, $gid ) {

    }
}