 <main>
     <div class="row headeraddmin">
         <div class="row ">
             <h1>Thêm mới Danh Mục</h1>
         </div>
         <div class="row frmcontent">
             <form action="index.php?act=adddm" method="post">
                 <div class="row mb10">
                     Mã Danh Mục <br>
                     <input type="text" name="maloai" disabled>
                 </div>
                 <div class="row mb10">
                     Tên Danh Mục<br>
                     <input type="text" name="tenloai">
                 </div>
                 <div class="row mb10">
                     <a href="index.php?act=lisdm"><input class="btn-themmoi" type="submit" name="themmoi" value="THÊM MỚI"></a>
                     <a href="index.php?act=lisdm"><input class="btn-danhsach" type="button" value="DANH SÁCH"></a>
                 </div>

                 <?php
                    if (isset($thongbao) && ($thongbao != "")) echo $thongbao;
                    ?>

             </form>


         </div>
         <style>
             .btn-themmoi {
                 width: 200px;
                 margin-top: 20px;
                 background-color: #4CAF50;
                 /* Màu nền */
                 color: white;
                 /* Màu chữ */
                 padding: 8px 16px;
                 /* Kích thước nút */
                 border: none;
                 /* Không có viền */

                 /* Căn giữa chữ */
                 text-decoration: none;
                 /* Không có gạch chân */
                 display: inline-block;
                 /* Hiển thị là khối nút */
                 font-size: 14px;
                 /* Kích thước chữ */
                 margin-right: 10px;
                 /* Khoảng cách với nút khác */
                 cursor: pointer;
                 /* Hiển thị con trỏ khi di chuột vào nút */
                 border-radius: 5px;
             }

             /* Bo tròn góc của nút */
             .btn-danhsach {

                 width: 200px;
                 border-radius: 5px;
                 margin-top: 5px;
                 background-color: #008CBA;
                 /* Màu nền */
                 color: white;
                 /* Màu chữ */
                 padding: 10px 20px;
                 /* Kích thước nút */
                 border: none;
                 /* Không có viền */
                 text-align: center;
                 /* Căn giữa chữ */
                 text-decoration: none;
                 /* Không có gạch chân */
                 display: inline-block;
                 /* Hiển thị là khối nút */
                 font-size: 16px;
                 /* Kích thước chữ */
             }
         </style>
 </main>