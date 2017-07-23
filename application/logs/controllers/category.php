<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once (APPPATH . 'controllers/application.php');
class Category extends Appilcation {
    protected $_data;
    public function __construct() {
        parent::__construct();
        $this->load->model('categoryfooter_model');
        $this->load->model('config_model');
        $this->load->model('article_model');
        
        
    }
    public function index() {
      
       $this->_data['config'] = $this->config_model->getList();
       $this->_data['categorypublic'] = $this->getCategory();
       $this->_data['title'] = "Danh sách bài viết";
       $this->_data['carts'] = $this->getCountOfCart();
       $_data['article'] = $this->article_model->getListAll();
       $_data['config'] = $this->config_model->getList();
            $arrcf = $_data['config'];
            $meta_description = $arrcf[0]->description;
            $meta_keyword = $arrcf[0]->keyword;
            $meta_description = $arrcf[0]->description;
            $meta_keyword = $arrcf[0]->keyword;
      $this->_data['meta_keyword'] = $meta_keyword;
            $this->_data['meta_description'] = $meta_description;
       $this->load->view('frontend/partials/navbar', $this->_data);
       $this->load->view('pages/articlelist', $_data);
       $this->load->view('frontend/partials/footer');
    }
    public function detail($id) {

        //$data['title'] = ucfirst($page);
        $arr = array();
        $_data['article'] = $this->article_model->getByCategoryId($id);
        $arr = $_data['article'];
        //$arr = (object) $arr;

        $page = $arr[0]->namecategory;
        if(isset($page)) {
        	$this->_data['title'] = ucfirst($page); // Capitalize the first letter
	        $this->_data['meta_keyword'] = $arr[0]->meta_keyword;
	        $this->_data['meta_description'] = $arr[0]->meta_description;
        }
        else {
        	$this->_data['title'] = ucfirst("PoshLondon");
        	$this->_data['meta_keyword'] = "Posh London, sản phẩm chăm sóc sức khỏe hàng đầu";
	        $this->_data['meta_description'] = "Posh London, sản phẩm chăm sóc sức khỏe hàng đầu";
        }
        
        
        /* $this->load->view('templates/header', $data);
          $this->load->view('pages/gioithieu', $data);
          $this->load->view('templates/footer'); */
        $this->_data['categorypublic'] = $this->getCategory();
       
        $this->load->view('frontend/partials/navbar', $this->_data);
        //$this->load->view('frontend/layout/master', $this->_data);
        $this->load->view('pages/categories', $_data);

        $this->load->view('frontend/partials/footer');
    }
}

