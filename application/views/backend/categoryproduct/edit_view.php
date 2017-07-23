<div class="maincontent">
    <div class="maincontentinner">
        <div class="widgetbox box-inverse">
            <h4 class="widgettitle">Cập nhật chuyên mục</h4>
            <div class="widgetcontent wc1">
                <form class="form-horizontal" action="<?php echo base_url(); ?>quantri/categoryproduct/edit/<?php echo $info['id']; ?>" method="post" enctype="multipart/form-data">
                <?php
			        echo "<div class='mess_error'>";
			        echo "<ul>";
			            if(validation_errors() != ''){
			                echo "<li>".validation_errors()."</li>";
			            }
			        echo "</ul>";
			        echo "</div>";
				?>
                <?php
                    if($info['id_parent'] == 0) {
                        $selected = "<option value = '0'>Danh mục cha</option>";
                    }
                    else {
                        $selected = "";
                    }
                    

                ?>
                    <div class="control-group">
                        <label class="control-label">Tên chuyên mục</label>
                        <div class="controls">
                            <input name="name" type="text"  placeholder="Tên chuyên mục" value="<?php echo $info['name']; ?>">
                        </div>
                    </div>
                    
                     <div class="control-group">
                        <label class="control-label">Tiêu đề chuyên mục</label>
                        <div class="controls">
                            <input name="title" type="text"  placeholder="Tiêu đề chuyên mục" value="<?php echo $info['title']; ?>">
                        </div>
                    </div>
                    

                   <div class="control-group">
                        <label class="control-label">Keyword chuyên mục</label>
                        <div class="controls">
                            <span class="field">
                                <textarea name="meta_keyword" id="meta_keyword" class="span5"><?php echo $info['meta_keyword']; ?></textarea>
                            </span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Meta Description chuyên mục</label>
                        <div class="controls">
                            <span class="field">
                                <textarea name="meta_description" id="meta_description" class="span5"><?php echo $info['meta_description']; ?></textarea>
                            </span>
                        </div>
                    </div>
                    
                     
                    <div class="control-group">
                        <label class="control-label">Danh mục cha</label>
                        <div class="controls">
                            <select name='categoryproduct' id='categoryproduct'>
                                <?php echo $selected; ?>
                                <?php foreach ($chuyenmucchabyid as $item): ?>                                   
                                    <?php echo "<option value='$item->id' selected>";  ?>
                                    <?php echo $item->name;  ?>
                                
                                <?php endforeach ?>
                                <?php foreach ($categoryproduct as $item): ?>                                   
                                    <?php echo "<option value='$item->id'>";  ?>
                                    <?php echo $item->name;  ?>
                                
                                <?php endforeach ?>
                                <option value = '0'>Danh mục cha</option>
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
<script language="javascript">
    jQuery.noConflict();
    jQuery( document ).ready(function( $ ) {
        $('#categorypost').on('change', function() {
            var value = $('#categorypost option:selected').html();
            ///alert(value);
            var blank = "";
            $('#slug_parenttxt').val(blank);
            $('#slug_parenttxt').val(value);
        });
    });
</script>