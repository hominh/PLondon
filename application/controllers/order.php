<?php
header('Content-Type: text/html; charset=utf-8');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once (APPPATH . 'controllers/application.php');
class Order extends Appilcation {
    protected $_data;
    public function __construct() {
        parent::__construct();
        $this->load->library('nhanhservice');
      
        
        
    }
    
   public function add() {

$string = preg_replace('!s:(\d+):"(.*?)";!se', "'s:'.strlen('$2').':\"$2\";'", $this->input->post("products_cart"));

        date_default_timezone_set('Asia/Jakarta');
        $service = new NhanhService();
        //var_dump($this->input->post("products_cart"));
        $arr_data = unserialize($string);
        
        $arr_data = array_values($arr_data);
        $data = array();
        $arr_keys = array();
        $qty = $this->input->post('qty');
        $arr_qty = explode("-", $qty);
        $arr_qtynew = array();
        $arr_description = array();
        $arr_code = array();
        $arr_importPrice = array();
        for($i = 0; $i < (count($arr_qty) - 1); $i++) {
            array_push($arr_qtynew, trim($arr_qty[$i]));
        }
        /*$address = $this->input->post("diachi");
        $arr_address = explode(",", $address);
        $city = $arr_address[2];
        $district = $arr_address[1];
        $addresss = $arr_address[0];*/
        
        $idNhanh = $this->input->post('idNhanh');
        $trafficSource = null;
        $accessDevice = null;
        $depotId = null;
        $status = "New";
        $moneyTransfer = null;
        $paymentId = null;
        $paymentMethod = "COD";
        $paymentGateway = "Ngân Lượng";
        $paymentCode = null;
        $carrierId = null;
        $carrierServiceId = null;
        $codFee = null;
        $shipFeeBy = null;
        $shipFee = null;
        $customerShipFee = null;
        
        $now = new DateTime();
        $date = $now->format('Y-m-d');
        
        
        
        $deliveryDate = $date;
        $description = "Giao hàng trong giờ hành chính";
        $autoSend = null;
        $fromName = $this->input->post('name');
        $fromEmail = $this->input->post('email');
        $fromAddress = $this->input->post('diachi');
        $fromMobile = $this->input->post('sodt');
        $fromCityName = null;
        $fromDistrictName = null;
        $weight = null;
        $width = null;
        $height = null;
        $length = null;
        $createdDateTime = $now->format('Y-m-d H:i:s');
        $customerName = $this->input->post('name');
        $customerMobile = $this->input->post('sodt');
        $customerEmail = $this->input->post('email');
        $customerCityName = $this->input->post('diachi');
        $customerDistrictName = '';
        $customerAddress = '';
        $maxid = 0;
        $arr_descriptionkh = "";
        $user_data = $this->session->userdata('cus_log');
        for($i = 0; $i < count($user_data); $i++) {
            $arr_descriptionkh.= $user_data[$i]." -";
        }
        $arr_descriptionkh.=$description;
        $row = $this->db->query('SELECT MAX(id) AS `maxid` FROM `order`')->row();
        if ($row) {
            $maxid = $row->maxid; 
        }
        $id = $maxid + 1;
        
        
        array_push($arr_keys, array_keys($arr_data));
        for($i = 0; $i < count($arr_data); $i++) {
            $arr_data[$i]['quantity'] = $arr_qtynew[$i];
            $arr_data[$i]['description'] = $arr_data[$i]['option']['description'];
            $arr_data[$i]['code'] = $arr_data[$i]['option']['code'];
            $arr_data[$i]['importPrice'] = $arr_data[$i]['option']['importPrice'];
            unset($arr_data[$i]['option']);
            unset($arr_data[$i]['rowid']);
            
        }
        $productList = $arr_data;
        $data['id'] = $id;
        $data['trafficSource'] = $trafficSource;
        $data['accessDevice'] = $accessDevice;
        $data['depotId'] = $depotId;
        $data['status'] = $status;
        $data['moneyTransfer'] = $moneyTransfer;
        $data['paymentId'] = $paymentId;
        $data['paymentMethod'] = $paymentMethod;
        $data['paymentGateway'] = $paymentGateway;
        $data['paymentCode'] = $paymentCode;
        $data['carrierId'] = $carrierId;
        $data['carrierServiceId'] = $carrierServiceId;
        $data['codFee'] = $codFee;
        $data['shipFeeBy'] = $shipFeeBy;
        $data['shipFee'] = $shipFee;
        $data['customerShipFee'] = $customerShipFee;$accessDevice;
        $data['deliveryDate'] = $deliveryDate;
        $data['description'] = $arr_descriptionkh;
        $data['autoSend'] = $autoSend;
        $data['fromName'] = $fromName;
        $data['fromEmail'] = $fromEmail;
        $data['fromAddress'] = $fromAddress;
        $data['fromMobile'] = $fromMobile;
        $data['fromCityName'] = $fromCityName;
        $data['fromDistrictName'] = $fromDistrictName;
        $data['weight'] = $weight;
        $data['width'] = $width;
        $data['height'] = $height;
        $data['length'] = $length;
        $data['createdDateTime'] = $createdDateTime;
        $data['customerName'] = $customerName;
        $data['customerMobile'] = $customerMobile;
        $data['customerEmail'] = $customerEmail;
        $data['customerCityName'] = $this->input->post("city");
        $data['customerDistrictName'] = $this->input->post("quan");
        $data['customerAddress'] = $this->input->post("add");

        $data['productList'] = $productList;
        $productList['subtotal'] = $productList['quantity'] * $productList['price'];
        //echo "<pre>";
        //print_r($data['productList']);
        //print_r($data);
        //echo "<pre>";
        

        /*$storeId = null;
        $response = $service->sendRequest(NhanhService::URI_ORDER_ADD, $data, $storeId);
        if($response->code) {
            $update_id = array("id"=>$id);
            
            $this->db->where("id", $maxid);
            $this->db->update("order", $update_id);
            echo "<script>alert('Bạn đã gửi đơn hàng thành công, chúng tôi sẽ liên lạc lại với bạn'); location.href='http://poshlondon.com.vn/products/cart';</script>";
            //echo "thanh cong";
            
        } else {
            echo "<script>alert('Gửi đơn hàng thất bại, vui lòng điền đầy đủ thông tin'); location.href='http://poshlondon.com.vn/products/cart';</script>";
        }*/
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'minhhh12@gmail.com', // change it to yours
            'smtp_pass' => 'emyeuanh1211', // change it to yours
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE
        );

