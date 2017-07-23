<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once (APPPATH . 'controllers/application.php');
class Gioithieu extends Appilcation {
    protected $_data;
    public function __construct() {
        parent::__construct();
        $this->load->model('gioithieus_model');
        $this->load->model('categories_model');
        $this->load->helper("url");
        $this->load->helper("slug");
        $this->load->helper('form');
    }

    public function detail($id) {
        $this->_data['dichvu'] = $this->dichvu_model->getList();
        //$data['title'] = ucfirst($page);
        $arr = array();
        $_data['gioithieus'] = $this->gioithieus_model->get_gioithieuById($id);
        $arr = $_data['gioithieus'];
        $arr = (object) $arr;

        $page = $arr->name;
        $this->_data['title'] = ucfirst($page); // Capitalize the first letter
        $this->_data['meta_keyword'] = $arr->meta_keyword;
        $this->_data['meta_description'] = $arr->meta_description;
        /* $this->load->view('templates/header', $data);
          $this->load->view('pages/gioithieu', $data);
          $this->load->view('templates/footer'); */
        $this->_data['categorypublic'] = $this->getCategory();
        $this->_data['carts'] = $this->getCountOfCart();
        $this->load->view('frontend/partials/navbar', $this->_data);
        //$this->load->view('frontend/layout/master', $this->_data);
        $this->load->view('pages/gioithieu', $_data);

        $this->load->view('frontend/partials/footer');
    }


    

}
