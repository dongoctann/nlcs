<div class="container cssdk ">
    <h2>Quên Mật Khẩu</h2>


    <form action="index.php?act=quenmk" method="post">
        <label for="email">Email:</label>
        <input type="email" name="email">

        <div class="button-group">
            <input type="submit" value="Gửi" name="guiemail">
            <a href="index.php?act=dangnhap" class="dangnhap-link" name="dangnhap">Đăng Nhập</a>
            <li>
                <a href="index.php?act=thoat">Thoát</a>
            </li>

        </div>
    </form>

    <?php
    if (isset($thongbao) && ($thongbao != "")) {
        echo "<h3 class='thongbao'>$thongbao</h2>";
    }

    ?>

</div>