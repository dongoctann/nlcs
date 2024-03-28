<?php

function insert_sanpham($tensp, $giasp, $hinh, $size, $iddm)
{
    $sql = "insert into sanpham(name,price,img,size,iddm) values('$tensp','$giasp','$hinh','$size','$iddm')";
    pdo_execute($sql);
}

function delete_sanpham($id)
{
    $sql = "delete from sanpham where id=" . $id;
    pdo_execute($sql);
}
function loadall_sanpham_home()
{
    $sql = "select * from sanpham where 1 order by id desc limit 0,9";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}

function loadall_spnu()
{
    // Truy vấn SQL để lấy tất cả các sản phẩm thuộc danh mục nữ (iddm = 40)
    $sql = "SELECT * FROM sanpham WHERE iddm = 40 ORDER BY id DESC";

    // Thực hiện truy vấn và trả về kết quả
    $spnu = pdo_query($sql);
    return $spnu;
}

function loadall_spnam()
{
    // Truy vấn SQL để lấy tất cả các sản phẩm thuộc danh mục nam (iddm = 39)
    $sql = "SELECT * FROM sanpham WHERE iddm = 39 ORDER BY id DESC";

    // Thực hiện truy vấn và trả về kết quả
    $spnam = pdo_query($sql);
    return $spnam;
}

function loadall_sanpham($keyy, $iddm)
{
    $sql = "select * from sanpham where 1";
    if ($keyy != "") {
        $sql .= " and name like '%" . $keyy . "%'";
    }
    if ($iddm > 0) {
        $sql .= "  and iddm ='" . $iddm . "'";
    }
    $sql .= "  order by id desc";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}

function loadone_sanpham($id)
{
    $sql = "select * from sanpham where id=" . $id;
    $sp = pdo_query_one($sql);
    return $sp;
}

function   update_sanpham($id, $iddm, $tensp, $giasp, $size, $hinh)
{
    if ($hinh != "")
        $sql = "update sanpham set iddm='" . $iddm . "' , name='" . $tensp . "' , price='" . $giasp . "' , size='" . $size . "' , img='" . $hinh . "'  where id=" . $id;
    else
        $sql = "update sanpham set iddm='" . $iddm . "' , name='" . $tensp . "' , price='" . $giasp . "' , size='" . $size . "'  where id=" . $id;


    pdo_execute($sql);
}
