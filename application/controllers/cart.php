<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once (APPPATH . 'controllers/application.php');
class cart extends Appilcation {
    protected $_data;
    public function __construct() {
        parent::__construct();
        $this->load->library('cart');
        
    }
    public function index() {
        $cart = $this->cart->contents();
        print_r($cart);
    }
}

