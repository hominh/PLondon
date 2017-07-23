<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once (APPPATH . 'controllers/application.php');

class Products extends Appilcation {
    protected $_data;
    public function __construct() {
        parent::__construct();
        $this->load->model('products_model');
        $this->load->model('config_model');
        $this->load->model('images_model');
        $this->load->library('cart');
        $this->load->helper("money");
        $this->load->helper("slug");
        $this->cart->product_name_rules .=  "\pL";
        $this->cart->product_name_rules .=  "\"\'"; 

    }
    
    public function detail($slug) {
        //$this->load->helper('library');
        //$this->load->helper('breadcrumb');
        $this->load->model('slides_model');
        $this->load->model('dichvu_model');
        $arr = array();
        $categoryname = "";
        $items = $this->products_model->getProductBySlug($slug);
        $itemImages = $this->images_model->getByProductId($items['id']);
        $descriptioncdld = $items['description'];
        $arrdescriptioncdld = explode("|", $descriptioncdld);
        $arrcdld = explode("*", $arrdescriptioncdld[1]);
       
        $items['description2'] = $arrdescriptioncdld[0];
        $items['chidinh'] = $arrcdld[0];
        $items['lieudung'] = $arrcdld[1];
        if($items['categoryId'] == 53746) {
            $categoryname.= "Các sản phẩm cho mẹ";
        }
        if($items['categoryId'] == 53747) {
            $categoryname.= "Các sản phẩm cho trẻ em và thanh thiếu niên";
        }
        if($items['categoryId'] == 53748) {
            $categoryname.= "Sản phẩm làm đẹp";
        }
        if($items['categoryId'] == 53733) {
            $categoryname.= "Sản phẩm chăm sóc sức khỏe";
        }
        if($items['categoryId'] == 53734) {
            $categoryname.= "Hỗ trợ tim mạch";
        }
        if($items['categoryId'] == 53735) {
            $categoryname.= "Hỗ trợ hệ thần kinh";   
        }
        if($items['categoryId'] == 53743) {
            $categoryname.= "Hỗ trợ thị giác";
        }
        if($items['categoryId'] == 53744) {
            $categoryname.= "Hỗ trợ các chức năng khác";
        }
        if($items['categoryId'] == 53736) {
            $categoryname.= "Hỗ trợ gan";
        }
        if($items['categoryId'] == 53737) {
            $categoryname.= "Hỗ trợ hệ xương khớp";
        }
        if($items['categoryId'] == 53738) {
            $categoryname.= "Hỗ trợ bệnh nhân tiểu đường";
        }
        if($items['categoryId'] == 53739) {
            $categoryname.= "Hỗ trợ phụ nữ mãn kinh";
        }
        if($items['categoryId'] == 53740) {
            $categoryname.= "Hỗ trợ phụ nữ mang thai";
        }   
        if($items['categoryId'] == 53741) {
            $categoryname.= "Bổ sung vitamin";
        }
        if($items['categoryId'] == 53742) {
            $categoryname.= "Hỗ trợ người thiếu máu";
        }
        if($items['categoryId'] == 80507) {
            $categoryname.= "Hỗ trợ dành cho nam giới";
        }
        if($items['categoryId'] == 80506) {
            $categoryname.= "Hỗ trợ dành cho phụ nữ";
        }
        $items['categoryname'] = $categoryname;
        $items['category'] = create_slug($categoryname);
        //$page = $arr->name;
       
        if(count($items) > 0) {
            $_data['products'] = $items;
            $_data['images'] = $itemImages;
            $arr = $_data['products'];
            $arr = (object) $arr;
            
            $page = $arr->name;


            $_data['config'] = $this->config_model->getList();
            $arrcf = $_data['config'];
            $meta_description = $items['descriptionforsale'];
            $meta_keyword = $items['keyword'];
            
            $this->_data['title'] = ucfirst($page);
            $this->_data['categorypublic'] = $this->getCategory();
            $this->_data['carts'] = $this->getCountOfCart();
            $this->_data['slides'] = $this->slides_model->getList();
            $this->_data['dichvu'] = $this->dichvu_model->getList();
            $this->_data['productsbestsale'] = $this->products_model->productsbestsale();
            $this->_data['meta_keyword'] = $meta_keyword;
            $this->_data['meta_description'] = $meta_description;
            $this->load->view('frontend/partials/navbar', $this->_data);
            $this->load->view('frontend/layout/master', $this->_data);
            $this->load->view('pages/product', $_data);
            
            $this->load->view('frontend/partials/footer');
        }
        else{
            $_data['products'] = "";
        }
        
    }
       public function add_cart(){
       
        
        /*$insert_data = array(
            'id' => $this->input->post('idNhanh'),
            'name' => $this->input->post('name'),
            'price' => $this->input->post('price'),
            'qty' => 1
        );*/
        $page = "Giỏ hàng của bạn";
        if($this->cart->contents()) {
            $insert_data = array(
             array ('id'    => $this->input->post('id'),
                    'idNhanh'  => $this->input->post('idNhanh'),
                       'qty'   => 1,
                       'price' => $this->input->post('price'),  
                       'name' => $this->input->post('name'),
                       'option' => array('image'=>$this->input->post('image'),'code'=>$this->input->post('code'),'importPrice'=>$this->input->post('importPrice'))
                 )
                      
            );
            $this->cart->insert($insert_data);
        }
        else {
            $insert_data = array(
             array ('id'    => $this->input->post('id'),
                    'idNhanh'  => $this->input->post('idNhanh'),
                       'qty'   => 1,
                       'price' => $this->input->post('price'),  
                       'name' => $this->input->post('name'),
                       'option' => array('image'=>$this->input->post('image'),'code'=>$this->input->post('code'),'importPrice'=>$this->input->post('importPrice'))
                 )
                      
            );
            $this->cart->insert($insert_data);
        }
         
        $item_carts = $this->cart->contents();
        $this->_data['products_cart'] = $item_carts;
     
        $this->_data['title'] = ucfirst($page);
            header('Location: ' . $_SERVER['HTTP_REFERER']);
          
            
            

            
            
           
       
    }
     public function cart(){
        $page = "Giỏ hàng của bạn";
        if($this->cart->contents()) {
            $insert_data = array(
             array ('id'    => $this->input->post('id'),
                    'idNhanh'  => $this->input->post('idNhanh'),
                       'qty'   => 1,
                       'price' => $this->input->post('price'),  
                       'name' => $this->input->post('name'),
                       'option' => array('image'=>$this->input->post('image'),'code'=>$this->input->post('code'),'importPrice'=>$this->input->post('importPrice'))
                 )
                      
            );
            $this->cart->insert($insert_data);
        }
        else {
            $insert_data = array(
             array ('id'    => $this->input->post('id'),
                    'idNhanh'  => $this->input->post('idNhanh'),
                       'qty'   => 1,
                       'price' => $this->input->post('price'),  
                       'name' => $this->input->post('name'),
                       'option' => array('image'=>$this->input->post('image'),'code'=>$this->input->post('code'),'importPrice'=>$this->input->post('importPrice'))
                 )
                      
            );
            $this->cart->insert($insert_data);
        }
         
        $item_carts = $this->cart->contents();
        $this->_data['products_cart'] = $item_carts;
     
        $this->_data['title'] = ucfirst($page);
            $this->_data['categorypublic'] = $this->getCategory();
            $this->_data['carts'] = $this->getCountOfCart();
            $this->load->view('frontend/partials/navbar', $this->_data);
            $this->load->view('frontend/partials/banner_muahang', $this->_data);
            $this->load->view('pages/cart',$this->_data);

            $this->load->view('frontend/partials/footer');
    }
    function remove_cart($rowid) {
        if ($rowid === "all") {
            $this->cart->destroy();
        } else {
            $data = array(
                'rowid' => $rowid,
                'qty' => 0
            );
            $this->cart->update($data);
        }
        redirect(site_url('products/cart'));
    }
    function search() {
        $this->_data['categorypublic'] = $this->getCategory();
        $this->_data['carts'] = $this->getCountOfCart();
        
        $this->_data['title'] = ucfirst("Tìm kiếm sản phẩm | PoshLondon");
        
        $this->load->view('frontend/partials/navbar', $this->_data);
        $this->load->view('frontend/partials/banner_muahang', $this->_data);
        $this->load->view('pages/product_search',$this->_data);
        $this->load->view('frontend/partials/footer');
    }
    
