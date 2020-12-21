<div class="recent-post-area pt-95 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center mb-30 section-title-res">
                        <h2>Latest from our blog</h2>
                    </div>
                </div>
                <div class="post-active owl-carousel text-center">
                    <?php include "includes/connection.php";
                            $result = mysqli_query($conn, "SELECT * FROM product limit 19, 4");     
                            $i = 1; 
                            while($row = mysqli_fetch_assoc($result))  
                            {?>                             
                                <div class="col-lg-12">
                                    <div class="single-post">
                                        <div class="post-img">
                                            <a href="product-details.php?idproduct=<?php echo $row['ID']; ?>">
                                            <img src="public/frontend/img/post/<?php echo $row['Image']; ?>" alt="post" /></a>
                                            <div class="blog-date-time">
                                                <span class="day-time"><?php echo $i++;?></span>
                                                <span class="moth-time">Dec</span>
                                            </div>
                                        </div>
                                        <div class="post-content">
                                            <h3><a href="#">ĐỒNG HỒ NAM TISSOT</a></h3>
                                            <p><?php echo $row['Name']; ?></p>
                                        </div>
                                    </div>
                                </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>