<div class="container cssdk ">
    <h2>Đăng Nhập thành viên</h2>
    <?php
    if (isset($_SESSION['user'])) {
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
                <a href="admin/index.php?act=addsp">Đăng Nhập Admin</a>
            </li>
        <?php  } ?>

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

</div>