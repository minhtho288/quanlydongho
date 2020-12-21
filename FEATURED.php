<!-- new-book-area-start -->
<div class="new-book-area pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title bt text-center pt-100 mb-30 section-title-res">
                    <h2>Featured Watches</h2>
                </div>
            </div>
        </div>
        <div class="tab-active owl-carousel">
            <?php include "includes/connection.php";
            $result = mysqli_query($conn, "SELECT * FROM product limit 7, 12");
            $arrtemp = array();
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($arrtemp, $row);
            }
            for ($i = 0; $i < count($arrtemp); $i += 2) { ?>
                <?php if ($i <= count($arrtemp)) { ?>
                    <div>
                        <div class="tab-total">
                            <!-- single-product-start -->
                            <div class="product-wrapper mb-40">
                                <div class="product-img">
                                    <a href="product-details.php?idproduct=<?php echo $arrtemp[$i]['ID'] ?>">
                                        <img src="public/frontend/img/product/<?php echo $arrtemp[$i]['Image']; ?>" alt="book" class="primary" />
                                    </a>
                                    <div class="quick-view">
                                        <a class="action-view" href="#" data-target="#productModal" data-toggle="modal" title="Quick View">
                                            <i class="fa fa-search-plus"></i>
                                        </a>
                                    </div>
                                    <div class="product-flag">
                                        <ul>
                                            <li><span class="sale">new</span> </li>
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
                                    <h4><a href="#"><?php echo $arrtemp[$i]['Name']; ?></a></h4>
                                    <div class="product-price">
                                        <ul>
                                            <li><?php echo $arrtemp[$i]['Price']; ?></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-link">
                                    <div class="product-button">
                                        <form action="index.php" method="post" id="formaddtocart">
                                            <fieldset>
                                                <input type="hidden" name="tensanpham" value="<?php echo $arrtemp[$i]['Name'] ?>" />
                                                <input type="hidden" name="sanpham_id" value="<?php echo $arrtemp[$i]['ID'] ?>" />
                                                <input type="hidden" name="giasanpham" value="<?php echo $arrtemp[$i]['Price'] ?>" />
                                                <input type="hidden" name="hinhanh" value="<?php echo $arrtemp[$i]['Image'] ?>" />
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
                        <!-- single-product-start -->
                        <div class="product-wrapper">
                            <div class="product-img">
                                <a href="product-details.php?idproduct=<?php echo $arrtemp[$i + 1]['ID'] ?>">
                                    <img src="public/frontend/img/product/<?php echo $arrtemp[$i + 1]['Image']; ?>" alt="book" class="primary" />
                                </a>
                                <div class="quick-view">
                                    <a class="action-view" href="#" data-target="#productModal" data-toggle="modal" title="Quick View">
                                        <i class="fa fa-search-plus"></i>
                                    </a>
                                </div>
                                <div class="product-flag">
                                    <ul>
                                        <li><span class="sale">new</span> <br></li>
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
                                <h4><a href="#"><?php echo $arrtemp[$i + 1]['Name']; ?></a></h4>
                                <div class="product-price">
                                    <ul>
                                        <li><?php echo $arrtemp[$i + 1]['Price']; ?></li>
                                        <li class="old-price">$36.00</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-link">
                                <div class="product-button">
                                    <form action="index.php" method="post" id="formaddtocart">
                                        <fieldset>
                                            <input type="hidden" name="tensanpham" value="<?php echo $arrtemp[$i + 1]['Name'] ?>" />
                                            <input type="hidden" name="sanpham_id" value="<?php echo $arrtemp[$i + 1]['ID'] ?>" />
                                            <input type="hidden" name="giasanpham" value="<?php echo $arrtemp[$i + 1]['Price'] ?>" />
                                            <input type="hidden" name="hinhanh" value="<?php echo $arrtemp[$i + 1]['Image'] ?>" />
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
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>
<!-- new-book-area-start -->