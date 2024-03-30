<main>
    <div class="row headeraddmin">
        <div class="row ">
            <h1>Danh sach loai hang</h1>
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
                    foreach ($listdanhmuc as $danhmuc) {
                        extract($danhmuc);
                        $suadm = "index.php?act=suadm&id=" . $id;
                        $xoadm = "index.php?act=xoadm&id=" . $id;

                        echo '<tr>
                                <td><input type="checkbox" name="" id="" ></td>
                                <td>' . $id . '</td>
                                <td>' . $name . ' </td>
                                <td><a href= "' . $suadm . ' "> <input type="button" value="Sửa"></a> 
                                    <a href="' . $xoadm . '"> <input type="button" value="Xóa"></a>
                                                                                                        </td>
                                </tr>';
                    }

                    ?>

                </table>
            </div>



            </form>
        </div>
    </div>
</main>