    public function productsbestsale() {
        //$this->_data['productsbestsale'] = $this->productsbestsale();
    }


    function s() {
        $this->load->model('slides_model');
        $this->_data['slides'] = $this->slides_model->getList();
        $this->_data['categorypublic'] = $this->getCategory();
        $this->_data['carts'] = $this->getCountOfCart();
        
        $this->_data['title'] = ucfirst("Tìm kiếm sản phẩm | PoshLondon");
        $name = $this->input->post("name");
        $_data['products'] = $this->products_model->searchProduct($name);
        $this->load->view('frontend/partials/navbar', $this->_data);
        $this->load->view('frontend/layout/master', $this->_data);
        $this->load->view('pages/product_searchrs',$_data);
        $this->load->view('frontend/partials/footer');
    }
    function update_cart()
        {
            $cart_info = $_POST['cart'] ;
            foreach( $cart_info as $id => $cart)
                {
                    $rowid = $cart['rowid'];
                    $price = $cart['price'];
                    $amount = $price * $cart['qty'];
                    $qty = $cart['qty'];
                    
                    $data = array(
                    'rowid' => $rowid,
                    'price' => $price,
                    'amount' => $amount,
                    'qty' => $qty
                    );       
                    $this->cart->update($data);
                }
           redirect('http://localhost:8000/plondon/order/add');
        }
        
        

}

