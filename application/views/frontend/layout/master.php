<?php
    $arr_name = array();
    $arr_slice = array();
    $arr_result = array();
    $arr_result2 = array();
    $arr_result3 = array();
    $arr_result4 = array();
    for($i = 0; $i < count($slides); $i++) {
        array_push($arr_name, $slides[$i]->urlfix);
    }
    for($i = 0; $i < count($arr_name); $i++) {
        $arr_slice = explode(" ", $arr_name[$i]);
        for($j = 0; $j < count($arr_slice); $j++) {
            if($j < 2) {
                $arr_result[$i] = $arr_slice[0]." ".$arr_slice[1]." ".$arr_slice[2];
              
            }
            
        }
        $arr_result2[$i] = str_replace($arr_result[$i], " ", $arr_name[$i]);
        for($k = 0; $k < count($arr_result); $k++) {
            $arr_result3[$k] = $arr_result[$k]." ";
        }
        $arr_result2 = array_values($arr_result2);
       
        for($m = 0; $m < count($arr_result2); $m++) {
            $arr_result4[$m] = $arr_result2[$m]." ";
        }
        
    }

     
    

?>

<div class="master-slider ms-skin-default" id="masterslider"> 
    
    
    <?php
        
        for($i = 0; $i < count($slides); $i++) {
            
            $j = $i + 1;
            $classname = "<div class='ms-slide slide-".$j." data-delay='9'>";
            echo $classname;
            $name = $slides[$i]->name;
            $image = $slides[$i]->image;
            $url = $slides[$i]->url;
            echo "<img src='js/masterslider/blank.gif' data-src='$image' alt=''/> ";
           if($slides[$i]->margincontent == 1) {
                echo "<h3 class='ms-layer text351' style='top: 150px; left:230px;' data-type='text' data-delay='1000' data-ease='easeOutExpo' data-duration='1230' data-effect='top(250)'>";
                echo $slides[$i]->content;
                echo "</h3>";
                echo "<h3 class='ms-layer text35mb' style='display: none !important;top: 150px; left:230px;' data-type='text' data-delay='1000' data-ease='easeOutExpo' data-duration='1230' data-effect='top(250)'>";
                echo strip_tags($slides[$i]->content);
                echo "</h3>";
            }
            else if($slides[$i]->margincontent == 2) {
                echo "<h3 class='ms-layer text351' style='top: 150px; right:230px; text-align: right' data-type='text' data-delay='1000' data-ease='easeOutExpo' data-duration='1230' data-effect='top(250)'>";
                echo $slides[$i]->content;
                echo "</h3>";
                echo "<h3 class='ms-layer text35mb' style='display: none !important;top: 150px; right:230px; text-align: right' data-type='text' data-delay='1000' data-ease='easeOutExpo' data-duration='1230' data-effect='top(250)'>";
                echo strip_tags($slides[$i]->content);
                echo "</h3>";
            }
            if($slides[$i]->marginurlfix == 1) {
                echo "<h3 class='ms-layer text351' style='top: 200px; left:230px;' data-type='text' data-delay='1200' data-ease='easeOutExpo' data-duration='1230' data-effect='top(250)'>";
                echo $slides[$i]->urlfix;
                echo "</h3>";
                echo "<h3 class='ms-layer text351mb' style='display: none !important;top: 200px; left:230px;' data-type='text' data-delay='1200' data-ease='easeOutExpo' data-duration='1230' data-effect='top(250)'>";
                echo strip_tags($slides[$i]->urlfix);
                echo "</h3>";
            }
            else if($slides[$i]->marginurlfix == 2) {
                echo "<h3 class='ms-layer text351' style='top: 200px; right:230px; text-align: right' data-type='text' data-delay='1200' data-ease='easeOutExpo' data-duration='1230' data-effect='top(250)'>";
                echo $slides[$i]->urlfix;
                echo "</h3>";
                echo "<h3 class='ms-layer text351mb' style='display: none !important;top: 200px text-align: right; right:230px;' data-type='text' data-delay='1200' data-ease='easeOutExpo' data-duration='1230' data-effect='top(250)'>";
                echo strip_tags($slides[$i]->urlfix);
                echo "</h3>";
            }
  echo "<a href='$url'>";
            echo "</a>";
            if($slides[$i]->url != '') {
                
            }
            /*echo "<h3 class='ms-layer text351' style='top: 150px; left:230px;' data-type='text' data-delay='1000' data-ease='easeOutExpo' data-duration='1230' data-effect='top(250)'>";
            echo $slides[$i]->;
            echo "</h3>";
            echo "<h3 class='ms-layer text351' style='top: 200px; left:230px;' data-type='text' data-delay='1000' data-ease='easeOutExpo' data-duration='1230' data-effect='top(250)'>";
            echo $arr_result4[$i];
            echo "</h3>";
            echo "<h3 class='ms-layer text351' style='top: 320px; left:230px;' data-type='text' data-delay='1500' data-ease='easeOutExpo' data-duration='1230' data-effect='top(250)'>";
            echo $slides[$i]->content;
            echo "</h3>";
            echo "<a href='$url' class='ms-layer sbut14' style='top: 400px; left:230px;' data-type='text' data-delay='200' data-ease='easeOutExpo' data-duration='1230' data-effect='top(250)'>";
            echo "Xem thêm";
            echo "</a>";*/
            echo "</div>";
        }   
    ?>

    <!-- slide 1 -->
   
    <!-- end slide 1 --> 
    


  </div>