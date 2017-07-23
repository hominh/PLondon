<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once (APPPATH . 'controllers/application.php');
class Article extends Appilcation {
    protected $_data;
    public function __construct() {
        parent::__construct();
        $this->load->model('categoryfooter_model');
        $this->load->model('config_model');
        $this->load->model('article_model');
        
        
    }
    public function index() {
       $this->_data['cuahang'] = $this->cuahang_model->getList();
       $this->_data['config'] = $this->config_model->getList();
       $this->_data['categorypublic'] = $this->getCategory();
       $this->_data['title'] = "Danh sách các cửa hàng của PoshLondon trên toàn quốc";
       $this->_data['carts'] = $this->getCountOfCart();
       $this->load->view('frontend/partials/navbar', $this->_data);
       $this->load->view('pages/cuahang',  $this->_data);
       $this->load->view('frontend/partials/footer');
    }
    public function detail($id) {

        //$data['title'] = ucfirst($page);
        $arr = array();
        $_data['article'] = $this->article_model->get_gioithieuById($id);
        $arr = $_data['article'];
        //$arr = (object) $arr;
        $this->_data['meta_keyword'] = $arr['meta_keyword'];
        $this->_data['meta_description'] = $arr['meta_description'];
        $page = $arr['title'];
        $this->_data['title'] = ucfirst($page); // Capitalize the first letter
        /* $this->load->view('templates/header', $data);
          $this->load->view('pages/gioithieu', $data);
          $this->load->view('templates/footer'); */
        $this->_data['categorypublic'] = $this->getCategory();
       
        $this->load->view('frontend/partials/navbar', $this->_data);
        //$this->load->view('frontend/layout/master', $this->_data);
        $this->load->view('pages/article', $_data);

        $this->load->view('frontend/partials/footer');
    }
}

