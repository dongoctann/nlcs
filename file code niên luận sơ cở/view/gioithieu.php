<body>

    <!-- In completion process (thông báo) -->
    <div class="modal fade uncomplete-popup" id="website-unavailable" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content border-0" style="border-radius: 1rem;">
                <div class="modal-header border-0 pb-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pt-0  text-center">
                    <p class="text-center fw-bolder">Trang web này đang trong quá trình hoàn thiện. </br>Mong bạn
                        thông cảm.</p>
                    <img class="w-50 mb-4 rounded-circle" src="../img/ninosadface.jpg" alt="">
                    <p class="text-center mb-0 fw-bold website-available">Hiện tại các trang đã hoàn thiện bao gồm:
                    </p>
                    <p class="website-available px-5">Trang chủ, sản phẩm, liên hệ, giỏ hàng và popup đăng nhập/đăng
                        ký.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Đăng nhập Đăng ký -->
    <div class="modal fade" id="singnup-login-modal" tabindex="-1" aria-labelledby="singnup-login-modal-Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="container signup-login" id="signup-login container">
                    <!-- đăng ký -->
                    <div class="form-container sign-up-container">
                        <form action="#" style="width: 100%; transform: translateX(5px);">
                            <h1 class="fw-bolder">Tạo tài khoản</h1>
                            <div class="social-container">
                                <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                                <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                            <span>Hoặc sử dụng email để đăng ký</span>
                            <input type="text" placeholder="Tên người dùng" />
                            <input type="email" placeholder="Tài khoản email" />
                            <input type="password" placeholder="Mật khẩu" />
                            <button>Đăng ký</button>
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
                    <!-- phần che đăng nhập đăng kí -->
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

    <main>
        <!-- hình ảnh to ở đầu -->
        <div class="trending-photo text-center row justify-content-center">
            <div id="carouselExampleFade" class="col-12 col-md-10 carousel slide carousel-fade" data-bs-ride="carousel" data-bs-pause="false">
                <div class="carousel-inner">

                    <div class="carousel-item active">
                        <img src="../img/1.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../img/2.png" class="d-block w-100" alt="...">
                    </div>

                </div>
            </div>
        </div>
        </div>
        <!-- 3 cột giao hàng cam kết giá cả -->
        <div class="container-fluid justify-content-center row mt-5">
            <div class="col-3 services text-center">
                <img class="mb-1" src="../img/fast-delivery.png" alt="" style="width: 30%;">
                <h5 class="fw-bold mb-0">Giao hàng nhanh</h5>
                <p class="text-black-50" style="font-size: .9rem;">Vận chuyển nhanh toàn quốc từ 1 đến 2 ngày.</p>
            </div>
            <div class="col-3 services text-center">
                <img class="mb-1" src="../img/high-quality.png" alt="" style="width: 30%;">
                <h5 class="fw-bold mb-0">Cam kết chất lượng</h5>
                <p class="text-black-50" style="font-size: .9rem;">Nói không với hàng kém chất lượng, bảo hành trọn đời.
                </p>
            </div>
            <div class="col-3 services text-center">
                <img class="mb-1" src="../img/best-price.png" alt="" style="width: 30%;">
                <h5 class="fw-bold mb-0">Giá cả tốt nhất</h5>
                <p class="text-black-50" style="font-size: .9rem;">Cam kết bán với giá tốt nhất thị trường.</p>
            </div>
        </div>
        <!-- Body contents -->
        <div class="content-container container-fluid mt-5">
            <div class="text-title text-center container m-auto row justify-content-center" id="text-title">
                <h1 class="col-12 fw-bolder text-uppercase">Người bạn đồng hành tin cậy </br>trên những chặng đường</h1>
                <p class="col-10">
                    Để có những chuyến đi êm ái không thể thiếu một bồ đồ đẹp.<br>
                    Ở đây chúng tôi có những Quần ÁO chính hãng và chất lượng với giá siêu mềm.
                </p>
            </div>