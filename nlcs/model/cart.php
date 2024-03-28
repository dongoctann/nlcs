
<?php
function insert_bill($name, $email, $address, $tel, $pttt, $ngaydathang, $tongdonhang)
{
    // Sửa lại thứ tự các cột và đảm bảo giá trị số được truyền vào được định dạng đúng
    $sql = "INSERT INTO bill (bill_name, bill_address, bill_email, bill_pttt, bill_tel, ngaydathang, total) 
                    VALUES ('$name', '$address', '$email', $pttt, '$tel', '$ngaydathang', $tongdonhang)";

    return pdo_execute_return_lastInsertID($sql);
}
function insert_cart($iduser, $idpro, $img, $name, $price, $soluong, $thanhtien, $idbill)
{
    $sql = "insert into cart(iduser,idpro,img,name,price,soluong,thanhtien,idbill) values('$iduser', '$idpro',' $img', '$name', '$price', '$soluong',' $thanhtien', '$idbill')";
    return pdo_execute($sql);
}
function loadone_bill($id)
{
    $sql = "select * from bill where id=" . $id;
    $bill = pdo_query_one($sql);
    return $bill;
}

function loadall_cart($idbill)
{
    $sql = "select * from cart where idbill=" . $idbill;
    $bill = pdo_query($sql);
    return $bill;
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

// function viewcart()
// {
//     global $img_path;
//     //  $spadd = [$id, $name, $img, $price, $soluong, $thanh_tien];
//     $tong = 0; // Khởi tạo biến tổng tiền đơn hàng
//     $i = 0;
//     foreach ($_SESSION['mycart'] as $cart) {

//         $hinh = $img_path . $cart[2];
//         $ttien = 0;
//         if (is_numeric($cart[3]) && is_numeric($cart[4])) {
//             $ttien = $cart['3'] * $cart['4'];
//         } else {
//             // Xử lý trường hợp không phải là số (nếu cần)
//         }

//         $tong += $ttien;
//         $xoasp = '<a href="index.php?act=delcart&idcart=' . $i . '"><input type="button" value="Xóa"></a>';
//         echo '
//       <tr>
//           <td><img src="' . $hinh . '" alt="" height="80px"></td>
//           <td>' . $cart[1] . '</td>
//           <td>' . $cart[3] . '</td>
//           <td>' . $cart[4] . '</td>
//           <td>' . $ttien . '</td>
//           <td>' . $xoasp . '</td>
//       </tr>';
//         $i += 1;
//     }
//     echo '<tr>
      
//           <td colspan="4">Tổng Đơn Hàng</td>
//           <td> ' . $tong . '</td>
//           <td></td>
//           </tr>';
// }
