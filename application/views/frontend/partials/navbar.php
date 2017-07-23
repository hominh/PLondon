<!doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<!--<![endif]-->
<!--<![endif]-->
<html lang="en">
    <head>
        <title><?php echo $title; ?></title>
        <meta charset="utf-8">
        <!-- Meta -->

        
            <meta name="keywords" content="<?php echo $meta_keyword; ?>" />
            <meta name="description" content="<?php echo $meta_description; ?>" />
        
       
        
        <meta name="author" content="">
        <meta name="robots" content="" />
        

        <!-- this styles only adds some repairs on idevices  -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Favicon -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/fe/images/logo.ico">


        <!-- Google fonts - witch you want to use - (rest you can just remove) -->



        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->


        <!-- Stylesheets -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" media="screen" href="<?php echo base_url(); ?>assets/fe/js/bootstrap/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fe/js/mainmenu/menu.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fe/css/default.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fe/css/layouts.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fe/css/font-awesome/css/font-awesome.min.css">
        
        <link rel="stylesheet" media="screen" href="<?php echo base_url(); ?>assets/fe/css/responsive-leyouts.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fe/js/masterslider/style/masterslider.css" />

        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/fe/css/Simple-Line-Icons-Webfont/simple-line-icons.css" media="screen" />
        <link href="<?php echo base_url(); ?>assets/fe/js/owl-carousel/owl.carousel.css" rel="stylesheet">
        


        <!-- Remove the below comments to use your color option -->
        <!--<link rel="stylesheet" href="css/colors/lightblue.css" />-->
        <!--<link rel="stylesheet" href="css/colors/orange.css" />-->
        <!--<link rel="stylesheet" href="css/colors/green.css" />-->
        <!--<link rel="stylesheet" href="css/colors/pink.css" />-->
        <!--<link rel="stylesheet" href="css/colors/red.css" />-->
        <!--<link rel="stylesheet" href="css/colors/purple.css" />-->
        <!--<link rel="stylesheet" href="css/colors/bridge.css" />-->
        <!--<link rel="stylesheet" href="css/colors/yellow.css" />-->
        <!--<link rel="stylesheet" href="css/colors/violet.css" />-->
        <!--<link rel="stylesheet" href="css/colors/cyan.css" />-->
        <!--<link rel="stylesheet" href="css/colors/mossgreen.css" />-->

    </head>
    <body>

        <div class="site_wrapper">
            <div id="header">
                <div class="container">
                    <div class="navbar stone navbar-default yamm">
                        <div class="navbar-header left90 ">
                            <button type="button" data-toggle="collapse" data-target="#navbar-collapse-grid" class="navbar-toggle two three"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                            <a href="<?php echo base_url(); ?>" class="navbar-brand"><img src="<?php echo base_url(); ?>assets/fe/images/logo.png" alt="" /></a> 
                        </div>
                        <div id="navbar-collapse-grid" class="navbar-collapse collapse pull-left" style="padding-left: 56px;">
                                <?php echo $menu; ?>
<li><a href="<?php echo base_url(); ?>products/cart" class="dropdown-toggle">Mua hàng</a></li>
                                <li class='dropdown'><a href="#" class="dropdown-toggle">Khác</a>
                                    <ul class='dropdown-menu five' role='menu'>
                                        <?php foreach ($categorypost as $item): ?>
                                               <li><a href='<?php echo site_url('post/category/'.$item->slug); ?>'><?php echo $item->name; ?></a></li>     
                                        
                                        <?php endforeach ?>
                                    </ul>
                                </li>
                                <li class='dropdown'><a href="#" class="dropdown-toggle">Thành viên</a>
                                     <ul class='dropdown-menu five' role='menu'>
                                        <li><a href='<?php echo base_url(); ?>customer/signup'>Đăng kí</a></li>
                                        <li><a href="<?php $logged = $this->session->userdata('cus_log'); if($logged) {echo site_url('customer/profile'); } else { echo site_url('customer/login'); } ?>">Đăng nhập</a></li>
                                     </ul>   
                                </li>
                                <li><a href="<?php echo site_url(); ?>products/search" class="dropdown-toggle"><img src="<?php echo base_url(); ?>assets/fe/images/search.png" /></a></li>
                                <li><a href="<?php echo base_url(); ?>products/cart" class="dropdown-toggle"><img src="<?php echo base_url(); ?>assets/fe/images/basket.png" /></a></li>
                                <li><a href="<?php echo base_url(); ?>products/cart" class="dropdown-toggle"><?php echo $carts; ?></a></li>

                                <li><a href="#" class="dropdown-toggle">en</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
