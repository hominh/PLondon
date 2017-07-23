<link rel="stylesheet" href="<?php echo base_url(); ?>assets/fe/css/grid_product1.css">
<section class="sec-padding">
    <div class="container">
        <div class="row slide-controls-color-5">
           
                <div class="categoryname text-center">
                    <?php
                        
                        $category_name = "";
                        if(count($products) == 0) {
                            $category_name = "Không có sản phẩm";
                        }
                        else {
                            $category_name = $namecategory;
                        }
                        
                        echo "<h3 class='bestsales uppercase roboto-slab'>$category_name</h3>";
                    ?>
                </div>
                <div class="clearfix"></div>
                <section class="sec-padding" style="padding-top:20px;">
                    <div class="col-md-1 item"></div>
                    <div class="col-md-10 item">
                        <ul class="products-grid category-products-grid itemgrid itemgrid-adaptive itemgrid-3col single-line-name centered hover-effect equal-height">
                            <?php
                                
                            
                                   
                                    foreach($products as $product) {
                  
                                        $price = create_formatmoney($product->price);
                                                    $url = site_url('products/detail/'.$product->slug);
                                                    echo "<li class='item'>";
                                                        echo "<a href='$url'>";
                                                        echo "<img src='$product->image' class='img-responsive' />";
                                                        echo "</a>";
                                                        echo "<div class='clearfix'></div>";
                                                        echo "<div class='fixnameproduct'>";
                                                        echo "<h2 class='product-name'><a href='$url' title='$product->name'>$product->name</a></h2>";
                                                        echo "</div>";
                                                        echo "<div class='clearfix'></div>";
                                                        echo "<div class='price-box'>";
                                                        echo "<span class='regular-price' id='product-price-35'>";
                                                        echo "<span class='price'>$price</span>";
                                                        echo "</span>";
                                                        echo "</div>";
                                                        echo "<div class='clearfix'></div>";
                                                        echo "<div class='actions clearer'>";
                                                        echo "<a title='Xem thêm' class='button btn-cart' href='$url'>Xem thêm</a>";
                                                        echo "</div>";
                                                    echo "</li>";
                                        foreach($product as $items) {
                                          
                                            if(is_object($items)) {
                                                foreach($items as $it) {
                                                    
                                                }

                                            }

                                        }
                                    

                                }
                                
                                
                            ?>
                        </ul>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>