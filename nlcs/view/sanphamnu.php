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

                    foreach ($spnew as $sp) {
                        extract($sp);
                        $hinh = $img_path . $img;
                        if (($i == 2) || ($i == 5 || ($i == 8))) {
                            $mr = "mr";
                        } else {
                            $mr = "";
                        }
                        // Định dạng giá tiền ở đây
                        $formatted_price = number_format($price, 0, ',', '.');
                        echo '
                <div class="boxsp mr">
                <a href="index.php?act=sanphamct&idsp=' . $id . '"><img src="' . $hinh . '" alt=""></a>
                <p class="price">' . $formatted_price . 'đ</p>
                <h3>' . $name . '</h3>
            </div> ';
                        $i += 1;
                    }
                    ?>





                    <style>
                        /* trang chu */

                        .boxsp {

                            width: 30%;
                            min-height: 300px;
                            border: 1px #100404 solid;
                            border-radius: 5px;
                            margin-bottom: 20px;
                            margin-right: 20px;
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




                    <!-- thông báo khi thêm vào giỏ hàng -->
                    <div class="position-fixed end-0 p-3" style="z-index: 11; bottom: 10%;">
                        <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header text-light rounded-top">
                                <strong class="me-auto">Giỏ hàng đã được cập nhật</strong>
                            </div>
                            <div class="toast-body"></div>
                        </div>
                    </div>
                    <!-- nút mũi tên bên phải -->
                    <button class="rounded-circle scroll-to-top position-fixed border-0" onclick="scrollToTop();">
                        <i class="fa-solid fa-chevron-right text-light"></i>
                        <!-- hình giỏ hàng bên phải -->
                    </button>
                    <a href="cart.html" class="cart-icon position-fixed rounded-circle text-center text-white shadow">
                        <i class="fa-solid fa-basket-shopping"></i>
                        <div class="rounded-pill position-absolute top-0 shadow">
                            <p class="cartItems fw-bold text-dark"></p>
                        </div>
                    </a>


                </div>

</main>