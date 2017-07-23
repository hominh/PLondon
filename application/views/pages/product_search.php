<div class="clearfix"></div>
<section class="sec-padding" style="margin-top: 20px;">
    <div class="container">
        <div class="col-md-1"></div>
        <form class="form-horizontal " action="<?php echo base_url(); ?>products/s" method="POST" >
        <div class="col-md-9 borderform" style='padding-left:0px;'>
            
              
              <div class="col-md-5" style="padding:0px">
                <label class="label_timkiem">Tìm kiếm.</label>
              </div>
              <div class="col-md-7" style="padding:0px">
                <input name="name" class="input_noboder input_timkiem" value="" type="text" placeholder = "" />
                <input type="image" class="searchbutton" name="search" src="<?php echo base_url(); ?>assets/fe/images/search_icon.png" alt="Search">
              </div>
              
           
        </div>
        <div class='clearfix'></div>
        <div class="col-md-1" style='margin-top: 5px;'></div>
        <div class="col-md-9" style='margin-top: 5px;padding-left: 0px;'>
          <div class="radio-toolbar">
         <input type="radio" name="searchtype" value="1" class='searchtype'> Sản phẩm &nbsp;&nbsp;
          <input type="radio" name="searchtype" value="2" class='searchtype'> Tin tức<br>
          
        </div>
        </form>
    </div>
  </section>