<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Images_model extends CI_Model {
    protected $_table = 'images';
    
    public function __construct() { 
        $this->load->database();
        parent::__construct();
    }
    public function getListByDistrict($district) {
        $this->db->select('*');
        $this->db->from($this->_table);   
        $this->db->where('district', $district); 

        $query = $this->db->get();

        if ($query->num_rows() > 0){
        return $query->result();
        }
        else {
        return false;
        }
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
    public function insert($data_insert,$product_id) {
        $this->db->insert($this->_table, $data_insert);
    }
    public function getById($product_id) {
        $this->db->select('a.*,a.id as idproduct,b.*')
                ->from('products as a')
                ->join('images as b','a.id = b.product_id','LEFT');
        $this->db->where('a.id',$product_id);                   
            $query = $this->db->get();
            return $query->result();
    }
    public function getByProductId($product_id) {
        $query = $this->db->get_where($this->_table, array('product_id' => $product_id));
        return $query->result();
    }
    public function get_gioithieuById($slug) {
        $query = $this->db->get_where($this->_table, array('slug' => $slug));
        return $query->row_array();
    }
    public function update($data_update, $id) {
        $this->db->where("id", $id);
        $this->db->update($this->_table, $data_update);
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
        
}