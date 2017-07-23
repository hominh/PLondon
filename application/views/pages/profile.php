<?php
    //$item = $this->session->flashdata('profile');
    $name = "";
    $code = "";
    $email = "";
    $mobile = "";
    $birthday = "";
    $address = "";
    $arr_solanmua = array();
    //$count = count(get_object_vars($some_std_class_object));
    foreach ($profile as $item) {
        if (is_object($item)) {
           foreach($item as $subitem1) {
               $name = $subitem1->name;
               $code = $subitem1->code;
               $email = $subitem1->email;
               $mobile = $subitem1->mobile;
               $birthday = $subitem1->birthday;
               $address = $subitem1->address;
               if(property_exists($subitem1, 'billList')) {
                   foreach ($subitem1 as $subitem2) {
                       if(is_array($subitem2)) {
                           array_push($arr_solanmua, $subitem2);
                       }
                       
                   }
               }
           }
        }
    }
     
?>


<section class="sec-padding">
                <div class="container">
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-md-4 item" style="margin-top: 30px;">
                          
                            <h2 class="infoaccount">Thông tin tài khoản</h2>
                            <div class="clearfix"></div>
                            <div class="account_detail">
                                <div class="name">
                                    <?php echo $name; ?>
                                </div>
                                <div class="clearfix"></div>
                                <div class="name">
                                <span class="number_card">Số thẻ: </span><span class="number_carddetail"><?php echo $code; ?></span>
                                </div>
                                <div class="clearfix"></div>
                                <div class="name">
                                <span class="number_card">Email: </span><span class="number_carddetail"><?php echo $email; ?></span>
                                </div>
                                <div class="clearfix"></div>
                                <div class="name">
                                <span class="number_card">Điện thoại: </span><span class="number_carddetail"><?php echo $mobile; ?></span>
                                </div>
                                <div class="clearfix"></div>
                                <div class="name">
                                <span class="number_card">Ngày sinh: </span><span class="number_carddetail"><?php echo $birthday; ?></span>
                                </div>
                                <div class="clearfix"></div>
                                <div class="name">
                                <span class="number_card">Địa chỉ: </span><span class="number_carddetail"><?php echo $address; ?></span>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div style="height: 37px;"></div>
                            <h2 class="infoaccount">Quản lý tài khoản</h2>
                            <div class="clearfix"></div>
                            <div class="account_detail">
                                <ul class="module_account" style='padding-left: 0px;'>
                                    <li><img src='<?php echo base_url(); ?>assets/fe/images/history_transfer.png' class="img-responsive" /><a href="#">Thay đổi thông tin</a></li>
                                    <li><img src='<?php echo base_url(); ?>assets/fe/images/history_transfer.png' class="img-responsive" /><a href="#">Lịch sử giao dịch</a></li>
                                     <li><img src='<?php echo base_url(); ?>assets/fe/images/history_transfer.png' class="img-responsive" /><a href="#">Giỏ hàng</a></li>
                                </ul>
                            </div>    
                        </div>
                        <div class="col-md-1 item" style="width: 6%;">
                        </div>
                        <div class="col-md-8 item">
                            <div class="change_infoaccount">
                                <div class="title_change_infoaccount">
                                    <div class="col-md-2 item">
                                        <img src="<?php echo base_url(); ?>assets/fe/images/icon_changeinfo.png" class="img-responsive" />
                                    </div>
                                    <div class="col-md-10 item text_change_infoaccount">
                                        lịch sử giao dịch
                                    </div>
                                    
                                </div>
                                <div class="clearfix"></div>
                                <table class="top50">
                                    <thead>
                                    <tr>
                                        <th>Ngày</th>
                                        <th>Sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Giá tiền</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        for($i = 0; $i < count($arr_solanmua[0]); $i++) {
                                            
                                            
                                            for($j = 0; $j < count($arr_solanmua[0][$i]->products); $j++) {
                                                    echo "<tr>";
                                                    $datetime = explode(" ", $arr_solanmua[0][$i]->createdDateTime);
                                                    if(count($arr_solanmua[0][$i]->products) == 1) {
                                                        echo "<td>";
                                                        echo $datetime[0];
                                                        echo "</td>";
                                                        echo "<td>";
                                                        echo $arr_solanmua[0][$i]->products[$j]->name;;
                                                        echo "</td>";
                                                        echo "<td>";
                                                        echo $arr_solanmua[0][$i]->products[$j]->quantity;;
                                                        echo "</td>";
                                                        echo "<td>";
                                                        echo $arr_solanmua[0][$i]->products[$j]->price;;
                                                        echo "</td>";
                                                    }
                                                    else {
                                                        echo "<td></td>";
                                                        echo "<td>";
                                                        echo $arr_solanmua[0][$i]->products[$j]->name;;
                                                        echo "</td>";
                                                        echo "<td>";
                                                        echo $arr_solanmua[0][$i]->products[$j]->quantity;;
                                                        echo "</td>";
                                                        echo "<td>";
                                                        echo $arr_solanmua[0][$i]->products[$j]->price;;
                                                        echo "</td>";
                                                    }
                                                    
                                                    echo "</tr>";
                                                
                                            }
                                            
                                        }
                                    ?>
                                    
                                    </tbody>
                                </table>
                        </div>

                    </div>
                </div>

            </section>