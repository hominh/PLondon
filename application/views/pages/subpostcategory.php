<section class="sec-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8" style=''>
                            <div class="imagecategory">
                                
                            </div>
                            <div class='clearfix'></div>
                            <div class='category'>
                                <div class="name_category">
                                    <h3><?php echo $namechuyenmuc; ?></h3>
                                </div>
                                <div class="clear-fix"></div>
                                <div class='title_category'>
                                    <?php echo $titlechuyenmuc; ?>
                                </div>
                                <div class="clearfix"></div>
                                <div style='height: 20px;'></div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-5 content_category" style='padding-left: 0px;'>
                                        	<?php
                                        		for($i = 0; $i < count($post); $i = $i + 2) {
$img = $post[$i]->image;
                                        			$url = site_url('post/detail/'.$post[$i]->slugpost);
                                        			echo "<div class='listcategory' style='border: none;'>";
echo "<div class='imagepost'>";
                                                    echo "<img class='img-responsive imagepostfix' src='$img' style='margin-top: 10px;' />";
                                                    echo "</div>";
echo "<div class='clearfix'>";echo "</div>";
                                        			echo "<div class='name_subcategory'>";
                                        			echo "<a href='$url'>";
                                        			echo $post[$i]->namepost;
                                        			echo "</a>";
                                        			echo "</div>";
                                        			echo "<div class='title_subcategory'>";
                                        			echo $post[$i]->title;
                                        			echo "</div>";
                                        			echo "</div>";
                                        		}
                                        	?>
                                            
                                    
                                </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-5 content_category" style='padding-left: 0px;'>
                                            <?php
                                        		for($i = 1; $i < count($post); $i = $i + 2) {
$img2 = $post[$i]->image;
                                        			$url = site_url('post/detail/'.$post[$i]->slugpost);
                                        			echo "<div class='listcategory' style='border: none;'>";
 echo "<div class='imagepost'>";
                                                    echo "<img class='img-responsive imagepostfix' src='$img2' style='margin-top: 10px;' />";
                                                    echo "</div>";
echo "<div class='clearfix'>";echo "</div>";
                                        			echo "<div class='name_subcategory'>";
                                        			echo "<a href='$url'>";
                                        			echo $post[$i]->namepost;
                                        			echo "</a>";
                                        			echo "</div>";
                                        			echo "<div class='title_subcategory'>";
                                        			echo $post[$i]->title;
                                        			echo "</div>";
                                        			echo "</div>";
                                        		}
                                        	?>
                                    
                                </div>
                                
                                
                                    </div>
                                </div>
                                
                            </div>

                        </div>
                        <div class="col-md-3 top">
                    <div class="toppost">
                        <p class='titletoppost'>Danh mục</p>
                        <div class="clearfix"></div>
                        <ul class="listtoppost">
                        	<?php foreach ($listcategory as $item): ?>
                                 <?php
                                  /*echo "<pre>";
                                  print_r($item);
                                  echo "<pre>";*/
                                  if($item->id_parent != 0) { 
                                      $url = site_url('post/sub/'.$item->slug);
                                  } else if($item->id_parent == 0) {
                                      $url = site_url('post/category/'.$item->slug);
                                  }
                                 ?>
                        	<li><a href='<?php echo $url; ?>'><?php echo $item->name; ?></a></li>
							<?php endforeach ?>
                            
                        </ul>
                    </div>
                </div>
                    </div>
                </div>
                
            </section>