<?php include('partials/menu.php'); ?>
<div class="main">
         <div class="wrapper">
            <h1>Upadate Order</h1>
            <br>
            <br>

            <?php
                if(isset($_GET['id']))
                {
                    $id=$_GET['id'];

                    $sql = "SELECT * FROM tbl_order WHERE id=$id";

                    $resolve = mysqli_query($conn,$sql);

                    $count = mysqli_num_rows($resolve);

                    if($count == 1)
                    {
                        $row=mysqli_fetch_assoc($resolve);
                        
                        
                        $food = $row['food'];
                        $price = $row['price'];
                        $quantity = $row['quantity'];
                        $status = $row['status'];

                    }
                    else
                    {
                         header('location:'.SITEURL.'admin/manage-order.php');
                    }
                }
                else
                {
                    header('location:'.SITEURL.'admin/manage-order.php');   
                }
            ?>
            <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td>Food Name:</td>
                        <td><b><?php echo $food;?></b></td>
                    </tr>
                    <tr>
                        <td>Price:</td>
                        <td>
                            <b><?php echo $price;?></b>
                        </td>
                    </tr>
                    <tr>
                        <td>Quantity:</td>
                        <td>
                            <input type="number" name="quantity" value="<?php echo $quantity;?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>
                            <select name="status" >
                                <option <?php if($status=='ordered'){echo 'selected';}?>value="ordered">Oredered</option>
                                <option <?php if($status=='on-delivery'){echo 'selected';}?> value="on-delivery">On-delivery</option>
                                <option <?php if($status=='delivered'){echo 'selected';}?> value="delivered">Delivered</option>
                                <option <?php if($status=='cancelled'){echo 'selected';}?> value="cancelled">Cancelled</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="id" value="<?php echo $id;?>">
                            <input type="hidden" name="price" value="<?php echo $price;?>">
                            <input type="submit" name="submit" value="update-order" class="btn-sec">
                        </td>
                    </tr>
                </table>
            </form>
            <?php
                if(isset($_POST['submit']))
                {
                    $id = $_POST['id'];
                    $price = $_POST['price'];
                    $quantity = $_POST['quantity'];
                    $total = $price * $quantity;
                    $status = $_POST['status'];

                    $sql2 = "UPDATE tbl_order SET
                    quantity=$quantity,
                    total=$total,
                    status='$status' 
                    WHERE id=$id
                    ";

                    $resolve2=mysqli_query($conn,$sql2);

                    if($resolve2==TRUE)
                    {
                        $_SESSION['update']="<div class='success'>Order updated</div>";
                        header('location:'.SITEURL.'admin/manage-order.php');
                    }
                    else
                    {
                        $_SESSION['update']="<div class='fail'>Failed to updated</div>";
                        header('location:'.SITEURL.'admin/manage-order.php');
                    }
                }
            ?>

        </div>
</div>
<?php include('partials/footer.php'); ?>