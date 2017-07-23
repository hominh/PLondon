<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ob_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    class Products extends CI_Controller {
        protected $_data;
        public function __construct() {
            parent::__construct();
            $this->load->library('pagination');
            $this->load->helper('url');
            $this->load->model('products_model');
            $this->load->model('categoryproduct_model');
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
                $config = array();
                $config["base_url"] = base_url() . "quantri/products/";
                $config["total_rows"] = $this->products_model->countAll();
                $config["per_page"] = 20;
                $config["uri_segment"] = 3;
                
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

                $user = $this->session->userdata ( 'logged_in' );
                $session_data = $this->session->userdata ( 'logged_in' );
                $this->_data ['username'] = $session_data ['username'];
                $this->_data ['subview'] = 'backend/products/index_view';
                $this->_data ['titlePage'] = 'List Product';
                $this->_data ['info'] = $this->products_model->getList($config["per_page"], $page);
                $this->_data["links"] = $this->pagination->create_links();

                $this->_data ['total_new'] = $this->products_model->countAll();
                $this->load->view('backend/layout/master', $this->_data);
            }
            else {
                $this->load->view ( 'login_form' );
            }   
            
        }
        public function create() {
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
            
            if ($this->login()) { 
                $this->_data['titlePage'] = 'Thêm mới sản phẩm';
                $this->_data['categoryproduct'] = $this->categoryproduct_model->getList();

                $this->_data['subview'] = 'backend/products/create_view';
                $this->form_validation->set_rules("name", "name", "required|xss_clean|trim|min_length[4]|callback_check_name");
                

                if ($this->form_validation->run() == TRUE) {
                    $date = date('Y-m-d H:i:s');
                    $data_insert = array(
                        "name" => $this->input->post("name"),
                        "barcode" => $this->input->post("barcode"),
                        "code" => $this->input->post("code"),
                        "keyword" => $this->input->post("keyword"),
                        "description" => $this->input->post("description"),
                        "content" => $this->input->post("content"),
                        "descriptionforsale" => $this->input->post("descriptionforsale"),
                        "slug" => create_slug($this->input->post("name")),
                        "price" => $this->input->post("price"),
                        "wholesalePrice" => $this->input->post("wholesalePrice"),
                        "status" => $this->input->post("status"),
                        "categoryId" => $this->input->post("categoryproduct"),
                        "hot" => $this->input->post("hot"),
                        "createdDateTime" => $date,
                        "image" => $image

                    );
                    $this->products_model->insert($data_insert);
                    $this->session->set_flashdata("flash_mess", "Added");
                    redirect(base_url() . "quantri/products");
                }
                $this->load->view('backend/layout/master', $this->_data);
            }
            else {
                $this->load->view ( 'login_form' );
            }
        }
        

    public function edit($id) {
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
            if ($this->login()) {
                $this->_data['titlePage'] = "Chỉnh sửa bài viết";
                $this->_data['subview'] = 'backend/products/edit_view';
                $this->_data['info'] = $this->products_model->getById($id);
                
                



                $arr = (object)$this->_data['info'];
                $id_parent = $arr->categoryId;
                $this->_data['categoryproduct'] = $this->categoryproduct_model->getListByParentId($id_parent);
                $this->_data['categoryproductnotselect'] = $this->categoryproduct_model->getListNotId($id_parent);
                $date = date('Y-m-d H:i:s');
                $this->form_validation->set_rules("name", "name", "required|xss_clean|trim|min_length[4]");
                if ($this->form_validation->run() == TRUE) {
                    if (!$this->upload->do_upload('userfile')) {
                        $data_update = array(
                            "name" => $this->input->post("name"),
                            "barcode" => $this->input->post("barcode"),
                            "code" => $this->input->post("code"),
                            "keyword" => $this->input->post("keyword"),
                            "description" => $this->input->post("description"),
                            "content" => $this->input->post("content"),
                            "descriptionforsale" => $this->input->post("descriptionforsale"),
                            "slug" => create_slug($this->input->post("name")),
                            "price" => $this->input->post("price"),
                            "wholesalePrice" => $this->input->post("wholesalePrice"),
                            "status" => $this->input->post("status"),
                            "categoryId" => $this->input->post("categoryproduct"),
                            "hot" => $this->input->post("hot"),
                            "createdDateTime" => $date
                            //"top" => $this->input->post("top")
                        );
                    }
                    else {
                        $data_update = array(
                            "name" => $this->input->post("name"),
                            "barcode" => $this->input->post("barcode"),
                            "code" => $this->input->post("code"),
                            "keyword" => $this->input->post("keyword"),
                            "description" => $this->input->post("description"),
                            "content" => $this->input->post("content"),
                            "descriptionforsale" => $this->input->post("descriptionforsale"),
                            "slug" => create_slug($this->input->post("name")),
                            "price" => $this->input->post("price"),
                            "wholesalePrice" => $this->input->post("wholesalePrice"),
                            "status" => $this->input->post("status"),
                            "categoryId" => $this->input->post("categoryproduct"),
                            "hot" => $this->input->post("hot"),
                            "createdDateTime" => $date,
                            "image" => $image
                            //"top" => $this->input->post("top")
                        );
                    }
                    
                    $this->products_model->update($data_update,$id);
                    $this->session->set_flashdata("flash_mess", "Cập nhật thành công");
                    redirect(base_url() . "quantri/products");
                }
                $this->load->view('backend/layout/master', $this->_data);
            }
            else {
                $this->load->view ( 'login_form' );
            }
        }
        
        public function delete($id) {
            $this->products_model->delete($id);
            $this->session->set_flashdata("flash_mess", "Delete Success");
            redirect(base_url() . "quantri/post");
        }

}

?>

