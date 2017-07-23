<section class="sec-padding">
    <div class="container">
      <div class="row">
        <div class="item">
            <?php
              function array_sort_by_column(&$arr, $col, $dir = SORT_DESC) {
                  $sort_col = array();
                  foreach ($arr as $key=> $row) {
                      $sort_col[$key] = $row[$col];
                  }

                  array_multisort($sort_col, $dir, $arr);
              }

              $mix_arr = array_merge($posts,$gioithieu);
              $mix_arr = json_decode(json_encode($mix_arr), true);
              array_sort_by_column($mix_arr, 'date_created');
              
            ?>
            <?php
              for($i = 0; $i < count($mix_arr); $i++) {
                if($i < 6) {
                  $image = $mix_arr[$i]['image'];
                $name = $mix_arr[$i]['name'];
                echo "<div class='col-md-4 col-sm-6' style='padding-right: 0px;'> ";
               
                
                if(array_key_exists('categorypost_id', $mix_arr[$i])) {
                  //echo $i."la tin tuc"."<br />";
                  $url = site_url('post/detail/'.$mix_arr[$i]['slug']);
                }
                
                else {
                  $url = site_url('gioithieu/detail/'.$mix_arr[$i]['slug']);
                }
                echo "<div class='hovercustom'>";
                echo "<a href='$url'>";
                echo "<img src='$image' alt='$name' class='img-responsive hovercustomimg' />";
                echo "</a>";
                echo "</div>";
                echo "<div class='clearfix'></div>";
                echo "<div class='both_gioithieu'></div>";
                echo "<div class='textcustom3'>";
                echo "<div class='namegioithieuhome'>";
                echo "<a href='$url'>";
                echo $name;
                echo "</a>";
                echo "</div>";
                echo "</div>";
                echo " <div class='clear-fix'></div>";
                echo "<div class='textcustom2' style='margin-top: 10px;'>";
                echo "<div class='desgioithieu'>";
                echo "<p>";
                echo $mix_arr[$i]['description'];
                echo "</p>";
                echo "</div>";
                echo "<br />";
                echo "<a href='$url' class='read-more stone arrow'>";
                echo "Xem thêm";
                echo "</a>";
                echo "</div>";
                echo "</div>";
              }
                }
                
            ?>
            
       
        
        
        
        
        
       
        
       
        </div>
      </div><!--End row !-->
    </div>
  </section>
  <!--end section-->
  <div class="clearfix"></div>
  
  <section class="section-side-image section-light-stone clearfix nhanxet">
    <div class="container">
      <div class="row">
        <div class="col-md-6" style="padding-top:80px; padding-bottom: 70px;padding-right: 0px;">
            <?php foreach ($phuongcham as $item): ?>
                <div class="title_chamngon">
                    <?php echo $item->name; ?>
                </div>
                <div class="clear-fix"></div>
                <div class="name_chamngon">
                    <?php echo $item->title; ?>
                </div>
                 <div class="clear-fix"></div>
                 <div class="content_chamngon">
                     <p><?php echo $item->content; ?></p>
                 </div>
                    <?php endforeach ?>
        </div>
        
      
        <div class="col-md-6" >
        <div class="comment" style="padding-top:80px; padding-bottom: 250px;">
         <div id="owl-demo7" class="owl-carousel1" style='margin-top: 195px;  '>
            <?php foreach ($nhanxet as $item): ?>
                <div class="item no-gutter">
                    <div class="text-box left50" style="width: 85%;">
                        <div class="quote"></div>
                        <div class="clearfix"></div>
                        <h6 class="comment_title">
                            <?php echo $item->title; ?>
                        </h6>
                        <p class="comment_content">
                            <?php echo $item->content; ?>
                        </p>
                    </div>
                </div>
            <?php endforeach ?>    
            
            </div>
          </div>
      
    
      </div>
    </div>
    
    
  </section>
  <!--end section-->
  <div class="clearfix"></div>
  <section class="sec-padding">
    <div class="container">
      <div class="row slide-controls-color-5">
        <div class="categoryname text-center">
          <h3 class="bestsales uppercase roboto-slab" style='font-size: 29pt'>SẢN PHẨM BÁN CHẠY</h3>
          
        </div>
        <div class="clearfix"></div>
        
        <div id="owl-demo" class="owl-carousel2">
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
                	if($i % 3 != 0) {
                	//echo "<div class='line'>";
                	//echo "</div>";
                	}
                 ?>
                
            </div>
        	
        	
        	<?php $i++; ?>
        	
        
         <?php endforeach ?>
         
      </div>
      
    </div>
  </section>

  
  <!--end section-->
  <div class="clearfix"></div>