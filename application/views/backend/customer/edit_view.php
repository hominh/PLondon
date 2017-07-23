<div class="maincontent">
    <div class="maincontentinner">
        <div class="widgetbox box-inverse">
            <h4 class="widgettitle">Cập nhật khách hàng đăng kí nhận thẻ</h4>
            <div class="widgetcontent wc1">
                <form class="form-horizontal" action="<?php echo base_url(); ?>quantri/customer/edit/<?php echo $info['id']; ?>" method="post" enctype="multipart/form-data">
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

                        if($info['card'] == "Nhận thẻ thành viên tại văn phòng công ty") {
                            $check1 = "checked";
                            $check2 = "";
                        }

                        if($info['card'] == "Giao đến tận địa chỉ khách hàng") {
                            $check2 = "checked";
                            $check1 = "";
                        }
                        if($info['status'] == 0) {
                            $trangthai1 = "checked";
                            $trangthai2 = "";
                        }
                        if($info['status'] == 1) {
                            $trangthai2 = "checked";
                            $trangthai1 = "";
                        }
                    ?>
                    <div class="control-group">
                        <label class="control-label">Tên khách hàng</label>
                        <div class="controls">
                            <input name="name" type="text"   placeholder="Tên bài viết" value="<?php echo $info['name']; ?>" readonly>
                        </div>
                    </div>

                    
                    <div class="control-group">
                        <label class="control-label">Email</label>
                        <div class="controls">
                            <input name="email" type="text"  placeholder="Địa chỉ cửa hàng" value="<?php echo $info['email']; ?>" readonly>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Ngày sinh</label>
                        <div class="controls">
                            <input name="birth" type="text"  placeholder="Ngày sinh" value="<?php echo $info['birth']; ?>" readonly>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Số điện thoại</label>
                        <div class="controls">
                            <input name="mobile" type="text"  placeholder="Số điện thoại" value="<?php echo $info['mobile']; ?>" readonly>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Nhận thẻ</label>
                        <div class="controls">
                            <input type="radio" name="card" readonly value="Nhận thẻ thành viên tại văn phòng công ty" <?php echo $check1; ?> >Nhận thẻ thành viên tại văn phòng công ty <br />
                            <input type="radio" name="card" readonly value="Giao đến tận địa chỉ khách hàng" <?php echo $check2; ?> >Giao đến tận địa chỉ khách hàng
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Trạng thái</label>
                        <div class="controls">
                            <input type="radio" name="status"  value="0" <?php echo $trangthai1; ?> >Chưa kiểm tra   <br />
                            <input type="radio" name="status"  value="1" <?php echo $trangthai2; ?> >Đã kiểm tra    
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