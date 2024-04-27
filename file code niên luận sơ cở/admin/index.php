<?php

include "header.php";
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/taikhoan.php";
include "../model/cart.php";

// Xử lý các yêu cầu từ người dùng dựa trên 'act' (hành động)
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
            // Thêm danh mục mới
        case 'adddm':
            // Kiểm tra xem người dùng đã gửi biểu mẫu thêm danh mục chưa
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $tenloai = $_POST['tenloai'];
                // Thêm danh mục mới vào cơ sở dữ liệu
                insert_danhmuc($tenloai);
                $thongbao = 'Thêm thành công';
            }
            // Bao gồm file giao diện thêm danh mục
            include "danhmuc/add.php";
            break;

            // Hiển thị danh sách danh mục
        case 'lisdm':
            // Tải danh sách các danh mục từ cơ sở dữ liệu
            $listdanhmuc = loadall_danhmuc();
            // Bao gồm file giao diện danh sách danh mục
            include "danhmuc/list.php";
            break;

            // Xóa danh mục
        case  'xoadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                // Xóa danh mục dựa trên id
                delete_danhmuc($_GET['id']);
            }
            // Tải lại danh sách danh mục sau khi xóa
            $listdanhmuc = loadall_danhmuc();
            // Bao gồm file giao diện danh sách danh mục
            include "danhmuc/list.php";
            break;

            // Sửa danh mục
        case  'suadm':
            // Kiểm tra xem người dùng đã chọn danh mục cần sửa chưa
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                // Tải danh mục cần sửa từ cơ sở dữ liệu
                $dm = loadone_danhmuc($_GET['id']);
            }
            // Bao gồm file giao diện cập nhật danh mục
            include "danhmuc/update.php";
            break;

            // Cập nhật danh mục
        case 'updatedm':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $tenloai = $_POST['tenloai'];
                $id = $_POST['id'];
                // Cập nhật danh mục trong cơ sở dữ liệu
                update_danhmuc($id, $tenloai);
                $thongbao = 'Cập nhật thành công';
            }
            // Tải lại danh sách danh mục sau khi cập nhật
            $listdanhmuc = loadall_danhmuc();
            // Bao gồm file giao diện danh sách danh mục
            include "danhmuc/list.php";
            break;

            //  -------------- controller Sản Phẩm --------------------------


            // Thêm sản phẩm mới
        case 'addsp':
            // Kiểm tra xem người dùng đã gửi biểu mẫu thêm sản phẩm chưa
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                // Lấy dữ liệu từ biểu mẫu
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                // Xử lý các giá trị kích cỡ sản phẩm
                if (isset($_POST['size'])) {
                    if (is_array($_POST['size'])) {
                        $size = implode(", ", $_POST['size']);
                    } else {
                        $size = $_POST['size'];
                    }
                } else {
                    $size = "";
                }
                // Xử lý hình ảnh sản phẩm và lưu vào thư mục upload
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                    insert_sanpham($tensp, $giasp, $hinh, $size, $iddm);
                    $thongbao = 'Thêm thành công';
                } else {
                    $thongbao = 'Lỗi khi tải lên hình ảnh.';
                }
            }
            // Tải danh sách các danh mục để hiển thị trong biểu mẫu
            $listdanhmuc = loadall_danhmuc();
            // Bao gồm file giao diện thêm sản phẩm
            include "sanpham/add.php";
            break;

        case 'listsp':
            // Kiểm tra xem người dùng đã gửi yêu cầu tìm kiếm hoặc chọn danh mục sản phẩm nào chưa
            if (isset($_POST['listok']) && ($_POST['listok'])) {
                // Nếu có, lấy từ khóa tìm kiếm và danh mục sản phẩm từ biểu mẫu
                $keyy = $_POST['keyy'];
                $iddm = $_POST['iddm'];
            } else {
                // Nếu không, đặt giá trị mặc định cho từ khóa tìm kiếm và danh mục sản phẩm
                $keyy = '';
                $iddm = 0;
            }
            // Tải danh sách danh mục sản phẩm để hiển thị trong biểu mẫu
            $listdanhmuc = loadall_danhmuc();
            // Tải danh sách sản phẩm dựa trên từ khóa tìm kiếm và danh mục sản phẩm đã chọn
            $listsanpham = loadall_sanpham($keyy, $iddm);

            // Bao gồm file giao diện danh sách sản phẩm
            include "sanpham/list.php";
            break;

        case  'xoasp':
            // Kiểm tra xem người dùng đã gửi yêu cầu xóa sản phẩm nào chưa
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                // Nếu có, gọi hàm delete_sanpham để xóa sản phẩm dựa trên ID
                delete_sanpham($_GET['id']);
            }
            // Tải lại danh sách sản phẩm sau khi đã xóa
            $listsanpham = loadall_sanpham("", 0);
            // Bao gồm file giao diện danh sách sản phẩm
            include "sanpham/list.php";
            break;

        case  'suasp':
            // Kiểm tra xem người dùng đã gửi yêu cầu chỉnh sửa sản phẩm nào chưa
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                // Nếu có, tải thông tin chi tiết của sản phẩm dựa trên ID
                $sanpham = loadone_sanpham($_GET['id']);
            }
            $listdanhmuc = loadall_danhmuc();
            // Bao gồm file giao diện chỉnh sửa sản phẩm
            include "sanpham/update.php";
            break;

        case 'updatesp':
            // Kiểm tra xem người dùng đã gửi yêu cầu cập nhật thông tin sản phẩm chưa
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                // Nếu có, lấy thông tin cập nhật từ biểu mẫu
                $id = $_POST['id'];
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $size = $_POST['size'];
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                // Di chuyển hình ảnh đã chọn vào thư mục upload
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                    // Thực hiện cập nhật thông tin sản phẩm
                } else {
                    // Xử lý lỗi nếu không thể tải lên hình ảnh
                }
                // Gọi hàm update_sanpham để cập nhật thông tin sản phẩm
                update_sanpham($id, $iddm, $tensp, $giasp, $size, $hinh);
                $thongbao = 'Cập nhật thành công';
            }
            // Tải lại danh sách sản phẩm sau khi đã cập nhật
            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_sanpham("", 0);
            // Bao gồm file giao diện danh sách sản phẩm
            include "sanpham/list.php";
            break;

        case 'dskh':
            // Tải danh sách tất cả các tài khoản khách hàng
            $listtaikhoan = loadall_taikhoan();
            // Bao gồm file giao diện danh sách tài khoản khách hàng
            include "../view/taikhoan/list.php";
            break;

        case 'listbill':
            // Kiểm tra xem người dùng đã gửi từ khóa tìm kiếm cho danh sách hóa đơn chưa
            if (isset($_POST['keyy']) && ($_POST['keyy'] != "")) {
                // Nếu có, lấy từ khóa tìm kiếm từ biểu mẫu
                $keyy = $_POST['keyy'];
            } else {
                // Nếu không, đặt giá trị mặc định cho từ khóa tìm kiếm
                $keyy = "";
            }
            // Tải danh sách tất cả các hóa đơn dựa trên từ khóa tìm kiếm
            $listbill = loadall_bill($keyy, 0);
            // Bao gồm file giao diện danh sách hóa đơn
            include "../admin/bill/listbill.php";
            break;

        case 'admin':
            include "admin.php";
            break;


        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}

include "footer.php";
