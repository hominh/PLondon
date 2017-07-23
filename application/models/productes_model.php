<?php
	class Products_model extends CI_Model {
		//public $name = NULL;
		 
		public function __construct() {
			$this->load->database();
			parent::__construct();
		}
		
		public function get_products() {
			//$this->$name = "tbl_product";
			$query = $this->db->get("tbl_categorymusic");
			return $query->result();
		}
		
		public function get_producstsById($slug) {
			$query = $this->db->get_where("tbl_categorymusic",array('slug'=>$slug));
			return $query->row_array();
		}
		
	}

?>