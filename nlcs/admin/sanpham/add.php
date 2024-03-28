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
                        foreach ($listdanhmuc as $danhmuc) {
                            extract($danhmuc);
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