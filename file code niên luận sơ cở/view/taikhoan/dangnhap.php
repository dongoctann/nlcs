<div class="containerdn cssdk ">
    <h1>Đăng Nhập thành viên</h1>
    <?php
    // Kiểm tra xem session 'user' có tồn tại không
    if (isset($_SESSION['user'])) {
        // Nếu session 'user' tồn tại, trích xuất các biến từ session 'user' để sử dụng
        extract($_SESSION['user']);
    ?>

        <label for="fullname">xin chao</label>
        <?= $user ?>
        <li>
            <a href="index.php?act=quenmk">Quên mật khẩu</a>
        </li>

        <?php
        if ($role == 1) {
        ?>
            <li>
                <a style="color: red;" href="admin/index.php?act=addsp">Quản Trị (ADMIN)</a>
            </li>
        <?php  } ?>
        <!-- <li>
            <a href="index.php?act=mybill">Đơn Hàng của tôi</a>
        </li> -->
        <li>
            <a href="index.php?act=edit_taikhoan">Cập nhật tài khoản</a>
        </li>
        <li>
            <a href="index.php?act=thoat">Thoát</a>
        </li>

    <?php


    } else {

    ?>




        <form action="index.php?act=dangnhap" method="post">
            <label for="fullname">Tên Đăng Nhập:</label>
            <input type="text" name="user">


            <label for="password">Mật khẩu:</label>
            <input type="password" name="pass">

            <div>
                <input type="checkbox" name="" id="">Ghi Nhớ Tài Khoản
            </div>
            <div class="button-group">
                <input type="submit" value="Đăng Nhập" name="dangnhap">
            </div>
        </form>
        <li>
            <a href="">Quên mật khẩu</a>
        </li>
        <li>
            <a href="index.php?act=dangky">Đăng Ký Thành Viên</a>
        </li>
    <?php }
    ?>


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