<main>

    <div class="row headeraddmin">
        <div class="row ">
            <h1>Danh Sách Khách Hàng</h1>
        </div>
        <div class="row frmcontent">
            <div class="row mb10 frmdsloai">
                <table>

                    <tr>
                        <th style="width: 100px;"></th>
                        <th style="width: 100px;">Mã TK</th>
                        <th style="width: 100px;">TÊN ĐĂNG NHẬP</th>
                        <th style="width: 100px;">MẬT KHẨU</th>
                        <th style="width: 120px;">EMAIL</th>
                        <th style="width: 250px;">ĐỊA CHỈ</th>
                        <th>ĐIỆN THOAI</th>
                        <th>VAI TRÒ</th>

                    </tr>
                    <?php
                    // Lặp qua danh sách tài khoản để hiển thị
                    foreach ($listtaikhoan as $taikhoan) {
                        // Trích xuất các giá trị từ mảng $taikhoan để sử dụng
                        extract($taikhoan);
                        // Tạo đường dẫn sửa tài khoản và xóa tài khoản
                        $suatk = "index.php?act=suatk&id=" . $id;
                        $xoatk = "index.php?act=xoatk&id=" . $id;

                        // Hiển thị thông tin của từng tài khoản trong một hàng của bảng
                        echo '<tr>
                                <td><input type="checkbox" name="" id="" ></td>
                                <td>' . $id . '</td>
                                <td>' . $user . ' </td>
                                <td>' . $pass . '</td>
                                <td>' . $email . '</td>
                                <td>' . $address . '</td>
                                <td>' . $tel . '</td>
                                <td>' . $role . '</td>
                            </tr>';
                    }


                    // <a href="' . $suatk . ' "> <input type="button" class="sua-btn" value="Sửa"></a>
                    // <a href="' . $xoatk . '"> <input type="button" class="xoa-btn" value="Xóa"></a>
                    ?>
                </table>
            </div>

            </form>
        </div>
    </div>
</main>