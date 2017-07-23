<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once (APPPATH . 'controllers/application.php');

class Home extends Appilcation {

    public function __construct() {
        parent::__construct();

      
    }

    protected $_datahome;

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * http://example.com/index.php/welcome
     * - or -
     * http://example.com/index.php/welcome/index
     * - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * 
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
        /* $this->load->view ( 'frontend/layout/master', $this->_data );

          $this->load->model ( 'news_model' );
          $this->load->model ('playlists_model');
          $this->_datahome ['infonew'] = $this->news_model->getList ();
          $this->_datahome ['infoplaylist'] = $this->playlists_model->getList ();
          $this->load->view ( 'frontend/home_view', $this->_datahome ); */
        //$page = "Poshlondon";

        $this->load->model('gioithieus_model');
        $this->load->model('config_model');
        $this->load->model('dichvu_model');
        $this->load->model('slides_model');
        $this->load->model('categories_model');
        $this->load->model('phuongcham_model');
        $this->load->model('nhanxet_model');
        $this->load->model('products_model');
        $this->load->model('categoryfooter_model');
        $this->load->model('config_model');
        $this->load->model('post_model');
        //$this->load->model('categorypost_model');
        $arr = array();
        $_data['config'] = $this->config_model->getList();
        $arr = $_data['config'];
        

        $page = $arr[0]->title;
        $meta_description = $arr[0]->description;
        $meta_keyword = $arr[0]->keyword;



        $this->_data['title'] = ucfirst($page);
        $this->_data['meta_keyword'] = $meta_keyword;
        $this->_data['meta_description'] = $meta_description;
        $this->_data['config'] = $this->config_model->getList();
        $this->_datahome['gioithieu'] = $this->gioithieus_model->getList();
        $this->_data['slides'] = $this->slides_model->getList();
        $this->_datahome['productsbestsale'] = $this->products_model->productsbestsale();
        $this->_datahome['dichvuinfooter'] = $this->gioithieus_model->getGioithieuFooter();
        $this->_datahome['categoryfooter'] = $this->categoryfooter_model->getList();
        //$this->_data['menu']   = $this->get_category();
        //$this->_data['menu'] = $this->getCategory();
         
        $this->_data['carts'] = $this->getCountOfCart();
        $this->_datahome['dichvu'] = $this->dichvu_model->getList();
        $this->_datahome['phuongcham'] = $this->phuongcham_model->getList();
        $this->_datahome['nhanxet'] = $this->nhanxet_model->getList();
        $this->_datahome['posts'] = $this->post_model->getListInHome();
        //$this->_data['categorypost'] = $this->categorypost_model->getList();
        $this->load->view('frontend/partials/navbar', $this->_data);
        $this->load->view('frontend/layout/master', $this->_data);
        $this->load->view('frontend/home_view', $this->_datahome);
        
        $this->load->view('frontend/partials/footer',$this->_datahome);
        
    }

    /*public function getSubCategory($id_parent)
    {
        $id_parent = 1;
        $result = $this->categories_model->getSubCategory($id_parent);
       
        return $result;
    }*/

    

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */