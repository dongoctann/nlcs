<?php

// Hàm chèn một sản phẩm mới vào cơ sở dữ liệu
function insert_sanpham($tensp, $giasp, $hinh, $size, $iddm)
{
    // Truy vấn SQL để chèn một sản phẩm mới với các thông tin như tên sản phẩm, giá, hình ảnh, kích cỡ và ID danh mục
    $sql = "INSERT INTO sanpham(name, price, img, size, iddm) VALUES('$tensp','$giasp','$hinh','$size','$iddm')";
    // Thực thi truy vấn SQL
    pdo_execute($sql);
}

// Hàm xóa một sản phẩm từ cơ sở dữ liệu dựa trên ID của sản phẩm
function delete_sanpham($id)
{
    // Truy vấn SQL để xóa một sản phẩm dựa trên ID được chuyển vào từ biến $id
    $sql = "DELETE FROM sanpham WHERE id=" . $id;
    // Thực thi truy vấn SQL
    pdo_execute($sql);
}

// Hàm tải tất cả các sản phẩm để hiển thị trên trang chủ (lấy 9 sản phẩm mới nhất)
function loadall_sanpham_home()
{
    // Truy vấn SQL để lấy tất cả các sản phẩm, sắp xếp theo ID giảm dần và giới hạn 9 sản phẩm
    $sql = "SELECT * FROM sanpham WHERE 1 ORDER BY id DESC LIMIT 0,9";
    // Thực thi truy vấn SQL và trả về danh sách sản phẩm
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}

// Hàm tải tất cả các sản phẩm thuộc danh mục nữ (iddm = 40)
function loadall_spnu()
{
    // Truy vấn SQL để lấy tất cả các sản phẩm thuộc danh mục nữ (iddm = 40), sắp xếp theo ID giảm dần
    $sql = "SELECT * FROM sanpham WHERE iddm = 40 ORDER BY id DESC";
    // Thực hiện truy vấn và trả về danh sách sản phẩm
    $spnu = pdo_query($sql);
    return $spnu;
}

// Hàm tải tất cả các sản phẩm thuộc danh mục nam (iddm = 39)
function loadall_spnam()
{
    // Truy vấn SQL để lấy tất cả các sản phẩm thuộc danh mục nam (iddm = 39), sắp xếp theo ID giảm dần
    $sql = "SELECT * FROM sanpham WHERE iddm = 39 ORDER BY id DESC";
    // Thực hiện truy vấn và trả về danh sách sản phẩm
    $spnam = pdo_query($sql);
    return $spnam;
}

// Hàm tải tất cả các sản phẩm dựa trên từ khóa và ID danh mục
function loadall_sanpham($keyy, $iddm)
{
    // Bắt đầu truy vấn SQL với điều kiện WHERE 1 (điều kiện luôn đúng)
    $sql = "SELECT * FROM sanpham WHERE 1";
    // Kiểm tra và thêm điều kiện tìm kiếm theo từ khóa vào truy vấn SQL nếu có
    if ($keyy != "") {
        $sql .= " AND name LIKE '%" . $keyy . "%'";
    }
    // Kiểm tra và thêm điều kiện lọc theo ID danh mục vào truy vấn SQL nếu có
    if ($iddm > 0) {
        $sql .= "  AND iddm ='" . $iddm . "'";
    }
    // Sắp xếp kết quả theo ID giảm dần
    $sql .= "  ORDER BY id DESC";
    // Thực hiện truy vấn và trả về danh sách sản phẩm
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}

// Hàm tải một sản phẩm dựa trên ID của nó
function loadone_sanpham($id)
{
    // Truy vấn SQL để lấy một sản phẩm dựa trên ID được chuyển vào từ biến $id
    $sql = "SELECT * FROM sanpham WHERE id=" . $id;
    // Thực hiện truy vấn và trả về một bản ghi sản phẩm
    $sp = pdo_query_one($sql);
    return $sp;
}

// Hàm cập nhật thông tin của một sản phẩm dựa trên ID của nó
function update_sanpham($id, $iddm, $tensp, $giasp, $size, $hinh)
{
    // Kiểm tra xem có hình ảnh mới được tải lên hay không
    if ($hinh != "") {
        // Nếu có, thực hiện cập nhật thông tin sản phẩm với hình ảnh mới
        $sql = "UPDATE sanpham SET iddm='" . $iddm . "' , name='" . $tensp . "' , price='" . $giasp . "' , size='" . $size . "' , img='" . $hinh . "'  WHERE id=" . $id;
    } else {
        // Nếu không, thực hiện cập nhật thông tin sản phẩm không bao gồm hình ảnh
        $sql = "UPDATE sanpham SET iddm='" . $iddm . "' , name='" . $tensp . "' , price='" . $giasp . "' , size='" . $size . "'  WHERE id=" . $id;
    }
    // Thực hiện truy vấn SQL để cập nhật thông tin sản phẩm
    pdo_execute($sql);
}
