<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Admin Panel</title>
<link rel="stylesheet"
	href="<?php echo base_url(); ?>assets/be/css/style.default.css"
	type="text/css" />
<link rel="stylesheet"
	href="<?php echo base_url(); ?>assets/be/css/responsive-tables.css">
<link rel="stylesheet"
	href="<?php echo base_url(); ?>assets/be/css/bootstrap-fileupload.min.css"
	type="text/css" />

<script type="text/javascript"
	src="<?php echo base_url(); ?>assets/be/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript"
	src="<?php echo base_url(); ?>assets/be/js/jquery-migrate-1.1.1.min.js"></script>
<script type="text/javascript"
	src="<?php echo base_url(); ?>assets/be/js/jquery-ui-1.9.2.min.js"></script>
<script type="text/javascript"
	src="<?php echo base_url(); ?>assets/be/js/bootstrap.min.js"></script>
<script type="text/javascript"
	src="<?php echo base_url(); ?>assets/be/js/bootstrap-fileupload.min.js"></script>
<script type="text/javascript"
	src="<?php echo base_url(); ?>assets/be/js/bootstrap-timepicker.min.js"></script>
<script type="text/javascript"
	src="<?php echo base_url(); ?>assets/be/js/jquery.uniform.min.js"></script>
<script type="text/javascript"
	src="<?php echo base_url(); ?>assets/be/js/jquery.validate.min.js"></script>
<script type="text/javascript"
	src="<?php echo base_url(); ?>assets/be/js/jquery.tagsinput.min.js"></script>
<script type="text/javascript"
	src="<?php echo base_url(); ?>assets/be/js/jquery.autogrow-textarea.js"></script>
<script type="text/javascript"
	src="<?php echo base_url(); ?>assets/be/js/charCount.js"></script>
<script type="text/javascript"
	src="<?php echo base_url(); ?>assets/be/js/colorpicker.js"></script>
<script type="text/javascript"
	src="<?php echo base_url(); ?>assets/be/js/ui.spinner.min.js"></script>
<script type="text/javascript"
	src="<?php echo base_url(); ?>assets/be/js/chosen.jquery.min.js"></script>
<script type="text/javascript"
	src="<?php echo base_url(); ?>assets/be/js/modernizr.min.js"></script>
<script type="text/javascript"
	src="<?php echo base_url(); ?>assets/be/js/custom.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/be/js/jquery.magnifier.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/be/js/jquery.imageWarp.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
<script language="javascript">
            function xacnhan() {
                if (!window.confirm('Bạn có chắc chắn muốn xóa ?')) {
                    return false;
                }
            }
        </script>
</head>
<body>
	<div class="mainwrapper">
		<div class="header">
			<div class="logo">
				<a href="dashboard.html"><img src="images/logo.png" alt="" /></a>
			</div>
			<div class="headerinner">
				<ul class="headmenu">
					<li class="odd"><a class="dropdown-toggle" data-toggle="dropdown"
						href="#"> <span class="count">4</span> <span
							class="head-icon head-message"></span> <span
							class="headmenu-label">Messages</span>
					</a>
						<ul class="dropdown-menu">
							<li class="nav-header">Messages</li>
						</ul></li>
					<li><a class="dropdown-toggle" data-toggle="dropdown"
						data-target="#"> <span class="count">10</span> <span
							class="head-icon head-users"></span> <span class="headmenu-label">New
								Users</span>
					</a></li>
					<li class="odd"><a class="dropdown-toggle" data-toggle="dropdown"
						data-target="#"> <span class="count">1</span> <span
							class="head-icon head-bar"></span> <span class="headmenu-label">Statistics</span>
					</a></li>
					<li class="right">
						<div class="userloggedinfo">
							<!--<img src="images/photos/thumb1.png" alt="" />  -->
							<div class="userinfo">
								<p><?php echo $username; ?></p>
								<ul>
									<li><a href="#">Edit Profile</a></li>
									<li><a href="">Account Settings</a></li>
									<li><a href="<?php echo base_url()."logout"; ?>"
										OnClick="return confirm('Ban co chac chan muon dang xuat khoi he thong');">Sign
											out </a></li>
								</ul>
							</div>
						</div>
					</li>
				</ul>
				<!--headmenu-->
			</div>
		</div>
		<!-- End header -->
		<div class="leftpanel">
			<div class="leftmenu">
				<ul class="nav nav-tabs nav-stacked">
					<li class="nav-header">Navigation</li>
					<li class="active"><a href="#"><span class="iconfa-laptop"></span>Trang chủ</a></li>
