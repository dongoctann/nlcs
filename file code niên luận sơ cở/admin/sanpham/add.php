<main>
    <div class="row headeraddmin">
        <div class="row ">
            <h1>Thêm Mới Sản Phẩm</h1>
        </div>
        <div class="row frmcontent">
            <form action="index.php?act=addsp" method="post" enctype="multipart/form-data">
                <div class="row mb10">
                    Danh mục <br>
                    <select name="iddm">
                        <?php
                        // Duyệt qua mỗi phần tử trong mảng $listdanhmuc và tạo các tùy chọn <option>
                        foreach ($listdanhmuc as $danhmuc) {
                            // Trích xuất các phần tử của mảng $danhmuc thành các biến độc lập
                            extract($danhmuc);
                            // Tạo một tùy chọn <option> với giá trị là id của danh mục và văn bản hiển thị là name của danh mục
                            echo '<option value="' . $id . '">' . $name . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="row mb10">
                    Tên sản phẩm <br>
                    <input type="text" name="tensp">
                </div>
                <div class="row mb10">
                    Giá <br>
                    <input type="text" name="giasp">
                </div>
                <div class="row mb10">
                    Hình <br>
                    <input type="file" name="hinh">
                </div>
                <div class="row mb10">
                    Size <br>
                    <label>
                        <input type="checkbox" name="size[]" value="XS">
                        XS
                    </label><br>
                    <label>
                        <input type="checkbox" name="size[]" value="S">
                        S
                    </label><br>
                    <label>
                        <input type="checkbox" name="size[]" value="M">
                        M
                    </label><br>
                    <label>
                        <input type="checkbox" name="size[]" value="L">
                        L
                    </label><br>
                    <label>
                        <input type="checkbox" name="size[]" value="XL">
                        XL
                    </label><br>
                </div>
                <div class="row mb10">
                    <input type="submit" class="btn-themmoi" name="themmoi" value="THÊM MỚI">
                    <input type="reset" class="btn-nhaplai" value="NHẬP LẠI">
                    <a href="index.php?act=listsp"><input type="button" class="btn-danhsach" value="DANH SÁCH"></a>
                </div>

                <?php
                if (isset($thongbao) && ($thongbao != "")) echo $thongbao;
                ?>

            </form>


        </div>


</main>
<style>
    /* CSS cho nút "Thêm Mới" */
    .btn-themmoi {
        width: 200px;

        background-color: #4CAF50;
        /* Màu nền */
        color: white;
        /* Màu chữ */
        padding: 8px 16px;
        /* Kích thước nút */
        border: none;
        /* Không có viền */

        /* Căn giữa chữ */
        text-decoration: none;
        /* Không có gạch chân */
        display: inline-block;
        /* Hiển thị là khối nút */
        font-size: 14px;
        /* Kích thước chữ */
        margin-right: 10px;
        /* Khoảng cách với nút khác */
        cursor: pointer;
        /* Hiển thị con trỏ khi di chuột vào nút */
        border-radius: 5px;
        /* Bo tròn góc của nút */
    }

    /* CSS cho nút "Nhập Lại" */
    .btn-nhaplai {
        width: 200px;

        background-color: #f44336;
        /* Màu nền */
        color: white;
        /* Màu chữ */
        padding: 10px 20px;
        /* Kích thước nút */
        border: none;
        /* Không có viền */
        text-align: center;
        /* Căn giữa chữ */
        text-decoration: none;
        /* Không có gạch chân */
        display: inline-block;
        /* Hiển thị là khối nút */
        font-size: 16px;
        /* Kích thước chữ */
        margin-right: 10px;
        border-radius: 5px;
        /* Khoảng cách với nút khác */
    }

    /* CSS cho nút "Danh Sách" */
    .btn-danhsach {
        margin-left: -11px;
        width: 200px;
        border-radius: 5px;
        margin-top: 5px;
        background-color: #008CBA;
        /* Màu nền */
        color: white;
        /* Màu chữ */
        padding: 10px 20px;
        /* Kích thước nút */
        border: none;
        /* Không có viền */
        text-align: center;
        /* Căn giữa chữ */
        text-decoration: none;
        /* Không có gạch chân */
        display: inline-block;
        /* Hiển thị là khối nút */
        font-size: 16px;
        /* Kích thước chữ */
    }
</style>