<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function create_menu(array $arrayItem, $id_parent = 0, $level = 0){
    echo str_repeat("\t" , $level ),'<ul>',PHP_EOL;
    foreach( $arrayItem[$id_parent] as $id_item => $item){
        echo str_repeat("\t" , $level + 1 ),'<li><a href="',$item['name'],'">',$item['code'],'</a>',PHP_EOL;
        if(isset( $arrayItem[$id_item] ) ){
            create_menu($arrayItem , $id_item , $level + 2);
        }
        echo str_repeat("\t" , $level + 1 ),'</li>',PHP_EOL;
    }
    echo str_repeat("\t" , $level ),'</ul>',PHP_EOL;
} 

