<div class="container cssdk ">
    <h2>Đăng ký thành viên</h2>


    <form action="index.php?act=dangky" method="post">
        <label for="email">Email:</label>
        <input type="email" name="email">


        <label for="fullname">Tên Đăng Nhập:</label>
        <input type="text" name="user">


        <label for="password">Mật khẩu:</label>
        <input type="password" name="pass">

        <div class="button-group">
            <input type="submit" value="Đăng ký" name="dangky">
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