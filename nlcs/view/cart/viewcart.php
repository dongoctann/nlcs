<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>

</head>

<body class="bodycart">
    <div class="container containercart">
        <h1>Giỏ hàng của bạn</h1>
        <table>
            <thead>
                <tr>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Thao tác</th>
                </tr>
                <?php
                // $spadd = [$id, $name, $img, $price, $soluong, $ttien];
                $tong = 0; // Khởi tạo biến tổng tiền đơn hàng
                $i = 0;
                foreach ($_SESSION['mycart'] as $cart) {
                    $hinh = $img_path = "";
                    $hinh = $img_path . $cart[2];
                    $ttien = 0;
                    if (is_numeric($cart[3]) && is_numeric($cart[4])) {
                        $ttien = $cart['3'] * $cart['4'];
                    } else {
                        // Xử lý trường hợp không phải là số (nếu cần)
                    }

                    $tong += $ttien;
                    $xoasp = '<a href="index.php?act=delcart&idcart=' . $i . '"><input type="button" value="Xóa"></a>';
                    echo '
                 <tr>
                     <td><img src="' . $hinh . '" alt="" height="80px"></td>
                     <td>' . $cart[1] . '</td>
                     <td>' .  number_format("$cart[3]", 3, ".", ".") . '.000vnđ</td>
                     <td>' . $cart[4] . '</td>
                     <td>' .  number_format("$ttien", 3, ".", ".") . '.000vnđ</td>
                     <td>' . $xoasp . '</td>
                 </tr>';
                    $i += 1;
                }
                echo '<tr>
                 
                     <td colspan="4">Tổng Đơn Hàng</td>
                     <td>' .  number_format("$tong", 3, ".", ".") . '.000vnđ</td>
                     <td></td>
                     </tr>';
                ?>
        </table>
        <div class="row mb bill">

            <a href="index.php?act=bill">
                <input type="button" class="sua-btn" style="width: 100%;" value="Tiếp Tục đặt hàng">
            </a>
            <a href="index.php?act=delcart">
                <input type="button" class="xoa-btn" style="width: 100%;" value="Xóa giỏ hàng">
            </a>

        </div>
    </div>
</body>






<style>
    .bodycart {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    .containercart {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
    }

    h1 {
        text-align: center;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    th,
    td {

        border-bottom: 1px solid #ddd;
        text-align: center;
    }

    th {
        background-color: #f2f2f2;
    }

    img {
        max-width: 100px;
        height: auto;
    }

    .quantity input {
        width: 50px;
        text-align: center;
    }

    .subtotal {
        font-weight: bold;
    }

    .remove button {
        padding: 5px 10px;
        background-color: #dc3545;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .remove button:hover {
        background-color: #c82333;
    }
</style>

</html>