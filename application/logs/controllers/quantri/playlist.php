<?php
	class Playlist extends CI_Controller {
		protected $_data;
		public function __construct() {
			parent::__construct();
			$this->load->helper('url');
			$this->load->model('playlists_model');
			$this->load->model('categorymusics_model');
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
				$this->_data ['subview'] = 'backend/playlist/index_view';
				$this->_data ['titlePage'] = 'Playlist';
				$this->_data ['info'] = $this->playlists_model->getList ();
				$this->_data ['total_new'] = $this->playlists_model->countAll ();
				$this->load->view ( 'backend/layout/master', $this->_data );
			} else {
				$this->load->view ( 'login_form' );
			}
		}
		
		public function delete($id) {
			$this->playlists_model->delete($id);
			$this->session->set_flashdata("flash_mess", "Delete Success");
			redirect(base_url() . "quantri/playlist");
		}
		
		public function check_name($playlist) {
			$id=$this->uri->segment(3);
			if ($this->playlists_model->checkName($playlist) == FALSE) {
				$this->form_validation->set_message("check_user", "Playlist này đã có trong dữ liệu");
				return FALSE;
			} else {
				return TRUE;
			}
		}
		
		public function create() {
			
			
			$config['upload_path'] = 'assets/uploads/img_pl/';
			$config['allowed_types'] = 'gif|jpg|png';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$this->upload->set_allowed_types('*');
			$data['upload_data'] = '';
			if (!$this->upload->do_upload('userfile')) {
				$data = array('msg' => $this->upload->display_errors());
			}
			else {
				$data = array('msg' => "Upload success!");
				$data['upload_data'] = $this->upload->data();
			}
			
			$upload_data = $this->upload->data();
			$file_name = $upload_data['file_name'];
			$image_thumb = base_url().$config['upload_path'].$file_name;
			
			if ($this->login ()) {
				$this->_data['titlePage'] = 'Add New Playlist';
				$this->_data['subview'] = 'backend/playlist/create_view';
				$this->form_validation->set_rules("name", "name", "required|xss_clean|trim|min_length[4]|callback_check_name");
				$this->_data['categoriesmusic'] = $this->categorymusics_model->getList();
				if ($this->form_validation->run() == TRUE) {
					//$this->load->model("categorymusics_model");
				
					$data_insert = array(
							"name" => $this->input->post("name"),
							"description" => $this->input->post("description"),
							"categorymusic_id" => $this->input->post("cate"),
							"image_thumb" => $image_thumb,
							"slug" => create_slug($this->input->post("name")),
					);
					$this->playlists_model->insert($data_insert);
					$this->session->set_flashdata("flash_mess", "Added");
					redirect(base_url() . "quantri/playlist");
				}
				$this->load->view('backend/layout/master', $this->_data);
			}
			else {
				$this->load->view ( 'login_form' );
			}
			
			
		}
		
		public function edit($id) {
			if ($this->login ()) {
				$this->_data['titlePage'] = "Edit A Playlist";
				$this->_data['subview'] = 'backend/playlist/edit_view';
					
					
				$this->_data['info'] = $this->playlists_model->getById($id);
				$arr = (object)$this->_data['info'];
				$cate_id = $arr->categorymusic_id;
				$this->_data['categoryselected'] = $this->categorymusics_model->getById($cate_id);
				$this->_data['categorynotselected'] = $this->categorymusics_model->getNotById($cate_id);
				$this->form_validation->set_rules("name", "name", "required|xss_clean|trim|min_length[4]");
				
				if ($this->form_validation->run() == TRUE) {
					$data_update = array(
							"name" => $this->input->post("name"),
							"slug" => create_slug($this->input->post("name")),
							"description" => $this->input->post("description"),
							"categorymusic_id" => $this->input->post("cate")
					);
					$this->playlists_model->update($data_update, $id);
					$this->session->set_flashdata("flash_mess", "Update Success");
					redirect(base_url() . "quantri/playlist");
				}
				$this->load->view('backend/layout/master', $this->_data);
			}
			else {
				$this->load->view ( 'login_form' );
			}
		}
	}
?>