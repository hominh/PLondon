<div class="maincontent">
    <div class="maincontentinner">
        <div class="widgetbox box-inverse">
            <h4 class="widgettitle">Cập nhật bài viết giới thiệu</h4>
            <div class="widgetcontent wc1">
                <form class="form-horizontal" action="<?php echo base_url(); ?>quantri/gioithieu/edit/<?php echo $info['id']; ?>" method="post" enctype="multipart/form-data">
                    <?php
                    echo "<div class='mess_error'>";
                    echo "<ul>";
                    if (validation_errors() != '') {
                        echo "<li>" . validation_errors() . "</li>";
                    }
                    echo "</ul>";
                    echo "</div>";
                    ?>
                    <?php
                        if($info['showhome'] == 1) {
                            $check1 = "checked";
                            $check2 = "";
                        }
                        else if($info['showhome'] == 0) {
                            $check2 = "checked";
                            $check1 = "";
                        }
                    ?>
                    <div class="control-group">
                        <label class="control-label">Tên bài viết</label>
                        <div class="controls">
                            <input name="name" type="text"  placeholder="Tên bài viết" value="<?php echo $info['name']; ?>">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Miêu tả bài viết</label>
                        <div class="controls">
                            <textarea name="description" id="description" class="span5"><?php echo $info['description']; ?></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Nội dung bài viết</label>
                        <div class="controls">
                            <span class="field">
                                <?php
                                echo $this->ckeditor->editor("content", $info['content']);
                                ?>
                            </span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Keyword bài viết</label>
                        <div class="controls">
                            <span class="field">
                                <textarea name="meta_keyword" id="meta_keyword" class="span5"><?php echo $info['meta_keyword']; ?></textarea>
                            </span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Description bài viết</label>
                        <div class="controls">
                            <span class="field">
                                <textarea name="meta_description" id="meta_description" class="span5"><?php echo $info['meta_description']; ?></textarea>
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
                        
                        <div class="controls">
                            <img src='<?php echo $info['image']; ?>' height='200' width='200' />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Trạng thái</label>
                        <div class="controls">
                            <input type="radio" name="showhome"  value="1" <?php echo $check1; ?> >Hiển thị ở trang chủ <br />
                            <input type="radio" name="showhome"  value="0" <?php echo $check2; ?> >Không hiển thị ở trang chủ
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