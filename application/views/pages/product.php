<div class="clearfix"></div>
<section class="sec-padding" style="padding-top: 20px; padding-bottom:0px;">
    <div class="container">
        <div class="col-md-11">
            <div class="col-md-10 imgproduct" style="margin-left: 60px;">
                <div class='navigate'>
                <ul class='breadcrumb'>
                    <li><a href='<?php echo base_url(); ?>'>Trang chủ</a></li>
                    <li><a href='<?php echo site_url()."categories/detail/".$products["namecategory"].".html"; ?>'><?php echo $products['namecategory']; ?></a></li>
                    <li><?php echo $products['name']; ?></li>
                </ul>
                </div
            </div>
        </div>
    </div>
</section>
<section class="sec-padding" style="padding-top:20px;">
<link rel="stylesheet" media="screen" href="<?php echo base_url(); ?>assets/fe/css/productdetail.css" type="text/css" />
<link rel="stylesheet" media="screen" href="<?php echo base_url(); ?>assets/fe/css/lightbox.css" type="text/css" />
<script src="<?php echo base_url(); ?>assets/fe/js/lightbox-plus-jquery.min.js"></script> 

    <div class="container">
        <div class="row">
            <div class="col-md-3 imgproduct" style="margin-top: 40px; " >
                    <div id="big-image">
                             <a class="example-image-link" href="<?php echo $products['image']; ?>" data-lightbox="example-1">
                                <img id="imgproduct" class="img-responsive" src="<?php echo $products['image']; ?>"

                                    alt="<?php echo $products['name']; ?>"
                                    title="<?php echo $products['name']; ?>"
                                    style=""  />
                                </a>
 <?php
                                    
                                        
                                        for($i = 0; $i < 3; $i++) {
                                            echo "<a href='{$images[$i]->url}' class='example-image-link' data-lightbox='example-1'><img id='' class='img-responsive' src='{$images[$i]->url}' style='' /></a>";
                                        }
                                    

                                ?>
                               
                    </div>

                             
                
                    <div id="" class="small-images" style='margu'>
                        <?php
                            //if($products['images'] != "N") {
                              //  $imagess = substr($products['images'], 0, -1);
                              //  $arrimgs = explode("-", $imagess);
 /*for($i = 1; $i < count($images); $i++) {
                                        echo "<a href='{$images[$i]->url}' class='example-image-link' data-lightbox='example-1'><img id='' class='img-responsive' src='{$images[$i]->url}' style='max-width: 187px; margin-left: 40px;' /></a>";
                                     }*/
                                for($i = 0; $i < 3; $i++) {
                                    $curimg =  $products['image']; 
                                    /*if($i == 0) {
                                        $rel = "smallImage:"."'{$curimg}'";
                                    }
                                    else {
                                        $rel = "smallImage:"."'{$arrimgs[$i]}'";
                                    }*/
                                    
                                    echo " <div class='item3' >";
                                   
                                    
                                     if($i == 0) {
                                        echo "<img class='img-responsive ' src='{$images[$i]->url}' alt=''/>";
                                    }
                                    else {
                                    echo "<img class='img-responsive ' src='{$images[$i]->url}' alt=''/>";
                                    }
                                    
                                    
                                    echo "</div>";
                                }
                            //}
                        ?>
                    </div>
       
               
            </div>
            <div class="col-md-9">
                <div class="col-md-5" style='padding-right:5px;'>
                    <div class="masanpham">
                        <span class="msp">Mã sản phẩm: </span><span class="namemasp">
                            <?php echo $products['code']; ?>
                        </span>
                    </div>
                    <div class="clearfix"></div>
                    <div class="tensanpham">
                        <?php echo $products['name']; ?>
                    </div>
                    <div class="clearfix"></div>
                    <div class="masanpham" style='font-size :15pt;'>
                         <span class="msp" style='font-weight: normal;'>Giá: </span>
                    </div>
                    <div class="clearfix"></div>
                    <div class="giadetail">
                        <?php echo create_formatmoney($products['price']); ?>
                    </div>
                     <div class="clearfix"></div>
                     <div class="lieudung">
                         
                         <div class="clearfix"></div>
                         
                         <div class="clearfix"></div>
                         <div class="col-md-12 mota_mobile">
                            <div class="masanpham">
                                <span class="msp">Mô tả: </span>
                                
                               
                             </div>
                             <div class="clearfix"></div>
                             <?php echo $products['description']; ?>
                             
                         </div>
                         <div class="add_cart">
                             <form action="<?php echo base_url('products/add_cart') ?>" method="POST" accept-charset="utf-8">
                                 <input type="hidden" id="idproduct" name="id" value="<?php echo $products['id']; ?>"/>
                                 <input type="hidden" id="idNhanh" name="idNhanh" value="<?php echo $products['idNhanh']; ?>"/>
                                 <input type="hidden" id="name" name="name" value="<?php echo $products['name']; ?>"/>
                                 <input type="hidden" id="price" name="price" value="<?php echo $products['price']; ?>"/>    
                                 <input type="hidden" id="description" name="description" value="<?php echo $products['description']; ?>"/>  
                                 <input type="hidden" id="image" name="image" value="<?php echo $products['image']; ?>"/>  
                                 <input type="hidden" id="code" name="code" value="<?php echo $products['code']; ?>"/>  
                                 <input type="hidden" id="importPrice" name="importPrice" value="<?php echo $products['importPrice']; ?>"/>  
                                 
                                  <p id="button btn-cart"> <input type="submit" name="action" value="Thêm vào giỏ hàng" class="button btn-cart" id="btn-cart"/></p>
                             </form>
                             <!--<a class="button btn-cart">Thêm vào giỏ hàng</a>!-->
                         </div>
                     </div>
                </div>
              <div class="col-md-7 mota_desktop">
                    <ul id="myTab" class="nav nav-tabs nav-tabs-responsive" role="tablist">
                                    <li role="presentation" class="active">
                                      <a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">
                                        <span class="text">Mô tả</span>
                                      </a>
                                    </li>
                                    <li role="presentation" class="">
                                      <a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">
                                        <span class="text">Liều dùng & chỉ định </span>
                                      </a>
                                    </li>
                                    
                                    
                                    <li role="presentation">
                                      <a href="#samsa" role="tab" id="samsa-tab" data-toggle="tab" aria-controls="samsa">
                                        <span class="text">Thành phần</span>
                                      </a>
                                    </li>
                                  </ul>
                                   <div id="myTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade " id="home" aria-labelledby="samsa-tab">
