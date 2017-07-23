<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title><?php echo $titlePage; ?></title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="author" content="Hasegawa Kaito" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/fe/css/style2.css" charset="utf-8" />
        <script language="javascript">
            function xacnhan() {
                if (!window.confirm('You want delete user ?')) {
                    return false;
                }
            }
        </script>
    </head>
    <body id="manage">
        <div id="header">
            <ul id="menu">
                <li><a href="<?php echo base_url(); ?>index.php/user">User</a></li>
                <li><a href="#">Chuyên mục</a></li>
                <li><a href="#">Bài viết</a></li>
                <li><a href="#">Comment</a></li>
            </ul>
            <p>
                Xin chào <span>Hasegawa kaito</span>
                <a href="#">[ Thoát ]</a>
            </p>
        </div><!-- End header -->
        <div id="content"><!-- =========== Begin #content ============= -->
            <?php echo $this->load->view($subview); ?>
        </div><!-- End #content -->
        <div id="footer">
            copyright &copy; by Hasegawa kaito, power by freetuts.net&reg;
        </div><!-- End #footer -->
    </body>
</html>