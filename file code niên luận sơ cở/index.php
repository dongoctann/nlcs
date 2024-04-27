<?php
ob_start();

session_start();

// Bao gồm tệp PDO và tệp chứa các hàm liên quan đến sản phẩm
include "model/pdo.php";
include "model/sanpham.php";

// Bao gồm tiêu đề trang và các tệp liên quan
include "view/header.php";
include "model/taikhoan.php";
include "model/cart.php";
include "global.php";

// Kiểm tra nếu mảng giỏ hàng không tồn tại, thì khởi tạo mảng mới
if (!isset($_SESSION['mycart'])) $_SESSION['mycart'] = [];

// Tải danh sách sản phẩm nam và nữ mới nhất
$spnam = loadall_sanpham_home();
$spnu = loadall_sanpham_home();
$spnew = loadall_sanpham_home();

// Xử lý các hoạt động được chọn thông qua biến GET
if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {

        case 'sanpham':
            // Kiểm tra xem người dùng đã gửi từ khóa tìm kiếm và danh mục sản phẩm được chọn không
            if (isset($_POST['keyy']) && ($_POST['keyy'] != "")) {
                $keyy = $_POST['keyy'];
            } else {
                $keyy = "";
            }
            if (isset($_GET['iddm']) && ($_GET['iddm'] > 0)) {
                $iddm = $_GET['iddm'];
            } else {
                $iddm = 0;
            }

            // Tải danh sách sản phẩm dựa trên từ khóa tìm kiếm và danh mục sản phẩm được chọn
            $dssp = loadall_sanpham($keyy, $iddm);
            include "view/sanpham.php";
            break;

        case 'sanphamct':
            // Kiểm tra xem người dùng đã chọn sản phẩm cụ thể không
            if (isset($_GET['idsp']) && ($_GET['idsp'] > 0)) {
                $id = $_GET['idsp'];
                $onesp = loadone_sanpham($id);
                extract($onesp);
                include "view/sanphamct.php";
            } else {
                // Nếu không có sản phẩm cụ thể, chuyển hướng người dùng về trang chủ
                include "view/home.php";
            }
            break;

        case 'sanphammoi':
            // Hiển thị trang danh sách sản phẩm mới
            include "./view/sanphammoi.php";
            break;

        case 'dangky':
            // Xử lý đăng ký tài khoản mới
            if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                $email = $_POST['email'];
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                insert_taikhoan($email, $user, $pass);
                $thongbao = "Đã đăng ký thành công.Vui lòng đăng nhập";
            }
            include "view/taikhoan/dangky.php";
            break;

        case 'dangnhap':
            // Xử lý việc đăng nhập
            if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $checkuser =  checkuser($user, $pass);
                if (is_array($checkuser)) {
                    $_SESSION["user"] = $checkuser;
                    $thongbao = "Bạn đã đăng nhập thành công!";
                    header('Location:index.php?act=dangnhap');
                } else {
                    $thongbao = "Tài khoản không tồn tại!";
                }
            }
            include "./view/taikhoan/dangnhap.php";
            break;

        case 'edit_taikhoan':
            // Kiểm tra xem nút đã tồn tại và đã được click chưa
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                // Thu thập dữ liệu từ biểu mẫu
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $id = $_POST['id'];
                // Cập nhật thông tin tài khoản
                update_taikhoan($id, $user, $pass, $email, $address, $tel);
                $_SESSION["user"] = checkuser($user, $pass);
                // Chuyển hướng người dùng đến trang chỉnh sửa tài khoản
                header('Location:index.php?act=edit_taikhoan');
            }
            // Bao gồm trang chỉnh sửa tài khoản
            include "./view/taikhoan/edit_taikhoan.php";
            break;

        case 'quenmk':
            // Kiểm tra xem nút "Gửi Email" đã tồn tại và đã được click chưa
            if (isset($_POST['guiemail']) && ($_POST['guiemail'])) {
                // Thu thập địa chỉ email từ biểu mẫu
                $email = $_POST['email'];
                // Kiểm tra xem địa chỉ email có tồn tại trong cơ sở dữ liệu hay không
                $checkemail =  checkemail($email);
                // Nếu địa chỉ email tồn tại, hiển thị mật khẩu của người dùng
                if (is_array($checkemail)) {
                    $thongbao = "Mật khẩu của bạn là: " . $checkemail['pass'];
                } else {
                    // Nếu không, thông báo rằng địa chỉ email không tồn tại
                    $thongbao = "Email này không tồn tại.";
                }
            }
            // Bao gồm trang quên mật khẩu
            include "./view/taikhoan/quenmk.php";
            break;

        case 'thoat':
            // Xóa tất cả các session
            session_unset();
            // Chuyển hướng người dùng đến trang đăng nhập
            header('Location: index.php');
            break;

        case 'addtocart':
            // Kiểm tra xem nút "Thêm vào giỏ hàng" đã tồn tại và đã được click chưa
            if (isset($_POST['addtocart']) && ($_POST['addtocart'])) {
                // Thu thập thông tin sản phẩm từ biểu mẫu
                $id = $_POST['id'];
                $name = $_POST['name'];
                $img = $_POST['img'];
                $price = $_POST['price'];
                $soluong = 1;
                // Chuyển đổi giá thành số nếu cần thiết
                $price = floatval($price);
                // Tính toán thành tiền
                $ttien = $soluong * $price;
                // Tạo một mảng chứa thông tin sản phẩm và thêm vào giỏ hàng
                $spadd = [$id, $name, $img, $price, $soluong, $ttien];
                array_push($_SESSION['mycart'], $spadd);
            }
            // Bao gồm trang xem giỏ hàng
            include "view/cart/viewcart.php";
            break;

        case 'delcart':
            // Kiểm tra xem có ID của sản phẩm trong giỏ hàng cần xóa không
            if (isset($_GET['idcart'])) {
                // Xóa sản phẩm khỏi giỏ hàng dựa trên ID
                array_splice($_SESSION['mycart'], $_GET['idcart'], 1);
            } else {
                // Nếu không, xóa toàn bộ giỏ hàng
                $_SESSION['mycart'] = [];
            }
            // Chuyển hướng người dùng đến trang xem giỏ hàng
            header('Location:  index.php?act=viewcart');
            break;

        case 'viewcart':
            // Bao gồm trang xem giỏ hàng
            include "view/cart/viewcart.php";
            break;

        case 'bill':
            // Bao gồm trang đặt hàng
            include "view/cart/bill.php";
            break;

        case 'billcomfirm':
            // Kiểm tra xem nút "Đồng ý đặt hàng" đã tồn tại và đã được click chưa
            if (isset($_POST['dongydathang']) && ($_POST['dongydathang'])) {
                // Nếu tồn tại một session user và có iduser
                if (isset($_SESSION['user']) && isset($_SESSION['user']['id'])) {
                    // Thu thập thông tin từ biểu mẫu
                    $iduser = $_SESSION['user']['id'];
                    $user = $_POST['user'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $tel = $_POST['tel'];
                    $pttt = $_POST['pttt'];
                    $ngaydathang = date('h:i:sa d/m/Y');
                    $tongdonhang = tongdonhang();
                    // Tạo đơn hàng mới và lưu vào cơ sở dữ liệu
                    $idbill = insert_bill($iduser, $user, $email, $address, $tel, $pttt, $ngaydathang, $tongdonhang);
                    // Insert các sản phẩm trong giỏ hàng vào đơn hàng
                    foreach ($_SESSION['mycart'] as $cart) {
                        insert_cart($_SESSION['user']['id'], $cart[0], $cart[2], $cart[1], $cart[3], $cart[4], $cart[5], $idbill);
                    }
                    // Xoá session giỏ hàng
                    $_SESSION['cart'] = [];
                    // Tải thông tin đơn hàng và các mặt hàng trong đơn hàng
                    $bill = loadone_bill($idbill);
                    $billct = loadall_cart($idbill);
                    // Bao gồm trang xác nhận đặt hàng
                    include "view/cart/billcomfirm.php";
                } else {
                    // Nếu không tồn tại session user, chuyển hướng người dùng về trang chính
                    header('Location:  index.php');
                }
            }
            break;

        case 'mybill':
            // Kiểm tra xem người dùng đã đăng nhập chưa
            if (isset($_SESSION['user']) && isset($_SESSION['user']['id'])) {
                // Nếu đã đăng nhập, tải danh sách các đơn hàng của người dùng
                $listbill = loadall_bill($_SESSION['user']['id']);
                // Bao gồm trang hiển thị danh sách các đơn hàng của người dùng
                include "view/cart/mybill.php";
            } else {
                // Nếu chưa đăng nhập, thông báo lỗi hoặc chuyển hướng người dùng đến trang khác
                echo "Bạn Không Đăng Nhập nên Không có Bill.Vui Lòng đăng Nhập";
            }
            break;



        case 'danhsachsanpham':
            include "./admin/index.php?act=listsp";
            break;
        default:
            include "view/home.php";
            break;
    }
} else {

    include "view/home.php";
}
include "view/footer.php";
