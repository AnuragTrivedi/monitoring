<?php

class Users_model  extends CI_Model {

    public $id;
    public $user_type;
    public $first_name;
    public $last_name;
    public $user_id;
    public $password;
    public $mobile;
    public $email_id;
    public $creted_by;
    public $created_at;
    public $modified_at;
    public $modified_by;
    public $status;

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function insert_entry() {
        $this->user_type = $this->input->post('user_type');
        $this->first_name = $this->input->post('first_name');
        $this->last_name = $this->input->post('last_name');
        $this->user_id = $this->input->post('user_id');
        $this->password = md5($this->input->post('password'));
        $this->mobile = $this->input->post('mobile');
        $this->email_id = $this->input->post('email_id');
        $this->creted_by = '0';
        $this->modified_by = '0';
        $this->status='0';
        $this->db->insert('users', $this);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function login($data) {
        $condition = "user_id =" . "'" . $data['user_id'] . "' AND " . "password =" . "'" . md5($data['password']) . "'";
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }
    // Read data from database to show data in admin page
    public function read_user_information($user_id) {
        $condition = "user_id =" . "'" . $user_id . "'";
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
}
?>