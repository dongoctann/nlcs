<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Có bán Áo nè</title>
    <link rel="shortcut icon" href="../img/logo1.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/fff06ecf43.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/them.css">
    <link rel="stylesheet" href="./css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Embed google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@700&family=Passion+One&family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- JS -->
    <!-- <script src="../js/itemsList.js"></script> -->
    <!-- <script src="../js/scripts.js"></script> -->

</head>

<body>
    <header>
        <!-- Hiệu ứng  -->
        <div class="preload-bg w-100 h-100 bg-white">
            <div class="spinner"></div>
        </div>

        <!-- Navigation bar -->
        <nav class="navbar sticky-top shadow navbar-expand-md bg-light d-block p-0">

            <!-- First row navbar(thanh màu xám) -->
            <div class="topnav container-fluid row justify-content-center ms-0 py-3">
                <!-- Logo -->
                <a class="navbar-brand d-block col-12 col-md-2 text-center" href="../index.php">
                    <img src="../img/logo1.png" alt="">
                </a>

                <!-- Navbar toggler icon(thu nhỏ ) -->
                <button class="navbar-toggler d-block d-md-none col-1 lh-base bg-transparent text-center" style="border: none!important;" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon" style="transform: translateX(-2px);">
                        <i class="fa-solid fa-bars"></i>
                    </span>
                </button>

                <!-- Search form (tìm kiếm)-->
                <form action="index.php?act=sanpham" method="post" class="d-flex col-7 ps-0 justify-content-end search-form">
                    <input class="form-control me-2 rounded-pill searchbar" type="search" placeholder="Search" name="keyy">
                    <button class="btn rounded-circle" type="submit" name="timkiem">
                        <i class="fa-solid search-icon fa-magnifying-glass text-light"></i>
                    </button>
                </form>

                <!-- Cart(giỏ hàng) -->
                <a class="col-1 text-center ps-0 ps-md-3 me-3 me-md-0 navbar-cart-icon" href="index.php?act=addtocart">
                    <button class="btn position-relative" type="submit"><i class="fa-solid fa-basket-shopping"></i>
                        <!-- Cart items count (số giỏ hàng)-->
                        <!-- <div class=" position-absolute">
                            <p class="cartItems fw-bold text-light"></p>
                        </div> -->
                    </button>
                </a>


                <?php
                // Kiểm tra xem session 'user' có tồn tại không
                if (isset($_SESSION['user'])) {
                    // Nếu session 'user' tồn tại, trích xuất các biến từ session 'user' để sử dụng
                    extract($_SESSION['user']);
                    // Hiển thị tên người dùng và nút thoát
                    echo '<div class="col-auto">';
                    echo '<a  href="index.php?act=edit_taikhoan" style="margin-right: 10px; font-size: 23px; color: blue; ">' . $user . '</a>';

                    echo '<a href="index.php?act=thoat" class="text-black">| Thoát</a>';
                    if ($role == 1) {
                        echo '</br> <a style="color: red;" href="admin/index.php?act=admin">Quản Trị (ADMIN)</a>';
                    }
                    echo '</div>';
                } else {
                    // Hiển thị nút Đăng Ký và Đăng Nhập
                    echo '<!-- Nút đăng Ký -->
                                <div class="col-auto">
                                    <button type="submit" class="btn rounded-pill btn-outline-light mb-3 email-input large-button" style="border-color: blue;">
                                        <a href="index.php?act=dangky" class="text-black">Đăng Ký</a>
                                    </button>
                                </div>
                                <!-- Nút đăng nhập -->
                                <div class="col-auto">
                                    <button type="submit" class="btn rounded-pill btn-outline-light mb-3 email-input large-button" style="border-color: blue;">
                                        <a href="index.php?act=dangnhap" class="text-black">Đăng Nhập</a>
                                    </button>
                                </div>';
                }
                ?>

                <!-- Nút Bill -->
                <!-- <div class="col-auto">
                    <button type="submit" class="btn rounded-pill btn-outline-light mb-3 email-input large-button" style="border-color: blue;">
                        <a href="index.php?act=mybill" class="text-black">Bill</a>
                    </button>
                </div> -->

            </div>


            <!-- Second row navbar(thanh vàng) -->
            <div class="container-fluid p-0">
                <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <!-- Responsive menu (menu khi thu nhỏ)-->
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">MENU</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>

                    <!-- Navbar items (trang chu gioi thieu ...)-->
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                            <li class="nav-item active"> <a href="index.php" onclick="scrollToTop();" class="nav-link">Trang chủ</a></li>
                            <!-- <li class="nav-item"><a href="index.php?act=adddm" class="nav-link" data-bs-toggle="modal">Danh muc</a> </li> -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="dropdownMenuLink" href="index.php?act=sanphammoi">Sản phẩm mới</a>
                                <ul class="dropdown-menu shadow p-0 mb-2 rounded-0" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item py-2 fw-bold" href="index.php?act=sanphammoi">Sản phẩm mới</a>
                                    <a class="dropdown-item py-2 fw-bold" href="index.php?act=sanphammoi#sanpham-nam">Nam</a>
                                    <a class="dropdown-item py-2 fw-bold" href="index.php?act=sanphammoi#sanpham-nu">Nữ</a>

                                </ul>
                            </li>

                            <li class="nav-item"><a href="index.php?act=sanphammoi#sanpham-nam" class="nav-link"> NAM </a></li>
                            <li class="nav-item"><a href="index.php?act=sanphammoi#sanpham-nu" class="nav-link"> NỮ </a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </nav>


    </header>