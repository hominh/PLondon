<section class="sec-padding" style='padding-top: 60px;'>
    <div class="container">
        <div class="row" style="margin-top: 20px;">
            <div class="col-md-6 item">

                <h2 class="poshlondon">Đăng nhập</h2>

                
            </div>
            <div class="col-md-6 item" style="margin-top: 20px;">
                <div class="error_contact">
                    <?php if(isset($error)) echo $error; ?>
                </div>
                <div class="clearfix"></div>
                <form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>customer/profile" >
                    <div class="field_lienhe">
                        <label class="control-label-lienhe col-md-2">Số thẻ</label>
                        <input name="sothe" class="input_noboder col-md-8" value="" type="text">
                    </div>
                    <div class="clearfix"></div>
                    <div class="field_lienhe">
                        <label class="control-label-lienhe col-md-2">Email (*)</label>
                        <input name="email" class="input_noboder col-md-8" value="" type="text">
                    </div>
                    <div class="clearfix"></div>
                    
                    
                    <div class="field_lienhe">
                        <label class="control-label-lienhe col-md-3">Mật khẩu (*)</label>
                        <input name="mobile" class="input_noboder col-md-7" value="" type="text">
                    </div>

                
                <div class="clearfix"></div>
                <div style="border-top: 1px solid #cdcdcd;"></div>
                <div style="height: 15px;"></div>
                <div class="pull-right">
                    <input class="btn_confirm" value="ĐĂNG NHẬP" type="submit">
                </div>
                </form>
            </div>
        </div>
    </div>

</section>