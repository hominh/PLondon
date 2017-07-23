<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    class Products_model extends CI_Model {
        protected $_table = 'products';
        public function __construct() {
            parent::__construct();
            $this->load->database();
            
            //$this->load->library('nhanhservice');
        }
        

        public function getList($limit, $start) {
            //$this->db->limit($limit, $start);
            $this->db->select('a.*,b.name as namecategory,b.id as idcategory')
                ->from('products as a')
                ->join('categoryproduct as b','a.categoryId = b.id','INNER');
            $this->db->limit($limit, $start);   
            $query = $this->db->get();
            return $query->result();
        }

        public function countAll() {
            return $this->db->count_all($this->_table);
        }


        public function getProductBySlug($slug) {
            $status = "Active";
             $this->db->select('a.*,b.name as namecategory,b.id as idcategory')
                ->from('products as a')
                ->join('categoryproduct as b','a.categoryId = b.id','INNER');
            
             $query = $this->db->get_where($this->_table, array('a.slug' => $slug));
            //return $query->result();
           
            //$query = $this->db->get_where($this->_table,array('idNhanh'=>$idNhanh));
            //var_dump($query);
            //echo $idNhanh;
            return $query->row_array();
            
            /*$service = new NhanhService();
            $storeId = null;
            $response = $service->sendRequest(NhanhService::URI_GET_PRODUCT, $id, $storeId);

            if($response->code) {
                return $response;
            }
            else {
                
            }*/
            
        }
        public function searchProduct($name) {
            $status = "Active";
            $this->db->like('name', $name);
            $this->db->where('status',$status);
            

            $query = $this->db->get($this->_table);

            return $query->result();
        }
        public function productsbestsale() {
            $query = $this->db->query("SELECT name,price,slug,image FROM products WHERE image != '' AND status = 'Active' ORDER BY available DESC LIMIT 6");
            return $query->result();
        }
        public function getById($id) {
            $this->db->where("id", $id);
            return $this->db->get($this->_table)->row_array();
        }

        public function update($data_update, $id) {
            $this->db->where("id", $id);
            $this->db->update($this->_table, $data_update);
        }
        public function insert($data_insert) {
            $this->db->insert($this->_table, $data_insert);
        }
        public function delete($id) {
            $this->db->where('id', $id);
            $this->db->delete($this->_table);
        }
    }

