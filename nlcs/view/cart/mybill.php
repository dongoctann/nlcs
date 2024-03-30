<body>
    <div class="containerdh">
        <div class="customer-info">
            <h3>Đơn Hàng của Bạn</h3>
            <table>
                <tr>

                    <th>Mã Đơn hàng</th>
                    <th>Ngày Đặt</th>
                    <th>Số Lương Mặt Hàng</th>
                    <th>Tổng Giá Trị Đơn Hàng</th>
                    <th>Tình Trạng Đơn Hàng</th>
                </tr>
                <?php

                if (is_array($listbill)) {
                    foreach ($listbill as $bill) {
                        extract($bill);
                        $ttdh = get_ttdh($bill['bill_status']);
                        $countsp = loadall_cart_count($bill['id']);
                        echo '<tr>
                            <td>DAM-' . $bill['id'] . '</td>
                            <td>' . $bill['ngaydathang'] . '</td>
                            <td>' . $countsp . '</td>
                            <td>' . $bill['total'] . '</td>
                            <td>' . $ttdh . '</td>
                          
                     </tr>
                
                ';
                    }
                }
                ?>



            </table>
        </div>
    </div>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: larger;
        }

        .containerdh {
            max-width: 800px;
            margin: 40px auto;
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