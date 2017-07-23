<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
?>
<?php
	class Events extends CI_Controller {
		protected $_data;
		public function __construct() {
			parent::__construct();
			$this->load->helper('url');
			$this->load->model('events_model');
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
			$this->ckfinder->SetupCKEditor($this->ckeditor, '../../../assets/ckfinder/');
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
					$this->_data ['subview'] = 'backend/event/index_view';
					$this->_data ['titlePage'] = 'Playlist';
					$this->_data ['info'] = $this->events_model->getList ();
					$this->_data ['total_new'] = $this->events_model->countAll ();
					$this->load->view ( 'backend/layout/master', $this->_data );
				} else {
					$this->load->view ( 'login_form' );
				}
			}
		
		public function delete($id) {
			$this->events_model->delete($id);
			$this->session->set_flashdata("flash_mess", "Delete Success");
			redirect(base_url() . "quantri/events");
		}
		
		public function check_name($event) {
			$id=$this->uri->segment(3);
			if ($this->events_model->checkName($event) == FALSE) {
				$this->form_validation->set_message("check_user", "Sự kiện này đã tồn tại, vui lòng nhập lại");
				return FALSE;
			} else {
				return TRUE;
			}
		}
		
		public function create() {
			$config['upload_path'] = 'assets/uploads/img_ev';
			
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
			if ($this->login ()) {
				$this->_data['titlePage'] = 'Thêm mới sự kiện';
				$this->_data['subview'] = 'backend/event/create_view';
				$this->form_validation->set_rules("name", "name", "required|xss_clean|trim|min_length[4]|callback_check_name");
					
				if ($this->form_validation->run() == TRUE) {
					//$this->load->model("events_model");
				
					$data_insert = array(
							"name" => $this->input->post("name"),
							"slug" => create_slug($this->input->post("name")),
							"content" => $this->input->post("content"),
							"image_thumb" => $image_thumb,
					);
					$this->events_model->insert($data_insert);
					$this->session->set_flashdata("flash_mess", "Added");
					redirect(base_url() . "quantri/events");
				}
				$this->load->view('backend/layout/master', $this->_data);
			}
			else {
				$this->load->view ( 'login_form' );
			}
			
		}
		
		public function edit($id) {
			if($this->login()) {
				$this->_data['titlePage'] = "Chỉnh sửa bài viết";
				$this->_data['subview'] = 'backend/event/edit_view';
					
				$this->_data['info'] = $this->events_model->getById($id);
					
					
				$this->form_validation->set_rules("name", "name", "required|xss_clean|trim|min_length[4]");
					
					
				if ($this->form_validation->run() == TRUE) {
					$data_update = array(
							"name" => $this->input->post("name"),
							"slug" => create_slug($this->input->post("name")),
							"content" => $this->input->post("content"),
							//"image_thumb" => $image_thumb,
					);
					$this->events_model->update($data_update, $id);
					$this->session->set_flashdata("flash_mess", "Update Success");
					redirect(base_url() . "quantri/events");
				}
				$this->load->view('backend/layout/master', $this->_data);
			}
			else {
				$this->load->view ( 'login_form' );
			}
			
		}
	}
?>