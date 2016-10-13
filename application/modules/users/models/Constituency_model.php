<?php

class Constituency_model extends CI_Model {

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
    }

    function get_constituencies($state = null) {
        $this->db->select('id,constituency');
        if ($state != NULL) {
            $this->db->where('state_id', $state);
        }
        $query = $this->db->get('constituencies');
        $constituencies = array();
        $constituencies[0] = 'Please select constituency';
        if ($query->result()) {
            foreach ($query->result() as $constituency) {
                $constituencies[$constituency->id] = $constituency->constituency;
            }
            return $constituencies;
        } else {
            return FALSE;
        }
    }    
}
?>