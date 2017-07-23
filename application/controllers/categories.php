<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once (APPPATH . 'controllers/application.php');

class Categories extends Appilcation {
    protected $_data;
    public function __construct() {
        parent::__construct();
        $this->load->model('categories_model');
        $this->load->model('config_model');
        $this->load->helper("money");
        $this->load->helper('text');
        
    }
    
    public function detail ($slug) {
        $this->load->model('slides_model');
        $id = 0;

        
        $arr = array();
        $items = $this->categories_model->getProductByCategory($slug);
        $dataItem = (array) $items;

        

        for($i = 0; $i < count($dataItem);$i++) {
            $dataItem[$i]->name = word_limiter($dataItem[$i]->name,4);
            $this->_data['title'] = $dataItem[$i]->namecategory."| Posh london";
            $this->_data['namecategory'] = $dataItem[$i]->namecategory;
        }
        $object = (object) $dataItem;
        /* echo "<pre>";
print_r($object);
        echo "<pre>";
die();*/


        if(count($object) > 0) {
            $_data['products'] = $object;
        }
        else{
            $_data['products'] = "";
        }
        
        $arr = $_data['products'];
        $arr = (object) $arr;
       
       
        $_data['config'] = $this->config_model->getList();
        $arrcf = $_data['config'];
        $meta_description = $items[0]->kwcate ;
        $meta_keyword = $items[0]->descate;

        $this->load->model('gioithieus_model');
        $this->_data['categorypublic'] = $this->getCategory();
        $this->_data['meta_keyword'] = $meta_keyword;
        $this->_data['meta_description'] = $meta_description;
        $this->_data['carts'] = $this->getCountOfCart();
        $this->_data['slides'] = $this->slides_model->getList();
        $this->load->view('frontend/partials/navbar', $this->_data);
        $this->load->view('frontend/layout/master', $this->_data);
        $this->load->view('pages/category', $_data);

        $this->load->view('frontend/partials/footer',$this->_data);
    }

}

?>