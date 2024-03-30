<?php
if (is_array($taikhoan)) {
    extract($taikhoan);
}


?>
<main>
    <div class="row headeraddmin">
        <div class="row ">
            <h1>Cập Nhật Tài Khoản</h1>
        </div>
        <div class="row frmcontent">
            <form action="index.php?act=updatetk" method="post" enctype="multipart/form-data">


        </div>
        <div class="row mb10">
            Tên tk <br>
            <input type="text" name="tensp" value="<?= $user ?>">
        </div>
        <div class="row mb10">
            mk <br>
            <input type="text" name="giasp" value="<?= $pass ?>">
        </div>
        <div class="row mb10">
            email <br>
            <input type="text" name="giasp" value="<?= $email ?>">
        </div>
        <div class="row mb10">
            address<br>
            <input type="text" name="giasp" value="<?= $address ?>">
        </div>
        <div class="row mb10">
            tel<br>
            <input type="text" name="size" value="<?= $tel ?>">

        </div>
        <div class="row mb10">
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="submit" name="capnhattk" value="Cập Nhật">
            <input type="reset" value="Nhập lại">

        </div>

        <?php
        if (isset($thongbao) && ($thongbao != "")) echo $thongbao;
        ?>

        </form>


    </div>
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
</main>