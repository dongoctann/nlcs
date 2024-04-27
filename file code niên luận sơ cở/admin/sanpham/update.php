<?php
// Kiểm tra xem biến $sanpham có phải là một mảng không
if (is_array($sanpham)) {
    // Nếu là mảng, trích xuất các phần tử của mảng thành các biến độc lập
    extract($sanpham);
}

// Tạo đường dẫn đến hình ảnh sản phẩm
$hinhpath = "../upload/" . $img;
// Kiểm tra xem hình ảnh có tồn tại không
if (is_file($hinhpath)) {
    // Nếu có, tạo thẻ <img> để hiển thị hình ảnh sản phẩm
    $hinh = "<img src='" . $hinhpath . "' height='200'>";
} else {
    // Nếu không, hiển thị thông báo "no photo"
    $hinh = "no photo";
}
?>
<main>
    <div class="row headeraddmin">
        <div class="row ">
            <h1>Cập Nhật Loại Sản Phẩm</h1>
        </div>
        <div class="row frmcontent">
            <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data">
                <div class="row mb10">
                    <select name="iddm">
                        <option value="0" selected>Tất cả</option>
                        <?php
                        // Duyệt qua danh sách danh mục và tạo các tùy chọn <option>
                        foreach ($listdanhmuc as $danhmuc) {
                            // extract($danhmuc);
                            // Kiểm tra xem danh mục có được chọn hay không
                            if ($iddm == $danhmuc['id']) $s = "selected";
                            else $s = "";
                            // Xuất tùy chọn <option> với giá trị và văn bản hiển thị tương ứng
                            echo '<option value="' . $danhmuc['id'] . '" ' . $s . '>' . $danhmuc['name'] . '</option>';
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
                <div class="row mb10 cuoi">
                    <div class="hh">
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <input type="submit" name="capnhat" value="Cập Nhật">
                        <input type="reset" value="Nhập lại">
                    </div>
                    <a href="index.php?act=listsp"><input type="button" value="DANH SÁCH"></a>
                </div>

                <?php
                if (isset($thongbao) && ($thongbao != "")) echo $thongbao;
                ?>

            </form>


        </div>
</main>
<style>
    .hh {
        width: 35%;
        margin: 20px auto;
        /* Đưa phần tử về giữa trang */
        text-align: center;
        /* Căn giữa nội dung bên trong */
    }

    .cuoi input[type="submit"],
    .cuoi input[type="reset"],
    .cuoi input[type="button"] {
        padding: 10px 20px;
        font-size: 16px;
        text-align: center;
        text-decoration: none;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .cuoi input[type="submit"] {
        background-color: #4CAF50;
        /* Màu xanh lá cây */
        color: white;
    }

    .cuoi input[type="submit"]:hover {
        background-color: #45a049;
        margin-top: 2px;
        /* Màu xanh lá cây đậm */
    }

    .cuoi input[type="reset"] {
        background-color: #f44336;
        margin-top: 3px;
        /* Màu đỏ */
        color: white;
    }

    .cuoi input[type="reset"]:hover {
        background-color: #d32f2f;
        /* Màu đỏ đậm */
    }

    .cuoi input[type="button"] {
        background-color: #008CBA;
        /* Màu xanh dương */

        margin-top: 2px;
        color: white;
    }

    .cuoi a {
        display: inline-block;
        /* Hiển thị như một khối */
        text-align: left;
        /* Căn trái chữ */
        margin-left: 10px;
        /* Tạo khoảng cách phía bên phải */
    }

    .cuoi input[type="button"]:hover {
        background-color: #0073e6;
        /* Màu xanh dương đậm */
    }
</style>