<?php include('partials_front/menu.php') ;?>
    <!--food search start -->
    <section class="food-search text-center">
        <div class="container">
            <form action="<?php echo SITEURL;?>food_search.php" method="POST">
                <input type="search" name="search" placeholder="Search for dishes">
                <input type="submit" name="submit" value="search" class="btn">
            </form>
        </div>
    </section>
    <!--food search end -->

        <!--food menue start -->
        <section class="menue">
        <div class="container">
            <h2 class="head">Explore Our Menu</h2>
            <?php
                $sql = "SELECT * FROM food WHERE active='Yes' LIMIT 10";

                $resolve = mysqli_query($conn,$sql);

                $count = mysqli_num_rows($resolve);

                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($resolve))
                    {
                        $id=$row['id'];
                        $title=$row['title'];
                        $price=$row['price'];
                        $description=$row['description'];
                        $img_name=$row['img_name'];
                        ?>
                        <div class="food-menue">
                            <div class="food-menue-img">
                            <?php
                                if($img_name == "")
                                {
                                    echo "<div class='fail'>Image not available</div>";
                                }
                                else
                                {
                                    ?>
                                    <img src="<?php echo SITEURL ;?>images/food/<?php echo $img_name;?>" alt="It's product" class="img-res">
                                    <?php
                                }
                                ?>
                            
                            </div>

                            <div class="food-menue-desc">
                                <h4><?php echo $title;?></h4>
                                <p class="food-price"><?php echo $price;?></p>
                                <p class="foord-detail"><?php echo $description;?></p>
                                <br>
                                <a href="<?php echo SITEURL;?>order.php?food_id=<?php echo $id;?>" class="btn">Order now</a>
                            </div>
                        </div>

                        <?php
                    }    
                }
                else
                {
                    echo "<div class='fail'>Food Not available</div>";
                }
            ?>
           
            <div class="clear-fix"></div>
        </div>
    </section>
    <!--food menue end -->

<?php include('partials_front/footer.php') ;?>