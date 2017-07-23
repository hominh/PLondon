<div class="maincontent">
    <div class="maincontentinner">
        <div class="widgetbox box-inverse">
            <h4 class="widgettitle">Thêm mới bài viết</h4>
            <div class="widgetcontent wc1">
                <form class="form-horizontal" action="<?php echo base_url(); ?>quantri/products/create" method="post" enctype="multipart/form-data">
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
                        <label class="control-label">Tên sản phẩm</label>
                        <div class="controls">
                            <input name="name" type="text"  placeholder="Tên sản phẩm" value="">
                        </div>
                    </div>


                    <div class="control-group">
                        <label class="control-label">Mã vạch sản phẩm</label>
                        <div class="controls">
                            <input name="barcode" type="text"  placeholder="Mã vạch sản phẩm" value="">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Mã sản phẩm</label>
                        <div class="controls">
                            <input name="code" type="text"  placeholder="Mã sản phẩm" value="">
                        </div>
                    </div>
                    
                    
                    <div class="control-group">
                        <label class="control-label">Keyword sản phẩm</label>
                        <div class="controls">
                            <span class="field">
                                <textarea name="keyword" id="keyword" class="span5"></textarea>
                            </span>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label">Nội dung sản phẩm</label>
                        <div class="controls">
                            <span class="field">
                                <?php
                                    echo $this->ckeditor->editor("content");
                                ?>
                            </span>
                        </div>
                    </div>

                   <div class="control-group">
                        <label class="control-label">Description sản phẩm (for sale)</label>
                        <div class="controls">
                            <span class="field">
                                <textarea name="descriptionforsale" id="descriptionforsale" class="span5"></textarea>
                            </span>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label">Description sản phẩm (Mô tả & liều dùng)</label>
                        <div class="controls">
                            <span class="field">
                                <?php
                                    echo $this->ckeditor->editor("description");
                                ?>
                            </span>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label">Giá</label>
                        <div class="controls">
                            <input name="price" type="text"  placeholder="Giá" value="">
                        </div>
                    </div>


                    <div class="control-group">
                        <label class="control-label">Giá khuyến mại</label>
                        <div class="controls">
                            <input name="wholesalePrice" type="text"  placeholder="Giá khuyến mại" value="">
                        </div>
                    </div>


                    <div class="control-group">
                        <label class="control-label">Ảnh đại diện</label>
                        <div class="controls">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="input-append" style="">
                                    <input type="file" name="userfile" size="20" />
                                </div>
                            </div>
                        </div>
                    </div>
                    

                    <div class="control-group">
                        <label class="control-label">Tình trạng</label>
                        <div class="controls">
                            <input type="radio" name="status"  value="Active" >Còn hàng
                            <input type="radio" name="status"  value="Inactive" >Hết hàng
                        </div>
                    </div>


                    <div class="control-group">
                        <label class="control-label">Sản phẩm ưu tiên</label>
                        <div class="controls">
                            <input type="checkbox" name="hot"  value="1">
                            
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label">Thuộc danh mục</label>
                        <div class="controls">
                            <select name='categoryproduct'>
                                 <?php foreach ($categoryproduct as $item1): ?>                                   
                                    <?php echo "<option value='$item1->id'>";  ?>
                                    <?php echo $item1->name;  ?>
                                
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