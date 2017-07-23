<section class="section-fulldark sec-paddingfooter">
    <div class="container">
        <div class="row">
            <div class="col-md-3 clearfix">
              <h4 class="uppercase footer-title less-mar3 roboto-slab">GIỚI THIỆU</h4>
              <div class="clearfix"></div>
              <div class="footer-title-bottomstrip"></div>

              <ul class="usefull-links">
                <?php foreach ($categoryfooter as $item): ?>

                <li class="" style='padding: 0px;'><a href='<?php echo site_url('category/detail/'.$item->slug); ?>' style='margin-left: 0px;'><i class="fa fa-angle-right"></i><?php echo $item->name; ?></a></li>

                <?php endforeach ?>
                <li class="" style='padding: 0px;'><a href='<?php echo site_url('category'); ?>' style='margin-left: 0px;'><i class="fa fa-angle-right"></i>Bài viết và tin tức</a></li>
              </ul>
            </div>

            <!--end item--> 
            <div class="col-md-3 clearfix">
                <div class="item-holder">
                    <h4 class="uppercase footer-title less-mar3 roboto-slab">CỬA HÀNG</h4>
                    <div class="clearfix"></div>
                    <div class="footer-title-bottomstrip"></div>
                    <a href='<?php echo site_url('cuahang'); ?>' class="pfooter">Danh sách các cửa hàng của PoshLondon trên toàn quốc</a>
                    <!--<br/>
                    <p class="pfooter">Suspendisse et justo. Praesent mattis commodo augue. Aliquam ornare hendrerit consectetuer </p>!-->
                </div>
            </div>

            <!--end item--> 
            <div class="col-md-3 clearfix">
                <h4 class="uppercase footer-title less-mar3 roboto-slab">DỊCH VỤ</h4>
                <div class="clearfix"></div>
                <div class="footer-title-bottomstrip"></div>
                
                
                    <div class='row'>
                        <div class='item' style="text-align: left">
                            <?php foreach ($dichvu as $item): ?>
                                <div class='dichvu_footer'>
                                    <div class='col-md-11 clearfix' style='padding: 0'>
                                        <img src="<?php echo $item->image; ?>" class="img-responsive" id="<?php echo 'dv'.$item->id; ?>" style='' height="36" width="36" />
                                        &nbsp;&nbsp;&nbsp;
                                        <a class='' href='<?php echo site_url('dichvu/detail/'.$item->slug); ?>'><?php echo $item->name; ?></a>
                                    </div>
                                    
                                </div>
                                <div class='cleafix'></div>
                            <?php endforeach ?>
                        </div>
                    </div>
             
                
            </div>
            <!--end item-->
            <div class="h15px"></div>
            <div class="col-md-3 clearfix">
                <div class="item-holder">
                    <a href='<?php echo site_url('lienhe') ?>'><h4 class="uppercase footer-title less-mar3 roboto-slab">LIÊN HỆ</h4></a>
                    <div class="clearfix"></div>
                    <div class="footer-title-bottomstrip"></div>
                    <div class="newsletter">
                        <p class="pfooter">Hãy điền email của bạn vào ô trống để được cập nhật những thông tin mới nhất từ chúng tôi.</p>
                        <br />
                        <form method="POST" action="<?php echo base_url(); ?>email/send">
                            <input class="email_input dark" name="email" id="samplees" placeholder="E-mail của bạn"  />
                            <input name="submit" value="Gửi" class="input_submit dark" type="submit" style='padding: 0px 10px 0px 10px;'/>
                        </form>
                    </div>
                    <div class="margin-top3"></div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!--end item-->



        </div>
    </div>
</section>
<!--end section-->
<div class="clearfix"></div>

<section class="section-copyrights sec-moreless-padding" style="text-align:left;">
    <div class="container">
        <div class="row">
            <div class="col-md-4 clearfix" style="padding-left:0px;">
                <span class="text_coppyright">Copyright © 2015 Posh London</span>
            </div>
            <div class="col-md-3 clearfix">

            </div>
            <div class="col-md-2 clearfix">

            </div>
            <div class="col-md-3 clearfix">
                <ul class="social-icons-3 dark-2">
                   
                    <li><a class="twitter"  href = <?="http://".$configs[0]->twitter;?>><i class="fa fa-twitter"></i></a></li>
                    <li><a href="<?php echo "http://".$configs[0]->facebook; ?>"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="<?php echo "http://".$configs[0]->googleplus; ?>"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="<?php echo "http://".$configs[0]->linkedin; ?>"><i class="fa fa-linkedin"></i></a></li>
                    <!--<li><a href="<?php echo "http://".$configs[0]->dribbble; ?>"><i class="fa fa-dribbble"></i></a></li>!-->
                </ul>
            </div>

        </div>
    </div>
