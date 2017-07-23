<?php
	class Site extends CI_Controller {
		
		public function __construct(){
			parent::__construct();
			$this->load->model('site_model');
			$this->load->helper('form');
			$this->load->library('form_validation');
		}
		
		public function index() {
			
			$data['title'] = "Add new data";
			$this->load->view('templates/header', $data);
			$this->load->view('sites/options_view');
			$this->load->view('templates/footer');
		}
		
		function create() {
			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('content', 'Content', 'required');
			$data = array(
				'title'=>$this->input->post('title'),
				'content'=>$this->input->post('content')
			);
			
			if ($this->form_validation->run() === FALSE)
			{
				$this->site_model->add_record($data);
				$this->index();
			}
			else {
				
			}
			
			
		}
	}
?>