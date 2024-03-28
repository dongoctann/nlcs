<?php

include "../model/pdo.php";
include "header.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/taikhoan.php";
//controller danh muc
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'adddm':
            //kiểm tra xem người dùng có click vào nút adđ hay ko
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $tenloai = $_POST['tenloai'];
                insert_danhmuc($tenloai);
                $thongbao = 'Thêm thành công';
            }
            include "danhmuc/add.php";
            break;
        case 'lisdm':
            $listdanhmuc = loadall_danhmuc();

            include "danhmuc/list.php";
            break;

        case  'xoadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_danhmuc($_GET['id']);
            }
            $listdanhmuc = loadall_danhmuc();

            include "danhmuc/list.php";
            break;
        case  'suadm':

            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $dm = loadone_danhmuc($_GET['id']);
            }
            include "danhmuc/update.php";
            break;
        case 'updatedm':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $tenloai = $_POST['tenloai'];
                $id = $_POST['id'];
                update_danhmuc($id, $tenloai);
                $thongbao = 'Cập nhật thành công';
            }
            $listdanhmuc = loadall_danhmuc();

            include "danhmuc/list.php";
            break;



            /**--------------------------------   controller sản phẩm   ------------------------------**/
        case 'addsp':
            // Kiểm tra xem người dùng có click vào nút "Thêm mới" hay không
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                // Lấy dữ liệu từ biểu mẫu
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];

                // Chuyển mảng các giá trị kích cỡ thành chuỗi
                if (isset($_POST['size'])) {
                    // Kiểm tra nếu $_POST['size'] là một mảng
                    if (is_array($_POST['size'])) {
                        // Nếu là mảng, sử dụng implode()
                        $size = implode(", ", $_POST['size']);
                    } else {
                        // Nếu không phải mảng, gán giá trị trực tiếp cho $size
                        $size = $_POST['size'];
                    }
                } else {
                    // Xử lý trường hợp không có dữ liệu được gửi từ trường 'size'
                    $size = "";
                }

                // Xử lý tên hình ảnh và lưu vào thư mục upload
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                    // Nếu thành công, thực hiện thêm sản phẩm vào cơ sở dữ liệu
                    insert_sanpham($tensp, $giasp, $hinh, $size, $iddm);
                    $thongbao = 'Thêm thành công';
                } else {
                    // Nếu không thành công, thông báo lỗi
                    $thongbao = 'Lỗi khi tải lên hình ảnh.';
                }
            }
            // Load danh sách danh mục để hiển thị trong biểu mẫu
            $listdanhmuc = loadall_danhmuc();
            // Bao gồm file giao diện thêm sản phẩm
            include "sanpham/add.php";
            break;

        case 'listsp':
            if (isset($_POST['listok']) && ($_POST['listok'])) {
                $keyy = $_POST['keyy'];
                $iddm = $_POST['iddm'];
            } else {
                $keyy = '';
                $iddm = 0;
            }
            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_sanpham($keyy, $iddm);

            include "sanpham/list.php";
            break;

        case  'xoasp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_sanpham($_GET['id']);
            }
            $listsanpham = loadall_sanpham("", 0);
            include "sanpham/list.php";
            break;
        case  'suasp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $sanpham = loadone_sanpham($_GET['id']);
            }
            include "sanpham/update.php";
            break;
        case 'updatesp':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST['id'];
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $size = $_POST['size'];
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                    //  echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
                } else {
                    //  echo "Sorry, there was an error uploading your file.";
                }
                update_sanpham($id, $iddm, $tensp, $giasp, $size, $hinh);
                $thongbao = 'Cập nhật thành công';
            }
            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_sanpham("", 0);
            include "sanpham/list.php";
            break;

        case  'dskh':

            $listtaikhoan = loadall_taikhoan();
            include "../view/taikhoan/list.php";
            break;







        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}
include "footer.php";
