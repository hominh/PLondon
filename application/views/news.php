<script type="text/javascript" src="<?php echo base_url();?>/assets/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/assets/ckfinder/ckfinder.js"></script>

<div class="box-body"> 
        <?php
        echo form_open('news');
        echo form_label("Nội dung: ");
        echo $this->ckeditor->editor("txtNoidung","Giá trị mặc định"); 
        echo form_submit('submit', 'Thêm');
        echo form_close();
        ?>
       
    </div>