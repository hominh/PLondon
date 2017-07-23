<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
	class Products extends CI_Controller {
		public function __construct(){
			parent::__construct();
			$this->load->model('products_model');
                        $this->load->helper("url");
                        $this->load->helper("slug");
                        $this->load->helper('form');
		}
		
		public function index($page = 'product') {
			$data['products'] = $this->products_model->get_products();
			$data['title'] = ucfirst($page); // Capitalize the first letter
			$this->load->view('templates/header', $data);
			$this->load->view('pages/test', $data);
			$this->load->view('templates/footer');
		}
		
		public function view($page = 'product') {
			$data['products'] = $this->products_model->get_products();
			$data['title'] = ucfirst($page); // Capitalize the first letter
			$this->load->view('templates/header', $data);
			$this->load->view('pages/test', $data);
			$this->load->view('templates/footer');
			
			
			
		}
		public function testck() {
			$this->load->library('ckeditor');
			$this->load->library('ckfinder');
			//Thư mục asset chứa ckeditor và ckfinder
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
		
					)
			);
			// Thiết lập ngôn ngữ hiển thị en => english, vi => Việt Nam , fr => Pháp
			$this->ckeditor->config['language'] = 'en';
				
			$url_cf = base_url()."assets/ckfinder/";
			//Thêm ckfinder vào
			$this->ckfinder->SetupCKEditor($this->ckeditor, '../assets/ckfinder/');
			$this->load->view('news');
		}
		public function detail($id) {
			
			//$data['title'] = ucfirst($page);
			$arr = array();
			$data['products'] = $this->products_model->get_producstsById($id);
			$arr = $data['products'];
			$arr = (object) $arr;
                        
			$page = $arr->name;
			$data['title'] = ucfirst($page); // Capitalize the first letter
			$this->load->view('templates/header', $data);
			$this->load->view('pages/test2', $data);
			$this->load->view('templates/footer');
		}
		
		public function create() {
			$this->load->helper('form');
			$this->load->library('form_validation');
			$data['title'] = "Add new Product";
			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('text', 'text', 'required');
			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('templates/header', $data);
				$this->load->view('products/create');
				$this->load->view('templates/footer');
			
			}
		}
		
		public function insert() {
			$data = array(
					'CategoryId' => '1' ,
					'Name' => 'So mi' ,
					'Description' => 'This is a skirt',
					'Content' => 'This is a skirt',
					'Price' => '1200000',
					'Image' => 'This is a image',
					'ShowAtFeature' => '1',
					'ShowAtRecommended' => '1'
			);
			$this->db->insert('tbl_product', $data);
		}
		
		public function update($id) {
			$this->db->where('id',$id);
			$data = array(
					
			);
		}
		
		public function delete($id) {
			//id paramaters
			$this->db->where('id',$id);
			$this->db->delete("tbl_product");
		}
		
		
	}
?>
