<div class="container cssdk ">
    <h2>Cập Nhật Tài Khoản</h2>
    <?php
    // Kiểm tra xem session 'user' đã được thiết lập và có phải là một mảng không
    if (isset($_SESSION['user']) && (is_array($_SESSION['user']))) {
        // Nếu session 'user' tồn tại và là một mảng, trích xuất các biến từ mảng 'user' để sử dụng
        extract($_SESSION['user']);
    }
    ?>

    <form action="index.php?act=edit_taikhoan" method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?= $email ?>">


        <label for="fullname">Tên Đăng Nhập:</label>
        <input type="text" name="user" value="<?= $user ?>">


        <label for="password">Mật khẩu:</label>
        <input type="password" name="pass" value="<?= $pass ?>">

        <div>
            Địa chỉ <input type="text" name="address" value="<?= $address ?>">
        </div>

        <div>
            Điện Thoại <input type="text" name="tel" value="<?= $tel ?>">
        </div>


        <div class="button-group">
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="submit" value="Cập Nhật" name="capnhat">
            <a href="index.php?act=dangnhap" class="dangnhap-link" name="dangnhap">Đăng Nhập</a>

        </div>
    </form>

    <?php
    if (isset($thongbao) && ($thongbao != "")) {
        echo "<h3 class='thongbao'>$thongbao</h2>";
    }

    ?>
    <style>
        .containerdn {
            font-size: x-large;
        }

        .cssdk {

            max-width: 500px;
            margin: 40px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
    </style>
</div>