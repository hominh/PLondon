
<section class="sec-padding">
                <div class="container">
                    <div class="categoryname text-center">
                    <h3 class="bestsales uppercase roboto-slab">Bài viết và tin tức</h3>                </div>
                <div class="col-md-11">
                    <div class="col-md-1">
                    
                    </div>
                     <div class="col-md-8">
                        <div class="dichvu">
                            <div class="col-md-2" style="">
                                       
                            </div>
                            <div class="col-md-2" style="">
                                       
                            </div>
                            <div class="col-md-10">
                                <div class="titledv" style='font-size: 20pt;'>
                                    
                                </div>
                            </div>
                            
                       
                        </div>
                        <div class="clearfix"></div>
                        
                       
                    </div>

                </div>

                <div style="height:70px;"></div>
                
                	<?php foreach ($article as $item): ?>
                    <div class="col-md-12">
                    <div class="col-md-2" style="text-align:center;">
                        <img src="<?php echo $item->image; ?>" class="img-responsive">
                    </div>
                    <div class="col-md-1"> </div>
                                   
                           
                       <div class="col-md-8" style='padding-left: 0px;'>
                            <div class="tendichvu">
                                <a href='<?php echo site_url('article/detail/'.$item->slugarticle); ?>'><?php echo $item->namearticle; ?></a>
                            </div>
                            <div class="clearfix"></div>
                            <div class="gioithieudichvu">
                               <?php echo $item->description; ?>
                            </div>
                        </div>      
                </div>
                <div class="clearfix"></div>
                <div style="height:40px;"></div>
                <?php endforeach ?>
                
                </div>

            </section>