<?php

class Gioithieus_model extends CI_Model {

    protected $_table = 'gioithieu';

    public function __construct() {
        
        $this->load->database();
        parent::__construct();
    }
    
    public function get3inhome() {
        $query = $this->db->get($this->_table)->order_by('id','DESC')->limit('3');
        return $query->result();
    }
    public function getListQuantri() {
        $query = $this->db->get($this->_table);
        return $query->result();
    }
    public function getList() {
        //$query = $this->db->get($this->_table);
        //return $query->result();
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where('showhome','1');
        $this->db->order_by('id', 'ASC');
        $this->db->limit('6');
        $query = $this->db->get();
        return $query->result();
    }

    public function countAll() {
        return $this->db->count_all($this->_table);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete($this->_table);
    }

    public function checkName($new) {
        $this->db->where('name', $new);
        $query = $this->db->get($this->_table);
        if ($query->num_rows() > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function insert($data_insert) {
        $this->db->insert($this->_table, $data_insert);
    }

    public function getById($id) {
        $this->db->where("id", $id);
        return $this->db->get($this->_table)->row_array();
    }
    
    public function get_gioithieuById($slug) {
        $query = $this->db->get_where($this->_table, array('slug' => $slug));
        return $query->row_array();
    }

    public function update($data_update, $id) {
        $this->db->where("id", $id);
        $this->db->update($this->_table, $data_update);
    }

    public function getGioithieuFooter() {
        //$query = $this->db->get($this->_table)->order_by('id','DESC')->limit('3');
        //return $query->result();
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->order_by('id', 'DESC');
        $this->db->limit('1');
        $query = $this->db->get();
        return $query->result();
    }

}

?>