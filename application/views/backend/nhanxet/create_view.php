<div class="maincontent">
    <div class="maincontentinner">
        <div class="widgetbox box-inverse">
            <h4 class="widgettitle">Thêm mới tin tức software</h4>
            <div class="widgetcontent wc1">
                <form class="form-horizontal" action="<?php echo base_url(); ?>quantri/nhanxet/create" method="post" enctype="multipart/form-data">
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
                        <label class="control-label">Tiêu đề</label>
                        <div class="controls">
                            <input name="title" type="text"  placeholder="Tiêu đề" value="">
                        </div>
                    </div>
                    
                    <div class="control-group">
                    	<label class="control-label">Nội dung</label>
                    	<div class="controls">
                    		<span class="field">
	                    		<?php
	                    			echo $this->ckeditor->editor("content","");
	                    		?>
                    		</span>
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