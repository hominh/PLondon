<?php
header('Content-type: text/html; charset=utf-8');
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once (APPPATH . 'controllers/application.php');
class Customer extends Appilcation {
    protected $_data;
    public function __construct() {
        parent::__construct();
        $this->load->library('nhanhservice');
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
    }
    
    public function index() {
       $this->_data['categorypublic'] = $this->getCategory();
       $this->_data['title'] = "Đăng nhập POSH LONDON";
       $this->_data['carts'] = $this->getCountOfCart();
       $this->load->view('frontend/partials/navbar', $this->_data);
       
       $this->load->view('pages/login',  $this->_data);
       $this->load->view('frontend/partials/footer');
    }
    public function login() {
        $this->_data['categorypublic'] = $this->getCategory();
        $this->_data['title'] = "Đăng nhập POSH LONDON";
        $this->_data['carts'] = $this->getCountOfCart();
        $this->load->view('frontend/partials/navbar', $this->_data);

        $this->load->view('pages/login',  $this->_data);
        $this->load->view('frontend/partials/footer');
        
        
    }
    public function profile() {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        if($this->input->post('mobile') == "" || $this->input->post('mobile') == " " || $this->input->post('mobile') == NULL ) {
            
            
            $this->error();
        }
        else {
           
            
            if ($this->form_validation->run() == FALSE) {
               
                $this->error();
            }
            else {
                
                $service = new NhanhService();
                $storeId = null;
                $data = array(
                    "mobile" => $this->input->post("mobile")
                );
                $response = $service->sendRequest(NhanhService::URI_CUSTOMER_SEARCH, $data, $storeId);
                if($response->code) {
                    $arr_code = array();
                    $customers = $response->data;
                    foreach($customers as $item) {
                        foreach($item as $it) {
                            array_push($arr_code, $it->code);
                            array_push($arr_code, $it->level);
                            array_push($arr_code, $it->group);
                        }
                        
                    }
                    $this->session->set_userdata("cus_log",$arr_code);
                    $this->_data['profile'] = $customers;
                    $this->_data['categorypublic'] = $this->getCategory();
                    $this->_data['title'] = "Thông tin tài khoản";
                    $this->_data['carts'] = $this->getCountOfCart();
                    $this->load->view('frontend/partials/navbar', $this->_data);
                    $this->load->view('pages/profile', $this->_data);
                    $this->load->view('frontend/partials/footer');
                   
                }
                else {
                    $this->error();
                }
            }
            
        }
       
    }
    public function error() {
        $this->_data['categorypublic'] = $this->getCategory();
        $this->_data['title'] = "Đăng nhập POSH LONDON";
        $this->_data['carts'] = $this->getCountOfCart();
        $this->load->view('frontend/partials/navbar', $this->_data);
        $error = "Đăng nhập không thành công";
        $this->_data['error'] = $error;
        $this->load->view('pages/login', $this->_data);
        $this->load->view('frontend/partials/footer');
    }


    public function signup() {
        $this->_data['categorypublic'] = $this->getCategory();
        $this->_data['title'] = "Đăng kí nhận thẻ thành viên";
        $this->_data['carts'] = $this->getCountOfCart();
        $this->load->view('frontend/partials/navbar', $this->_data);

        $this->load->view('pages/signup',  $this->_data);
        $this->load->view('frontend/partials/footer');
        
    }
    public function handlesignup() {
        $this->load->model('customer_model');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        if($this->input->post('email') == "" || $this->input->post('email') == " " || $this->input->post('email') == NULL ) {
            $this->errorsignup();
        }
        else {
            if ($this->form_validation->run() == FALSE) {
                $this->errorsignup();
            }
            else {
                $pw = $this->input->post("pw");
                $repw = $this->input->post("repw");
                if($pw != $repw) {
                    $this->errorsignup();
                }
                else {
                    $data_insert = array(
                        "name" => $this->input->post("name"),
                        "email" => $this->input->post("email"),
                        "password" => $this->input->post('pw'),
                        "mobile" => $this->input->post('mobile'),
                        "birth" => $this->input->post('birth'),
                        "card" => $this->input->post('nhanthe')
                        
                    );

                    $this->customer_model->insert($data_insert);
                    //$this->session->set_flashdata("flash_mess", "Added");
                    $url_home = base_url();
                    echo "<SCRIPT type='text/javascript'> //not showing me this
                        alert('Đăng kí thành công');
                        window.location.replace('$url_home');
                    </SCRIPT>";
                    
                }
                
            }
        }
    }


    public function errorsignup() {
        $this->_data['categorypublic'] = $this->getCategory();
        $this->_data['title'] = "Đăng kí nhận thẻ thành viên";
        $this->_data['carts'] = $this->getCountOfCart();
        $this->load->view('frontend/partials/navbar', $this->_data);
        $error = "Đăng kí không thành công";
        $this->_data['error'] = $error;
        $this->load->view('pages/signup', $this->_data);
        $this->load->view('frontend/partials/footer');
    }
}