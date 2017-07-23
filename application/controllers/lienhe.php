<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once (APPPATH . 'controllers/application.php');
class Lienhe extends Appilcation {
    protected $_data;
    public function __construct() {
        parent::__construct();
        $this->load->model('lienhe_model');
        $this->load->model('config_model');
        
        
    }
    public function index() {
       //$this->_data['dichvu'] = $this->dichvu_model->getList();
       $this->_data['categorypublic'] = $this->getCategory();
       $this->_data['title'] = "Liên hệ POSH LONDON";
       $this->_data['carts'] = $this->getCountOfCart();
       $this->_data['config'] = $this->config_model->getList();
       $this->load->view('frontend/partials/navbar', $this->_data);
       
       $this->load->view('pages/lienhe',  $this->_data);
       $this->load->view('frontend/partials/footer');
    }
    
}

