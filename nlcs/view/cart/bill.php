<body>
    <div class="containerdh">
        <form action="index.php?act=billcomfirm" method="post">
            <div class="customer-info">
                <h3>Thông Tin Người Đặt Hàng</h3>
                <table>
                    <?php
                    if (isset($_SESSION['user'])) {
                        $user = $_SESSION['user']['user'];
                        $address = $_SESSION['user']['address'];
                        $email = $_SESSION['user']['email'];
                        $tel = $_SESSION['user']['tel'];
                    } else {
                        $user = "";
                        $address = "";
                        $email = "";
                        $tel = "";
                    }

                    ?>
                    <tr>
                        <td>Tên người đặt hàng</td>
                        <td><input type="text" name="user" value="<?= $user ?>"></td>
                    </tr>
                    <tr>
                        <td>Địa chỉ</td>
                        <td><input type="text" name="address" value="<?= $address ?>"></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="text" name="email" value="<?= $email ?>"></td>
                    </tr>
                    <tr>
                        <td>Số Điện Thoại</td>
                        <td><input type="text" name="tel" value="<?= $tel ?>"></td>
                    </tr>

                </table>
            </div>

            <div class="payment-method">
                <h2>Phương Thức Thanh Toán</h2>
                <label>
                    <input type="radio" name="pttt" value="1" checked>
                    Trả tiền khi nhận hàng
                </label><br>
                <label>
                    <input type="radio" name="pttt" value="2">
                    Chuyển khoản ngân hàng
                </label><br>
                <label>
                    <input type="radio" name="pttt" value="3">
                    Thanh toán trực tuyến
                </label>
            </div>
    </div>

    <div class="containerdh">
        <h2>Giỏ hàng của bạn</h2>
        <table>
            <thead>
                <tr>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr>
                <?php
                // $spadd = [$id, $name, $img, $price, $soluong, $ttien];
                $tong = 0;
                foreach ($_SESSION['mycart'] as $cart) {
                    if (is_numeric($cart[3]) && is_numeric($cart[4])) {
                        $ttien = $cart[3] * $cart[4];
                        $formatted_ttien = number_format($ttien) . 'đ';
                    }
                    $tong += $ttien;

                    echo '<tr>
                                    <td><img src="' . $cart[2] . '" alt="" height="80px"></td>
                                    <td>' . $cart[1] . '</td>
                                    <td>' .  number_format("$cart[3]", 3, ".", ".") . '.000vnđ</td>
                                    <td>' . $cart[4] . '</td>
                                    <td>' .  number_format("$ttien", 3, ".", ".") . '.000vnđ</td>
                         </tr>';
                }
                echo '<tr>
                             <td colspan="4">Tổng Đơn Hàng</td>
                             <td>' .  number_format("$tong", 3, ".", ".") . '.000vnđ</td>
                     </tr>';
                ?>
            </thead>
        </table>
        <div class="row">
            <input type="submit" value="Đồng Ý Đặt Hàng" name="dongydathang">

        </div>
        </form>
    </div>
</body>

<style>
    body {
        font-family: Arial, sans-serif;
        font-size: small;
    }

    .containerdh {
        max-width: 800px;
        margin: 0 auto;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
    }

    h2 {
        text-align: center;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th,
    td {
        padding: 8px;
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

    .row {
        margin-bottom: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .row button {
        padding: 8px 16px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .button-primary {
        background-color: #007bff;
        color: #fff;
    }

    .button-danger {
        background-color: #dc3545;
        color: #fff;
    }
</style>

</html>