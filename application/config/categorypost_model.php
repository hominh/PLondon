<?php
	class Categorypost_model extends CI_Model {
		protected $_table = 'categorypost';
		
		public function __construct() {
			$this->load->database();
			parent::__construct();
		}
		public function getSubCategory(){
                        return $this->db->query("
     SELECT * FROM categorypost 
     WHERE id_parent!='0'
     ")->result();

		}
		public function getList() {
			$query = $this->db->get($this->_table);
			return $query->result();
		}
		public function getListParent() {
			$idParent = 0;
			$query = $this->db->get_where($this->_table, array('id_parent' => $idParent));
        	return $query->result();
		}
		public function getListBySlugParent($idParent) {
			
			$query = $this->db->get_where($this->_table, array('slug' => $idParent));
        	return $query->result();
		}

		public function getListByParentId($id) {
			$query = $this->db->get_where($this->_table, array('id' => $id));
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
		public function getByCategoryParentId($slug) {
        /*$this->db->select('post.*,categoryfooter.*')
            ->from($this->_table)
            ->join('categoryfooter','post.categoryfooter_id = categoryfooter.id')
            ->where('slug',$slug);
        $query = $this->db->get();*/
       		$query = $this->db->get_where($this->_table, array('slug_parent' => $slug));
        	return $query->result();
        	//echo $this->db->last_query();

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