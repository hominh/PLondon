<?php
	class Categoriesnew extends CI_Controller {
		protected $_data;
		public function __construct() {
			parent::__construct();
			$this->load->helper('url');
			$this->load->model('categoriesnews_model');
			$this->load->library('session');
			$this->load->library('form_validation');
			$this->load->helper("slug");
		}
		
		public function login() {
			$logged = $this->session->userdata('logged_in');
			if ($logged)
			{
				return TRUE;
			}
			else
			{
				return FALSE;
			}
		}
		
		public function index() {
			if ($this->login ()) {
					$user = $this->session->userdata ( 'logged_in' );
					$session_data = $this->session->userdata ( 'logged_in' );
					$this->_data ['username'] = $session_data ['username'];
					$this->_data ['subview'] = 'backend/categorymusic/index_view';
					$this->_data ['titlePage'] = 'Category of news';
					$this->_data ['info'] = $this->categoriesnews_model->getList ();
					$this->_data ['total_new'] = $this->categoriesnews_model->countAll ();
					$this->load->view ( 'backend/layout/master', $this->_data );
				} else {
					$this->load->view ( 'login_form' );
				}
		}
		
		public function delete($id) {
			$this->categoriesnews_model->delete($id);
			$this->session->set_flashdata("flash_mess", "Delete Success");
			redirect(base_url() . "quantri/categoriesnew");
		}
		
		public function check_name($category) {
			$this->load->model('categoriesnews_model');
			$id=$this->uri->segment(3);
			if ($this->categoriesnews_model->checkName($category) == FALSE) {
				$this->form_validation->set_message("check_user", "Danh mục này đã tồn tại, vui lòng nhập lại");
				return FALSE;
			} else {
				return TRUE;
			}
		}
		
		public function create() {
			if($this->login()) {
				$this->_data['titlePage'] = 'Add New Category of News';
				$this->_data['subview'] = 'backend/categorynew/create_view';
				$this->form_validation->set_rules("name", "name", "required|xss_clean|trim|min_length[4]|callback_check_name");
				
				if ($this->form_validation->run() == TRUE) {
					$this->load->model("categoriesnews_model");
				
					$data_insert = array(
							"name" => $this->input->post("name"),
							"slug" => create_slug($this->input->post("name")),
					);
					$this->categoriesnews_model->insert($data_insert);
					$this->session->set_flashdata("flash_mess", "Added");
					redirect(base_url() . "quantri/categoriesnew");
				}
				$this->load->view('backend/layout/master', $this->_data);
			}
			else {
				$this->load->view ( 'login_form' );
			}
			
		}
		
		public function edit($id) {
			if($this->login()) {
				$this->_data['titlePage'] = "Edit A Category of New";
				$this->_data['subview'] = 'backend/categorynew/edit_view';
				
				$this->_data['info'] = $this->categoriesnews_model->getById($id);
				$this->form_validation->set_rules("name", "name", "required|xss_clean|trim|min_length[4]");
				
				if ($this->form_validation->run() == TRUE) {
					$data_update = array(
							"name" => $this->input->post("name"),
							"slug" => create_slug($this->input->post("name")),
					);
					$this->categoriesnews_model->update($data_update, $id);
					$this->session->set_flashdata("flash_mess", "Update Success");
					redirect(base_url() . "quantri/categoriesnew");
				}
				$this->load->view('backend/layout/master', $this->_data);
			}
			else {
				$this->load->view ( 'login_form' );
			}
		}
		
	}

?>