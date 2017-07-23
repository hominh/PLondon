<div class="maincontent">
    <div class="maincontentinner">
        <div class="widgetbox box-inverse">
            <h4 class="widgettitle">Cập nhật cửa hàng</h4>
            <div class="widgetcontent wc1">
                <form class="form-horizontal" action="<?php echo base_url(); ?>quantri/cuahang/edit/<?php echo $info['id']; ?>" method="post" enctype="multipart/form-data">
                    <?php
                    echo "<div class='mess_error'>";
                    echo "<ul>";
                    if (validation_errors() != '') {
                        echo "<li>" . validation_errors() . "</li>";
                    }
                    echo "</ul>";
                    echo "</div>";
                    ?>
                    <?php
                        $district = $info['district'];
                        $sl1 = "";
                        $sl2 = "";
                        if($district <= 13) {
                            $sl1 = "selected";
                            $bl1 = "display: block";
                            $bl2 = "display: none";
                        }
                        else {
                            $sl2 = "selected";
                            $bl2 = "display: block";
                            $bl1 = "display: none";
                        }
                        $sle1 = "";
                        $sle2 = "";
                        $sle3 = "";
                        $sle4 = "";
                        $sle5 = "";
                        $sle6 = "";
                        $sle7 = "";
                        $sle8 = "";
                        $sle9 = "";
                        $sle10 = "";
                        $sle11 = "";
                        $sle12 = "";
                        $sle13 = "";
                        $sle14 = "";
                        $sle15 = "";
                        $sle16 = "";
                        $sle17 = "";
                        $sle18 = "";
                        $sle19 = "";
                        $sle20 = "";
                        $sle21 = "";
                        $sle22 = "";
                        $sle23 = "";
                        $sle24 = "";
                        $sle25 = "";
                        $sle26 = "";
                        $sle27 = "";
                        $sle28 = "";
                        $sle29 = "";
                        $sle30 = "";
                        $sle31 = "";
                        $sle32 = "";
                        if($district == 1) {
                            $sle1 = "selected";
                        }
                        if($district == 2) {
                            $sle2 = "selected";
                        }
                        if($district == 3) {
                            $sle3 = "selected";
                        }
                        if($district == 4) {
                            $sle4 = "selected";
                        }
                        if($district == 5) {
                            $sle5 = "selected";
                        }
                        if($district == 6) {
                            $sle6 = "selected";
                        }
                        if($district == 7) {
                            $sle7 = "selected";
                        }
                        if($district == 8) {
                            $sle8 = "selected";
                        }
                        if($district == 9) {
                            $sle9 = "selected";
                        }
                        if($district == 10) {
                            $sle10 = "selected";
                        }
                        if($district == 11) {
                            $sle11 = "selected";
                        }
                        if($district == 12) {
                            $sle12 = "selected";
                        }
                        if($district == 13) {
                            $sle13 = "selected";
                        }
                        if($district == 14) {
                            $sle14 = "selected";
                        }
                        if($district == 15) {
                            $sle15 = "selected";
                        }
                        if($district == 16) {
                            $sle16 = "selected";
                        }
                        if($district == 17) {
                            $sle17 = "selected";
                        }
                        if($district == 18) {
                            $sle8 = "selected";
                        }
                        if($district == 19) {
                            $sle19 = "selected";
                        }
                        if($district == 20) {
                            $sle20 = "selected";
                        }
                        if($district == 21) {
                            $sle21 = "selected";
                        }
                        if($district == 22) {
                            $sle22 = "selected";
                        }
                        if($district == 23) {
                            $sle23 = "selected";
                        }
                        if($district == 24) {
                            $sle24 = "selected";
                        }
                        if($district == 25) {
                            $sle25 = "selected";
                        }
                        if($district == 26) {
                            $sle26 = "selected";
                        }
                        if($district == 27) {
                            $sle27 = "selected";
                        }
                        if($district == 28) {
                            $sle28 = "selected";
                        }
                        if($district == 29) {
                            $sle29 = "selected";
                        }
                        if($district == 30) {
                            $sle30 = "selected";
                        }
                        if($district == 31) {
                            $sle31 = "selected";
                        }
                        if($district == 32) {
                            $sle32 = "selected";
                        }

                    ?>
                    <div class="control-group">
                        <label class="control-label">Tên cửa hàng</label>
                        <div class="controls">
                            <input name="name" type="text"  placeholder="Tên bài viết" value="<?php echo $info['name']; ?>">
                        </div>
                    </div>

                    
                    <div class="control-group">
                        <label class="control-label">Địa chỉ cửa hàng</label>
                        <div class="controls">
                            <input name="add" type="text"  placeholder="Địa chỉ cửa hàng" value="<?php echo $info['add']; ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Giờ mở cửa</label>
                        <div class="controls">
                            <input name="openhour" type="text"  placeholder="Giờ mở cửa" value="<?php echo $info['openhour']; ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Giờ đóng cửa</label>
                        <div class="controls">
                            <input name="closehour" type="text"  placeholder="Giờ đóng cửa" value="<?php echo $info['closehour']; ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Số điện thoại</label>
                        <div class="controls">
                            <input name="mobile" type="text"  placeholder="Số điện thoại" value="<?php echo $info['mobile']; ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Thành phố</label>
                        <div class="controls">
                            <select name='city' id='city'>
                                <option value="1" <?php echo $sl1; ?>>TP. Hà Nội</option>
                                <option value="2" <?php echo $sl2; ?>>TP. Hồ Chí Minh</option>
                                
                            </select>
                        </div>
                    </div>
                     <div class="control-group">
                        <label class="control-label">Quận/Huyện</label>
                        <div class="controls">
                            <select name='district' id='tphn'>
                                <option class='tphnd' style='<?php echo $bl1; echo $sle1; ?>' value="1">Quận Ba Đình</option>
                                <option class='tphnd' style='<?php echo $bl1; echo $sle2; ?>' value="2">Quận Hai Bà Trưng</option>
                                <option class='tphnd' style='<?php echo $bl1; echo $sle3; ?>' value="3">Quận Hoàn Kiếm</option>
                                <option class='tphnd' style='<?php echo $bl1; echo $sle4; ?>' value="4">Quận Cầu Giấy</option>
                                <option class='tphnd' style='<?php echo $bl1; echo $sle5; ?>' value="5">Quận Đống Đa</option>
                                <option class='tphnd' style='<?php echo $bl1; echo $sle6; ?>' value="6">Quận Bắc Từ Liêm</option>
                                <option class='tphnd' style='<?php echo $bl1; echo $sle7; ?>' value="7">Quận Hà Đông</option>
                                <option class='tphnd' style='<?php echo $bl1; echo $sle8; ?>' value="8">Quận Long Biên</option>
                                <option class='tphnd' style='<?php echo $bl1; echo $sle9; ?>' value="9">Quận Nam Từ Liêm</option>
                                <option class='tphnd' style='<?php echo $bl1; echo $sle10; ?>' value="10">Quận Tây Hồ</option>
                                <option class='tphnd' style='<?php echo $bl1; echo $sle11; ?>' value="11">Quận Thanh Xuân</option>
                                <option class='tphnd' style='<?php echo $bl1; echo $sle12; ?>' value="12">Quận Nam Từ Liêm</option>
                                <option class='tphnd' style='<?php echo $bl1; echo $sle13; ?>' value="13">Quận Hoàng Mai</option>
                                
                            
                                <option class='tphcmd' style='<?php echo $bl2; echo $sle14; ?>' value="14">Quận 1</option>
                                <option class='tphcmd' style='<?php echo $bl2; echo $sle15; ?>' value="15">Quận 2</option>
                                <option class='tphcmd' style='<?php echo $bl2; echo $sle16; ?>' value="16">Quận 3</option>
                                <option class='tphcmd' style='<?php echo $bl2; echo $sle17; ?>' value="17">Quận 4</option>
                                <option class='tphcmd' style='<?php echo $bl2; echo $sle18; ?>' value="18">Quận 5</option>
                                <option class='tphcmd' style='<?php echo $bl2; echo $sle19; ?>' value="19">Quận 6</option>
                                <option class='tphcmd' style='<?php echo $bl2; echo $sle20; ?>' value="20">Quận 7</option>
                                <option class='tphcmd' style='<?php echo $bl2; echo $sle21; ?>' value="21">Quận 8</option>
                                <option class='tphcmd' style='<?php echo $bl2; echo $sle22; ?>' value="22">Quận 9</option>
                                <option class='tphcmd' style='<?php echo $bl2; echo $sle23; ?>' value="23">Quận 10</option>
                                <option class='tphcmd' style='<?php echo $bl2; echo $sle24; ?>' value="24">Quận 11</option>
                                <option class='tphcmd' style='<?php echo $bl2; echo $sle25; ?>' value="25">Quận 12</option>
                                <option class='tphcmd' style='<?php echo $bl2; echo $sle26; ?>' value="26">Quận Thủ Đức</option>
                                <option class='tphcmd' style='<?php echo $bl2; echo $sle27; ?>' value="27">Quận Tân Phú</option>
                                <option class='tphcmd' style='<?php echo $bl2; echo $sle28; ?>' value="28">Quận Tân Bình</option>
                                <option class='tphcmd' style='<?php echo $bl2; echo $sle29; ?>' value="29">Quận Phú Nhuận</option>
                                <option class='tphcmd' style='<?php echo $bl2; echo $sle30; ?>' value="30">Quận Gò Vấp</option>
                                <option class='tphcmd' style='<?php echo $bl2; echo $sle31; ?>' value="31">Quận Bình Thạnh</option>
                                <option class='tphcmd' style='<?php echo $bl2; echo $sle32; ?>'  value="32">Quận Bình Tân</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-success">Cập nhật</button>
                        <a class="btn" href="index.php">Hủy bỏ</a>
                    </div>
                </form>
            </div><!--widgetcontent-->
        </div><!--widget-->
    </div><!-- End maincontentinner-->
</div><!-- End maincontent -->
<script language="javascript">
    jQuery.noConflict();
    jQuery( document ).ready(function( $ ) {
        $('#city').on('change', function() {
            var value = $(this).val()
           
            if(value == '1') {
                $(".tphnd").css("display", "block");
                $(".tphcmd").css("display", "none");
            }
            if(value == '2') {
                $(".tphcmd").css("display", "block");
                $(".tphnd").css("display", "none");
            }
        });
    });
</script>