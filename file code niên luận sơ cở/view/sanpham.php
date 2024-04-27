<!------------------------------------------- main ------------------------------------->
<main>
    <section class="product">
        <div class="container">


            <div class="row mb">
                <div class="row">
                    <?php
                    $i = 0;

                    // Lặp qua mảng sản phẩm để hiển thị
                    foreach ($dssp as $sp) {
                        // Trích xuất các giá trị từ mảng $sp để sử dụng
                        extract($sp);
                        // Tạo đường dẫn đầy đủ của hình ảnh sản phẩm
                        $hinh = $img_path . $img;

                        // Kiểm tra xem có phải là cột cuối cùng của hàng không để thêm lớp 'mr' vào phần tử
                        if (($i == 2) || ($i == 5) || ($i == 8) || ($i == 11)) {
                            $mr = "mr";
                        } else {
                            $mr = "";
                        }

                        // Định dạng giá tiền ở đây
                        $formatted_price = number_format($price, 0, ',', '.');

                        // Hiển thị thông tin sản phẩm trong một hộp sản phẩm
                        echo '
                                    <div class="boxsp ' . $mr . '">
                                        <a href="index.php?act=sanphamct&idsp=' . $id . '"><img src="' . $img_path . $img . '" alt=""></a>
                                        <p class="price">' . $formatted_price . 'đ</p>
                                        <h5>' . $name . '</h5>
                                        <div class="' . $mr . '">
                                            <form action="index.php?act=addtocart" method="post">
                                                <input type="hidden" name="id" value="' . $id . '">
                                                <input type="hidden" name="img" value="' . $hinh . '">
                                                <input type="hidden" name="name" value="' . $name . '">
                                                <input type="hidden" name="price" value="' . $formatted_price . 'đ">
                                                <input type="submit" name="addtocart" value="thêm vào giỏ hàng">
                                            </form>
                                        </div>
                                    </div>';

                        $i += 1;
                    }
                    ?>



                </div>


                <style>
                    /* trang chu */

                    .boxsp {
                        width: 28%;
                        min-height: 300px;
                        border: 3px #100404 solid;
                        border-radius: 20px;
                        margin: 0 auto;
                        margin: 28px;
                    }

                    .boxsp img {
                        padding-top: 10px;
                        padding-left: 10%;
                        width: 300px;
                        height: 300px;
                    }

                    .row {

                        width: 100%;
                        margin-left: 15px;
                    }

                    .mb {
                        margin-bottom: 30px;
                    }
                </style>
            </div>
    </section>

</main>