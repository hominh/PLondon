<section class="sec-padding" style='padding-bottom: 60px;'>
    <div class="container">
        <div class="row" style="margin-top: 20px;">
            <div class="col-md-6 item">

                <h2 class="poshlondon">Đăng kí nhận thẻ thành viên</h2>
                <div class="diachi">
                    Quý khách vui lòng điền đầy đủ thông tin để đăng ký thành viên
                </div>
                
            </div>
            <div class="col-md-6 item" style="margin-top: 20px;">
                <div class="error_contact">
                    <?php 
                        if(isset($error)) echo $error;
                        else {echo "Vui lòng điền vào phần bỏ trống";}
                    ?>
                </div>
                <div class="clearfix"></div>
                <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>customer/handlesignup">
                            <div class="field_lienhe">
                                <label class="control-label-lienhe col-md-4">Tên (*)</label>
                                <input name="name" class="input_noboder col-md-7" value="" type="text">
                            </div>
                            <div class="clearfix"></div>
                            <div class="field_lienhe">
                                <label class="control-label-lienhe col-md-4">Email (*)</label>
                                <input name="email" class="input_noboder col-md-7" value="" type="text">
                            </div>
                            <div class="clearfix"></div>
                            <div class="field_lienhe">
                                <label class="control-label-lienhe col-md-4">Mật khẩu</label>
                                <input name="pw" class="input_noboder col-md-7" value="" type="password">
                            </div>
                            <div class="clearfix"></div>
                            <div class="field_lienhe">
                                <label class="control-label-lienhe col-md-4">Nhập lại mật khẩu</label>
                               <input name="repw" class="input_noboder col-md-7" value="" type="password">
                            </div>
                            <div class="clearfix"></div>
                            <div class="field_lienhe">
                                <label class="control-label-lienhe col-md-4">Số điện thoại (*)</label>
                                <input name="mobile" class="input_noboder col-md-7" value="" type="text">
                            </div>
                            <div class="clearfix"></div>
                            <div class="field_lienhe">
                                <label class="control-label-lienhe col-md-4">Ngày sinh</label>
                               <input name="birth" class="input_noboder col-md-7" value="" type="text">
                            </div>
                            
                            <div class="clearfix"></div>
                            <div class="field_lienhe">
                                <br />
                                <label class="control-label-lienhe col-md-4">Vui lòng lựa chọn</label>
                                <br /><br />
                                <input type="radio" name="nhanthe" value="Nhận thẻ thành viên tại văn phòng công ty">&nbsp; &nbsp;<span style='font-size: 13pt;'>Nhận thẻ thành viên tại văn phòng công ty </span><br />
                                <input type="radio" name="nhanthe" value="Giao đến tận địa chỉ khách hàng">&nbsp; &nbsp;<span style='font-size: 13pt;'>Giao đến tận địa chỉ khách hàng</span>
                            </div>
                            <div class="clearfix"></div>
                        <div style="border-top: 1px solid #cdcdcd;"></div>
                            <div class="pull-right">
                    <input class="btn_confirm" value="Gửi ngay" type="submit">
                </div>
                        </form>
            </div>
        </div>
    </div>

</section>