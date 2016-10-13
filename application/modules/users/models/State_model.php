<?php
class State_model extends CI_Model {
 
public function __construct() {
  // Call the CI_Model constructor
  parent::__construct();
}
 
function get_states() {
 $this -> db -> select('id, state');
 $query = $this -> db -> get('states'); 
 $states = array(); 
 $states[0] = 'Please select state';
 if ($query->result()) {
            foreach ($query->result() as $state) {
                $states[$state->id] = $state->state;
            }
            return $states;
        } else {
            return FALSE;
        }
    }
}
?>