<?php
ob_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    class Categoryfooter extends CI_Controller {
        protected $_data;
        public function __construct() {
            parent::__construct();
            $this->load->helper('url');
            $this->load->model('categoryfooter_model');
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
                $this->_data ['subview'] = 'backend/categoryfooter/index_view';
                $this->_data ['titlePage'] = 'List Soft';
                $this->_data ['info'] = $this->categoryfooter_model->getList();
                $this->_data ['total_new'] = $this->categoryfooter_model->countAll();
                $this->load->view('backend/layout/master', $this->_data);
            }
            else {
                $this->load->view ( 'login_form' );
            }   
            
        }
        public function create() {
            
            
            if ($this->login()) { 
                $this->_data['titlePage'] = 'Thêm mới bài viết giới thiệu';
                $this->_data['subview'] = 'backend/categoryfooter/create_view';
                $this->form_validation->set_rules("name", "name", "required|xss_clean|trim|min_length[4]|callback_check_name");
                

                if ($this->form_validation->run() == TRUE) {
                    $data_insert = array(
                        "name" => $this->input->post("name"),
                        "slug" => create_slug($this->input->post("name")),
                        
                        
                        
                        "meta_keyword" => $this->input->post("meta_keyword"),
                        "meta_description" => $this->input->post("meta_description")
                    );
                    $this->categoryfooter_model->insert($data_insert);
                    $this->session->set_flashdata("flash_mess", "Added");
                    redirect(base_url() . "quantri/categoryfooter");
                }
                $this->load->view('backend/layout/master', $this->_data);
            }
            else {
                $this->load->view ( 'login_form' );
            }
        }
        public function check_name($name) {
            $id = $this->uri->segment(3);
            if ($this->categoryfooter_model->checkName($name) == FALSE) {
                $this->form_validation->set_message("check_user", "Bài viết này đã tồn tại, vui lòng nhập lại");
                return FALSE;
            } else {
                return TRUE;
            }
        }

    public function edit($id) {
            if ($this->login()) {
                $this->_data['titlePage'] = "Chỉnh sửa bài viết giới thiệu";
                $this->_data['subview'] = 'backend/categoryfooter/edit_view';
                $this->_data['info'] = $this->categoryfooter_model->getById($id);
                $arr = (object)$this->_data['info'];
                $this->form_validation->set_rules("name", "name", "required|xss_clean|trim|min_length[4]");
                if ($this->form_validation->run() == TRUE) {
                    $data_update = array(
                        "name" => $this->input->post("name"),
                        "slug" => create_slug($this->input->post("name")),
                        "meta_keyword" => $this->input->post("meta_keyword"),
                        "meta_description" => $this->input->post("meta_description")
                        //"image" => $image
                    );
                    $this->categoryfooter_model->update($data_update,$id);
                    $this->session->set_flashdata("flash_mess", "Cập nhật thành công");
                    redirect(base_url() . "quantri/categoryfooter");
                }
                $this->load->view('backend/layout/master', $this->_data);
            }
            else {
                $this->load->view ( 'login_form' );
            }
        }
        
        public function delete($id) {
            $this->categoryfooter_model->delete($id);
            $this->session->set_flashdata("flash_mess", "Delete Success");
            redirect(base_url() . "quantri/categoryfooter");
        }

}

?>

