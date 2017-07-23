<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    class Customer extends CI_Controller {
        protected $_data;
        public function __construct() {
            parent::__construct();
            $this->load->helper('url');
            $this->load->model('customer_model');
            $this->load->library('session');
            $this->load->library('form_validation');
            $this->load->helper("slug");
            $this->load->library('ckeditor');
            $this->load->library('ckfinder');
            $this->ckeditor->basePath = base_url() . 'assets/ckeditor/';
            //Thiết lập các tool icon ckeditor
            $this->ckeditor->config['toolbar'] = array(
                array('Source', '-', 'Bold', 'Italic', 'Underline', '-',
                    'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-',
                    'Undo', 'Redo', '-', 'NumberedList', 'BulletedList',
                    'Find', 'Replace', '-', 'SelectAll', '-', 'SpellChecker', 'Scayt',
                    'Link', 'Unlink', 'Anchor',
                    'Image', 'Flash', 'Table', 'PageBreak',
                    'Styles', 'Format', 'Font', 'FontSize',
                    'TextColor', 'BGColor', 'Code'
                ),
            );
            // Thiết lập ngôn ngữ hiển thị en => english, vi => Việt Nam , fr => Pháp
            $this->ckeditor->config['language'] = 'en';

            $this->ckeditor->config['width'] = '730px';
            $this->ckeditor->config['height'] = '200px';
            //Thêm ckfinder vào
            $this->ckfinder->SetupCKEditor($this->ckeditor, '../../../assets/ckfinder/');
        }
        public function login() {
            $logged = $this->session->userdata('logged_in');
            if ($logged) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
        public function index() {
            if ($this->login()) {
                $user = $this->session->userdata ( 'logged_in' );
                $session_data = $this->session->userdata ( 'logged_in' );
                $this->_data ['username'] = $session_data ['username'];
                $this->_data ['subview'] = 'backend/customer/index_view';
                $this->_data ['titlePage'] = 'KHÁCH HÀNG ĐĂNG KÍ NHẬN THẺ';
                $this->_data ['info'] = $this->customer_model->getList();
                $this->_data ['total_new'] = $this->customer_model->countAll();
                $this->load->view('backend/layout/master', $this->_data);
            }
            else {
                $this->load->view ( 'login_form' );
            }
            
        }
        public function create() {
           
            
            
        }
        

    public function edit($id) {
        if ($this->login()) {
                $this->_data['titlePage'] = "Chỉnh sửa cửa hàng";
                $this->_data['subview'] = 'backend/customer/edit_view';
                $this->_data['info'] = $this->customer_model->getById($id);
                $arr = (object)$this->_data['info'];
                $this->form_validation->set_rules("status", "status", "required|xss_clean|trim");
                if ($this->form_validation->run() == TRUE) {
                    $data_update = array(
                       "status" => $this->input->post("status")
                    );
                    $this->customer_model->update($data_update,$id);
                    $this->session->set_flashdata("flash_mess", "Cập nhật thành công");
                    redirect(base_url() . "quantri/customer");
                }
                $this->load->view('backend/layout/master', $this->_data);
            }
            else {
                $this->load->view ( 'login_form' );
            }    
    }
       

}

?>

