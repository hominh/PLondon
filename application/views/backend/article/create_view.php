<div class="maincontent">
    <div class="maincontentinner">
        <div class="widgetbox box-inverse">
            <h4 class="widgettitle">Thêm mới danh mục</h4>
            <div class="widgetcontent wc1">
                <form class="form-horizontal" action="<?php echo base_url(); ?>quantri/article/create" method="post" enctype="multipart/form-data">
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
                        <label class="control-label">Tên bài viết</label>
                        <div class="controls">
                            <input name="name" type="text"  placeholder="Tên bài viết" value="">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Tiêu đề bài viết</label>
                        <div class="controls">
                       <span class="field">
                            <textarea name="title" id="title" class="span5"></textarea>
                        </span>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label">Chú thích bài viết</label>
                        <div class="controls">
                         <span class="field">
                            <textarea name="description" id="description" class="span5"></textarea>
                        </span>
                    </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label">Nội dung bài viết</label>
                        <div class="controls">
                            <span class="field">
                                <?php
                                    echo $this->ckeditor->editor("content","");
                                ?>
                            </span>
                        </div>
                    </div>

                   <div class="control-group">
                        <label class="control-label">Keyword bài viết</label>
                        <div class="controls">
                            <span class="field">
                                <textarea name="meta_keyword" id="meta_keyword" class="span5"></textarea>
                            </span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Meta Description</label>
                        <div class="controls">
                            <span class="field">
                                <textarea name="meta_description" id="meta_keyword" class="span5"></textarea>
                            </span>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label">Ảnh bài viết</label>
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
                            <select name='categoryfooter'>
                                <?php foreach ($categoryfooter as $item): ?>

                                    <?php echo "<option value='$item->id'>";  ?>
                                    <?php echo $item->name;  ?>
                                
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