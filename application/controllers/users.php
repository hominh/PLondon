<?php
    class Users extends CI_Controller {
        protected $_data;
        public function __construct() {
            parent::__construct();
            $this->load->helper('url');
            $this->load->model('users_model');
            $this->load->library('session');
            $this->load->library('form_validation');
        }
        public function index() {
            $this->_data['subview'] = 'user/index_view';
            $this->_data['titlePage'] = 'List All User';
            $this->_data['info'] = $this->users_model->getList();
            $this->_data['total_user'] = $this->users_model->countAll();
            $this->_data['total_user'] = $this->users_model->countAll();
            $this->load->view('user/main.php', $this->_data);
        }
        public function delete($id) {
            $this->load->model('users_model');
            $this->users_model->deleteUser($id);
            $this->session->set_flashdata("flash_mess", "Delete Success");
            redirect(base_url() . "index.php/users");
        }
        public function check_user($user) {
            $this->load->model('users_model');
            $id=$this->uri->segment(3);
            if ($this->users_model->checkUsername($user) == FALSE) {
                $this->form_validation->set_message("check_user", "Your username has been registed, please try again!");
                return FALSE;
            } else {
                return TRUE;
            }
        }
        
        public function check_email($email) {
            $this->load->model('users_model');
            $id=$this->uri->segment(3);
            if ($this->users_model->checkUsername($email) == FALSE) {
                $this->form_validation->set_message("check_email", "Your email has been registed, please try again!");
                return FALSE;
            } else {
                return TRUE;
            }
        }
        
        public function insert() {
            $this->_data['titlePage'] = 'Add A User';
            $this->_data['subview'] = 'user/add_view';
            $this->form_validation->set_rules("username", "Username", "required|xss_clean|trim|min_length[4]|callback_check_user");
            $this->form_validation->set_rules("password", "Password", "required|matches[password2]|trim|xss_clean");
            $this->form_validation->set_rules("email", "Email", "required|trim|xss_clean|valid_email|callback_check_email");
            if ($this->form_validation->run() == TRUE) {
                $this->load->model("users_model");
                $data_insert = array(
                    "username" => $this->input->post("username"),
                    "password" => $this->input->post("password"),
                    "email"    => $this->input->post("email"),
                    "level"    => $this->input->post("level"),
                );
                $this->users_model->insertUser($data_insert);
                $this->session->set_flashdata("flash_mess", "Added");
                redirect(base_url() . "index.php/users");
            }
            
            
            $this->load->view('user/main.php', $this->_data);
        }
        
        public function edit($id) {
            $this->_data['titlePage'] = "Edit A User";
            $this->_data['subview'] = "user/edit_view";

            $this->_data['info'] = $this->users_model->getUserById($id);
            $this->form_validation->set_rules("username", "Username", "required|xss_clean|trim|min_length[4]|callback_check_user");
            $this->form_validation->set_rules("password", "Password", "matches[password2]|trim|xss_clean");
            $this->form_validation->set_rules("email", "Email", "required|trim|xss_clean|valid_email|callback_check_email");
            if ($this->form_validation->run() == TRUE) {
                $data_update = array(
                    "username" => $this->input->post("username"),
                    "email" => $this->input->post("email"),
                    "level" => $this->input->post("level"),
                );
                if ($this->input->post("password")) {
                    $data_update['password'] = $this->input->post("password");
                }
                $this->users_model->updateUser($data_update, $id);
                $this->session->set_flashdata("flash_mess", "Update Success");
                redirect(base_url() . "users");
            }
            $this->load->view('user/main.php', $this->_data);
        }
    }
?>