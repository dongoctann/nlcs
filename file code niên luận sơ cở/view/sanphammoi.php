<main>
    <!-- New products -->
    <div class="new-products container-fluid container-xl mt-5">
        <!-- New product title -->
        <div id="scrollProducts" style="transform: translateY(-5rem);"></div>
        <h3 class="fw-bold">Sản phẩm mới ra mắt</h3>
        <!-- New products slider -->
        <div id="carousel-new-products" class="carousel slide align-items-center rounded h-100 py-2" data-bs-ride="carousel" data-bs-interval="5000">
            <!-- thanh dưới sản phẩm -->
            <!-- <div class="carousel-indicators mt-5">
            <button type="button" data-bs-target="#carousel-new-products" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        </div> -->
            <div class="row mb">
                <div class="row">
                    <?php
                    $i = 0;

                    // Lặp qua mảng sản phẩm mới để hiển thị
                    foreach ($spnew as $sp) {
                        // Trích xuất các giá trị từ mảng $sp để sử dụng
                        extract($sp);
                        // Tạo đường dẫn đầy đủ của hình ảnh sản phẩm
                        $hinh = $img_path . $img;

                        // Kiểm tra xem có phải là cột cuối cùng của hàng không để thêm lớp 'mr' vào phần tử
                        if (($i == 2) || ($i == 5 || ($i == 8))) {
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



                    <!-- Text2 -->
                    <div class="text-title text-center container m-auto row justify-content-center" id="text-title" style="margin-top: 5rem!important;">
                        <h1 class="col-12 fw-bolder text-uppercase">Mua sắm hết ý không lo đau ví</h1>
                        <p class="col-10">Sản phẩm chúng tôi cam kết luôn có giá cả tốt nhất thị trường, cùng với dịch vụ bảo
                            hành trọn đời.<br>
                            Cam kết đổi mới 100% đối với sản phẩm lỗi do nhà sản xuất trong vòng 15 ngày đầu và bảo hành hở keo
                            trọn đời.
                        </p>
                    </div>

                    <div id="sanpham-nu" class="hot-selling-products container-fluid container-xl mt-5 mb-4">
                        <!-- Sản Phẩm Nữ (tiêu đề)-->
                        <h3 class="fw-bold">Sản Phẩm Nữ</h3>
                    </div>

                    <div class="row mb">
                        <div class="row">
                            <?php
                            $spnu = loadall_spnu();

                            // Kiểm tra xem có sản phẩm nào không
                            if ($spnu) {
                                // Lặp qua danh sách sản phẩm và hiển thị thông tin
                                foreach ($spnu as $sp) {
                                    extract($sp);
                                    // Đảm bảo rằng biến $hinh được thiết lập đúng
                                    $hinh = $img_path . $img;
                                    // Hiển thị thông tin sản phẩm ở đây
                                    echo '
                                       <div class="boxsp mr">
                                           <a href="index.php?act=sanphamct&idsp=' . $id . '"><img src="' . $img_path . $img . '" alt=""></a>
                                           <p class="price">' . number_format($price, 0, ',', '.') . 'đ</p>
                                           <h5>' . $name . '</h5>
                                     


                                           <div class=" mr">
                                             <form action="index.php?act=addtocart" method="post">
                                                   <input type="hidden" name="id" value="' . $id . '">
                                                   <input type="hidden" name="img" value="' . $hinh . '">
                                                   <input type="hidden" name="name" value="' . $name . '">
                                                   <input type="hidden" name="price" value="' . $formatted_price . 'đ">
                                                   <input type="submit" name="addtocart" value="thêm vào giỏ hàng"  >
                                                 </form>
                                           </div>
                                           
                                        </div>';
                                }
                            }
                            ?>

                            <!-- Text2 -->
                            <div class="text-title text-center container m-auto row justify-content-center" id="text-title" style="margin-top: 5rem!important;">
                                <h1 class="col-12 fw-bolder text-uppercase">Mua sắm hết ý không lo đau ví</h1>
                                <p class="col-10">Sản phẩm chúng tôi cam kết luôn có giá cả tốt nhất thị trường, cùng với dịch vụ bảo
                                    hành trọn đời.<br>
                                    Cam kết đổi mới 100% đối với sản phẩm lỗi do nhà sản xuất trong vòng 15 ngày đầu và bảo hành hở keo
                                    trọn đời.
                                </p>
                            </div>

                            <div class="row mb">
                                <div id="sanpham-nam" class="hot-selling-products container-fluid container-xl mt-5 mb-4">
                                    <!-- Sản Phẩm Nam (tiêu đề)-->
                                    <h3 class="fw-bold">Sản Phẩm Nam</h3>
                                </div>


                                <div class="row">

                                    <?php
                                    $spnam = loadall_spnam();

                                    // Kiểm tra xem có sản phẩm nào không
                                    if ($spnam) {
                                        // Lặp qua danh sách sản phẩm và hiển thị thông tin
                                        foreach ($spnam as $sp) {
                                            extract($sp);
                                            // Đảm bảo rằng biến $hinh được thiết lập đúng
                                            $hinh = $img_path . $img;
                                            // Hiển thị thông tin sản phẩm ở đây
                                            echo '
                                              <div class="boxsp mr">
                                                  <a href="index.php?act=sanphamct&idsp=' . $id . '"><img src="' . $img_path . $img . '" alt=""></a>
                                                  <p class="price">' . number_format($price, 0, ',', '.') . 'đ</p>
                                                  <h5>' . $name . '</h5>
                                                  
                                           <div class=" mr">
                                           <form action="index.php?act=addtocart" method="post">
                                                   <input type="hidden" name="id" value="' . $id . '">
                                                   <input type="hidden" name="img" value="' . $hinh . '">
                                                   <input type="hidden" name="name" value="' . $name . '">
                                                   <input type="hidden" name="price" value="' . $formatted_price . 'đ">
                                                   <input type="submit" name="addtocart" value="thêm vào giỏ hàng"  >
                                           </form>
                                           </div>


                                              </div>';
                                        }
                                    }

                                    ?>









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
                                            margin-left: 5px;
                                        }

                                        .mb {
                                            margin-bottom: 30px;
                                        }
                                    </style>

                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
</main>