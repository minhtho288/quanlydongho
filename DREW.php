<div class="bestseller-area pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="bestseller-content">
                        <h1>Top interesting</h1>
                        <h2>Drew <br />Sirtors</h2>
                        <p class="categories">categories: <a href="#">Men's watches</a><br /><a href="#">Women's watches</a></p>
                        <p>Watches are so named as a reminder - if you don't watch carefully what you do with your time it will slip away from you. </p>
                        <div class="social-author">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="banner-img-2">
                        <a href="#"><img src="public/frontend/img/banner/xe6.jpg" alt="banner" /></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="bestseller-active owl-carousel">
                    <?php  $result = mysqli_query($conn, "SELECT * FROM product limit 6");   
                        $arrtemp = array();
                       while($row = mysqli_fetch_assoc($result)){
                           array_push($arrtemp, $row);
                       }
                       for ($i=0; $i < count($arrtemp); $i+=2) { ?>
                            <?php if($i <= count($arrtemp)) {?>
                                <div class="bestseller-total">
                                    <div class="single-bestseller mb-25">
                                        <div class="bestseller-img">
                                            <a href="product-details.php?idproduct=<?php echo $arrtemp[$i]['ID']?>"><img src="public/frontend/img/product/<?php echo $arrtemp[$i]['Image']; ?>" alt="book" /></a>
                                            <div class="product-flag">
                                                <ul>
                                                    <li><span class="sale">new</span></li>
                                                    <li><span class="discount-percentage">-5%</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="bestseller-text text-center">
                                            <h3> <a href="#"><?php echo $arrtemp[$i]['Name']; ?></a></h3>
                                            <div class="price">
                                                <ul>
                                                    <li><span class="new-price"><?php echo $arrtemp[$i]['Price'];?></span></li>
                                                    <li><span class="old-price">$45.00</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-bestseller">
                                        <div class="bestseller-img">
                                            <a href="product-details.php?idproduct=<?php echo $arrtemp[$i+1]['ID']?>"><img src="public/frontend/img/product/<?php echo $arrtemp[$i+1]['Image']; ?>" alt="book" /></a>
                                            <div class="product-flag">
                                                <ul>
                                                    <li><span class="sale">new</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="bestseller-text text-center">
                                            <h3> <a href="#"><?php echo $arrtemp[$i+1]['Name']; ?></a></h3>
                                            <div class="price">
                                                <ul>
                                                    <li><span class="new-price"><?php echo $arrtemp[$i+1]['Price']; ?></span></li>
                                                    <li><span class="old-price">$74.00</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php }?>
                       <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>