<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    if (!defined('BASEPATH'))
        exit('No direct script access allowed');
    require_once (APPPATH . 'controllers/application.php');
    class Post extends Appilcation {
        public function __construct() {
            parent::__construct();
            $this->load->model('post_model');
            $this->load->model('categorypost_model');
        }
        public function index() {
            
        }
        public function category($id) {
            $arr = array();
            $_data['post'] = $this->categorypost_model->getByCategoryParentId($id);
            $_data['toppost'] = $this->post_model->getTop();
            $_data['parent'] = $this->categorypost_model->getListBySlugParent($id);
            $_data['listcategory'] = $this->categorypost_model->getList();
            $arr = $_data['post'];
            
            $this->_data['title'] = $arr[0]->title."| PoshLondon";
            $this->_data['meta_keyword'] = $arr[0]->meta_keyword;
            $this->_data['meta_description'] = $arr[0]->meta_description; 
            $this->_data['categorypublic'] = $this->getCategory();
            $this->_data['carts'] = $this->getCountOfCart();
            $this->load->view('frontend/partials/navbar', $this->_data);
            //$this->load->view('frontend/layout/master', $this->_data);
            $this->load->view('pages/postcategory', $_data);

            $this->load->view('frontend/partials/footer');
        }
        public function sub($id) {
            $arr = array();
            $_data['post'] = $this->post_model->get_gioithieuById($id);
            $_data['listcategory'] = $this->categorypost_model->getList();
            $arr = $_data['post'];
            /*echo "<pre>";
            print_r($arr);
            echo "</pre>";
            die();*/
            
            $_data['titlechuyenmuc'] = $arr[0]->titlecategory;
            $_data['namechuyenmuc'] = $arr[0]->namecategory;
            $this->_data['title'] = $arr[0]->titlecategory."| PoshLondon";
            $this->_data['meta_keyword'] = $arr[0]->meta_keyword;
            $this->_data['meta_description'] = $arr[0]->meta_description; 
            $this->_data['categorypublic'] = $this->getCategory();
            $this->_data['carts'] = $this->getCountOfCart();
            $this->load->view('frontend/partials/navbar', $this->_data);
            //$this->load->view('frontend/layout/master', $this->_data);
            $this->load->view('pages/subpostcategory', $_data);

            $this->load->view('frontend/partials/footer');
        }

        public function detail($id) {
            $arr = array();
            $_data['post'] = $this->post_model->get_gioithieuByslug($id);

            $arr = $_data['post'];

            $this->_data['title'] = $arr['title']."| PoshLondon";
            
            $this->_data['meta_keyword'] = $arr['meta_keyword']; 
            $this->_data['meta_description'] = $arr['meta_description']; 
            $this->_data['categorypublic'] = $this->getCategory();
            $this->_data['carts'] = $this->getCountOfCart();

            if(count($_data['post']) > 0 ) {
                $this->load->view('frontend/partials/navbar', $this->_data);

                //Khong hien thi logo
                if($_data['post']['has_logo'] == 0) {
                    //Load view khong co logo
                     $this->load->view('pages/post_nologo', $_data);
                }
                else if($_data['post']['has_logo'] == 1) {
                     $this->load->view('pages/post', $_data);
                }
               

                $this->load->view('frontend/partials/footer');
            }
            else {
                show_404();
            }
            
        }   
    }
?>
