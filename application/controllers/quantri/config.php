<?php
ob_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    class Config extends CI_Controller {
        protected $_data;
        public function __construct() {
            parent::__construct();
            $this->load->helper('url');
            $this->load->model('config_model');
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
                $this->_data ['subview'] = 'backend/config/index_view';
                $this->_data ['titlePage'] = 'Cấu hình website';
                $this->_data ['info'] = $this->config_model->getList();
                $this->_data ['total_new'] = $this->config_model->countAll();
                $this->load->view('backend/layout/master', $this->_data);
            }
            else {
                $this->load->view ( 'login_form' );
            }
            
        }
        public function create() {
            
            
            if ($this->login()) { 
                $this->_data['titlePage'] = 'Cấu hình website';
                $this->_data['subview'] = 'backend/config/create_view';
                $this->form_validation->set_rules("name", "name", "required|xss_clean|trim|min_length[4]|callback_check_name");
                $config['upload_path'] = 'assets/uploads/imagegioithieu/';
                $config['allowed_types'] = 'gif|jpg|png';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $this->upload->set_allowed_types('*');
                $data['upload_data'] = '';
                if (!$this->upload->do_upload('userfile')) {
                    $data = array('msg' => $this->upload->display_errors());
                } else {
                    $data = array('msg' => "Upload success!");
                    $data['upload_data'] = $this->upload->data();
                }
                $upload_data = $this->upload->data();
                $file_name = $upload_data['file_name'];
                $image = base_url() . $config['upload_path'] . $file_name;

                if ($this->form_validation->run() == TRUE) {
                    $data_insert = array(
                        "twitter" => $this->input->post("twitter"),
                        "facebook" => $this->input->post("facebook"),
                        "googleplus" => $this->input->post("googleplus"),
                        "linkedin" => $this->input->post("linkedin"),
                        "dribbble" => $this->input->post("dribbble"),
                        "image" => $image,
                        "add" => $this->input->post("add"),
                        "tell" => $this->input->post("tell"),
                        "fax" => $this->input->post("fax"),
                        "email" => $this->input->post("email"),
                        "website" => $this->input->post("website")
                    );
                    $this->config_model->insert($data_insert);
                    $this->session->set_flashdata("flash_mess", "Added");
                    redirect(base_url() . "quantri/cauhinh");
                }
                $this->load->view('backend/layout/master', $this->_data);
            }
            else {
                $this->load->view ( 'login_form' );
            }
        }
        public function check_name($name) {
            $id = $this->uri->segment(3);
            if ($this->dichvu_model->checkName($name) == FALSE) {
                $this->form_validation->set_message("check_user", "Bài viết này đã tồn tại, vui lòng nhập lại");
                return FALSE;
            } else {
                return TRUE;
            }
        }

    public function edit($id) {
        $config['upload_path'] = 'assets/uploads/slides/';
            $config['allowed_types'] = 'gif|jpg|png';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $this->upload->set_allowed_types('*');
            $data['upload_data'] = '';
            if (!$this->upload->do_upload('userfile')) {
                $data = array('msg' => $this->upload->display_errors());
            } else {
                $data = array('msg' => "Upload success!");
                $data['upload_data'] = $this->upload->data();
            }
            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];
            $image = base_url() . $config['upload_path'] . $file_name;

            if ($this->login()) {
                $this->_data['titlePage'] = "Chỉnh sửa cấu hình website";
                $this->_data['subview'] = 'backend/config/edit_view';
                $this->_data['info'] = $this->config_model->getById($id);
                $arr = (object)$this->_data['info'];
                $this->form_validation->set_rules("facebook", "facebook", "required|xss_clean|trim|min_length[4]");
                if ($this->form_validation->run() == TRUE) {
                    if (!$this->upload->do_upload('userfile')) {
                        $data_update = array(
                            "twitter" => $this->input->post("twitter"),
                            "facebook" => $this->input->post("facebook"),
                            
                            
                            "googleplus" => $this->input->post("googleplus"),
                            "linkedin" => $this->input->post("linkedin"),
                            "dribbble" => $this->input->post("dribbble"),
                            "keyword" => $this->input->post("keyword"),
                            "description" => $this->input->post("description"),
                            "title" => $this->input->post("title"),
                            "add" => $this->input->post("add"),
                            "tell" => $this->input->post("tell"),
                            "fax" => $this->input->post("fax"),
                            "email" => $this->input->post("email"),
                            "website" => $this->input->post("website")
                            //"image" => $image
                        );
                    }
                    else {
                        $data_update = array(
                            "twitter" => $this->input->post("twitter"),
                            "facebook" => $this->input->post("facebook"),
                            
                            
                            "googleplus" => $this->input->post("googleplus"),
                            "linkedin" => $this->input->post("linkedin"),
                            "dribbble" => $this->input->post("dribbble"),
                            "map" => $image,
                            "keyword" => $this->input->post("keyword"),
                            "description" => $this->input->post("description"),
                            "title" => $this->input->post("title"),
                            "add" => $this->input->post("add"),
                            "tell" => $this->input->post("tell"),
                            "fax" => $this->input->post("fax"),
                            "email" => $this->input->post("email"),
                            "website" => $this->input->post("website")
                        );
                    }
                    
                    $this->config_model->update($data_update,$id);
                    $this->session->set_flashdata("flash_mess", "Cập nhật thành công");
                    redirect(base_url() . "quantri/config");
                }
                $this->load->view('backend/layout/master', $this->_data);
            }
            else {
                $this->load->view ( 'login_form' );
            }
        }
        
        public function delete($id) {
            $this->dichvu_model->delete($id);
            $this->session->set_flashdata("flash_mess", "Delete Success");
            redirect(base_url() . "quantri/dichvu");
        }

}

?>

