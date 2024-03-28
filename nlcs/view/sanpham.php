<!------------------------------------------- main ------------------------------------->
<main>
    <section class="product">
        <div class="container">


            <div class="row mb">
                <div class="row">
                    <?php
                    $i = 0;
                    foreach ($dssp as $sp) {
                        extract($sp);
                        $hinh = $img_path . $img;
                        if (($i == 2) || ($i == 5 || ($i == 8) || ($i == 11))) {
                            $mr = "mr";
                        } else {
                            $mr = "";
                        }
                        // Định dạng giá tiền ở đây
                        $formatted_price = number_format($price, 0, ',', '.');
                        echo '
              <div class="boxsp mr">
              <a href="index.php?act=sanphamct&idsp=' . $id . '"><img src="' . $hinh . '" alt=""></a>
              <p class="price">' . $formatted_price . 'đ</p>
              <h3>' . $name . '</h3>
          </div> ';
                        $i += 1;
                    }
                    ?>



                </div>


                <style>
                    /* trang chu */

                    .boxsp {
                        width: 28%;
                        min-height: 300px;
                        border: 3px #100404 solid;
                        border-radius: 20px;
                        margin: 0 auto;
                        margin: 28px;
                    }

                    .boxsp img {
                        padding-top: 10px;
                        padding-left: 10%;
                        width: 300px;
                        height: 300px;
                    }

                    .row {

                        width: 100%;
                        margin-left: 15px;
                    }

                    .mb {
                        margin-bottom: 30px;
                    }
                </style>
            </div>
    </section>

</main>