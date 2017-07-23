<?php
	class Djs_model extends CI_Model {
		protected $_table = 'tbl_djs';
		
		public function __construct() {
			$this->load->database();
			parent::__construct();
		}
		
		public function getList() {
			$query = $this->db->get($this->_table);
			return $query->result();
		}
		
		public function countAll() {
			return $this->db->count_all($this->_table);
		}
		
		public function delete($id) {
			$this->db->where('id', $id);
			$this->db->delete($this->_table);
		}
		
		public function checkName($new){
			$this->db->where('name',$new);
			$query=$this->db->get($this->_table);
			if($query->num_rows() > 0){
				return FALSE;
			}else{
				return TRUE;
			}
		}
		
		public function insert($data_insert){
			$this->db->insert($this->_table,$data_insert);
		}
		
		public function getById($id){
			$this->db->where("id", $id);
			return $this->db->get($this->_table)->row_array();
		}
		
		
		public function update($data_update, $id){
			$this->db->where("id", $id);
			$this->db->update($this->_table, $data_update);
		}
	}
?>