</section>
<!--end section-->
<div class="clearfix"></div>
<a href="#" class="go-top">Go Top</a>
<!--<a href="#" class="scrollup stone"></a> end scroll to top of the page--> 
</div>
</body>
<!-- ============ JS FILES ============ --> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/fe/js/universal/jquery.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/fe/js/universal/jquery.themepunch.tools.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/fe/js/universal/jquery.themepunch.revolution.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/fe/js/bootstrap/bootstrap.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/fe/js/masterslider/jquery.easing.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/fe/js/masterslider/masterslider.min.js"></script>
<script src="<?php echo base_url(); ?>assets/fe/js/universal/numeral.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#city').on('change', function() {
            
            var value = $(this).val();
           
            if(value == '1') {
                $("#tphn").css("display", "block");
                $("#tphcm").css("display", "none");
            }
            if(value == '2') {
                $("#tphcm").css("display", "block");
                $("#tphn").css("display", "none");
            }
        });
        $('#tphn').on('change', function() {
            var value = $(this).val();
            window.location = "http://poshlondon.vn/cuahang/detail/"+value;
        });
        $('#tphcm').on('change', function() {
            var value = $(this).val();
            window.location = "http://poshlondon.vn/cuahang/detail/"+value;
        });
    });
</script>

<script type="text/javascript">
                            (function ($) {
                                "use strict";
                                var slider = new MasterSlider();
                                // adds Arrows navigation control to the slider.
                                slider.control('arrows');
                                slider.control('bullets');

                                slider.setup('masterslider', {
                                    width: 1600, // slider standard width
                                    height: 630, // slider standard height
                                    space: 0,
                                    speed: 45,
                                    layout: 'fullwidth',
                                    loop: true,
                                    preload: 0,
                                    autoplay: true,
                                    view: "parallaxMask",
                                    mouse: "false",
                                    swipe: "false",
                                    grabCursor: "false"
                                });

                            })(jQuery);
</script>
<script type="text/javascript">
    (function($) {
        'use strict';
        $(document).ready(function() {
            $("#owl-demo").owlCarousel({
     
     autoPlay: 60000, //Set AutoPlay to 3 seconds
 
      items : 3,
      itemsDesktop : [1199,3],
      itemsDesktopSmall : [979,3],
      navigation: true,
        navigationText: [
            "",""
      ],
     
    // "singleItem:true" is a shortcut for:
    // items : 1,
    // itemsDesktop : false,
    // itemsDesktopSmall : false,
    // itemsTablet: false,
    // itemsMobile : false
     
    });
$("#owl-demo7").owlCarousel({

      //navigation : true, // Show next and prev buttons
      navigation: true,
        navigationText: [
            "",""
      ],
      pagination : false,
      slideSpeed : 1000,
      paginationSpeed : 400,
      singleItem:true,
      //transitionStyle : "goDown"

      // "singleItem:true" is a shortcut for:
      // items : 1, 
      // itemsDesktop : false,
      // itemsDesktopSmall : false,
      // itemsTablet: false,
      // itemsMobile : false

  });
        });
    })(jQuery);
</script>
<script type="text/javascript">
    $(document).ready(function() {
        var curimagescontact = $('#dv1').attr('src');
        var changeproduct = $('#dv3').attr('src');
        var deliver = $('#dv4').attr('src');
        var other = $('#dv5').attr('src');
        $("#dv1").hover(function(){
           $(this).attr('src','assets/uploads/imagegioithieu/dichvutuvanhover.png');
        },function() {
            $(this).attr('src',curimagescontact);
        });
        $("#dv3").hover(function(){
           $(this).attr('src','assets/uploads/imagegioithieu/dichvudoitrahover.png');
        },function() {
            $(this).attr('src',changeproduct);
        });
        $("#dv4").hover(function(){
           $(this).attr('src','assets/uploads/imagegioithieu/dichvugiaohanghover.png');
        },function() {
            $(this).attr('src',deliver);
        });
        $("#dv5").hover(function(){
           $(this).attr('src','assets/uploads/imagegioithieu/dichvukhachover.png');
        },function() {
            $(this).attr('src',other);
        });
        
    });
