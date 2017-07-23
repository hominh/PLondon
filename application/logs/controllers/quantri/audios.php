<?php
	class Audios extends CI_Controller {
		protected $_data;
		public function __construct() {
			parent::__construct();
			$this->load->helper('url');
			$this->load->model('audios_model');
			$this->load->model('playlists_model');
			$this->load->model('categorymusics_model');
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
				$this->_data ['subview'] = 'backend/audio/index_view';
				$this->_data ['titlePage'] = 'List Audio';
				$this->_data ['info'] = $this->audios_model->getList ();
				$this->_data ['total_new'] = $this->audios_model->countAll ();
				$this->load->view ( 'backend/layout/master', $this->_data );
			}
			else {
				$this->load->view ( 'login_form' );
			}
		}
		
		public function delete($id) {
			$this->audios_model->delete($id);
			$this->session->set_flashdata("flash_mess", "Delete Success");
			redirect(base_url() . "quantri/audios");
		}
		
		public function check_name($category) {
			$id=$this->uri->segment(3);
			if ($this->audios_model->checkName($category) == FALSE) {
				$this->form_validation->set_message("check_user", "Bài nhạc này đã tồn tại, vui lòng nhập lại");
				return FALSE;
			} else {
				return TRUE;
			}
		}
		
		public function create() {
			
			$config['upload_path'] = 'assets/uploads/audio/';
			
			// set the filter image types
			$config['allowed_types'] = 'gif|jpg|png|mp3|mp4';
			
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
				$this->_data['subview'] = 'backend/audio/create_view';
				$this->form_validation->set_rules("name", "name", "required|xss_clean|trim|min_length[4]|callback_check_name");
				$this->_data['categoriesmusic'] = $this->categorymusics_model->getList();
                                $this->_data['playlist'] = $this->playlists_model->getList();
					
				if ($this->form_validation->run() == TRUE) {
					//$this->load->model("news_model");
				
					$data_insert = array(
							"name" => $this->input->post("name"),
							"title" => $this->input->post("title"),
							"categorymusic_id" => $this->input->post("cate"),
                                                        "playlist_id" => $this->input->post("cate2"),
                                                        "file" => $image_thumb,
					);
					$this->audios_model->insert($data_insert);
					$this->session->set_flashdata("flash_mess", "Added");
					redirect(base_url() . "quantri/audios");
				}
				$this->load->view('backend/layout/master', $this->_data);
			}
			else {
				$this->load->view ( 'login_form' );
			}
			
		}
		
		public function edit($id) {
			$this->load->helper("file");
			$config['upload_path'] = 'assets/uploads/audio/';
				
			// set the filter image types
			$config['allowed_types'] = 'gif|jpg|png|mp3|mp4';
				
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
				$this->_data['titlePage'] = "Chỉnh sửa file nhạc";
				$this->_data['subview'] = 'backend/audio/edit_view';
					
				$this->_data['info'] = $this->audios_model->getById($id);
					
				$arr = (object)$this->_data['info'];
				$cate_id = $arr->categorymusic_id;
				$playlist_id = $arr->playlist_id;
				$fileold = $arr->file;
				$this->_data['categoryselected'] = $this->categorymusics_model->getById($cate_id);
				$this->form_validation->set_rules("name", "name", "required|xss_clean|trim|min_length[4]");
				$this->_data['categorynotselected'] = $this->categorymusics_model->getNotById($cate_id);
				
				$this->_data['playlistselected'] = $this->playlists_model->getById($playlist_id);
				
				$this->_data['playlistnotselected'] = $this->playlists_model->getNotById($playlist_id);
				$filenew = "";
				
				
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
							"title" => $this->input->post("title"),
							"categorymusic_id" => $this->input->post("cate"),
							"playlist_id" => $this->input->post("cate2"),
							"file" => $filenew,
					);
					
					$this->audios_model->update($data_update, $id);
					$this->session->set_flashdata("flash_mess", "Update Success");
					redirect(base_url() . "quantri/audios");
				}
				$this->load->view('backend/layout/master', $this->_data);
			}
			else {
				$this->load->view ( 'login_form' );
			}
			
		}
	}
?>