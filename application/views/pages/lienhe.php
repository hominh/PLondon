<section class="sec-padding">
                <div class="container">
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-md-5 item">
                            <div class="poshlondon">
                                <h2 style='color:#961a1c;'>POSH LONDON VIETNAM</h2>
                            </div>
                            <div class="diachi">
                                <?php foreach ($config as $item): ?>
                                     Địa chỉ: <?php echo $item->add;  ?> <br />
                                    Điện thoại: <?php echo $item->tell;  ?> </br>
                                    Fax: <?php echo $item->fax;  ?> </br>
                                    Email: <?php echo $item->email;  ?> </br>
                                    Website:<?php echo $item->website;  ?> </br>
                                <?php endforeach ?>
                               
                            </div>
                        </div>
                        <div class="col-md-5 item" style="margin-top: 20px;">
                            <div class="lienhe_title">
                                liên hệ
                            </div>
                            <div class="clearfix"></div>
                            <form class="form-horizontal" >
                            <div class="field_lienhe">
                                <label class="control-label-lienhe col-md-2">Tên (*)</label>
                                <input name="name" class="input_noboder col-md-8" value="" type="text">
                            </div>
                            <div class="clearfix"></div>
                            <div class="field_lienhe">
                                <label class="control-label-lienhe col-md-2">Email (*)</label>
                                <input name="name" class="input_noboder col-md-8" value="" type="text">
                            </div>
                            <div class="clearfix"></div>
                            <div class="field_lienhe">
                                <label class="control-label-lienhe col-md-4">Số điện thoại (*)</label>
                                <input name="name" class="input_noboder col-md-7" value="" type="text">
                            </div>
                            <div class="clearfix"></div>
                            <div class="field_lienhe">
                                <label class="control-label-lienhe col-md-2">Lời nhắn</label>
                               <input name="name" class="input_noboder col-md-7" value="" type="text">
                            </div>
                           
                        </form>
                         <div class="clearfix"></div>
                        <div style="border-top: 1px solid #cdcdcd;"></div>
                        <div class="pull-right">
                            <a href="" class="sendlienhe">Gửi ngay</a>
                        </div>
                        </div>
                    </div>
                </div>

            </section>