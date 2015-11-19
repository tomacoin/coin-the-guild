<?php

class Event_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function create_event ( $gid, $name, $desc, $location, $times, $occurence )
    {
        $data = array(
            'gid'           => $gid,
            'owner'         => $this->session->userdata('uid'),
            'name'          => $name,
            'description'   => $desc,
            'location'      => $location,
            'startdate'     => $times['startdate'],
            'starttime'     => $times['starttime'],
            'enddate'       => $times['enddate'],
            'endtime'       => $times['endtime'],
            'occurence'     => $occurence
        );
        $this->db->insert( 'events', $data );
    }

    function edit_event ( $eid, $name, $desc, $location, $times, $occurence )
    {
        $data = array(
            'description'   => $desc,
            'startdate'     => $times['startdate'],
            'starttime'     => $times['starttime'],
            'enddate'       => $times['enddate'],
            'endtime'       => $times['endtime'],
            'occurence'     => $occurence
        );
        $this->db->where('eid', $eid);
        $this->db->update( 'events', $data );
    }

    function delete_event ( $eid )
    {
        $this->db->where('eid', $eid);
        $this->db->delete( 'events' );
    }

    function get_events ( $gid, $limit = NULL )
    {
        $this->db->where('gid', $gid);
        $this->db->from('events');
        $this->db->order_by('occurence', 'asc'); 
        $this->db->order_by('startdate', 'asc'); 
        if( $limit )
        {
            $this->db->limit( $limit );
        }
        $query = $this->db->get()->result();
        return $query;
    }
}