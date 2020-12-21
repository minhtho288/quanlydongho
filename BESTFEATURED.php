<div class="tab-pane" id="bussiness">
    <div class="tab-active owl-carousel">
        <!-- single-product-start -->
        <?php include "includes/connection.php";
        $result = mysqli_query($conn, "SELECT * FROM product limit 7, 6");

        $row = mysqli_fetch_assoc($result);
        foreach ($result as $row) {
        ?>
            <div class="product-wrapper">
                <div class="product-img">
                    <a href="product-details.php?idproduct=<?php echo $row['ID'] ?>">
                        <img src=<?php echo "public/frontend/img/product/" . $row['Image']; ?> alt="book" class="primary" width="50px" height="50px" />
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
                    <h4><a href="#"><?php echo $row['Name'] ?></a></h4>
                    <div class="product-price">
                        <ul>
                            <li><?php echo $row['Price'] ?> VND</li>
                        </ul>
                    </div>
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
        <?php } ?>
    </div>
</div>