<div class='infoproduct' style="text-align: justify;font-family: Open Sans,sans-serif;font-size: 12pt;">
                                             <?php 
                                                
                                                $arrlieudung = explode("#", $products['lieudung']);
                                                if(count($arrlieudung) > 0) {
                                                    for($i = 0; $i < count($arrlieudung); $i++) {
                                                       
                                                        echo "-".$arrlieudung[$i]."<br />";
                                                        
                                                    }
                                                }
                                                else {
                                                    echo "";
                                                }
                                             ?>
                                             <br />
                                             <?php
                                                
                                                echo $products['chidinh'];
                                                
                                             ?>
</div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade in active" id="profile" aria-labelledby="profile-tab">
                                        <div style="text-align: justify;"><?php echo $products['description2']; ?></div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="samsa" aria-labelledby="profile-tab">
                                        <?php echo $products['content']; ?>
                                    </div>
                                </div>
                    <div class="clearfix"></div>
                    <div class="motadetail">
                        
                    </div> 
                </div>
            </div>
        </div>
    </div>
</section>

<div class="clearfix"></div>
<section class="sec-padding">
    <div class="container">
      <div class="row slide-controls-color-5">
        <div class="categoryname text-center">
          <h3 class="bestsales uppercase roboto-slab">SẢN PHẨM BÁN CHẠY</h3>
          
        </div>
        <div class="clearfix"></div>
        
        <div id="owl-demo" class="owl-carousel">
        <?php $i = 1; ?>
        <?php foreach ($productsbestsale as $item): ?>
         <?php
         
                      $url = site_url('products/detail/'.$item->slug);
                    ?>
            <div class="item2">
            <div class="main">
              <img class="" src="<?php echo $item->image; ?>"/>
            <div class="clearfix"></div>
            <div class="tensanphambanchay">
              <?php echo $item->name; ?>
            </div>
              <div class="clear-fix"></div>
              <div class="giasanphambanchay">
                <?php echo create_formatmoney($item->price); ?>
              </div>
              <div class="clear-fix"></div>
             
              <div class="xemthemspbanchay">
               <a href="<?php echo $url; ?>">Xem thêm</a>
              </div>
                </div>
                <?php
                    /*if($i % 3 != 0) {
                    echo "<div class='line'>";
                    echo "</div>";
                    }*/
                 ?>
                
            </div>
            
            
            <?php $i++; ?>
            
        
         <?php endforeach ?>
      </div>
    </div>
  </section>
