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
            <a href='<?php echo base_url(); ?>quantri/products/create' class='btn btn-success'>Thêm mới </a>
        </p>
        <h4 class="widgettitle">DANH SÁCH SẢN PHẨM</h4>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    
                    <th>Thuộc chuyên mục</th>
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
                    echo $item->name;
                    echo "</td>";
                    echo "<td>";
                    echo $item->namecategory;
                    echo "</td>";
                    echo '<td width=240>';
                    echo "<a class='btn btn-info' href=" . base_url() . "quantri/images/edit/$item->id>Quản lý ảnh </a>";
                    echo "<a class='btn btn-success' href=" . base_url() . "quantri/products/edit/$item->id>Cập nhật</a>";
                    echo "<a class='btn btn-danger' href=" . base_url() . "quantri/products/delete/$item->id onclick='return xacnhan();'>Xóa</a>";
                    echo "</td>";
                    echo "</tr>";
                    $stt++;
                }
                ?>
            </tbody>
        </table>
		<p><?php echo $links; ?></p>
    </div>
    <!-- ENd maincontentinner -->
</div>
<!-- End maincontent -->