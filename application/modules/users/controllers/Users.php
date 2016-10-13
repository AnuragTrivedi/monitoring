<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
    var $template  = array();
    var $data      = array();
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('users_model');
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library("pagination");
    }
    
    public function layout() {
        // making temlate and send data to view.
        $this->template['header']   = $this->load->view('layout/header', $this->data, true);
        if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'admin') {  
            $this->template['left']   = $this->load->view('layout/admin_left', $this->data, true);
        }else{
            $this->template['left']   = $this->load->view('layout/left', $this->data, true);
        }        
        $this->template['middle'] = $this->load->view($this->middle, $this->data, true);
        $this->template['footer'] = $this->load->view('layout/footer', $this->data, true);
        $this->load->view('layout/index', $this->template);        
   }

    /**
     * login function.
     * 
     * @access public
     * @return void
     */
    public function login() {        
        // set validation rules
        $this->form_validation->set_rules('user_id', 'User login id', 'required|alpha_numeric');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == false) {
            $this->middle = 'login'; 
            $this->layout();            
        } else {
            // set variables from the form
            $this->data = array(
                'user_id' => $this->input->post('user_id'),
                'password' => $this->input->post('password'),
            );
            if ($this->users_model->login($this->data)) {
                $user = $this->users_model->read_user_information($this->data['user_id']);
                // set session user datas
                $_SESSION['id'] = $user[0]->id;
                $_SESSION['user_id'] = $user[0]->user_id;
                $_SESSION['first_name'] = $user[0]->first_name;
                $_SESSION['last_name'] = $user[0]->last_name;
                $_SESSION['logged_in'] = true;
                $_SESSION['status'] = $user[0]->status;
                $_SESSION['user_type'] = $user[0]->user_type;
                $_SESSION['email_id'] = $user[0]->email_id;
                // user login ok
                redirect('../users/dashboard');
                $this->layout(); 
            } else {
                // login failed
                $this->data['error_message'] = 'Wrong username or password.';
                // send error to the view                
                $this->middle = 'login'; 
                $this->layout(); 
            }
        }
    }

    public function registration() {
        if (!empty($_POST)) {
            $this->data = array(
                'user_type' => $this->input->post('user_type'),
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'user_id' => $this->input->post('user_id'),
                'mobile' => $this->input->post('mobile'),
                'email_id' => $this->input->post('email_id'),
                'password' => $this->input->post('password'),
                'passconf' => $this->input->post('passconf'),
                'otp' => $this->input->post('otp')
            );
            $this->form_validation->set_data($this->data);
            $this->form_validation->set_rules('user_type', 'User Type', 'required');
            $this->form_validation->set_rules('first_name', 'first_name', 'required');
            $this->form_validation->set_rules('last_name', 'last_name', 'required');
            $this->form_validation->set_rules(
                    'user_id', 'User Login Id', 'required|min_length[3]|max_length[20]|is_unique[users.user_id]', array(
                'required' => 'You have not provided %s.',
                'is_unique' => 'This %s already exists.'
                    )
            );
            $this->form_validation->set_rules('mobile', 'mobile', 'required');
            $this->form_validation->set_rules('email_id', 'Email', 'required|valid_email|is_unique[users.email_id]');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
            $this->form_validation->set_rules('otp', 'otp', 'required');
        }
        if ($this->form_validation->run() == FALSE) {
            $this->data['title'] = "BJP";
            $this->data['heading'] = "Registration form";            
            $this->middle = 'registration'; 
            $this->layout();
        } else {
            $result = $this->users_model->insert_entry($this->data); // call the employee model
            if ($result == true) {
                $this->data = $_POST = array();
                $this->data['error_message'] = 'You had been register successfully. Please login with your user_id & password';
                $this->middle = 'login'; 
                $this->layout();
            } else {
                echo "Not Inserted";
            }
        }
    }

    public function resetpwd() {        
        $this->middle = 'resetpwd'; 
        $this->layout();        
    }

    public function changepwd() {
        $this->checklogin();
        $this->middle = 'changepwd'; 
        $this->layout(); 
    }

    /**
     * logout function.
     * 
     * @access public
     * @return void
     */
    public function logout() {
        // create the data object        
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            // remove session datas
            foreach ($_SESSION as $key => $value) {
                unset($_SESSION[$key]);
            }
            // user logout ok
            redirect('../users/login');
            $this->layout();              
        } else {
            // there user was not logged in, we cannot logged him out,
            // redirect him to site root
            redirect('../users/home');
            $this->layout(); 
        }
    }

    public function dashboard() {   
        $this->checklogin();        
        $this->data['user_type']=$_SESSION['user_type'];       
        if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'admin') {            
            $this->middle ='admin_dashboard';
        } else {            
            $this->middle ='dashboard';
        }
        $this->layout(); 
    }

    public function home() {          
        if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'admin') {
            $this->middle ='admin_home';
        } else {           
            $this->middle ='home';
        }        
        $this->layout(); 
    }

    function get_constituencies($state) {
        $this->load->model('constituency_model');
        header('Content-Type: application/x-json; charset=utf-8');
        echo(json_encode($this->constituency_model->get_constituencies($state)));
    }
    
    function checklogin(){
        if (!$this->session->userdata('logged_in')) {
            $this->middle = 'login'; 
            $this->layout(); 
        } 
    }    
    
}
