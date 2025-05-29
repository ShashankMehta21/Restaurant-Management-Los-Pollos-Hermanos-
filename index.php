<?php include('partials_front/menu.php');?>
    

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
    <?php
                if(isset($_SESSION['order']))
                {
                    echo $_SESSION['order'];
                    unset($_SESSION['order']);
                }
            ?>
<!-- width="500px" height="425px" -->
   <div class="bo">
    <section class="cont">
        <div class="welcome">
            <img id ="yo" src="<?php SITEURL;?>images/gus.png" alt="no" >
            <div class="welcome_cont">
                    <h2 id="title"><span>Welcome</span></h2>
                    <blockquote class="welcome__quote">
						It's the best ingredients. The spiciest spices. All prepared with loving care!
						And always delivered with a friendly smile. That's the Los Pollos Hermanos promise.
						<span class="welcome__name">Gus Fring — Owner and Proprietor</span>
					</blockquote>
            </div>
        </div>
    </section>
    </div>        
    <!--food categoris start -->
    <section class="categoris">
        <h2 class="text-center">Categoris</h2>
        <div class="products-container">

            <?php
                $sql = "SELECT * FROM category WHERE active='Yes' AND featured='Yes' LIMIT 6";

                $resolve = mysqli_query($conn,$sql);

                $count = mysqli_num_rows($resolve);

                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($resolve))
                    {
                        $id=$row['id'];
                        $title=$row['title'];
                        $img_name=$row['img_name'];
                        ?>
                        
                        <div class="product float-cont">
                            <?php
                                if($img_name == "")
                                {
                                    echo "<div class='fail'>Image not available</div>";
                                }
                                else
                                {
                                    ?>
                                    <a href="<?php echo SITEURL;?>category_food.php?category_id=<?php echo $id;?>"><img src="<?php echo SITEURL ;?>images/category/<?php echo $img_name;?>" alt="It's product" class="img-res"></a>
                                    <?php
                                }
                                ?>
                          
                           <h3 class="float-text"><?php echo $title;?></h3>
                        </div>
                        
                        <?php
                    }
                }
                else
                {
                    echo "<div class='fail'>Category not added</div>";
                }
            ?>
           
            <!-- <div class="clear-fix"></div> -->
        </div>
    </section>
    <!--food categoris end -->

    <!--food menue start -->
    <section class="menue">
        <div class="container">
            <h2 class="head">Explore Our Menu</h2>
            <?php
                $sql2 = "SELECT * FROM food WHERE active='Yes' AND featured='Yes' LIMIT 10";

                $resolve2 = mysqli_query($conn,$sql2);

                $count2 = mysqli_num_rows($resolve2);

                if($count2>0)
                {
                    while($row=mysqli_fetch_assoc($resolve2))
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
                    echo "<div class='fail'>Not available</div>";
                }
            ?>
            
            
            <div class="clear-fix"></div>
        </div>
    </section>
    <!--food menue end -->

<?php include('partials_front/footer.php') ;?>