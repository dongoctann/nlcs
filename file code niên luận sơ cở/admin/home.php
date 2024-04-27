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

                </div>
                <div class="row mb10">
                    <input type="submit" name="themmoi" value="THÊM MỚI">
                    <input type="reset" value="NHẬP LẠI">
                    <a href="index.php?act=listsp"><input type="button" value="DANH SÁCH"></a>
                </div>

                <?php
                if (isset($thongbao) && ($thongbao != "")) echo $thongbao;
                ?>

            </form>


        </div>
</main>