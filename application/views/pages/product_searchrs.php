<link rel="stylesheet" href="<?php echo base_url(); ?>assets/fe/css/grid_product1.css">
<section class="sec-padding">
    <div class="container">
        <div class="row slide-controls-color-5">
           
                <div class="categoryname text-center" >
                   <?php
                        $post = base_url()."products/s";
                        $count = count($products);
                        $icon = base_url()."assets/fe/images/search_icon.png";
                        if($count == 0) {
                            echo "<div class='categoryname text-center' style='width:60%; line-height: 40pt;'>";
                            echo "<h3 class='bestsales uppercase roboto-slab' style='border: none; font-size:40pt; margin-bottom: 0px;'>Dữ liệu bạn tìm kiếm không tồn tại</h3>";
                            
                            echo "<p class='otherkeyword'>Vui lòng tìm kiếm bằng từ khoá khác</p>";
                            echo "</div>";
                            echo "<div class='col-md-9 borderform' style='margin-top: 40px;'>";
                            echo "<form class='form-horizontal' action='$post' method='POST' >";
                            echo "<div class='col-md-5' style='padding:0px'>";
                            echo "<label class='label_timkiem'>Tìm kiếm.</label>";

                            echo "</div>";
                            echo "<div class='col-md-7' style='padding:0px'>";
                            echo "<input name='name' class='input_noboder input_timkiem' value='' type='text' placeholder = '' />";
                            echo "<input type='image' class='searchbutton' name='search' src='$icon' alt='Search'>";
                            echo "</div>";
                            echo "</form>";
                            echo "</div>";
                        }
                        else {
                            echo "<h3 class='bestsales uppercase roboto-slab' style='border: none;font-size:40pt;'>Kết quả tìm kiếm</h3>";
                        }
                    ?>
                </div>
                <div class="clearfix"></div>
                <section class="sec-padding" style="padding-top:20px;">
                    <div class="col-md-1 item"></div>
                    <div class="col-md-10 item">
                        <ul class="products-grid category-products-grid itemgrid itemgrid-adaptive itemgrid-3col single-line-name centered hover-effect equal-height">
                           <?php foreach ($products as $item): ?>
                           	<?php
                           		$url = site_url('products/detail/'.$item->slug);
                           	?>
                                <li class='item'>
                                    <img src='<?php echo $item->image; ?>' class='img-responsive' />
                                    <div class='clearfix'></div>
                                    <h2 class='product-name'><a href="<?php echo $url ?>" title="<?php echo $item->name; ?>"><?php echo $item->name; ?></a></h2>
                                    <div class='clearfix'></div>
                                    <div class='price-box'>
                                        <span class='regular-price' id='product-price-35'>
                                            <span class='price'><?php echo $price; ?></span>
                                        </span>
                                    </div>
                                    <div class='clearfix'></div>
                                    <div class='actions clearer'>
                                        <a title='Xem thêm' class='button btn-cart' href='<?php echo $url; ?>'>Xem thêm</a>
                                    </div>
                                
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>