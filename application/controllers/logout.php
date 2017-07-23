<?php

class Logout extends CI_Controller {
    function __construct() {
        parent::__construct();
        //$this->load->model('users_model', '', TRUE);
        $this->load->library('session');
        $this->load->helper('url');
    }
    function index()
    {
        $this->session->unset_userdata('logged_in', FALSE);
        $this->session->sess_destroy();
        redirect(base_url());
    }
}