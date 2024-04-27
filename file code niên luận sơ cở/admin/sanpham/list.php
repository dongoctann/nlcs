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
                // Duyệt qua mỗi phần tử trong mảng $listdanhmuc và tạo các tùy chọn <option>
                foreach ($listdanhmuc as $danhmuc) {
                    // Trích xuất các phần tử của mảng $danhmuc thành các biến độc lập
                    extract($danhmuc);

                    // Tạo một tùy chọn <option> với giá trị là id của danh mục và văn bản hiển thị là name của danh mục
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
                    // Duyệt qua mỗi phần tử trong mảng $listsanpham và tạo các dòng của bảng
                    foreach ($listsanpham as $sanpham) {
                        // Trích xuất các phần tử của mảng $sanpham thành các biến độc lập
                        extract($sanpham);

                        // Tạo đường dẫn cho chức năng sửa sản phẩm
                        $suasp = "index.php?act=suasp&id=" . $id;
                        // Tạo đường dẫn cho chức năng xóa sản phẩm
                        $xoasp = "index.php?act=xoasp&id=" . $id;
                        // Xác định đường dẫn đến hình ảnh sản phẩm
                        $hinhpath = "../upload/" . $img;
                        // Kiểm tra xem hình ảnh có tồn tại không
                        if (is_file($hinhpath)) {
                            // Nếu có, tạo thẻ <img> hiển thị hình ảnh sản phẩm
                            $hinh = "<img src='" . $hinhpath . "' height='100'>";
                        } else {
                            // Nếu không, hiển thị thông báo "no photo"
                            $hinh = "no photo";
                        }
                        // Định dạng giá tiền
                        $formatted_price = number_format($price, 0, ',', '.');

                        // Xuất dòng của bảng với thông tin của sản phẩm
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
                <a href="index.php?act=addsp"> <input class="btn-themmoi" type="button" value="NHẬP THÊM"></a>
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