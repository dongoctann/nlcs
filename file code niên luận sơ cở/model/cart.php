<?php
// Hàm chèn thông tin đơn hàng mới vào cơ sở dữ liệu
function insert_bill($iduser, $user, $email, $address, $tel, $pttt, $ngaydathang, $tongdonhang)
{
    
    $sql = "INSERT INTO bill(iduser, bill_name, bill_address, bill_email, bill_pttt, bill_tel, ngaydathang, total) 
                    VALUES('$iduser', '$user', '$address', '$email', $pttt, '$tel', '$ngaydathang', $tongdonhang)";
    return pdo_execute_return_lastInsertID($sql);
}

// Hàm chèn thông tin sản phẩm vào giỏ hàng
function insert_cart($iduser, $idpro, $img, $user, $price, $soluong, $thanhtien, $idbill)
{
    $sql = "insert into cart(iduser, idpro, img, name, price, soluong, thanhtien, idbill) 
                     values('$iduser', '$idpro', '$img', '$user', '$price', '$soluong', '$thanhtien', '$idbill')";
    return pdo_execute($sql);
}

// Hàm tải thông tin của một đơn hàng cụ thể
function loadone_bill($id)
{
    $sql = "select * from bill where id=" . $id;
    $bill = pdo_query_one($sql);
    return $bill;
}

// Hàm tải tất cả các đơn hàng
function loadall_bill($keyy = "", $iduser = 0)
{
    $sql = "SELECT * FROM bill WHERE 1";
    if ($iduser > 0)  $sql .= " AND iduser=" . $iduser;
    if ($keyy != "")  $sql .= " AND id LIKE '%" . $keyy . "%'";
    $sql .= " ORDER BY id DESC";
    $listbill = pdo_query($sql);
    return $listbill;
}

// Hàm tải tất cả các mặt hàng trong giỏ hàng của một đơn hàng cụ thể
function loadall_cart($idbill)
{
    $sql = "select * from cart where idbill=" . $idbill;
    $bill = pdo_query($sql);
    return $bill;
}

// Hàm đếm số lượng mặt hàng trong giỏ hàng của một đơn hàng cụ thể
function loadall_cart_count($idbill)
{
    $sql = "select * from cart where idbill=" . $idbill;
    $bill = pdo_query($sql);
    return sizeof($bill);
}

// Hàm tính tổng số tiền của tất cả các mặt hàng trong giỏ hàng
function tongdonhang()
{
    $tong = 0;
    foreach ($_SESSION['mycart'] as $cart) {
        $ttien = $cart[3] * $cart[4]; // Tính thành tiền của sản phẩm
        $tong += $ttien;
    }
    return $tong;
}

// Hàm này dùng để chuyển trạng thái đơn hàng từ số thành chuỗi
function get_ttdh($n)
{
    switch ($n) {
        case '0':
            $stt = "Đơn Hàng Mới";
            break;
        case '1':
            $stt = "Đang Xử Lý";
            break;
        case '2':
            $stt = "Đang Giao Hàng";
            break;
        case '3':
            $stt = "Hoàn Tất";
            break;
        default:
            $stt = "Đơn Hàng Mới";
            break;
    }
    return $stt;
}
