<?php
	class Clubs extends CI_Controller {
		protected $_data;
		public function __construct() {
			parent::__construct();
			$this->load->helper('url');
			$this->load->model('clubs_model');
			$this->load->library('session');
			$this->load->library('form_validation');
			$this->load->helper("slug");
			$this->load->library('ckeditor');
			$this->load->library('ckfinder');
			$this->ckeditor->basePath = base_url() . 'assets/ckeditor/';
			//Thiết lập các tool icon ckeditor
			$this->ckeditor->config['toolbar'] = array(
				array('Source', '-', 'Bold', 'Italic', 'Underline', '-',
					'Cut','Copy', 'Paste', 'PasteText', 'PasteFromWord', '-',
					'Undo', 'Redo', '-', 'NumberedList', 'BulletedList',
					'Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt',
					'Link','Unlink','Anchor',
					'Image','Flash','Table','PageBreak' ,
					'Styles','Format','Font','FontSize',
					'TextColor','BGColor' ,'Code'
				),
			
			);
			// Thiết lập ngôn ngữ hiển thị en => english, vi => Việt Nam , fr => Pháp
			$this->ckeditor->config['language'] = 'en';
			
			$this->ckeditor->config['width'] = '730px';
			$this->ckeditor->config['height'] = '200px';
			//Thêm ckfinder vào
			$this->ckfinder->SetupCKEditor($this->ckeditor, '../../assets/ckfinder/');
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
		if ($this->login()) {
				$user = $this->session->userdata ( 'logged_in' );
				$session_data = $this->session->userdata ( 'logged_in' );
				$this->_data ['username'] = $session_data ['username'];
				$this->_data ['subview'] = 'backend/club/index_view';
				$this->_data ['titlePage'] = 'List Clubs';
				$this->_data ['info'] = $this->clubs_model->getList ();
				$this->_data ['total_new'] = $this->clubs_model->countAll ();
				$this->load->view ( 'backend/layout/master', $this->_data );
			}
			else {
				$this->load->view ( 'login_form' );
			}
		}
		
		public function delete($id) {
			$this->clubs_model->delete($id);
			$this->session->set_flashdata("flash_mess", "Delete Success");
			redirect(base_url() . "quantri/clubs");
		}
		
		public function check_name($category) {
			$id=$this->uri->segment(3);
			if ($this->clubs_model->checkName($category) == FALSE) {
				$this->form_validation->set_message("check_user", "CLub này đã tồn tại, vui lòng nhập lại");
				return FALSE;
			} else {
				return TRUE;
			}
		}
		
		public function create() {
			
			$config['upload_path'] = 'assets/uploads/img_cl';
			
			// set the filter image types
			$config['allowed_types'] = 'gif|jpg|png';
			
			//load the upload library
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
			
			
			//Thư mục asset chứa ckeditor và ckfinder
			if ($this->login()) {
				$this->_data['titlePage'] = 'Thêm mới bài viết';
				$this->_data['subview'] = 'backend/club/create_view';
				$this->form_validation->set_rules("name", "name", "required|xss_clean|trim|min_length[4]|callback_check_name");
				
					
				if ($this->form_validation->run() == TRUE) {
					//$this->load->model("news_model");
				
					$data_insert = array(
							"name" => $this->input->post("name"),
							"slug" => create_slug($this->input->post("name")),
							"title" => $this->input->post("title"),
							"content" => $this->input->post("content"),
							"image_thumb" => $image_thumb,
					);
					$this->clubs_model->insert($data_insert);
					$this->session->set_flashdata("flash_mess", "Added");
					redirect(base_url() . "quantri/clubs");
				}
				$this->load->view('backend/layout/master', $this->_data);
			}
			else {
				$this->load->view ( 'login_form' );
			}
			
		}
		
		public function edit($id) {
			$this->load->helper("file");
			$config['upload_path'] = 'assets/uploads/img_cl/';
				
			// set the filter image types
			$config['allowed_types'] = 'gif|jpg|png|mp3';
				
			//load the upload library
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
			
			if ($this->login()) {
				$this->_data['titlePage'] = "Chỉnh sửa bài viết club";
				$this->_data['subview'] = 'backend/club/edit_view';
					
				$this->_data['info'] = $this->clubs_model->getById($id);
					
				$arr = (object)$this->_data['info'];
				$fileold = $arr->image_thumb;
				$filenew = "";
				$this->form_validation->set_rules("name", "name", "required|xss_clean|trim|min_length[4]");
				
					
				if ($this->form_validation->run() == TRUE) {
					if($image_thumb == base_url().$config['upload_path']) {
						$filenew = $fileold;
					}
					else {
						unlink($fileold);
						$filenew = $image_thumb;
					}
					$data_update = array(
							"name" => $this->input->post("name"),
							"slug" => create_slug($this->input->post("name")),
							"title" => $this->input->post("title"),
							"content" => $this->input->post("content"),
							"image_thumb" => $filenew,
							
					);
					$this->clubs_model->update($data_update, $id);
					$this->session->set_flashdata("flash_mess", "Update Success");
					redirect(base_url() . "quantri/clubs");
				}
				$this->load->view('backend/layout/master', $this->_data);
			}
			else {
				$this->load->view ( 'login_form' );
			}
			
		}
	}
?>