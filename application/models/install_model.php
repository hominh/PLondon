<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    class Install_model extends CI_Model {
        public function __construct() {
            parent::__construct();
            $this->load->database();
            $this->load->library('nhanhservice');
        }
        public function getCategoryProduct() {
             $service = new NhanhService();
             $id = 0;
             $storeId = null;
             $response = $service->sendRequest(NhanhService::URI_GET_CATEGORY,$id,$storeId);
             $arr_items = array();
             array_push($arr_items, $response);
             return $arr_items;
        }

        public function getProductPublic() {
            $service = new NhanhService();
            $dataSearch1 = array(
		'categoryId'	=> 53734,
		'icpp'          =>	50
            );
            $dataSearch2 = array(
		'categoryId'	=> 53735,
		'icpp'          =>  50
            );
            $dataSearch3 = array(
		'categoryId'	=> 53736,
		'icpp'          =>  50
            );
            $dataSearch4 = array(
		'categoryId'	=> 53737,
		'icpp'          =>  50
            );
            $dataSearch5 = array(
		'categoryId'	=> 53738,
		'icpp'          =>  50
            );
            $dataSearch6 = array(
		'categoryId'	=> 53739,
		'icpp'          =>  50
            );
            $dataSearch7 = array(
		'categoryId'	=> 53740,
		'icpp'          =>  50
            );
            $dataSearch8 = array(
		'categoryId'	=> 53741,
		'icpp'          =>  50
            );
            $dataSearch9 = array(
		'categoryId'	=> 53742,
		'icpp'          =>  50
            );
            $dataSearch10 = array(
		'categoryId'	=> 53743,
		'icpp'          =>  50
            );
            $dataSearch11 = array(
		'categoryId'	=> 53744,
		'icpp'          =>  50
            );
            $dataSearch12 = array(
		'categoryId'	=> 53746,
		'icpp'          =>  50
            );
            $dataSearch13 = array(
		'categoryId'	=> 53747,
		'icpp'          =>  50
            );
            $dataSearch14 = array(
        		'categoryId'	=> 53748,
        		'icpp'          =>  50
            );
            $dataSearch15 = array(
                'categoryId'    =>  80506,
                '   80506'      => 50
            );
            $dataSearch16 = array(
                'categoryId'    =>  80507,
                '   80506'      => 50
            );

            $arr_items = array();
            
            
            
            $response1 = $service->sendRequest(NhanhService::URI_PRODUCT_SEARCH, $dataSearch1);
            $response2 = $service->sendRequest(NhanhService::URI_PRODUCT_SEARCH, $dataSearch2);
            $response3 = $service->sendRequest(NhanhService::URI_PRODUCT_SEARCH, $dataSearch3);
            $response4 = $service->sendRequest(NhanhService::URI_PRODUCT_SEARCH, $dataSearch4);
            $response5 = $service->sendRequest(NhanhService::URI_PRODUCT_SEARCH, $dataSearch5);
            $response6 = $service->sendRequest(NhanhService::URI_PRODUCT_SEARCH, $dataSearch6);
            $response7 = $service->sendRequest(NhanhService::URI_PRODUCT_SEARCH, $dataSearch7);
            $response8 = $service->sendRequest(NhanhService::URI_PRODUCT_SEARCH, $dataSearch8);
            $response9 = $service->sendRequest(NhanhService::URI_PRODUCT_SEARCH, $dataSearch9);
            $response10 = $service->sendRequest(NhanhService::URI_PRODUCT_SEARCH, $dataSearch10);
            $response11 = $service->sendRequest(NhanhService::URI_PRODUCT_SEARCH, $dataSearch11);
            $response12 = $service->sendRequest(NhanhService::URI_PRODUCT_SEARCH, $dataSearch12);
            $response13 = $service->sendRequest(NhanhService::URI_PRODUCT_SEARCH, $dataSearch13);
            $response14 = $service->sendRequest(NhanhService::URI_PRODUCT_SEARCH, $dataSearch14);
            $response15 = $service->sendRequest(NhanhService::URI_PRODUCT_SEARCH, $dataSearch15);
            $response16 = $service->sendRequest(NhanhService::URI_PRODUCT_SEARCH, $dataSearch16);

            array_push($arr_items, $response1);
            array_push($arr_items, $response2);
            array_push($arr_items, $response3);
            array_push($arr_items, $response4);
            array_push($arr_items, $response5);
            array_push($arr_items, $response6);
            array_push($arr_items, $response7);
            array_push($arr_items, $response8);
            array_push($arr_items, $response9);
            array_push($arr_items, $response10);
            array_push($arr_items, $response11);
            array_push($arr_items, $response12);
            array_push($arr_items, $response13);
            array_push($arr_items, $response14);
            array_push($arr_items, $response15);
            array_push($arr_items, $response16);
            return $arr_items;
            
        }
        
        
    }
