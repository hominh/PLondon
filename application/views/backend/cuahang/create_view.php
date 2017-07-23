<div class="maincontent">
    <div class="maincontentinner">
        <div class="widgetbox box-inverse">
            <h4 class="widgettitle">Thêm mới cửa hàng</h4>
            <div class="widgetcontent wc1">
                <form class="form-horizontal" action="<?php echo base_url(); ?>quantri/cuahang/create" method="post" enctype="multipart/form-data">
                <?php
			        echo "<div class='mess_error'>";
			        echo "<ul>";
			            if(validation_errors() != ''){
			                echo "<li>".validation_errors()."</li>";
			            }
			        echo "</ul>";
			        echo "</div>";
				?>
                    <div class="control-group">
                        <label class="control-label">Tên cửa hàng</label>
                        <div class="controls">
                            <input name="name" type="text"  placeholder="Tên cửa hàng" value="">
                        </div>
                    </div>
                    
                    
                    <div class="control-group">
                        <label class="control-label">Địa chỉ cửa hàng</label>
                        <div class="controls">
                            <input name="add" type="text"  placeholder="Địa chỉ cửa hàng" value="">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Giờ mở cửa</label>
                        <div class="controls">
                            <input name="openhour" type="text"  placeholder="Giờ mở cửa" value="">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Giờ đóng cửa</label>
                        <div class="controls">
                            <input name="closehour" type="text"  placeholder="Giờ đóng cửa" value="">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Số điện thoại</label>
                        <div class="controls">
                            <input name="mobile" type="text"  placeholder="Số điện thoại" value="">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Thành phố</label>
                        <div class="controls">
                            <select name='city' id='city'>
                                <option value="1">TP. Hà Nội</option>
                                <option value="2">TP. Hồ Chí Minh</option>
                                
                            </select>
                        </div>
                    </div>
                     <div class="control-group">
                        <label class="control-label">Quận/Huyện</label>
                        <div class="controls">
                            <select name='district' id='tphn'>
                                <option class='tphnd' style='display: block' value="1">Quận Ba Đình</option>
                                <option class='tphnd' style='display: block' value="2">Quận Hai Bà Trưng</option>
                                <option class='tphnd' style='display: block' value="3">Quận Hoàn Kiếm</option>
                                <option class='tphnd' style='display: block' value="4">Quận Cầu Giấy</option>
                                <option class='tphnd' style='display: block' value="5">Quận Đống Đa</option>
                                <option class='tphnd' style='display: block' value="6">Quận Bắc Từ Liêm</option>
                                <option class='tphnd' style='display: block' value="7">Quận Hà Đông</option>
                                <option class='tphnd' style='display: block' value="8">Quận Long Biên</option>
                                <option class='tphnd' style='display: block' value="9">Quận Nam Từ Liêm</option>
                                <option class='tphnd' style='display: block' value="10">Quận Tây Hồ</option>
                                <option class='tphnd' style='display: block' value="11">Quận Thanh Xuân</option>
                                <option class='tphnd' style='display: block' value="12">Quận Nam Từ Liêm</option>
                                <option class='tphnd' style='display: block' value="13">Quận Hoàng Mai</option>
                                
                            
                                <option class='tphcmd' style='display: none' value="14">Quận 1</option>
                                <option class='tphcmd' style='display: none' value="15">Quận 2</option>
                                <option class='tphcmd' style='display: none' value="16">Quận 3</option>
                                <option class='tphcmd' style='display: none' value="17">Quận 4</option>
                                <option class='tphcmd' style='display: none' value="18">Quận 5</option>
                                <option class='tphcmd' style='display: none' value="19">Quận 6</option>
                                <option class='tphcmd' style='display: none' value="20">Quận 7</option>
                                <option class='tphcmd' style='display: none' value="21">Quận 8</option>
                                <option class='tphcmd' style='display: none' value="22">Quận 9</option>
                                <option class='tphcmd' style='display: none' value="23">Quận 10</option>
                                <option class='tphcmd' style='display: none' value="24">Quận 11</option>
                                <option class='tphcmd' style='display: none' value="25">Quận 12</option>
                                <option class='tphcmd' style='display: none' value="26">Quận Thủ Đức</option>
                                <option class='tphcmd' style='display: none' value="27">Quận Tân Phú</option>
                                <option class='tphcmd' style='display: none' value="28">Quận Tân Bình</option>
                                <option class='tphcmd' style='display: none' value="29">Quận Phú Nhuận</option>
                                <option class='tphcmd' style='display: none' value="30">Quận Gò Vấp</option>
                                <option class='tphcmd' style='display: none' value="31">Quận Bình Thạnh</option>
                                <option class='tphcmd' style='display: none'  value="32">Quận Bình Tân</option>
                            </select>
                        </div>
                    </div>

                    
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success">Thêm mới</button>
                        <a class="btn" href="index.php">Hủy bỏ</a>
                    </div>
                </form>
            </div><!--widgetcontent-->
        </div><!--widget-->
    </div><!-- End maincontentinner-->
</div><!-- End maincontent -->