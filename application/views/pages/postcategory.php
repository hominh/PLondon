<section class="sec-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8" style='padding-right: 15px !important;'>
                            <div class="imagecategory">
                                <img src="<?php echo $parent[0]->image; ?>" class='img-responsive' style='width: 100%' /> 
                            </div>
                            <div class='clearfix'></div>
                            <div class='category row' style='padding-right: 15px; width : 100%;margin-left: 0px !important;'>
                                <div class="name_category">
                                    <h3><?php echo $parent[0]->name; ?></h3>
                                </div>
                                <div class="clear-fix"></div>
                                <div class='title_category' style='line-height:30px;'>
                                    <?php echo $parent[0]->title; ?>
                                </div>
                                <div class="clearfix"></div>
                                <div style='height: 20px;'></div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-5 content_category" style='padding-left: 0px;'>
                                        	<?php
                                        		for($i = 0; $i < count($post); $i = $i + 2) {
                                        			$url = site_url('post/sub/'.$post[$i]->slug);
                                        			echo "<div class='listcategory'>";
                                        			echo "<div class='name_subcategory'>";
                                        			echo "<a href='$url'>";
                                        			echo $post[$i]->name;
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
                                        			$url = site_url('post/sub/'.$post[$i]->slug);
                                        			echo "<div class='listcategory'>";
                                        			echo "<div class='name_subcategory'>";
                                        			echo "<a href='$url'>";
                                        			echo $post[$i]->name;
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
                        <div class="col-md-3 top" style='padding-left: 15px !important;'>
                    <div class="toppost">
                        <p class='titletoppost'>Top bài viết</p>
                        <div class="clearfix"></div>
                        <ul class="listtoppost">
                        	<?php foreach ($toppost as $item): ?>

                        	<li><a href='<?php echo site_url('post/detail/'.$item->slug); ?>'><?php echo $item->name; ?></a></li>
							<?php endforeach ?>
                            
                        </ul>
                    </div>
                </div>
                    </div>
                </div>
                
            </section>