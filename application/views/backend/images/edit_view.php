<?php header("Content-type: text/html; charset=utf-8"); ?>
<?php
if (isset($mess) && $mess != '') {
    echo "<div class='mess_succ'>";
    echo "<ul>";
    echo "<li>$mess</li>";
    echo "</ul>";
    echo "</div>";
}
?>
<div class="maincontent">
    <div class="maincontentinner">
        <p>
			<?php
				$idproduct = 0;
				foreach ($info as $items) {
					$idproduct = $items->idproduct;
				}
			?>
            <a href='<?php echo base_url(); ?>quantri/images/create/<?php echo $idproduct; ?>' class='btn btn-success'>Thêm mới </a>
        </p>
        <h4 class="widgettitle">ẢNH SẢN PHẨM</h4>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Hình ảnh</th>
                    
                    <th>Sản phẩm</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stt = 1;
                foreach ($info as $item) {
                    echo "<tr class='record'>";
                    echo '<td width=400>' . $stt . '</td>';
                    echo "</td>";
                    echo "<td>";
                    echo "<img id='sarah' src='$item->url' height = '200' width = '300' class='imagewarp magnify' data-magnifyby='5' />";
                    echo "</td>";
                    echo "<td>";
                    echo $item->name;
                    echo "</td>";
                    echo '<td width=150>';
                    echo "<a class='btn btn-danger' href=" . base_url() . "quantri/images/delete/$item->id onclick='return xacnhan();'>Xóa</a>";
                    echo "</td>";
                    echo "</tr>";
                    $stt++;
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- ENd maincontentinner -->
</div>
<!-- End maincontent -->