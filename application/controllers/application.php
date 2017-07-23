<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Appilcation extends CI_Controller {

    protected $_data = array();

    function __construct() {
        parent::__construct();
        $this->load->helper("slug");
        $this->load->library("cart");

        //$this->load->model(array('categoriesnews_model','mconfig','mnews'));
        //Get category of new
        $this->load->model(array('categories_model','dichvu_model','gioithieus_model','config_model','categoryfooter_model','categorypost_model'));
        $this->_data['dichvu'] = $this->dichvu_model->getList();
        $this->_data['dichvuinfooter'] = $this->gioithieus_model->getGioithieuFooter();
        $this->_data['configs'] = $this->config_model->getList();
        $this->_data['dichvu'] = $this->dichvu_model->getList();
        $this->_data['categoryfooter'] = $this->categoryfooter_model->getList();
        $this->_data['categorypost'] = $this->categorypost_model->getListParent();
        $this->_data['menu']   = $this->get_category();
        //Get Slide
    }
    public function getCategory() {
        $c = $this->categories_model->getList();
        
        for ($i = 0; $i < count($c); $i++) {
            if (property_exists($c[$i], 'childs')) {
                $c[$i]->slug = create_slug($c[$i]->name);
                
                for ($j = 0; $j < count($c[$i]->childs); $j++) {
                    
                    //$temp[] = (object) array('slug' => 'My name');
                    
                    $c[$i]->childs[$j]->slug = create_slug($c[$i]->childs[$j]->name);
                    
                    
                }
                
            }
            else {
                $c[$i]->slug = create_slug($c[$i]->name);
            }
        }
        
        return $c;
    }
    
    function get_category()
    {
        $str = "";
        $this->load->model('categories_model');
        $categorys  =   $this->categories_model->get_category();
        $str .= "<ul class='nav stone navbar-nav parent'>";
        foreach ($categorys as $category)
        { 
            $url = site_url('categories/detail/'.$category->slug);
            $str .= "<li class='dropdown'>";
            $str .= "<a href='$url'>".$category->name."</a>";
            $str .= $this->get_subcategory($category->id,$i = 0);
            $str .= "</li>";
           
        }
        
        return $str;
    }
    function get_subcategory($category_ids,$i = 0)
    {
        $str = "";
        $sub_categorys  =   $this->categories_model->get_subcategory($category_ids);
        //kiem tra get subcategory co ton ai hay
        if($sub_categorys){
           $str .= "<ul class='dropdown-menu five' role='menu'>";
                foreach ($sub_categorys as $sub_category)
                {
                    $url = site_url('categories/detail/'.$sub_category->slug);
                    //kiem tra con parent hay ko
                    $str .= "<li class='".$this->check_parent_menu($sub_category->category_id)."'>";
                    $str .= "<a href='$url'>".$sub_category->name."</a>";
                    if($sub_category->id)
                    {
                        $str .= $this->get_subcategory($sub_category->id,$i++);
                    }
                    $str .= "</li>";

                }
           $str .= "</ul>";
        }
        return $str;
    }
    function check_parent_menu($category_id)
    {
        $this->load->model('categories_model');
        if($this->categories_model->get_subcategory($category_id)){
            $str = "has-sub";
        }else{
            $str = "last";
        }
        return $str;
    }
    
    public function getCountOfCart() {
        $count = count($this->cart->contents());
        return $count;
    }
    
    public function getDichvuinhome() {
        $gioithieu = $this->dichvu_model->getList();
        return $gioithieu;
    }
    public function login() {
            $logged = $this->session->userdata('customer_logged_in');
            if ($logged) {
                $url = 1;
            } else {
                $url = 0;
            }
        }
    

}

?>
