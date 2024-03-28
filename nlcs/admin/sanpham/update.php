<?php
if (is_array($sanpham)) {
    extract($sanpham);
}
$hinhpath = "../upload/" . $img;
if (is_file($hinhpath)) {
    $hinh = "<img src='" . $hinhpath . "' height='200'>";
} else {
    $hinh = "no photo";
}
?>
<main>
    <div class="row headeraddmin">
        <div class="row ">
            <h1>Cập Nhật Loại Hàng Hóa</h1>
        </div>
        <div class="row frmcontent">
            <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data">
                <div class="row mb10">
                    <select name="iddm">
                        <option value="0" selected>Tất cả</option>
                        <?php
                        foreach ($listdanhmuc as $danhmuc) {
                            extract($danhmuc);
                            if ($iddm == $id) $s = "selected";
                            else $s = "";
                            echo '<option value="' . $id . '" ' . $s . '>' . $name . '</option>';
                        }
                        ?>
                    </select>


                </div>
                <div class="row mb10">
                    Tên sản phẩm <br>
                    <input type="text" name="tensp" value="<?= $name ?>">
                </div>
                <div class="row mb10">
                    Giá <br>
                    <input type="text" name="giasp" value="<?= $price ?>">
                </div>
                <div class="row mb10">
                    Hình <br>
                    <input type="file" name="hinh">
                    <div> <?= $hinh ?></div>

                </div>
                <div class="row mb10">
                    size <br>
                    <input type="text" name="size" value="<?= $size ?>">

                </div>
                <div class="row mb10">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <input type="submit" name="capnhat" value="Cập Nhật">
                    <input type="reset" value="Nhập lại">
                    <a href="index.php?act=listsp"><input type="button" value="DANH SÁCH"></a>
                </div>

                <?php
                if (isset($thongbao) && ($thongbao != "")) echo $thongbao;
                ?>

            </form>


        </div>
</main>