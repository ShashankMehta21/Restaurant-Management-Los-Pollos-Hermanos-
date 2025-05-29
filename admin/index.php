
<?php include('partials/menu.php');?>

    <!-- Main content start-->
    <div class="main">
         <div class="wrapper">
            <h1>DASHBOARD</h1>
            <br>
            <?php
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            ?>
            <br>
            <div class="col-4 text-center">
                <?php
                    $sql = "SELECT * FROM category";
                    $resolve=mysqli_query($conn,$sql);
                    $count=mysqli_num_rows($resolve);
                ?>
                <h2><?php echo $count;?></h2>
                <br>
                categories
            </div>
            <div class="col-4 text-center">
                <?php
                    $sql2 = "SELECT * FROM food";
                    $resolve2=mysqli_query($conn,$sql2);
                    $count2=mysqli_num_rows($resolve2);
                ?>
                <h2><?php echo $count2;?></h2>
                <br>
                Foods
            </div>
            <div class="col-4 text-center">
            <?php
                    $sql3 = "SELECT * FROM tbl_order";
                    $resolve3=mysqli_query($conn,$sql3);
                    $count3=mysqli_num_rows($resolve3);
                ?>
                <h2><?php echo $count3;?></h2>
                <br>
                Total orders
            </div>
            <div class="col-4 text-center">
                <?php
                    $sql4 = "SELECT SUM(total) AS Total FROM tbl_order WHERE status='Delivered'";
                    $resolve4=mysqli_query($conn,$sql4);
                    $row=mysqli_fetch_assoc($resolve4);
                    
                    $total_rev=$row['Total'];

                ?>
                <h2><?php echo $total_rev;?></h2>
                <br>
                Revenue Generated
            </div>
            <div class="clearfix"></div>
         </div>
    </div>
    <!-- Main content end-->

<?php include('partials/footer.php');?>