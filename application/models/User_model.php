<?php

class User_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

	function create_user ( $username, $password, $email ) {
		
	}

	function change_password ( $uid, $oldpass, $newpass ) {

	}

	function change_email ( $uid, $newemail ) {

	}

	function edit_profile ( &$data ) {

	}

	function edit_settings ( &$data ) {

	}

	function get_profile ( $uid ) {

	}

	function get_settings ( $uid ) {

	}

	function get_username ( $uid ) {

	}

	function get_uid ( $username ) {

	}

}