<?php include('partials/menu.php');?>
<div class="main">
         <div class="wrapper">
            <h1>Manage Order</h1>
            <br>
            <br>
            <?php
            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
            ?>
            <table class="tbl-full">
                <tr>
                    <th>S.no</th>
                    <th>Food</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Total</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>email</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
                 
                <?php
                    $sql = "SELECT * FROM tbl_order ORDER bY id DESC";

                    $resolve=mysqli_query($conn,$sql);

                    $count=mysqli_num_rows($resolve);

                    $sn=1;

                    if($count>0)
                    {
                        while($row=mysqli_fetch_assoc($resolve))
                        {
                            $id=$row['id'];
                            $food = $row['food'];
                            $price = $row['price'];
                            $quantity = $row['quantity'];
                            $total = $row['total'];
                            $order_date = $row['order_date'];
                            $status = $row['status'];
                            $customer_name = $row['customer_name'];
                            $customer_contact = $row['customer_contact'];
                            $customer_email = $row['customer_email'];
                            $customer_address = $row['customer_address'];

                            ?>
                                <tr>
                                    <td><?php echo $sn++ ;?></td>
                                    <td><?php echo $food ;?></td>
                                    <td><?php echo $price ;?></td>
                                    <td><?php echo $quantity ;?></td>
                                    <td><?php echo $total ;?></td>
                                    <td><?php echo $order_date ;?></td>
                                    <td>
                                        <?php 
                                            if($status=="ordered")
                                            {
                                                echo "<lebel>$status</lebel>";
                                            }
                                            elseif($status=="on-delivery")
                                            {
                                                echo "<lebel style='color:orange;'>$status</lebel>";
                                            }
                                            elseif($status=="delivered")
                                            {
                                                echo "<lebel style='color:green;'>$status</lebel>";
                                            }
                                            elseif($status=="cancelled")
                                            {
                                                echo "<lebel style='color:red;'>$status</lebel>";
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $customer_name ;?></td>
                                    <td><?php echo $customer_contact ;?></td>
                                    <td><?php echo $customer_email ;?></td>
                                    <td><?php echo $customer_address ;?></td>
                                    <td>
                                        
                                        <a href="<?php echo SITEURL ;?>admin/update-order.php?id=<?php echo $id ;?>" class="btn-sec">Update</a>
                                    </td>
                                </tr>


                            <?php
                        }
                    }
                    else
                    {
                        echo "<tr><td colspan='12' class='fail'>Order not available</td></tr>";
                    }
                ?>

                
               
            </table>

            <div class="clearfix"></div>
         </div>
    </div>
<?php include('partials/footer.php');?>