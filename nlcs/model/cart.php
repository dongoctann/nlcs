
<?php
function insert_bill($iduser, $user, $email, $address, $tel, $pttt, $ngaydathang, $tongdonhang)
{
    // Sửa lại thứ tự các cột và đảm bảo giá trị số được truyền vào được định dạng đúng
    $sql = "INSERT INTO bill(iduser,bill_name, bill_address, bill_email, bill_pttt, bill_tel, ngaydathang, total) 
                    VALUES('$iduser','$user', '$address', '$email', $pttt, '$tel', '$ngaydathang', $tongdonhang)";

    return pdo_execute_return_lastInsertID($sql);
}
function insert_cart($iduser, $idpro, $img, $user, $price, $soluong, $thanhtien, $idbill)
{
    $sql = "insert into cart(iduser,idpro,img,name,price,soluong,thanhtien,idbill) values('$iduser', '$idpro',' $img', '$user', '$price', '$soluong',' $thanhtien', '$idbill')";
    return pdo_execute($sql);
}
function loadone_bill($id)
{
    $sql = "select * from bill where id=" . $id;
    $bill = pdo_query_one($sql);
    return $bill;
}



function loadall_bill($keyy = "", $iduser = 0)
{
    $sql = "SELECT * FROM bill WHERE 1";
    if ($iduser > 0)  $sql .= " AND iduser=" . $iduser;
    if ($keyy != "")  $sql .= " AND id LIKE '%" . $keyy . "%'";
    $sql .= " ORDER BY id DESC";
    $listbill = pdo_query($sql);
    return $listbill;
}



function loadall_cart($idbill)
{
    $sql = "select * from cart where idbill=" . $idbill;
    $bill = pdo_query($sql);
    return $bill;
}

function loadall_cart_count($idbill)
{
    $sql = "select * from cart where idbill=" . $idbill;
    $bill = pdo_query($sql);
    return sizeof($bill);
}



function tongdonhang()
{
    $tong = 0;
    foreach ($_SESSION['mycart'] as $cart) {

        $ttien = $cart[3] * $cart[4]; // Tính thành tiền của sản phẩm
        $tong += $ttien;
    }
    return $tong;
}

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
