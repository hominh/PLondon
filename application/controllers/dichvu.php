<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once (APPPATH . 'controllers/application.php');
class Dichvu extends Appilcation {
    protected $_data;
    public function __construct() {
        parent::__construct();
        $this->load->model('dichvu_model');
      
        
        
    }
    public function index() {
       $this->_data['dichvu'] = $this->dichvu_model->getList();
       $this->_data['categorypublic'] = $this->getCategory();
       $this->_data['title'] = "Dịch vụ POSH LONDON";
       $this->_data['carts'] = $this->getCountOfCart();
       $this->load->view('frontend/partials/navbar', $this->_data);
       
       $this->load->view('pages/dichvu',  $this->_data);
       $this->load->view('frontend/partials/footer');
    }
    public function detail($id) {

        //$data['title'] = ucfirst($page);
        $arr = array();
        $this->_data['dichvu'] = $this->dichvu_model->getList();
        $_data['dichvuct'] = $this->dichvu_model->get_gioithieuById($id);
        $arr = $_data['dichvuct'];
        $arr = (object) $arr;
        $this->_data['meta_keyword'] = $arr->meta_keyword;
        $this->_data['meta_description'] = $arr->meta_description;
        $page = $arr->name;
        $this->_data['title'] = $page; // Capitalize the first letter
        /* $this->load->view('templates/header', $data);
          $this->load->view('pages/gioithieu', $data);
          $this->load->view('templates/footer'); */
        $this->_data['categorypublic'] = $this->getCategory();
       
        $this->load->view('frontend/partials/navbar', $this->_data);
        //$this->load->view('frontend/layout/master', $this->_data);
        $this->load->view('pages/dichvu', $_data);

        $this->load->view('frontend/partials/footer');
    }
}

