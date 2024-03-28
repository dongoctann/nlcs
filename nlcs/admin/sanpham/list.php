<main>
    <div class="row headeraddmin">
        <div class="row ">
            <h1>Danh Sách Sản Phẩm</h1>
        </div>
        <form action="index.php?act=listsp" method="post">
            <input type="text" name="keyy">
            <select name="iddm">
                <option value="0" selected>Tất cả</option>

                <?php
                foreach ($listdanhmuc as $danhmuc) {
                    extract($danhmuc);
                    echo '<option value="' . $id . '">' . $name . '</option>';
                }
                ?>

            </select>
            <input type="submit" name="listok" value="GO">
        </form>


        <div class="row frmcontent">
            <div class="row mb10 frmdsloai">
                <table>

                    <tr>
                        <th></th>
                        <th>Mã Loại</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Hình</th>
                        <th>Giá</th>
                        <th></th>
                    </tr>
                    <?php
                    foreach ($listsanpham as $sanpham) {
                        extract($sanpham);
                        $suasp = "index.php?act=suasp&id=" . $id;
                        $xoasp = "index.php?act=xoasp&id=" . $id;
                        $hinhpath = "../upload/" . $img;
                        if (is_file($hinhpath)) {
                            $hinh = "<img src='" . $hinhpath . "' height='100'>";
                        } else {
                            $hinh = "no photo";
                        }
                        // Định dạng giá tiền ở đây
                        $formatted_price = number_format($price, 0, ',', '.');

                        echo '<tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td>' . $id . '</td>
                                <td>' . $name . ' </td>
                                <td>' . $hinh . ' </td>
                                <td>' . $formatted_price . 'đ</td>
                                <td><a href="' . $suasp . ' "> <input  type="button" class="sua-btn" value="Sửa"></a> 
                                    <a href="' . $xoasp . '"> <input type="button" class="xoa-btn" value="Xóa"></a>
                                </td>
                                </tr>';
                    }
                    ?>
                </table>
            </div>
            <div class="row mb10">
                <input type="button" value="Chọn Tất Cả">
                <input type="button" value="Bỏ Chọn Tất Cả">
                <input type="button" value="Xóa Các Mục Đã Chọn">
                <a href="index.php?act=addsp"> <input type="button" value="NHẬP THÊM"></a>
            </div>
            </form>
        </div>
    </div>
</main>