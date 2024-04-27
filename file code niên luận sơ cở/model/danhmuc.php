<?php

// Hàm chèn một danh mục mới vào cơ sở dữ liệu
function insert_danhmuc($tenloai)
{
    // Truy vấn SQL để chèn một danh mục mới với tên được chuyển vào từ biến $tenloai
    $sql = "INSERT INTO danhmuc(name) VALUES('$tenloai')";
    // Thực thi truy vấn SQL
    pdo_execute($sql);
}

// Hàm xóa một danh mục từ cơ sở dữ liệu dựa trên ID của danh mục
function delete_danhmuc($id)
{
    // Truy vấn SQL để xóa một danh mục dựa trên ID được chuyển vào từ biến $id
    $sql = "DELETE FROM danhmuc WHERE id=" . $_GET['id']; // Đây là một lỗ hổng bảo mật, nên tránh sử dụng $_GET trực tiếp trong truy vấn SQL
    // Thực thi truy vấn SQL
    pdo_execute($sql);
}

// Hàm tải tất cả các danh mục từ cơ sở dữ liệu
function loadall_danhmuc()
{
    // Truy vấn SQL để lấy tất cả các danh mục, sắp xếp theo ID giảm dần
    $sql = "SELECT * FROM danhmuc ORDER BY id DESC";
    // Thực thi truy vấn SQL và lưu kết quả vào biến $listdanhmuc
    $listdanhmuc = pdo_query($sql);
    // Trả về danh sách các danh mục
    return $listdanhmuc;
}

// Hàm tải một danh mục dựa trên ID của nó
function loadone_danhmuc($id)
{
    // Truy vấn SQL để lấy một danh mục dựa trên ID được chuyển vào từ biến $id
    $sql = "SELECT * FROM danhmuc WHERE id=" . $id;
    // Thực thi truy vấn SQL và trả về một bản ghi danh mục
    $dm = pdo_query_one($sql);
    // Trả về thông tin của danh mục
    return $dm;
}

// Hàm cập nhật tên của một danh mục dựa trên ID của nó
function update_danhmuc($id, $tenloai)
{
    // Truy vấn SQL để cập nhật tên của một danh mục dựa trên ID và tên mới được chuyển vào từ biến $id và $tenloai
    $sql = "UPDATE danhmuc SET name='$tenloai' WHERE id=" . $id;
    // Thực thi truy vấn SQL
    pdo_execute($sql);
}
