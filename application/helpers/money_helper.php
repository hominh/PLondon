<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (!function_exists('create_formatmoney')) {

    function create_formatmoney($money) {
        $price = number_format(($money / 1000), 3);
        $price = $price . " VNĐ";
        return $price;
    }

}

