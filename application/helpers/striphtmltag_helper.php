<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if ( ! function_exists('stripHTMLtags'))
{
    function stripHTMLtags($string) {
        $t = preg_replace('/<[^<|>]+?>/', '', htmlspecialchars_decode($string));
        $t = htmlentities($t, ENT_QUOTES, "UTF-8");
        return $t;
    }
}
