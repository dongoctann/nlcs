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
    <script src="../js/itemsList.js"></script>
    <script src="../js/scripts.js"></script>

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
                        <div class="rounded-pill position-absolute">
                            <p class="cartItems fw-bold text-light">0</p>
                        </div>
                    </button>
                </a>

                <!-- Nút đăng Ký -->
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
                </div>
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
                                <a class="nav-link dropdown-toggle" id="dropdownMenuLink" href="index.php?act=sanphammoi">Sản phẩm</a>
                                <ul class="dropdown-menu shadow p-0 mb-2 rounded-0" aria-labelledby="dropdownMenuLink">
                                    <li><a class="dropdown-item py-2 fw-bold" href="index.php?act=sanphammoi">Sản phẩm mới</a></li>
                                    <li><a class="dropdown-item py-2 fw-bold" href="index.php?act=sanphammoi#sanpham-nam">Nam</a></li>
                                    <li><a class="dropdown-item py-2 fw-bold" href="index.php?act=sanphammoi#sanpham-nu">Nữ</a> </li>
                                </ul>
                            </li>


                            <!-- <li class="nav-item"><a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#website-unavailable">Blog</a></li> -->
                            <li class="nav-item"><a href="contact.html" class="nav-link">Liên hệ</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Đăng nhập Đăng ký -->
        <div class="modal fade" id="singnup-login-modal" tabindex="-1" aria-labelledby="singnup-login-modal-Label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0">
                    <div class="container signup-login" id="signup-login container">






                        <!-- đăng ký -->
                        <div class="form-container sign-up-container">
                            <form action="index.php?act=dangky" method="post" style="width: 100%; transform: translateX(5px);">
                                <h1 class="fw-bolder">Tạo tài khoản</h1>
                                <div class="social-container">
                                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                                <span>Hoặc sử dụng email để đăng ký</span>
                                <input type="email" name="email" placeholder="Tài khoản email" />
                                <input type="text" name="user" placeholder="Tên người dùng" />
                                <input type="password" name="pass" placeholder="Mật khẩu" />
                                <input type="submit" value="Đăng ký" name="dangky">

                                <?php
                                if (isset($thongbao) && ($thongbao != "")) {
                                    echo "<h3 class='thongbao'>$thongbao</h2>";
                                }

                                ?>
                            </form>


                        </div>

                        <!-- đăng nhập -->
                        <div class="form-container sign-in-container">
                            <form action="#" style="width: 50%; transform: translateX(-12px)">
                                <h1 class="fw-bolder">Đăng nhập</h1>
                                <div class="social-container">
                                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                                <span>Hoặc sử dụng tài khoản email của bạn</span>
                                <input type="email" placeholder="Tài khoản email" />
                                <input type="password" placeholder="Mật khẩu" />
                                <span class="mb-2"><a href="#">Quên mật khẩu?</a></span>
                                <button>Đăng nhập</button>
                            </form>
                        </div>
                        <!-- phần chee đăng nhập đăng kí -->
                        <div class="overlay-container">
                            <div class="overlay">
                                <div class="overlay-panel overlay-left">
                                    <h1 class="fw-bold">Bạn đã từng đến đây?</h1>
                                    <p>Hãy đăng nhập để chúng ta có thể kết nối với nhau.</p>
                                    <button class="ghost bg-dark border-0" id="signIn">Đăng nhập</button>
                                </div>
                                <div class="overlay-panel overlay-right">
                                    <h1 class="fw-bold">Topmenshop xin chào!</h1>
                                    <p>Nếu đây là lần đầu bạn đến đây, hãy đăng ký để nhận được thông tin mới nhất từ
                                        Shoes shop nhé!</p>
                                    <button class="ghost bg-dark border-0" id="signUp">Đăng ký</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>