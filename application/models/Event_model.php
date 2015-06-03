<?php

class Event_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function create_event ( $gid, $name, $desc, $times, $occurence ) {

    	$times['startdate'];
    	$times['starttime'];
    	$times['enddate'];
    	$times['endtime'];

    }

    function edit_event ( $eid, $name, $desc, $times, $occurence ) {

    	$times['startdate'];
    	$times['starttime'];
    	$times['enddate'];
    	$times['endtime'];

    }

    function delete_event ( $eid ) {

    }

    function get_events ( $gid ) {

    }

    function get_event ( $eid ) {
    	
    }
}