</script>
<script type="text/javascript">
    $(function(){
    $("#big-image a:eq(0)").nextAll().hide();
    $(".item3").click(function(e){
        var index = $(this).index();
        
        $("#big-image a").eq(index).show().siblings().hide();
    });
});
</script>
<script type="text/javascript">
    (function($) {

  'use strict';

  $(document).on('show.bs.tab', '.nav-tabs-responsive [data-toggle="tab"]', function(e) {
    var $target = $(e.target);
    var $tabs = $target.closest('.nav-tabs-responsive');
    var $current = $target.closest('li');
    var $parent = $current.closest('li.dropdown');
        $current = $parent.length > 0 ? $parent : $current;
    var $next = $current.next();
    var $prev = $current.prev();
    var updateDropdownMenu = function($el, position){
      $el
        .find('.dropdown-menu')
        .removeClass('pull-xs-left pull-xs-center pull-xs-right')
        .addClass( 'pull-xs-' + position );
    };

    $tabs.find('>li').removeClass('next prev');
    $prev.addClass('prev');
    $next.addClass('next');
    
    updateDropdownMenu( $prev, 'left' );
    updateDropdownMenu( $current, 'center' );
    updateDropdownMenu( $next, 'right' );
  });

})(jQuery);
</script>
<script type="text/javascript">
    $(document).ready(function() {
            // Show or hide the sticky footer button
            $(window).scroll(function() {
                if ($(this).scrollTop() > 200) {
                    $('.go-top').fadeIn(200);
                } else {
                    $('.go-top').fadeOut(200);
                }
            });
            
            // Animate the scroll to top
            $('.go-top').click(function(event) {
                event.preventDefault();
                
                $('html, body').animate({scrollTop: 0}, 300);
            })
        });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#btn-cart").click(function() {
            jQuery.noConflict();
            /*var id = $('#idproduct').val();
            var idNhanh = $('#idNhanh').val();
            var name = $('#name').val();
            var price = $('#price').val();
            var description = $('#description').val();
            var image = $('#image').val();
            var code = $('#code').val();
            var importPrice = $('#importPrice').val();
            var qty = 1;*/
            alert('Sản phẩm đã được thêm vào giỏ hàng');
            //var pageAddCart = "localhost/products/add_cart?id="+id+"&idNhanh="+idNhanh+"&qty="+qty+"&";
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        function returnPrice(i) {
            return function () {
                var arr_nameofdiv = [];
                arr_nameofdiv[i] = "#moneysp" + i;
                $(arr_nameofdiv[i]).html();
            }
        }
        var num = $('div[id^="sp"]').filter(
                function () {
                    return this.id.match(/\d+$/);
                });
        var count = num.length;
        var arr_qty = [];
        
       $("#btn_muahang").click(function() {
           var str_qty = "";
           for (i = 0; i < count; i++) {
               arr_qty[i] = $("#sp" + i).html();
               str_qty = arr_qty[i]+'-';
               $('#qty').val($('#qty').val() + arr_qty[i]+"-");
           }
            
            $("#dpnone").toggle();
            $(this).hide();
            
            
        }); 
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        
        function returnPrice(i) {
            return function () {
                var arr_nameofdiv = [];
                var arr_nameofdivdel = [];
                arr_nameofdiv[i] = "#moneysp" + i;
                arr_nameofdivdel = "#delitemcart"+ i;
                $(arr_nameofdiv[i]).html();
                $(arr_nameofdivdel[i]).html();
            }
        }

        var num = $('div[id^="moneysp"]').filter(
                function () {
                    return this.id.match(/\d+$/);
                });
        var count = num.length;
        var arr_curmoney = [];
        var arr_nameofdiv = [];
        var nameofc = [];
        var nameoft = [];
        var nameofdel = [];
        var cur = [];
        var newmoney = [];
        var oldmoney = [];
        var sum = 0;
        var sumt = 0;
        var sumc = 0;
        var formatprice = [];
        for (i = 0; i < count; i++) {


            oldmoney[i] = $("#moneysp" + i).html();
            oldmoney[i] = oldmoney[i].toString();
            oldmoney[i] = oldmoney[i].replace(".", "");
            oldmoney[i] = oldmoney[i].replace(",", "");
            oldmoney[i] = oldmoney[i].replace(" VNĐ", "");
            oldmoney[i] = parseInt(oldmoney[i]);
            sum = sum + oldmoney[i];
            nameofc[i] = "#add_more_produdct" + i;
            nameoft[i] = "#-_more_produdct" + i;
            nameofdel[i] = "#delitemcart" + i;
            //arr_curmoney[i] = arr_curmoney[i].replace(".","");
            //arr_curmoney[i] = arr_curmoney[i].replace(" VNĐ","");
        }
        //alert(sum);

        var sumt = 0;
        //$("#add_more_produdct").click(function() {
        for (i = 0; i < count; i++) {
            arr_nameofdiv[i] = "#moneysp" + i;
            (function (j) {
                arr_curmoney[j] = $(arr_nameofdiv[j]).html();
                arr_curmoney[j] = arr_curmoney[j].replace(".", "");
arr_curmoney[j] = arr_curmoney[j].replace(",", "");
                arr_curmoney[j] = arr_curmoney[j].replace(" VNĐ", "");
                $(nameofc[j]).click(function () {
                    cur[j] = parseInt($("#sp" + j).html());
                    cur[j] = cur[j] + 1;
                    var blank = '';
                    $("#sp" + j).html(blank);
                    $("#sp" + j).html(cur[j]);
                    $("#moneysp" + j).html(blank);
                    newmoney[j] = parseInt(arr_curmoney[j]) * cur[j];
                    formatprice[j] = newmoney[j].toString();
                    formatprice[j] = formatprice[j].replace(",", "");
                    formatprice[j] = numeral(formatprice[j]).format('0,0[.]00');
                    formatprice[j] = formatprice[j].replace(",", ".") + " VNĐ";
                    $("#moneysp" + j).html(formatprice[j]);
                    sumt = arr_curmoney[j] * 1;
                    sum = sum + sumt;

                    /*sum = sum.toString();
                     sum = sum.replace(".","");
                     sum = sum.replace(" VNĐ","");
                     sum = numeral(sum).format('0,0[.]00');
                     sum = sum.replace(",",".")+" VNĐ";*/
                    //$("#psum").html(blank);
                    //$("#psum").html(sum.toString());
                    //sum = sum.toString();
                    //sum = numeral(sum).format('0,0[.]00');
                    var strSum = sum.toString();
                    strSum = numeral(strSum).format('0,0[.]00');
                    strSum = strSum + " VNĐ";
                    //strSum = strSum.replace("")
                    $("#psum").html(blank);
                    $("#psum").html(strSum.toString());


                });
                    
                $(nameofdel[j]).click(function () {
                    alert('Xóa thành công sản phẩm trong giỏ hàng');
                });

                $(nameoft[j]).click(function () {
                    if(cur[j] != 0) {
                        cur[j] = parseInt($("#sp" + j).html());
                    if (cur[j] > 0) {
                        cur[j] = cur[j] - 1;
                    }
                    else {
                        cur[j] = cur[j];
                    }

                    var blank = '';
                    $("#sp" + j).html(blank);
                    $("#sp" + j).html(cur[j]);
                    $("#moneysp" + j).html(blank);
                    newmoney[j] = parseInt(arr_curmoney[j]) * cur[j];
                    //console.log(newmoney[j]);
                    formatprice[j] = newmoney[j].toString();
                    formatprice[j] = formatprice[j].replace(",", "");
                    formatprice[j] = numeral(formatprice[j]).format('0,0[.]00');
                    formatprice[j] = formatprice[j].replace(",", ".") + " VNĐ";
                    //console.log(formatprice[j]);
                    $("#moneysp" + j).html(formatprice[j]);
                    //sum = sum - newmoney[j];
                    
                    
                    
                    if(cur[j] == 0) {
                        sumc = arr_curmoney[j] * 1;
                    }
                    else {
                        sumc = arr_curmoney[j] * 1;
                    }
                    console.log(sumc);
                    sum = sum - sumc;
                    var strSum = sum.toString();
                    strSum = numeral(strSum).format('0,0[.]00');
                    strSum = strSum + " VNĐ";
                    //strSum = strSum.replace("")
                    $("#psum").html(blank);
                    $("#psum").html(strSum.toString());
                    }
                });

            })(i);
        }



    });
</script>

<script src="<?php echo base_url(); ?>assets/fe/js/mainmenu/customeUI.js"></script>  
<script src="<?php echo base_url(); ?>assets/fe/js/owl-carousel/owl.carousel.js"></script>


<script type="text/javascript" src="<?php echo base_url(); ?>assets/fe/js/tabs/custom.js"></script> 
<script src="<?php echo base_url(); ?>assets/fe/js/scrolltotop/totop.js"></script> 

<script src="<?php echo base_url(); ?>assets/fe/js/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script> 
 


</body>
</html>