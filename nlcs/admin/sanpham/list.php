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
                <a href="index.php?act=addsp"> <input class="btn-themmoi " type="button" value="NHẬP THÊM"></a>
            </div>
            </form>
        </div>
    </div>
    <style>
        .btn-themmoi {
            width: 200px;

            background-color: #008CBA;
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
    </style>
</main>