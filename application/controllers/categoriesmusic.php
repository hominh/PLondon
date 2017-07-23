<?php
	//error_reporting(E_ALL);
	//ini_set("display_errors", 1);
	class Categoriesmusic extends CI_Controller {
		protected $_data;
		public function __construct() {
			parent::__construct();
			$this->load->helper('url');
			$this->load->model('categorymusics_model');
			$this->load->library('session');
			$this->load->library('form_validation');
		}
		
		public function index() {
			$this->_data['subview'] = 'backend/categorymusic/index_view';
			$this->_data['titlePage'] = 'List All Category Of Music';
			$this->_data['info'] = $this->categorymusics_model->getList();
			$this->_data['total_category'] = $this->categorymusics_model->countAll();
			$this->load->view('backend/layout/master', $this->_data);
		}
		
		public function delete($id) {
			$this->categorymusics_model->delete($id);
			$this->session->set_flashdata("flash_mess", "Delete Success");
			redirect(base_url() . "categoriesmusic");
		}
		
		public function check_name($category) {
			$this->load->model('categorymusics_model');
			$id=$this->uri->segment(3);
			if ($this->categorymusics_model->checkName($category) == FALSE) {
				$this->form_validation->set_message("check_user", "Your username has been registed, please try again!");
				return FALSE;
			} else {
				return TRUE;
			}
		}
		
		public function create() {
			$this->_data['titlePage'] = 'Add New Category';
			$this->_data['subview'] = 'backend/categorymusic/create_view';
			$this->form_validation->set_rules("name", "name", "required|xss_clean|trim|min_length[4]|callback_check_name");
			if ($this->form_validation->run() == TRUE) {
				$this->load->model("categorymusics_model");
				$data_insert = array(
					"name" => $this->input->post("name"),
				);
				$this->categorymusics_model->insert($data_insert);
				$this->session->set_flashdata("flash_mess", "Added");
				redirect(base_url() . "quantri/categoriesmusic");
			}
			$this->load->view('backend/layout/master', $this->_data);
		}
		
		
		public function edit($id) {
			$this->_data['titlePage'] = "Edit A Category";
			$this->_data['subview'] = 'backend/categorymusic/edit_view';
		
			$this->_data['info'] = $this->categorymusics_model->getById($id);
			$this->form_validation->set_rules("name", "name", "required|xss_clean|trim|min_length[4]|callback_check_name");
			
			if ($this->form_validation->run() == TRUE) {
				$data_update = array(
					"name" => $this->input->post("name"),
				);
				$this->categorymusics_model->update($data_update, $id);
				$this->session->set_flashdata("flash_mess", "Update Success");
				redirect(base_url() . "quantri/categoriesmusic");
			}
			$this->load->view('backend/layout/master', $this->_data);
		}
	}
?>
