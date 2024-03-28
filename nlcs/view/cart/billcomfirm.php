<main>

    <body>
        <div class="containerdh">
            <div class="row">
                <div class="row mb">

                    <div class="row mb">

                        <div class="row boxcentent" style="text-align: center;">
                            <h2>cảm ơn quý khách đã đặt hàng</h2>
                        </div>
                    </div>

                    <?php
                    if (isset($bill) && (is_array($bill))) {

                        extract($bill);
                    }

                    ?>

                    <div class="row mb">
                        <div class="boxtitle">Thông tin đơn hàng</div>
                        <div class="row boxcentent" style="text-align: center;">
                            <li>Mã Đơn Hàng: DAM-<?= $bill["id"] ?></li>
                            <li>Ngày đặt hàng: <?= $bill['ngaydathang'] ?></li>
                            <li>Phương thức thanh toán: <?= $bill['bill_pttt'] ?></li>

                        </div>
                    </div>

                    <div class="customer-info">
                        <h3>Thông Tin Người Đặt Hàng</h3>
                        <table>
                            <tr>
                                <td>Tên người đặt hàng</td>
                                <td><?= isset($bill['bill_name']) ? $bill['bill_name'] : '' ?></td>
                            </tr>
                            <tr>
                                <td>Địa chỉ</td>
                                <td><?= isset($bill['bill_address']) ? $bill['bill_address'] : '' ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><?= isset($bill['bill_email']) ? $bill['bill_email'] : '' ?></td>
                            </tr>
                            <tr>
                                <td>Số Điện Thoại</td>
                                <td><?= isset($bill['bill_tel']) ? $bill['bill_tel'] : '' ?></td>
                            </tr>
                        </table>
                    </div>



                    <div class="bodycart">
                        <div class="container containercart">

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
                                    $tong = 0;
                                    foreach ($_SESSION['mycart'] as $cart) {
                                        $ttien = $cart['3'] * $cart['4'];
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
                        </div>
                    </div>
                </div>
            </div>
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
    </body>
</main>