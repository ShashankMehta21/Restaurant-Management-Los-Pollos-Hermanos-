<?php include('partials_front/menu.php') ;?>
<!--food search start -->
<?php
    if($_GET['category_id'])
    {
        $category_id=$_GET['category_id'];

        $sql = " SELECT title FROM category WHERE id=$category_id";

        $resolve = mysqli_query($conn,$sql);

        $row = mysqli_fetch_assoc($resolve);

        $category_title=$row['title'];
    }
    else
    {
        header('location:'.SITEURL);
    }
?>
<section class="food-searcho text-center">
        <div class="container">
                <h3>Foods on <a href="#" class="text-white"><?php echo $category_title ;?></a></h3>
        </div>
    </section>
    <!--food search end -->
 <!--food menue start -->
 <section class="menue">
        <div class="container">
            <h2 class="head">Explore Our Menu</h2>
            <?php
                $sql2 = "SELECT * FROM food WHERE active='YES' AND category_id=$category_id";

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