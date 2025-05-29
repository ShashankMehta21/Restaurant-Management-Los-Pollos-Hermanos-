<?php include('partials_front/menu.php') ;?>
<!--food categoris start -->
<section class="categoris">
        <h2 class="text-center">Categories</h2>
        <div class="products-container">

            <?php
                $sql = "SELECT * FROM category WHERE active='Yes'";

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
<?php include('partials_front/footer.php') ;?>