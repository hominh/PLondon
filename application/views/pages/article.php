<div class="clearfix"></div>
<section class="sec-padding" style='padding-bottom: 76px;'>
    <div class="container">
        <div class="row">
            <div class="col-md-5 item">
                <div class="logo_gioithieu ">
                    <img class="img-responsive hovercustomimg" src="<?php echo base_url(); ?>/assets/fe/images/logo_gioithieu.png" />
                    
                </div>
            </div>
            <div class="col-md-7 item">
                <h2 class="namegioithieu left30" style="margin-bottom: 15px; font-weight: 700;font-size: 31pt;"><?php echo $article['name']; ?></h2>
                <div class="clearfix"></div>
                <br />
                <p style="font-weight: 600; font-size:13pt"><?php echo $article['description']; ?></p>
                <div class="contentgioithieu">
                    <?php echo $article['content']; ?>
                </div>
            </div>
        </div>
    </div>
</section>
