<?php
include "gioithieu.php";
?>
<main>
    <!-- New products -->
    <div class="new-products container-fluid container-xl mt-5">
        <!-- New product title -->
        <div id="scrollProducts" style="transform: translateY(-5rem);"></div>
        <h3 class="fw-bold">Sản phẩm mới ra mắt</h3>
        <!-- New products slider -->
        <div id="carousel-new-products" class="carousel slide align-items-center rounded h-100 py-2" data-bs-ride="carousel" data-bs-interval="5000">

            <div class="row mb">
                <div class="row">
                    <?php
                    $i = 0;

                    foreach ($spnew as $sp) {
                        extract($sp);
                        $linksp = "index.php?act=sanphamct&idsp=" . $id;
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
                        <a href="index.php?act=sanphamct&idsp=' . $id . '"><img src="' . $img_path . $img . '" alt=""></a>
                        <p class="price">' . number_format($price, 0, ',', '.') . 'đ</p>
                        <h5>' . $name . '</h5>
                     
                   
                        <div class=" mr">
                        <form action="index.php?act=addtocart" method="post">
                                <input type="hidden" name="id" value="' . $id . '">
                                <input type="hidden" name="img" value="' . $hinh . '">
                                <input type="hidden" name="name" value="' . $name . '">
                                <input type="hidden" name="price" value="' . $formatted_price . 'đ">
                                <input type="submit"  name="addtocart" id="addToCartBtn" value="thêm vào giỏ hàng"  >
                        </form>
                        </div>
                    </div>';
                        $i += 1;
                    }
                    ?>
                    <script>
                        const addToCartBtn = document.getElementById('addToCartBtn');
                        addToCartBtn.addEventListener('click', function() {
                            const cartItems = document.querySelector('.cartItems');
                            let currentCount = parseInt(cartItems.textContent);
                            cartItems.textContent = currentCount + 1;
                        });
                    </script>
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

                    <!-- Text2 -->
                    <div class="text-title text-center container m-auto row justify-content-center" id="text-title" style="margin-top: 5rem!important;">
                        <h1 class="col-12 fw-bolder text-uppercase">Mua sắm hết ý không lo đau ví</h1>
                        <p class="col-10">Sản phẩm chúng tôi cam kết luôn có giá cả tốt nhất thị trường, cùng với dịch vụ bảo
                            hành trọn đời.<br>
                            Cam kết đổi mới 100% đối với sản phẩm lỗi do nhà sản xuất trong vòng 15 ngày đầu và bảo hành hở keo
                            trọn đời.
                        </p>
                    </div>


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

</main>