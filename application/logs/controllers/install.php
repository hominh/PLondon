<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
header('Content-Type: text/html; charset=utf-8');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    require_once (APPPATH . 'controllers/application.php');
    
    class Install extends Appilcation {
        public function __construct() {
            parent::__construct();
            $this->load->model('install_model');
            $this->load->helper("slug");
            $this->load->helper("striphtmltag");
        }
        public function installCategory() {
             $truncate = "TRUNCATE TABLE `products`";
        }
        public function sync() {
            $truncate = "TRUNCATE TABLE `products`";
            $this->db->query($truncate);
            $products = $this->install_model->getProductPublic();
            

            


            $object = (object) $products;
            $arr_name = array();
            $arr_idNhanh = array();
            $arr_parentId = array();
            $arr_merchantCategoryId = array();
            $arr_merchantProductId = array();
            $arr_categoryId = array();
            $arr_code = array();
            $arr_name = array();
            $arr_importPrice = array();
            $arr_price = array();
            $arr_wholesalePrice = array();
            $arr_image = array();
            $arr_images = array();
            $arr_status = array();
            $arr_previewLink = array();
            $arr_shippingWeight = array();
            $arr_width = array();
            $arr_length = array();
            $arr_height = array();
            $arr_vat = array();
            $arr_createdDateTime = array();
            $arr_remain = array();
            $arr_shipping = array();
            $arr_damaged = array();
            $arr_holding = array();
            $arr_available = array();
            $arr_advantages = array();
            $arr_description = array();
            $arr_content = array();
            $arr_slug = array();
            for($i = 0; $i < count($products); $i++) {
                
                if (property_exists($products[$i], 'data')) {
                    for($j = 0; $j < count($products[$i]->data); $j++) {
                        if (property_exists($products[$i]->data, 'products')) {
                            foreach($products[$i]->data->products as $it) {
                                //echo $it->name."<br />";
                                array_push($arr_name, $it->name);
                                array_push($arr_idNhanh, $it->idNhanh);
                                array_push($arr_parentId, $it->parentId);
                                array_push($arr_merchantCategoryId, $it->merchantCategoryId);
                                array_push($arr_merchantProductId, $it->merchantProductId);
                                array_push($arr_categoryId,$it->categoryId);
                                array_push($arr_code,$it->code);
                               
                                array_push($arr_importPrice, $it->importPrice);
                                array_push($arr_price,$it->price);
                                array_push($arr_wholesalePrice,$it->wholesalePrice);
                                array_push($arr_image, $it->image);
                                array_push($arr_images, $it->images);
                                array_push($arr_status,$it->status);
                                array_push($arr_previewLink, $it->previewLink);
                                array_push($arr_shippingWeight, $it->shippingWeight);
                                array_push($arr_width,$it->width);
                                array_push($arr_height,$it->height);
                                array_push($arr_length,$it->length);
                                array_push($arr_vat,$it->vat);
                                array_push($arr_createdDateTime,$it->createdDateTime);
                                array_push($arr_remain,$it->inventory->remain);
                                array_push($arr_shipping,$it->inventory->shipping);
                                array_push($arr_damaged,$it->inventory->damaged);
                                array_push($arr_holding,$it->inventory->holding);
                                array_push($arr_available,$it->inventory->available);
                                
                                //
                                if(isset($it->description)) {
                                     array_push($arr_description,stripHTMLtags($it->description));
                                }
                                else {
                                    array_push($arr_description,'');
                                }
                                if(isset($it->advantages)) {
                                     array_push($arr_advantages,$it->advantages);
                                }
                                 else {
                                    array_push($arr_advantages,'');
                                }
                                if(isset($it->content)) {
                                     array_push($arr_content,$it->content);
                                }
                                else {
                                    array_push($arr_content,'');
                                }
                                
                                
                               
                                
                                
                            }
                            
                        }
                    }
                }
            }
            
            $sql = array();
            $replaceStr1 = "'";
            $blank = "";
            for($i = 0; $i <count($arr_idNhanh); $i++) {
                $arr_content[$i] = str_replace("'", "", $arr_content[$i]);
                            $arrimg = "";
                            if(count($arr_images[$i]) > 0) {
                                for($j = 0; $j < count($arr_images[$i]); $j++) {
                                    $arrimg.= $arr_images[$i][$j]."-";
                                }
                            }
                            else {
                                $arrimg.="N";
                            }
                            //echo $i.$arrimg."<br />";
                $slug = create_slug($arr_name[$i]);
                //$description = stripHTMLtags($arr_description[$i]);
                $sql[$i] = "INSERT INTO products ( `idNhanh`, `parentId`, `merchantCategoryId`, `merchantProductId`, `categoryId`, `code`, `name`, `importPrice`, `price`, `wholesalePrice`, `image`, `images`, `status`, `previewLink`, `shippingWeight`, `width`, `length`, `height`, `vat`, `createdDateTime`, `remain`, `shipping`, `damaged`, `holding`, `available`, `advantages`, `description`, `content`, `slug`) VALUES ('{$arr_idNhanh[$i]}', '{$arr_parentId[$i]}', '{$arr_merchantCategoryId[$i]}', '{$arr_merchantProductId[$i]}', '{$arr_categoryId[$i]}', '{$arr_code[$i]}', '{$arr_name[$i]}', '{$arr_importPrice[$i]}', '{$arr_price[$i]}', '{$arr_wholesalePrice[$i]}', '{$arr_image[$i]}', '{$arrimg}', '$arr_status[$i]', '{$arr_previewLink[$i]}', '$arr_shippingWeight[$i]', '$arr_width[$i]', '$arr_length[$i]', '$arr_height[$i]', '$arr_vat[$i]', '$arr_createdDateTime[$i]', '$arr_remain[$i]', '$arr_shipping[$i]', '$arr_damaged[$i]', '$arr_holding[$i]', '$arr_available[$i]', '{$arr_advantages[$i]}', '{$arr_description[$i]}', '{$arr_content[$i]}', '{$slug}'); ";
                //echo $sql[$i];
                 $this->db->query($sql[$i]);
            }
            echo "Đồng bộ dữ liệu thành công";
            
        }
    }