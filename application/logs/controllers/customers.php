<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once (APPPATH . 'controllers/application.php');
class Customers extends Appilcation {
    protected $_data;
    public function __construct() {
        parent::__construct();
        $this->load->model('customers_model');
    }
}