<li class=""><a href="<?php echo base_url(); ?>quantri/categoryproduct"><span class="iconfa-laptop"></span>Danh mục sản phẩm</a></li>
<li class=""><a href="<?php echo base_url(); ?>quantri/products"><span class="iconfa-laptop"></span>Sản phẩm</a></li>
					<li class=""><a href="<?php echo base_url(); ?>quantri/slides"><span class="iconfa-laptop"></span>Slideshow</a></li>
					<li class=""><a href="<?php echo base_url(); ?>quantri/gioithieu"><span class="iconfa-laptop"></span>Giới thiệu</a></li>
					<li class=""><a href="<?php echo base_url();?>quantri/dichvu"><span class="iconfa-laptop"></span>Dịch vụ</a></li>
					<li class=""><a href="<?php echo base_url();?>quantri/cuahang"><span class="iconfa-laptop"></span>Cửa hàng</a></li>
					<li class=""><a href="<?php echo base_url();?>quantri/nhanxet"><span class="iconfa-laptop"></span>Nhận xét</a></li>
					<li class=""><a href="<?php echo base_url() ?>quantri/phuongcham"><span class="iconfa-laptop"></span>Phương châm PoshLondon</a></li>
					<li class=""><a href="<?php echo base_url(); ?>quantri/email"><span class="iconfa-laptop"></span>Danh sách email</a></li>
					<li class=""><a href="<?php echo base_url(); ?>quantri/categoryfooter"><span class="iconfa-laptop"></span>Danh mục bài viết</a></li>
					<li class=""><a href="<?php echo base_url(); ?>quantri/chuyenmuc"><span class="iconfa-laptop"></span>Chuyên mục bài viết</a></li>
					<li class=""><a href="<?php echo base_url(); ?>quantri/article"><span class="iconfa-laptop"></span>Bài viết</a></li>
					<li class=""><a href="<?php echo base_url(); ?>quantri/post"><span class="iconfa-laptop"></span>Tin tức</a></li>
					<li class=""><a href="<?php echo base_url(); ?>quantri/config"><span class="iconfa-laptop"></span>Cấu hình website</a></li>
					<li class=""><a href="<?php echo base_url(); ?>quantri/customer"><span class="iconfa-laptop"></span>Đăng kí nhận thẻ</a></li>



				</ul>
			</div>
			<!--leftmenu-->
		</div>
		<div class="rightpanel">
			<ul class="breadcrumbs">
				<li><a href="dashboard.html"><i class="iconfa-home"></i></a> <span
					class="separator"></span></li>
				<li>Dashboard</li>
				<li class="right"><a href="" data-toggle="dropdown"
					class="dropdown-toggle"><i class="icon-tint"></i> Color Skins</a>
					<ul class="dropdown-menu pull-right skin-color">
						<li><a href="default">Default</a></li>
						<li><a href="navyblue">Navy Blue</a></li>
						<li><a href="palegreen">Pale Green</a></li>
						<li><a href="red">Red</a></li>
						<li><a href="green">Green</a></li>
						<li><a href="brown">Brown</a></li>
					</ul></li>
			</ul>
			<div class="pageheader">
				<form action="results.html" method="post" class="searchbar">
					<input type="text" name="keyword"
						placeholder="To search type and hit enter..." />
				</form>
				<div class="pageicon">
					<span class="iconfa-laptop"></span>
				</div>
				<div class="pagetitle">
					<h5>All Features Summary</h5>
					<h1>Dashboard</h1>
				</div>
			</div>
	<?php echo $this->load->view($subview); ?>