<?php

    class Users_model extends CI_Model {

        protected $_table = 'tbl_user';
        
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

       public function deleteUser($id) {
            $this->db->where('id', $id);
            $this->db->delete($this->_table);
       }
       
       public function checkUsername($user){
            $this->db->where('username',$user);
            $query=$this->db->get($this->_table);
            if($query->num_rows() > 0){
                return FALSE;
            }else{
                return TRUE;
            }
        }
        
        public function checkEmail($email){
            $this->db->where('email',$email);
            $query=$this->db->get($this->_table);
            if($query->num_rows() > 0){
                return FALSE;
            }else{
                return TRUE;
            }
        }
        
        public function insertUser($data_insert){
            $this->db->insert($this->_table,$data_insert);
        }
        
        public function getUserById($id){
            $this->db->where("id", $id);
            return $this->db->get($this->_table)->row_array();
        }
       
        public function updateUser($data_update, $id){
            $this->db->where("id", $id);
            $this->db->update($this->_table, $data_update);
        }
        
        function login($username, $password) {
            $this -> db -> select('id, username, password');
            $this -> db -> from($this->_table);
            $this -> db -> where('username', $username);
            $this -> db -> where('password', $password);
            $this -> db -> limit(1);
            $query = $this->db->get();
            if($query->num_rows() == 1) {
                return $query->result();
            }
            else {
                return false;
            }
            
        }
    }
?>

