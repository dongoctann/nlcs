<main>
    <div class="row headeraddmin">
        <div class="row ">
            <h1>Danh Mục Hàng Hóa</h1>
        </div>
        <div class="row frmcontent">
            <div class="row mb10 frmdsloai">
                <table>
                    <tr>
                        <th></th>
                        <th>Mã Loại</th>
                        <th>Tên Loại</th>
                        <th></th>
                    </tr>

                    <?php
                    // Lặp qua danh sách các danh mục để hiển thị trong bảng
                    foreach ($listdanhmuc as $danhmuc) {
                        extract($danhmuc);
                        // Tạo đường dẫn cho chức năng sửa và xóa
                        $suadm = "index.php?act=suadm&id=" . $id;
                        $xoadm = "index.php?act=xoadm&id=" . $id;

                        // Hiển thị mỗi dòng dữ liệu của danh mục trong bảng
                        echo '<tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td>' . $id . '</td>
                                <td>' . $name . ' </td>
                                <td>
                                    <a href="' . $suadm . ' "><input type="button" class="sua-btn" value="Sửa"></a> 
                                    <a href="' . $xoadm . '"><input type="button" class="xoa-btn" value="Xóa"></a>
                                </td>
                              </tr>';
                    }
                    ?>

                </table>
                <div class="row mb10">
                    <a href="index.php?act=adddm"><input class="btn-themmoi" type="submit" name="themmoi" value="THÊM DANH MỤC"></a>

                </div>
            </div>



            </form>
        </div>
    </div>
    <style>
        .btn-themmoi {
            width: 200px;
            margin-top: 20px;
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