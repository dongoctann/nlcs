<?php
ob_start();

session_start();
include "model/pdo.php";
include "model/sanpham.php";
include "view/header.php";
include "model/taikhoan.php";
include "model/cart.php";
include "global.php";

// nếu mảng mycart ko tồn tại thì mycart = mảng mới
if (!isset($_SESSION['mycart'])) $_SESSION['mycart'] = [];

$spnam = loadall_sanpham_home();
$spnu = loadall_sanpham_home();
$spnew = loadall_sanpham_home();
//controller danh muc
if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {

        case 'sanpham':
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

            $dssp = loadall_sanpham($keyy, $iddm);
            include "view/sanpham.php";
            break;

        case 'sanphamct':
            if (isset($_GET['idsp']) && ($_GET['idsp'] > 0)) {
                $id = $_GET['idsp'];
                $onesp = loadone_sanpham($id);
                extract($onesp);
                include "view/sanphamct.php";
            } else {
                include "view/home.php";
            }
            break;

        case 'sanphammoi':
            include "./view/sanphammoi.php";
            break;

        case 'dangky':
            // kiểm tra xem nút đăng ký có tồn tài và đc click hay ko
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
            // kiểm tra xem nút đăng nhập có tồn tại và được click hay không
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
            // kiểm tra xem nút  có tồn tài và đc click hay ko
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $id = $_POST['id'];
                update_taikhoan($id, $user, $pass, $email, $address, $tel);
                $_SESSION["user"] = checkuser($user, $pass);
                header('Location:index.php?act=edit_taikhoan');
            }
            include "./view/taikhoan/edit_taikhoan.php";
            break;

        case 'quenmk':

            if (isset($_POST['guiemail']) && ($_POST['guiemail'])) {

                $email = $_POST['email'];

                $checkemail =  checkemail($email);
                // nếu checkemail là mảng thì thông báo ...
                if (is_array($checkemail)) {
                    $thongbao = "Mật khẩu của bạn là: " . $checkemail['pass'];
                } else {
                    $thongbao = "Email này không tồn tại.";
                }
            }

            include "./view/taikhoan/quenmk.php";
            break;

        case 'thoat':
            session_unset();
            header('Location: index.php?act=dangnhap');
            break;


        case 'addtocart':
            if (isset($_POST['addtocart']) && ($_POST['addtocart'])) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $img = $_POST['img'];
                $price = $_POST['price'];
                $soluong = 1;

                // Chuyển đổi giá thành số nếu cần thiết
                $price = floatval($price);

                // Tính toán thành tiền
                $ttien = $soluong * $price;

                $spadd = [$id, $name, $img, $price, $soluong, $ttien];
                array_push($_SESSION['mycart'], $spadd);
            }

            include "view/cart/viewcart.php";
            break;

        case 'delcart':
            if (isset($_GET['idcart'])) {
                array_splice($_SESSION['mycart'], $_GET['idcart'], 1);
            } else {
                $_SESSION['mycart'] = [];
            }

            header('Location:  index.php?act=viewcart');
            break;


        case 'viewcart':

            include "view/cart/viewcart.php";
            break;

        case 'bill':

            include "view/cart/bill.php";
            break;


        case 'billcomfirm':
            if (isset($_POST['dongydathang']) && ($_POST['dongydathang'])) {
                // Nếu tồn tại một session user và có iduser
                if (isset($_SESSION['user']) && isset($_SESSION['user']['id'])) {
                    $iduser = $_SESSION['user']['id'];
                    $user = $_POST['user'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $tel = $_POST['tel'];
                    $pttt = $_POST['pttt'];
                    $ngaydathang = date('h:i:sa d/m/Y');
                    $tongdonhang = tongdonhang();
                    // Tạo bill
                    $idbill = insert_bill($iduser, $user, $email, $address, $tel, $pttt, $ngaydathang, $tongdonhang);
                    // Insert cart
                    foreach ($_SESSION['mycart'] as $cart) {
                        insert_cart($_SESSION['user']['id'], $cart[0], $cart[2], $cart[1], $cart[3], $cart[4], $cart[5], $idbill);
                    }
                    // Xoá session cart
                    $_SESSION['cart'] = [];
                    // Load bill và cart
                    $bill = loadone_bill($idbill);
                    $billct = loadall_cart($idbill);
                    include "view/cart/billcomfirm.php";
                } else {
                    header('Location:  index.php');
                }
            }
            break;


        case 'mybill':
            $listbill = loadall_bill($_SESSION['user']['id']);
            include "view/cart/mybill.php";
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
