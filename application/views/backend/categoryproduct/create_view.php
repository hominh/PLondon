<div class="maincontent">
    <div class="maincontentinner">
        <div class="widgetbox box-inverse">
            <h4 class="widgettitle">Thêm mới danh mục sản phẩm</h4>
            <div class="widgetcontent wc1">
                <form class="form-horizontal" action="<?php echo base_url(); ?>quantri/categoryproduct/create" method="post" enctype="multipart/form-data">
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
                        <label class="control-label">Tên danh mục</label>
                        <div class="controls">
                            <input name="name" type="text"  placeholder="Tên danh mục" value="">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Tiêu đề danh mục</label>
                        <div class="controls">
                            <input name="title" type="text"  placeholder="Tiêu đề danh mục" value="">
                        </div>
                    </div>
                    
                    

                   <div class="control-group">
                        <label class="control-label">Keyword danh mục</label>
                        <div class="controls">
                            <span class="field">
                                <textarea name="meta_keyword" id="meta_keyword" class="span5"></textarea>
                            </span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Meta Description danh mục</label>
                        <div class="controls">
                            <span class="field">
                                <textarea name="meta_description" id="meta_description" class="span5"></textarea>
                            </span>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label">Danh mục cha</label>
                        <div class="controls">
                            <select name='categoryproduct' id='categoryproduct'>
                                <option value = "0">Không thuộc danh mục nào</option>
                                <?php foreach ($categoryproduct as $item): ?>

                                    <?php echo "<option value='$item->id'>";  ?>
                                    <?php echo $item->name;  ?>
                                
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    
                            <input name="slug_parenttxt" id="slug_parenttxt" type="hidden" value="">
                  
                   
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success">Thêm mới</button>
                        <a class="btn" href="index.php">Hủy bỏ</a>
                    </div>
                </form>
            </div><!--widgetcontent-->
        </div><!--widget-->
    </div><!-- End maincontentinner-->
</div><!-- End maincontent -->
<script language="javascript">
    jQuery.noConflict();
    jQuery( document ).ready(function( $ ) {
        $('#categorypost').on('change', function() {
            var value = $('#categorypost option:selected').html();
            var blank = "";
            $('#slug_parenttxt').val(blank);
            $('#slug_parenttxt').val(value);
        });
    });
</script>