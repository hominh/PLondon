<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ob_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    class Images extends CI_Controller {
        protected $_data;
        public function __construct() {
            parent::__construct();
            $this->load->helper('url');
            $this->load->model('images_model');
            $this->load->library('session');
            $this->load->library('form_validation');
            $this->load->helper("slug");
           
            //Thiết lập các tool icon ckeditor
            
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
                $this->_data ['subview'] = 'backend/images/index_view';
                $this->_data ['titlePage'] = 'List Image';
                $this->_data ['info'] = $this->images_model->getList();
                $this->_data ['total_new'] = $this->images_model->countAll();
                $this->load->view('backend/layout/master', $this->_data);
            }
            else {
                $this->load->view ( 'login_form' );
            }   
            
        }
        public function create($idproduct) {
            
            $user = $this->session->userdata ( 'logged_in' );
            $session_data = $this->session->userdata ( 'logged_in' );
            $this->_data ['username'] = $session_data ['username'];
            
            
            $config['upload_path'] = 'assets/uploads/Product/Images/';
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
            $date = date('Y-m-d H:i:s');
           
            if ($this->login()) { 
                $this->_data['titlePage'] = 'Thêm mới hình ảnh';
                $this->_data['subview'] = 'backend/images/create_view';
                $this->_data['idproduct'] = $idproduct;
                $this->form_validation->set_rules('userfile', 'Lỗi đường dẫn ảnh', 'required|min_length[1]|xss_clean');
                

                if (!empty($_FILES['userfile']['name'])) {
                    $data_insert = array(
                        "url" => $image,
                        "created_at" => $date,
                        "product_id" => $idproduct
                    );
                   
                    $this->images_model->insert($data_insert,$idproduct);
                    $this->session->set_flashdata("flash_mess", "Added");
                    redirect(base_url() . "quantri/products");
                
                }
               
                $this->load->view('backend/layout/master', $this->_data);
            }

            //Neu khong login
            else {
                $this->load->view ( 'login_form' );
            }
        }
        

    public function edit($id) {
        $this->session->set_userdata('idproduct', $id);
         $config['upload_path'] = 'assets/uploads/Product/Images/';
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
                $this->_data['titlePage'] = "Upload more images for product";
                $this->_data['subview'] = 'backend/images/edit_view';
                $this->_data['info'] = $this->images_model->getById($id);
                
              
               

                
                $date = date('Y-m-d H:i:s');
                
                
                $this->load->view('backend/layout/master', $this->_data);
            }
            else {
                $this->load->view ( 'login_form' );
            }
        }
        
        public function delete($id) {
            $this->images_model->delete($id);
            $this->session->set_flashdata("flash_mess", "Delete Success");
            redirect(base_url() . "quantri/products");
        }

}

?>

