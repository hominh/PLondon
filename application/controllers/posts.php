<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Posts extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->helper("url");
        }
        public function index(){
            $id='12';
            $string='Friendly URL - Tạo đường dẫn URL thân thiện trong Codeigniter';
            $this->load->helper("slug");
            $slug= create_slug($string);
            echo '<a href="slug/posts/'.$id.'-'.$slug.'.html">Link bài viết</a>';
        }
        public function posts(){
            $id=(int)$this->uri->segment(2);
            if($id=="")
                echo "Bài viết không tồn tại hoặc đã bị xóa.";
            else
                echo "Đây là bài viết với id = $id";
        }
    }
    
?>

