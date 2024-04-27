<?php
// Hàm tải tất cả các tài khoản từ cơ sở dữ liệu
function loadall_taikhoan()
{
    $sql = "select * from taikhoan order by id desc";
    $listtaikhoan = pdo_query($sql);
    return $listtaikhoan;
}

// Hàm tải thông tin của một tài khoản cụ thể từ cơ sở dữ liệu
function loadone_taikhoan($id)
{
    $sql = "select * from taikhoan where id=" . $id;
    $tk = pdo_query_one($sql);
    return $tk;
}

// Hàm chèn một tài khoản mới vào cơ sở dữ liệu
function insert_taikhoan($email, $user, $pass)
{
    $sql = "insert into taikhoan(email,user,pass) values('$email','$user','$pass')";
    pdo_execute($sql);
}

// Hàm kiểm tra thông tin đăng nhập của người dùng
function checkuser($user, $pass)
{
    $sql = "select * from taikhoan where user='" . $user . "' AND pass='" . $pass . "'";
    $sp = pdo_query_one($sql);
    return $sp;
}

// Hàm cập nhật thông tin của một tài khoản trong cơ sở dữ liệu
function update_taikhoan($id, $user, $pass, $email, $address, $tel)
{
    $sql = "update taikhoan set user='" . $user . "' , pass='" . $pass . "' , email='" . $email . "' , address='" . $address . "' , tel='" . $tel . "'  where id=" . $id;
    pdo_execute($sql);
}

// Hàm kiểm tra xem một địa chỉ email đã được sử dụng chưa
function checkemail($email)
{
    $sql = "select * from taikhoan where email='" . $email . "' ";
    $sp = pdo_query_one($sql);
    return $sp;
}
