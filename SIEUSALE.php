<div class="product-active-2 owl-carousel">
							<div class="product-total-2">
                                <?php include "includes/connection.php";
                                    $result = mysqli_query($conn,"SELECT * FROM product limit 69, 3");
                                    $row = mysqli_fetch_assoc($result);
                                    foreach ($result as $row)
                                    {?>
                                        <div class="single-most-product bd mb-18">
                                            <div class="most-product-img">
                                                <a href="product-details.php?idproduct=<?php echo $row['ID'] ?>"><img src="public/frontend/img/khuyenmai/<?php echo $row['Image'] ?>" alt="book" /></a>
                                            </div>
                                            <div class="most-product-content">
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
                                                        <li class="old-price">$33.00</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                <?php } ?>
                            </div>
                            
							<div class="product-total-2">
                                <?php include "includes/connection.php";
                                    $result = mysqli_query($conn,"SELECT * FROM product limit 6, 3");
                                    $row = mysqli_fetch_assoc($result);
                                    foreach ($result as $row)
                                    {?>
                                        <div class="single-most-product bd mb-18">
                                            <div class="most-product-img">
                                                <a href="product-details.php?idproduct=<?php echo $row['ID'] ?>"><img src="public/frontend/img/product/<?php echo $row['Image'] ?>" alt="book" /></a>
                                            </div>
                                            <div class="most-product-content">
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
                                                        <li class="old-price">$33.00</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                <?php } ?>
							</div>
</div>