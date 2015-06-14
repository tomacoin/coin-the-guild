<?php

class Event_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function create_event ( $gid, $name, $desc, $times, $occurence )
    {
        $data = array(
            'gid'           => $gid,
            'owner'         => $this->session->userdata('uid'),
            'description'   => $desc,
            'startdate'     => $times['startdate'],
            'starttime'     => $times['starttime'],
            'enddate'       => $times['enddate'],
            'endtime'       => $times['endtime'],
            'occurence'     => $occurence
        );
        $this->db->insert( 'events', $data );
    }

    function edit_event ( $eid, $name, $desc, $times, $occurence )
    {
        $data = array(
            'description'   => $desc,
            'startdate'     => $times['startdate'],
            'starttime'     => $times['starttime'],
            'enddate'       => $times['enddate'],
            'endtime'       => $times['endtime'],
            'occurence'     => $occurence
        );
        $this->db->where('eid', $eid)
        $this->db->update( 'events', $data );
    }

    function delete_event ( $eid )
    {
        $this->db->where('eid', $eid)
        $this->db->delete( 'events' );
    }

    function get_events ( $gid )
    {
        return $query = $this->db->where('gid', $gid)->get('events');
    }

    function get_event ( $eid )
    {
    	return $query = $this->db->where('eid', $eid)->get('events');
    }
}