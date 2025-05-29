<?php include('partials_front/menu.php') ;?>

<?php
    if(isset($_GET['food_id']))
    {
        $food_id=$_GET['food_id'];
        
        $sql = "SELECT * FROM food WHERE id=$food_id";

        $resolve = mysqli_query($conn,$sql);

        $count = mysqli_num_rows($resolve);

        if($count==1)
        {
            $row=mysqli_fetch_assoc($resolve);

            $title=$row['title'];
            $price=$row['price'];
            $img_name=$row['img_name'];
        }
        else
        {
            header('location:'.SITEURL);
        }
    }
    else
    {
        header('location:'.SITEURL);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation Form</title>
    <link rel="stylesheet" href="stylesorder.css">
</head>
<body>
    <br>
    <br>
    <h1>Fill this form to confirm your order</h1>

    <form action="" method="POST">
        <fieldset>
            <legend>Select food</legend>
            <div class="food-menue-img">
            <?php
                if($img_name == "")
                {
                    echo "<div class='fail'>Image not available</div>";
                }
                else
                {
                    ?>
                    <img src="<?php echo SITEURL ;?>images/food/<?php echo $img_name;?>" alt="Iproduct" class="img-res">
                     <?php
                 }
                ?>
            
            </div>
             
            </div>
            <div class="food-menue-desc">
                <h4><?php echo $title;?></h4>
                <p class="food-price"><?php echo $price;?></p>
                <input type="hidden" name="food" value="<?php echo $title;?>">
                <p class="food-price">Quantity</p>
                <input type="hidden" name="price" value="<?php echo $price;?>">
                <input type="number" name="quantity" value="1" required>

                               
            </div>
        </fieldset>

        <fieldset>
            <legend>Order details</legend>
            <label for="fullname">Full Name:</label>
            <input type="text" id="fullname" name="fullname" placeholder="Enter full name"  required><br><br>

            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" placeholder="Enter phone number" required><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter email" required><br><br>

            <label for="address">Address:</label>
            <textarea id="address" name="address" placeholder="Enter address" required></textarea><br><br>

            <input type="submit" name="submit" value="confirm-order" class="button">
        </fieldset>
    </form>

    <?php
        if(isset($_POST['submit']))
        {
            $food = $_POST['food'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];
            $total = $price * $quantity;
            $order_date = date("Y-m-d h:i:sa");
            $status = "ordered";
            $customer_name = $_POST['fullname'];
            $customer_contact = $_POST['phone'];
            $customer_email = $_POST['email'];
            $customer_address = $_POST['address'];

            $sql2 = "INSERT INTO tbl_order SET
                 food = '$food',
                 price = $price,
                 quantity = $quantity,
                 total = $total,
                 order_date = '$order_date',
                 status = '$status',
                 customer_name = '$customer_name',
                 customer_contact = '$customer_contact',
                 customer_email = '$customer_email',
                 customer_address = '$customer_address'
                ";
            

            $resolve2 = mysqli_query($conn,$sql2);

            if($resolve2==TRUE)
            {
                $_SESSION['order'] = "<div class='success'>Order placed.</div>";
                header('location:'.SITEURL);
            }
            else
            {
                $_SESSION['order']="<div class='fail'>Order not placed.</div>";
                header('location:'.SITEURL);
            }
        }
    ?>
</body>
</html>

<?php include('partials_front/footer.php') ;?>