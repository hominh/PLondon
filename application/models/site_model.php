<?php
	class Site_model extends CI_Model {
		
		public function __construct() {
			$this->load->database();
			parent::__construct();
		}
		
		function get_records() {
			$query = $this->db->get("tbl_data");
			return $query->result();
		}
		
		function add_record($data) {
			$this->db->insert('tbl_data',$data);
			return;
		}
		function update_record($data) {
			$this->db->where('id',14);
			$this->db->update('tbl_data',$data);
		}
		function delete_record() {
			$this->db->where('id',$this->uri->segment(3));
			$this->db->delete('tbl_data');
		}
		
	}
?>