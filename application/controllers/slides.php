<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once (APPPATH . 'controllers/application.php');
class Slides extends Appilcation {
    protected $_data;
    public function __construct() {
        parent::__construct();
        $this->load->model('slides_model');
       
        $this->load->helper("url");
        $this->load->helper("slug");
        
    }
    public function index() {
        $this->_data ['slides'] = $this->slides_model->getList();
        $this->load->view ( 'frontend/layout/master', $this->_data );
    }
}