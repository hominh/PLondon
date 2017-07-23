

<div class="clearfix"></div>
<section class="sec-padding" style=''>
    <div class="container">
        <div class="categoryname text-center" style="margin-bottom:30px;">
            <h3 class="bestsales2 uppercase roboto-slab" style="border:none;">SẢN PHẨM ĐÃ CHỌN</h3>
        </div>
        <div class='contentproduct_buy'>
            <div class="col-md-3">
                <div class="masanpham">
                    <span class="msp">Sản phẩm</span>
                </div>
            </div>
            <div class="col-md-4">

                <div class="masanpham">
                    <span class="msp">Tên sản phẩm</span>
                </div>

            </div>
            <div class='col-md-2'>
                <div class="masanpham">
                    <span class="msp">Số lượng</span>
                </div>
            </div>
            <div class='col-md-2'>
                <div class="masanpham">
                    <span class="msp">Giá tiền</span>
                </div>
            </div>
        </div>   
        <div class='clearfix'></div>
        <?php $i = 0; ?>
       

        <?php foreach ($products_cart as $product): ?>
            
            <div class='contentproduct_buy' style='padding-top:25px;'>
                <div class="col-md-3">
                    <div class='col-md-1' style="text-align: left; padding: 0;">
                        <a href='<?php echo base_url('products/remove_cart/' . $product['rowid']); ?>'><img id='delitemcart<?php echo $i; ?>' src='<?php echo base_url(); ?>assets/fe/images/x.png'></a>
                    </div>
                    
                    <div class='col-md-10' style="text-align: center; padding: 0;">
                        <div class="imageproductbuy">
                            <img  class='img-responsive' src='<?php echo $product['option']['image']; ?>' style='margin-left: 25px; width: 158px; height: 158px;' /> 
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="descriptionproductbuy">
                        <?php echo $product['name']; ?>
                    </div>

                </div>
                <div class='col-md-2 quantity'>
                    <div class='col-md-4'>
                        <a href='javascript:void(0)' class='add_more_produdct' id='add_more_produdct<?php echo $i; ?>'>+</a>
                    </div>
                    <div class='col-md-4' id='sp<?php echo $i; ?>'>
                        <?php echo $product['qty']; ?>
                    </div>
                    <div class='col-md-4'>
                        <a href='javascript:void(0)' class='-_more_produdct' id='-_more_produdct<?php echo $i; ?>'>-</a>
                    </div>

                </div>
                <div class='col-md-2 priceproduct' id='moneysp<?php echo $i; ?>'>
                    <?php echo create_formatmoney($product['subtotal']); ?>
                </div>
            </div>
            <div class='clearfix'></div>
            <?php $i++; ?>
        <?php endforeach ?>
        <div class="clearfix"></div>
        <div class="border100" style="width: 98%;margin: 0px auto;">
            &nbsp;

        </div>
        <div class='clearfix'></div>
        <div class='thanhtoan'>
            <div class='col-md-3' style='padding: 0'>
                <a title="View Details" class="button btn-cart" id="btn_muahang" href='javascript:void(0)'>Mua hàng</a>
            </div>
            <div class='col-md-4' style='padding: 0'>

            </div>
            <div class='col-md-3' style=''>
                <div class='sum'>
                    Tổng cộng
                </div>
            </div>
            <div class='col-md-2' style='padding-right: 0px;padding-left: 0px;'>
                <div class='psum' id='psum'>
                    
                    <?php 
                        $tong = 0;
                        foreach ($products_cart as $key=>$product) {
                            
                            
                            $tong=$tong +$product['subtotal'];
                            
                            $arr_name.= $product['name']."------";
                        }
                        echo create_formatmoney($tong);
                    ?>
                </div>
            </div>
        </div>

    </div>
</section>
<div class='clearfix'></div>
<div id="dpnone">
<section class="sec-padding" style="padding:0px">
                <div class="container">
                    <div class="row" style="">
                        <div class="col-md-7 item">
                          
                                <h2 class="poshlondon" style=''>Thông tin khách hàng</h2>
                        
                            <div class="diachi">
                                Quý khách vui lòng điền đầy đủ thông tin để đặt hàng trực tuyến
                            </div>
                        </div>
                        <div class="col-md-5 item" style="margin-top: 10px;">
                           
                            <form class="form-horizontal" action="<?php echo base_url(); ?>order/add" method="POST">
                                                                <input type="hidden" name="products_cart" value="<?php echo htmlentities(serialize($products_cart)); ?>">
                                
                            <div class="field_lienhe">
                                <label class="control-label-lienhe col-md-3">Tên (*)</label>
                                <input name="name" class="input_noboder col-md-7" value="" type="text">
                            </div>
                                <div class="clearfix"></div>
                                <div class="field_lienhe" style="display: none;">
                                <label class="control-label-lienhe col-md-2">SL (*)</label>
                                <input name="qty" id="qty" class="input_noboder col-md-8" value="" type="text">
                            </div>
                            <div class="clearfix"></div>
                            <div class="field_lienhe">
                                <label class="control-label-lienhe col-md-3">Email (*)</label>
                                <input name="email" class="input_noboder col-md-7" value="" type="text">
                            </div>
                            <div class="clearfix"></div>
                            <div class="field_lienhe">
                                <label class="control-label-lienhe col-md-5">Số điện thoại (*)</label>
                                <input name="sodt" class="input_noboder col-md-5" value="" type="text">
                            </div>
                            <div class="clearfix"></div>
                            <div class="field_lienhe">
                                <label class="control-label-lienhe col-md-4">Thành phố (*)</label>
                               <input name="city" class="input_noboder col-md-6" value="" type="text">
                            </div>
                            <div class="clearfix"></div>
                            <div class="field_lienhe">
                                <label class="control-label-lienhe col-md-5">Quận/Huyện (*)</label>
                               <input name="quan" class="input_noboder col-md-5" value="" type="text">
                            </div>
                             <div class="clearfix"></div>
                            <div class="field_lienhe">
                                <label class="control-label-lienhe col-md-3">Địa chỉ (*)</label>
                               <input name="add" class="input_noboder col-md-7" value="" type="text">
                            </div>
                            <div class="clearfix"></div>
                            <div class="field_lienhe" style="padding-top: 10px; border-bottom: none;">
                                <div class="pull-right" style="padding-bottom: 10px;border-bottom: none;">
                            
                             <input type="submit" value="Mua hàng" class="button btn-cart" id="btn_muahang2" style="width: 125px !important;">
                            <!--<a class="button btn-cart" target="_blank" href="https://www.nganluong.vn/button_payment.php?receiver=(minhhh12@gmail.com)&product_name=(<?php echo $arr_name; ?>)&price=(<?php echo $tong; ?>)&return_url=(URL thanh toán thành công)&comments=()">

                                Thanh toán qua Ngân Lượng
                            </a>!-->
                        </div>
                            </div>
                            
                            
                        </form>
                         <div class="clearfix"></div>
                       
                        
                        </div>
                    </div>
                </div>

            </section>
</div>


