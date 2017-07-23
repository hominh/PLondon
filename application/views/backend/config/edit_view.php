<div class="maincontent">
    <div class="maincontentinner">
        <div class="widgetbox box-inverse">
            <h4 class="widgettitle">Cập nhật cửa hàng</h4>
            <div class="widgetcontent wc1">
                <form class="form-horizontal" action="<?php echo base_url(); ?>quantri/config/edit/<?php echo $info['id']; ?>" method="post" enctype="multipart/form-data">
                    <?php
                    echo "<div class='mess_error'>";
                    echo "<ul>";
                    if (validation_errors() != '') {
                        echo "<li>" . validation_errors() . "</li>";
                    }
                    echo "</ul>";
                    echo "</div>";
                    ?>
                    

                    
                    <div class="control-group">
                        <label class="control-label">Facebook</label>
                        <div class="controls">
                            <input name="facebook" type="text"  placeholder="Facebook" value="<?php echo $info['facebook']; ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Twitter</label>
                        <div class="controls">
                            <input name="twitter" type="text"  placeholder="Twitter" value="<?php echo $info['twitter']; ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Google plus</label>
                        <div class="controls">
                            <input name="googleplus" type="text"  placeholder="Google plus" value="<?php echo $info['googleplus']; ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Linkedin</label>
                        <div class="controls">
                            <input name="linkedin" type="text"  placeholder="Linkedin" value="<?php echo $info['linkedin']; ?>">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Dribbble</label>
                        <div class="controls">
                            <input name="dribbble" type="text"  placeholder="Dribbble" value="<?php echo $info['dribbble']; ?>">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Ttitle</label>
                        <div class="controls">
                            <input name="title" type="text"  placeholder="Ttitle" value="<?php echo $info['title']; ?>">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Keyword</label>
                        <div class="controls">
                            <input name="keyword" type="text"  placeholder="Keyword" value="<?php echo $info['keyword']; ?>">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Description</label>
                        <div class="controls">
                            <input name="description" type="text"  placeholder="Description" value="<?php echo $info['description']; ?>">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Dribbble</label>
                        <div class="controls">
                            <input name="dribbble" type="text"  placeholder="Dribbble" value="<?php echo $info['dribbble']; ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Address</label>
                        <div class="controls">
                            <input name="add" type="text"  placeholder="Address" value="<?php echo $info['add']; ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Tell</label>
                        <div class="controls">
                            <input name="tell" type="text"  placeholder="Tell" value="<?php echo $info['tell']; ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Fax</label>
                        <div class="controls">
                            <input name="fax" type="text"  placeholder="Fax" value="<?php echo $info['fax']; ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Email</label>
                        <div class="controls">
                            <input name="email" type="text"  placeholder="Email" value="<?php echo $info['email']; ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Website</label>
                        <div class="controls">
                            <input name="website" type="text"  placeholder="Website" value="<?php echo $info['website']; ?>">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Hình ảnh bản đồ cửa hàng</label>
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
                            <img id='sarah' class='imagewarp magnify' data-magnifyby='5' src='<?php echo $info['map']; ?>' height='200' width='200' />
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