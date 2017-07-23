<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once (APPPATH . 'controllers/application.php');
class Email extends Appilcation {
    protected $_data;
    public function __construct() {
        parent::__construct();
        $this->load->model('email_model');
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
        
        
    }
    public function index() {
       echo "1";
    }
    public function send() {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        if($this->input->post('email') == "" || $this->input->post('email') == " " || $this->input->post('email') == NULL ) {
            echo "sai 1";  
        }
        else {
            if ($this->form_validation->run() == FALSE) {
                 echo "sai 2";
            }
            else {
                $data = array(
                    "email" => $this->input->post("email")
                );
                $this->email_model->insert($data);
                echo "<script>alert('Đăng kí thành công!'); location.href='http://localhost/plondon';</script>";
            }
        }
    }
}