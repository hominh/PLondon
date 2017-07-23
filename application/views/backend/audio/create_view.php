<div class="maincontent">
    <div class="maincontentinner">
        <div class="widgetbox box-inverse">
            <h4 class="widgettitle">Thêm mới file nhạc</h4>
            <div class="widgetcontent wc1">
                <form class="form-horizontal" action="<?php echo base_url(); ?>quantri/audios/create" method="post" enctype="multipart/form-data">
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
                        <label class="control-label">Tên bài nhạc</label>
                        <div class="controls">
                            <input name="name" type="text"  placeholder="Tên bài nhạc" value="">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Tiêu đề bài viết</label>
                        <div class="controls">
                            <input name="title" type="text"  placeholder="Tiêu đề bài viết" value="">
                        </div>
                    </div>
                    
                    
                    <div class="control-group">
                        <label class="control-label">File</label>
                        <div class="controls">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="input-append" style="">
                                   	<input type="file" name="userfile" size="20" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                    	<label class="control-label">Thuộc danh mục</label>
                    	<div class="controls">
                    		<select name='cate'>
                    			<?php foreach ($categoriesmusic as $category): ?>

								  	<?php echo "<option value='$category->id'>";  ?>
								    <?php echo $category->name;  ?>
								
								<?php endforeach ?>
                    		</select>
                    	</div>
                    </div>
                    <div class="control-group">
                    	<label class="control-label">Thuộc playlist</label>
                    	<div class="controls">
                    		<select name='cate2'>
                    			<?php foreach ($playlist as $pl): ?>

								  	<?php echo "<option value='$pl->id'>";  ?>
								    <?php echo $pl->name;  ?>
								
								<?php endforeach ?>
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