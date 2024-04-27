<!------------------------------------------- main ------------------------------------->
<main>
    <section class="product">
        <div class="container">

            <div class=" row product-content">

                <?php
                extract($onesp);
                $hinh = $img_path . $img;
                echo '
                <div class="col-6 product-content-left">
                    <a href="index.php?act=sanphamct&idsp=' . $id . '"><img src="' . $img_path . $img . '" alt=""></a>';
                ?>



            </div>

            <div class="col-6 product-content-right">
                <?php
                // Định dạng giá tiền ở đây
                $formatted_price = number_format($price, 0, ',', '.');
                echo '
    <div class="boxsp mr">
        <p>' . $name . '</p>
        <p class="price" style="text-align: left;">' . number_format($price, 0, ',', '.') . 'đ</p>
        <div class="mr">
            <form action="index.php?act=addtocart" method="post">
                <input type="hidden" name="id" value="' . $id . '">
                <input type="hidden" name="img" value="' . $hinh . '">
                <input type="hidden" name="name" value="' . $name . '">
                <p style="color: red;">Vui lòng chọn size *</p>
                <div class="btn-group">';
                $size_array = explode(", ", $size);
                // Lặp qua mảng để tạo nút button cho mỗi kích cỡ
                foreach ($size_array as $size_item) {
                    // Xác định xem kích cỡ hiện tại có phải là kích cỡ mặc định hay không
                    $active_class = ($size_item == 'XS') ? ' active' : ''; // Thiết lập class active cho kích cỡ mặc định
                    // Tạo nút button
                    echo '<button type="button" class="btn size-btn' . $active_class . '" data-size="' . $size_item . '">' . $size_item . '</button>';
                }
                echo '</div>
                <input type="hidden" name="price" value="' . $formatted_price . 'đ"><br>
                <input type="submit" name="addtocart" value="thêm vào giỏ hàng" style="width: 35%; font-size: 20px;">
            </form>
        </div>
    </div>';



                ?>



                <script>
                    // Lắng nghe sự kiện click trên các nút size-btn
                    document.querySelectorAll('.size-btn').forEach(function(button) {
                        button.addEventListener('click', function() {
                            // Xóa class 'active' khỏi tất cả các nút
                            document.querySelectorAll('.size-btn').forEach(function(btn) {
                                btn.classList.remove('active');
                            });
                            // Thêm class 'active' cho nút được click
                            this.classList.add('active');

                            // Lấy giá trị kích cỡ từ thuộc tính 'data-size' và làm gì đó với nó
                            var selectedSize = this.getAttribute('data-size');
                            console.log('Kích cỡ đã chọn: ' + selectedSize);
                        });
                    });
                </script>
                <style>
                    .product {
                        font-size: x-large;
                    }

                    .p {
                        font-size: 30px;
                    }
                </style>

            </div>

        </div>

        </div>
    </section>


</main>