<div class="maincontent">
    <div class="maincontentinner">
        <div class="widgetbox box-inverse">
            <h4 class="widgettitle">Cập nhật file nhạc</h4>
            <div class="widgetcontent wc1">
                <form class="form-horizontal" action="<?php echo base_url(); ?>quantri/audios/edit/<?php echo $info['id']; ?>" method="post" enctype="multipart/form-data">
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
                            <input name="name" type="text"  placeholder="Tên bài nhạc" value="<?php echo $info['name']; ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Tiêu đề bài viết</label>
                        <div class="controls">
                            <input name="title" type="text"  placeholder="Tiêu đề bài viết" value="<?php echo $info['title']; ?>">
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
                    		<?php 
									$arr = (object)$categoryselected;
									$arrnotsl = (object)$categorynotselected;
									
									
                    			?>
                    		<select name='cate'>
                    			<?php 
	                    			echo "<option value='$arr->id'>";
	                    			echo $arr->name;
	                    			echo "</option>";
									foreach ($arrnotsl as $it) {
	                    				echo "<option value='$it->id'>";
		                    			echo $it->name;
		                    			echo "</option>";
	                    			}
                    			?>	
                    		</select>
                    	</div>
                    </div>
                   <div class="control-group">
                    	<label class="control-label">Thuộc playlist</label>
                    	<div class="controls">
                    		<?php 
									$arr2 = (object)$playlistselected;
									$arrnotsl2 = (object)$playlistnotselected;
									//var_dump($arrnotsl2);
									
									
									
                    			?>
                    		<select name='cate2'>
                    			<?php 
	                    			echo "<option value='$arr2->id'>";
	                    			echo $arr2->name;
	                    			echo "</option>";
	                    			foreach ($arrnotsl2 as $it2) {
	                    				echo "<option value='$it2->id'>";
	                    				echo $it2->name;
	                    				echo "</option>";
	                    			}
									
                    			?>	
                    		</select>
                    	</div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success">Cập nhật</button>
                        <a class="btn" href="index.php">Hủy bỏ</a>
                    </div>
                </form>
            </div><!--widgetcontent-->
        </div><!--widget-->
    </div><!-- End maincontentinner-->
</div><!-- End maincontent -->