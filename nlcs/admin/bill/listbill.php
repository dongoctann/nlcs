<body class="bodycart">
    <div class="container containercart">
        <div>
            <h1>Danh Sách Đơn Hàng</h1>
        </div>
        <form action="index.php?act=listbill" method="post">
            <input style="margin-bottom: 10px;" type="text" name="keyy" placeholder="Nhập Mã đơn Hàng">
            <input type="submit" name="listok" value="Go">
        </form>
        <table>
            <tr>
                <th></th>
                <th>Mã Đơn Hàng</th>
                <th>Khách hàng</th>
                <th>số lượng hàng</th>
                <th>Giá trị đơn hàng</th>
                <th>Tình trạng đơn hang</th>
                <th>Ngày Đặt Hàng</th>

            </tr>
            <?php
            foreach ($listbill as $bill) {

                extract($bill);
                $kh = $bill['bill_name'] . '
                                    <br>' . $bill["bill_email"] . '
                                    <br>' . $bill["bill_address"] . '
                                    <br>' . $bill["bill_tel"];
                $ttdh = get_ttdh("$bill_status");

                $countsp = loadall_cart_count($bill['id']);
                echo '
                                <tr>
                              <td><input type="checkbox" name="" id=""></td>
                                <td>DAM-' . $bill['id'] . '</td>
                                <td>' . $kh . ' </td>
                                <td> ' . $countsp . '</td>
                                <td>' . $total . '</td>
                                <td>' . $ttdh . '</td>
                                <td>' . $bill["ngaydathang"] . '</td>
                            </tr>
                        
                        ';
            }
            ?>

        </table>

    </div>


    <style>
        .bodycart {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .containercart {
            max-width: 1000px;
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
</body>
</main>