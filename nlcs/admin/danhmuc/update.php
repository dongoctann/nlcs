<?php
if (is_array($dm)) {
    extract($dm);
}
?>
<main>
    <div class="row headeraddmin">
        <div class="row ">
            <h1>cập nhật loại hàng hóa</h1>
        </div>
        <div class="row frmcontent">
            <form action="index.php?act=updatedm" method="post">
                <div class="row mb10">
                    Mã loại <br>
                    <input type="text" name="maloai" disabled>
                </div>
                <div class="row mb10">
                    Tên loại <br>
                    <input type="text" name="tenloai" value="<?php if (isset($name) && ($name != "")) echo $name; ?>">
                </div>
                <div class="row mb10">
                    <input type="hidden" name="id" value="<?php if (isset($id) && ($id > 0)) echo $id; ?>">
                    <input type="submit" name="capnhat" value="Cập Nhật">
                    <input type="reset" value="Nhập Lại">
                    <a href="index.php?act=lisdm"><input type="button" value="DANH SÁCH"></a>
                </div>

                <?php
                if (isset($thongbao) && ($thongbao != "")) echo $thongbao;
                ?>

            </form>


        </div>
</main>