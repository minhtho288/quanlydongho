<div class="tab-content">
    <div class="tab-pane active" id="th">
        <?php include "includes/connection.php";
        $result = mysqli_query($conn, "SELECT * FROM product limit 47, 12"); //lấy dữ liệu ra lưu vào biến result
        $arrtemp = array(); // 
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($arrtemp, $row); // ép dữ liệu vào mảng arrtemp
        }
        $i = 1;
        $k = 0;
        while ($i <= 3) { ?>
            <div class="row">
                <?php $j = 1;
                while ($k <= count($arrtemp) && $j <= 4) { ?>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <!-- single-product-start -->
                        <div class="product-wrapper mb-40">
                            <div class="product-img">
                                <a href="product-details.php?idproduct=<?php echo $arrtemp[$k]['ID'] ?>">
                                    <img src="public/frontend/img/donghonu/<?php echo $arrtemp[$k]['Image']; ?>" alt="book" class="primary" />
                                </a>
                                <div class="quick-view">
                                    <a class="action-view" href="#" data-target="#productModal" data-toggle="modal" title="Quick View">
                                        <i class="fa fa-search-plus"></i>
                                    </a>
                                </div>
                                <div class="product-flag">
                                    <ul>
                                        <li><span class="sale">new</span></li>
                                        <li><span class="discount-percentage">-5%</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-details text-center">
                                <div class="product-rating">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    </ul>
                                </div>
                                <h4><a href="#"><?php echo $arrtemp[$k]['Name']; ?> </a></h4>
                                <div class="product-price">
                                    <ul>
                                        <li><?php echo $arrtemp[$k]['Price']; ?></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-link">
                                <div class="product-button">
                                    <form action="index.php" method="post" id="formaddtocart">
                                        <fieldset>
                                            <input type="hidden" name="tensanpham" value="<?php echo $arrtemp[$k]['Name'] ?>" />
                                            <input type="hidden" name="sanpham_id" value="<?php echo $arrtemp[$k]['ID'] ?>" />
                                            <input type="hidden" name="giasanpham" value="<?php echo $arrtemp[$k]['Price'] ?>" />
                                            <input type="hidden" name="hinhanh" value="<?php echo $arrtemp[$k]['Image'] ?>" />
                                            <input type="hidden" name="soluong" value="1" />
                                            <!-- <input type="submit" name="themgiohang" value="Thêm giỏ hàng" class="button" /> -->
                                            <button type="submit" name="addtocart"><a id="asubmitadtocart" title="Add to cart"><i class="fa fa-shopping-cart"></i>Add to cart</a></button>
                                        </fieldset>
                                    </form>
                                </div>
                                <div class="add-to-link">
                                    <ul>
                                        <li><a href="product-details.html" title="Details"><i class="fa fa-external-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- single-product-end -->
                <?php $j++;
                    $k++;
                } ?>
            </div>
        <?php $i++;
        } ?>
    </div>

    <div class="tab-pane fade" id="list">
        <!-- single-shop-start -->
        <div class="single-shop mb-30">
            <?php
            $result = mysqli_query($conn, "SELECT * FROM product limit 66, 3");
            $row = mysqli_fetch_array($result);
            foreach ($result as $row) { ?>
                <div class="row">

                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="product-wrapper-2">
                            <div class="product-img">
                                <a href="product-details.php?idproduct=<?php echo $row['ID'] ?>">
                                    <img src="public/frontend/img/donghonu/<?php echo $row['Image']; ?>" alt="book" class="primary" />
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <div class="product-wrapper-content">
                            <div class="product-details">
                                <div class="product-rating">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    </ul>
                                </div>
                                <h4><a href="#"><?php echo $row['Name']; ?></a></h4>
                                <div class="product-price">
                                    <ul>
                                        <li><?php echo $row['Price']; ?></li>
                                        <li class="old-price">$38.00</li>
                                    </ul>
                                </div>
                                <p>The sporty Joust Duffle Bag can't be beat - not in the gym, not on the luggage carousel, not anywhere. Big enough to haul a basketball or soccer ball and some sneakers with plenty of room to spare,... </p>
                            </div>
                            <div class="product-link">
                                <div class="product-button">
                                    <form action="index.php" method="post" id="formaddtocart">
                                        <fieldset>
                                            <input type="hidden" name="tensanpham" value="<?php echo $row['Name'] ?>" />
                                            <input type="hidden" name="sanpham_id" value="<?php echo $row['ID'] ?>" />
                                            <input type="hidden" name="giasanpham" value="<?php echo $row['Price'] ?>" />
                                            <input type="hidden" name="hinhanh" value="<?php echo $row['Image'] ?>" />
                                            <input type="hidden" name="soluong" value="1" />
                                            <!-- <input type="submit" name="themgiohang" value="Thêm giỏ hàng" class="button" /> -->
                                            <button type="submit" name="addtocart"><a id="asubmitadtocart" title="Add to cart"><i class="fa fa-shopping-cart"></i>Add to cart</a></button>
                                        </fieldset>
                                    </form>
                                </div>
                                <div class="add-to-link">
                                    <ul>
                                        <li><a href="product-details.html" title="Details"><i class="fa fa-external-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            <?php } ?>
        </div>
    </div>
</div>