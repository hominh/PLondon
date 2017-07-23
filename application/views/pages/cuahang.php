<div class="clearfix"></div>
 	<div class="map">
        <?php foreach ($config as $it): ?>
		  <?php echo $it->map; ?>
        <?php endforeach ?>
	</div>
<div class="clearfix"></div>
<div class="filter">
                <div class="container">
                    <div class="col-md-4 col-sm-6" style="padding-top:10px;padding-bottom:10px;">
                        <div class="hethong">
                            Hệ thống cửa hàng Posh London
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6" style="padding-top:10px;padding-bottom:10px;">
                        <form class="form-horizontal">
                            <label class="control-label">Thành phố</label>
                            <select name="tp" class="filter_input" id='city'>
                                <option value="1">TP. Hà Nội</option>
                                <option value="2">TP. Hồ Chí Minh</option>
                            </select>

                        </form>
                    </div>
                    <div class="col-md-4 col-sm-6" id='tphn' style="padding-top:10px;padding-bottom:10px;display: block">
                        <form class="form-horizontal">
                            <label class="control-label">Quận/Huyện</label>
                            <select name="tp" class="filter_input" >
                               <option value="1">Quận Ba Đình</option>
                                <option value="2">Quận Hai Bà Trưng</option>
                                <option value="3">Quận Hoàn Kiếm</option>
                                <option value="4">Quận Cầu Giấy</option>
                                <option value="5">Quận Đống Đa</option>
                                <option value="6">Quận Bắc Từ Liêm</option>
                                <option value="7">Quận Hà Đông</option>
                                <option value="8">Quận Long Biên</option>
                                <option value="9">Quận Nam Từ Liêm</option>
                                <option value="10">Quận Tây Hồ</option>
                                <option value="11">Quận Thanh Xuân</option>
                                <option value="12">Quận Nam Từ Liêm</option>
                                <option value="13">Quận Hoàng Mai</option>
                            </select>

    
                        </form>
                    </div>
 <div class="col-md-4 col-sm-6" id='tphcm' style="padding-top:10px;padding-bottom:10px;display: none">
                        <form class="form-horizontal">
                            <label class="control-label">Quận/Huyện</label>
                            <select name="tp" class="filter_input tphcm" >
                                <option value="14">Quận 1</option>
                                <option value="15">Quận 2</option>
                                <option value="16">Quận 3</option>
                                <option value="17">Quận 4</option>
                                <option value="18">Quận 5</option>
                                <option value="19">Quận 6</option>
                                <option value="20">Quận 7</option>
                                <option value="21">Quận 8</option>
                                <option value="22">Quận 9</option>
                                <option value="23">Quận 10</option>
                                <option value="24">Quận 11</option>
                                <option value="25">Quận 12</option>
                                <option value="26">Quận Thủ Đức</option>
                                <option value="27">Quận Tân Phú</option>
                                <option value="28">Quận Tân Bình</option>
                                <option value="29">Quận Phú Nhuận</option>
                                <option value="30">Quận Gò Vấp</option>
                                <option value="31">Quận Bình Thạnh</option>
                                <option value="32">Quận Bình Tân</option>
                            </select>

    
                        </form>
                    </div>
                </div>
            </div>
<section class="sec-padding" style='padding-top: 65px;padding-bottom:73px;'>
	<div class="container">
		<div class="row">
			<div class="col-md-2 item">
				<div class="logo_deliver ">
					<img class="img-responsive hovercustomimg" src="<?php echo base_url(); ?>assets/fe/images/deliver.png" />
				</div>
			</div>
			<div class="col-md-10 item">
				<div class="col-md-10 item">
					<div class="col-md-1 item">
                      	<div class="sttcuahang">
							STT
                      	</div>
                 	<div class="clearfix"></div>

                    </div>
                     <div class="col-md-5 item">
                                <div class="diachicuahang">
                                    Địa chỉ
                                </div>
                                <div class="clearfix"></div>

                            </div>
					<div class="col-md-4 item">
                                <div class="thoigianhoatdong">
                                    Thời gian hoạt động
                                </div>
                            </div>
                    <div class="col-md-2 item">
                                <div class="dienthoaicuahang">
                                    Điện thoại
                                </div>
                            </div>
				</div>
				<?php if(count($cuahang) >0 )  foreach ($cuahang as $item): ?>
					 <div class="col-md-10 item">
						<div class="infocuahang" id="infocuahang">
							<div class="col-md-1 item equalheight">
								<div class="stt">
                                        01
                                </div>
							</div>
							<div class="col-md-5 item equalheight">
                                    <div class="diachidetail">
                                       	<?php echo $item->name; ?>

                                       	<?php echo $item->add; ?>

                                    </div>

						</div>
						 <div class="col-md-4 item equalheight">
                                    <div class="stt">
                                        <?php echo $item->openhour."-".$item->closehour; ?>
                                    </div>
                                </div>
                                <div class="col-md-2 item equalheight">
                                    <div class="stt">
                                       	<?php echo $item->mobile; ?>
                                    </div>
                                </div>

					 </div>
</div>

				<?php endforeach ?>
			</div>
		</div>
	</div>
</section>