        $message = "<b>THÔNG TIN KHÁCH HÀNG</b>"; //Noi dung
        $message.="<br />";
        $message.="- Họ tên: ".$customerName;
        $message.="<br />";
        $message.="- Số điện thoại: ".$customerMobile;
        $message.="<br />";
        $message.="- Email: ".$customerEmail;
        $message.="<br />";
        $message.="- Địa chỉ: ".$data['customerAddress'].", ".$data['customerDistrictName'].", ".$data['customerCityName'];
        $message.="<br />";
        $message.="<b>THÔNG TIN ĐƠN HÀNG</b>";
        $message.="<br />";
        $message.= "<table style='width: 80%' >";
        $message.="<tr>";
        $message.="<th>";
        $message.="STT";
        $message.="</th>";
        $message.="<th>";
        $message.="Sản phẩm";
        $message.="</th>";
        $message.="<th>";
        $message.="Số lượng";
        $message.="</th>";
        $message.="<th>";
        $message.="Thành tiền";
        $message.="</th>";
        $message.="</tr>";
        for($i = 0; $i < count($data['productList']); $i++) {
            $total = $data['productList'][$i]['quantity'] * $data['productList'][$i]['subtotal'];
            $j = $i + 1;
            $message.="<tr>";
            $message.="<td>";
            $message.=$j;
            $message.="</td>";
            $message.="<td>";
            $message.=$data['productList'][$i]['name'];
            $message.="</td>";
            $message.="<td>";
            $message.=$data['productList'][$i]['quantity'];
            $message.="</td>";
            $message.="<td>";
            $message.= number_format($total,3);
            $message.="</td>";
            $message.="</tr>";
        }
        $message.= "</table>";
        //$message.= $customerName;

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('minhhh12@gmail.com'); // change it to yours
        $this->email->to('info@poshlondon.vn');// change it to yours
        $this->email->subject('Đơn hàng - Poshlondon.vn');
        $this->email->message($message);
        if($this->email->send())
        {
            $this->db->where("id", $maxid);
            $this->db->update("order", $update_id);
            echo "<script>alert('Bạn đã gửi đơn hàng thành công, chúng tôi sẽ liên lạc lại với bạn'); location.href='http://poshlondon.vn/products/cart';</script>";
        }
        else
        {
           // echo "<script>alert('Gửi đơn hàng thất bại, vui lòng điền đầy đủ thông tin'); location.href='http://poshlondon.vn/products/cart';</script>";
            echo $this->email->print_debugger();
        }
    }
    public function index() {
       $this->_data['dichvu'] = $this->dichvu_model->getList();
       $this->_data['categorypublic'] = $this->getCategory();
       $this->_data['title'] = "Dịch vụ POSH LONDON";
       $this->_data['carts'] = $this->getCountOfCart();
       $this->load->view('frontend/partials/navbar', $this->_data);
       
       $this->load->view('pages/dichvu',  $this->_data);
       $this->load->view('frontend/partials/footer');
    }
    public function detail($id) {

        //$data['title'] = ucfirst($page);
        $arr = array();
        $_data['dichvu'] = $this->dichvu_model->get_gioithieuById($id);
        $arr = $_data['dichvu'];
        $arr = (object) $arr;

        $page = $arr->name;
        $this->_data['title'] = ucfirst($page); // Capitalize the first letter
        /* $this->load->view('templates/header', $data);
          $this->load->view('pages/gioithieu', $data);
          $this->load->view('templates/footer'); */
        $this->_data['categorypublic'] = $this->getCategory();
       
        $this->load->view('frontend/partials/navbar', $this->_data);
        //$this->load->view('frontend/layout/master', $this->_data);
        $this->load->view('pages/dichvu', $_data);

        $this->load->view('frontend/partials/footer');
    }

}

