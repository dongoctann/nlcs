<main>

    <div class="row headeraddmin">
        <div class="row ">
            <h1>Danh Sách Khách Hàng</h1>
        </div>
        <div class="row frmcontent">
            <div class="row mb10 frmdsloai">
                <table>

                    <tr>
                        <th></th>
                        <th>Mã TK</th>
                        <th>TÊN ĐĂNG NHẬP</th>
                        <th>MẬT KHẨU</th>
                        <th>EMAIL</th>
                        <th>ĐỊA CHỈ LIÊN HỆ</th>
                        <th>ĐIỆN THOAI</th>
                        <th>VAI TRÒ</th>

                    </tr>
                    <?php
                    foreach ($listtaikhoan as $taikhoan) {
                        extract($taikhoan);
                        $suatk = "index.php?act=suatk&id=" . $id;
                        $xoatk = "index.php?act=xoatk&id=" . $id;


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

                    // <a href="' . $suatk . ' "> <input  type="button" class="sua-btn" value="Sửa"></a> 
                    //     <a href="' . $xoatk . '"> <input type="button" class="xoa-btn" value="Xóa"></a>
                    ?>
                </table>
            </div>

            </form>
        </div>
    </div>
</main>