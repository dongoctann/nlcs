<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <style>
        .rong {
            padding-top: 20px;
            padding-bottom: 20px;
            font-size: 25px;
            vertical-align: middle;
            text-align: center;
        }

        /* CSS styles */
        .bodycart {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }


        .containercart {

            max-width: 900px;
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
</head>

<body class="bodycart">
    <div class="containercart">
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
            </thead>
            <tbody>
                <?php
                if (!empty($_SESSION['mycart'])) {
                    // Nếu giỏ hàng không rỗng
                    $tong = 0; // Khởi tạo biến tổng tiền đơn hàng
                    foreach ($_SESSION['mycart'] as $key => $cart) {

                        $hinh = $img_path = "";
                        $hinh = $img_path . $cart[2];
                        // Tính toán thành tiền cho mỗi sản phẩm
                        $ttien = $cart[3] * $cart[4];
                        $tong += $ttien;
                        $xoasp = '<a href="index.php?act=delcart&idcart=' . $key . '"><button class="remove">Xóa</button></a>';
                        echo '
                        <tr data-key="' . $key . '">
                                <td><img src="' . $hinh . '" alt="" height="80px"></td>
                                <td>' . $cart[1] . '</td>
                                <td>' .  number_format($cart[3], 3, ".", ".") . '.000vnđ</td>
                                <td><input type="number" name="quantity[]" value="' . $cart[4] . '" min="1" onchange="updateSubtotal(this, ' . $key . ')"></td>
                                <td class="subtotal" id="subtotal_' . $key . '">' .  number_format($ttien, 3, ".", ".") . '.000vnđ</td>
                                <td>' . $xoasp . '</td>
                            </tr>';
                    }
                    echo '<tr>
                    <td colspan="4">Tổng Đơn Hàng</td>
                    <td class="subtotal" id="total-amount">' .  number_format($tong, 3, ".", ".") . '.000vnđ</td>
                    <td></td>
                </tr>';
                } else {
                    // Nếu giỏ hàng rỗng
                    echo '<tr>
                    <td colspan="6" class="rong">Giỏ hàng của bạn hiện đang trống. Vui lòng thêm sản phẩm.</td>
                    </tr>';
                }
                ?>
            </tbody>
        </table>
        <?php if (!empty($_SESSION['mycart'])) : ?>
            <div class="row mb bill" style="text-align: center;">
                <a href="index.php?act=bill">
                    <input type="button" class="sua-btn" style="width: 30%;  " value="Tiếp Tục đặt hàng">
                </a>
                <a href="index.php?act=delcart">
                    <input type="button" class="xoa-btn" style="width: 30%; " value="Xóa giỏ hàng">
                </a>
            </div>
        <?php endif; ?>
    </div>

    <script>
        window.onload = function() {
            var quantityInputs = document.querySelectorAll('input[name="quantity[]"]');
            quantityInputs.forEach(function(input) {
                input.addEventListener('change', function() {
                    var row = this.parentNode.parentNode;
                    var unitPrice = row.getElementsByTagName('td')[2].textContent;
                    var subtotalCell = row.getElementsByClassName('subtotal')[0];
                    var quantity = parseInt(this.value); // Sử dụng parseInt để chuyển đổi thành số nguyên
                    var unitPriceNumeric = parseFloat(unitPrice.replace(/[^\d.]/g, ''));
                    var subtotal = unitPriceNumeric * quantity;
                    subtotalCell.textContent = numberWithCommas(subtotal.toFixed(3)) + '.000vnđ';

                    // Cập nhật tổng tiền đơn hàng
                    updateTotalAmount();
                });
            });
        };

        function updateTotalAmount() {
            var total = 0;
            var subtotalCells = document.querySelectorAll('.subtotal');
            subtotalCells.forEach(function(cell) {
                var amount = parseFloat(cell.textContent.replace(/[^\d.]/g, ''));
                total += amount;
            });
            var formattedTotal = numberWithCommas(total.toFixed(3)) + '.000vnđ';
            document.getElementById('total-amount').textContent = formattedTotal;
        }

        function numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
    </script>

</body>

</html>