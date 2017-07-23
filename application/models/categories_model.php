<?php

class Categories_model extends CI_Model {
    protected $_table = 'products';
    public function __construct() {
        $this->load->database();
        parent::__construct();
        $this->load->library('nhanhservice');
    }

    public function getList() {
        /*$category_public = array();
        $service = new NhanhService();
        $categoryId = 0;
        $storeId = null;
        $response = $service->sendRequest(NhanhService::URI_GET_CATEGORY, $categoryId, $storeId);
        if ($response->code) {
            
            $categories = (array) $response->data;
            
            for($i = 0; $i < count($categories); $i++) {
                if($i == 2 || $i == 6 || $i == 7) {
                    array_push($category_public, $categories[$i]);
                }
            }
            

            
        } else {
            //echo "<h1>Failed!</h1>";
        }*/
        $id_parent = '!=0';
        $this->db->where("id_parent", $id_parent);
			return $this->db->get("categoryproduct")->result();
        
        //return $category_public;
    }

    function get_category($parent = 0)
    {
        $this->db->where('id_parent',$parent);
        $query = $this->db->get('categoryproduct');
        if($query->result())
        {
            return $query->result();
        }else{
            return FALSE;
        }
    }
    function get_subcategory($category_id)
    {
        $this->db->where('id_parent',$category_id);
        $query = $this->db->get('categoryproduct');
        if($query->result())
        {
            return $query->result();
        }else{
            return FALSE;
        }
        
    }

    public function getSubCategory($id_parent)
    {
        $this->db->where("id_parent", $id_parent);
			return $this->db->get("categoryproduct")->result();
        //return $query->result();
    }
    
    public function getProductByCategoryId($slug) {
        
        

    
        $where_array = array(
            'categoryId'=> $slug,
            'status'=> 'Active'
        );
        $query = $this->db->get_where($this->_table, $where_array);
        //$arr = (object) $arr;
        $arr = (object)$query->result();
        
        return $arr;
        
    }
    public function getProductByCategory($slug)
    {
        $this->db->select('a.*,b.name as namecategory,b.id as idcategory,b.slug as slugcategory,b.meta_keyword as kwcate,b.meta_description as descate')
                ->from('products as a')
                ->join('categoryproduct as b','a.categoryId = b.id','INNER');
            $this->db->where('b.slug',$slug);
            $query = $this->db->get();
            return $query->result();
    }

}

?>