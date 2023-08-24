<?php
include("../connect/connect.php");
include("../functions/function.php");
@session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Summary</title>

  <link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="../css/general.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="../css/queries.css?v=<?php echo time(); ?>">
  <link rel="shortcut icon" type="image/png" href="img/favicon.png">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Gilda+Display&display=swap" rel="stylesheet">
  
  <script defer src="../js/paystack.js?v=<?php echo time(); ?>"></script>
</head>

<body>
  <header class="header">
    <a href="../index.php"><img src="../img/omnifood-logo.png" alt="meena kawu logo" class="logo"></a>
    <h2 class="heading-tertiary margin-b--none">Place your order</h2>
    <div class="contact-cart">
      <div class="contact__option">
        <p><ion-icon name="call-outline" class="contact-icon"></ion-icon></p>
        <p class="contact-text">Need Help? <br><span><a href="#" class="cart-delete contact-text">Contact us</a></span></p>
      </div>
      <div class="contact__option">
        <p><ion-icon name="return-up-back-outline" class="contact-icon"></ion-icon></p>
        <p class="contact-text">Easy <br><span>Returns</span></p>
      </div>
      <div class="contact__option">
        <p><ion-icon name="lock-closed-outline" class="contact-icon"></ion-icon></p>
        <p class="contact-text">Secure <br><span>Payments</span></p>
      </div>
    </div>
  </header>

  <section class="checkout-section"> 
    <div class="container checkout_grid">
      <div class="delivery">
        <div class="delivery_detail">   
          <div class="delivery_heading">
            <div class="delivery_heading--option">
              <ion-icon name="checkmark-circle" class="contact-icon color-green"></ion-icon>
              <p class="heading-sub">1. Customer Details</p>
            </div>
          </div>
          <hr>
          <?php
            $get_ip_address= getIPAddress();
            $email= $_SESSION['email'];
            $user_query= "Select * from `user` where user_ip='$get_ip_address'";
            $result=mysqli_query($con,$user_query);
            $row_data=mysqli_fetch_assoc($result);
            $first_name=$row_data['first_name'];
            $last_name=$row_data['last_name'];
            $cart_query= "Select * from `cart` where user_ip='$get_ip_address'";
            $result_cart=mysqli_query($con,$cart_query);
            $row=mysqli_fetch_array($result_cart);
            $address=$row['address'];
            ?>
            <p class='user_name' id='first-name'>
              <?php echo $first_name ?>
              <span class='surname' id='last-name'>
                <?php echo $last_name?>
              </span>
            </p>
            <p class='user_name' id='email'><?php echo $email?></p>
            <p class='address_text'><?php echo $address?></p>
            
          </div>
          <div class="delivery_detail">
            <div class="delivery_heading">
              <div class="delivery_heading--option">
                <ion-icon name="checkmark-circle" class="contact-icon color-green"></ion-icon>
                <p class="heading-sub">2. Delivery</p>
              </div>
            </div>
            <hr>          
            <div class="delivery_details-more">
              <div class="delivery_type">
                <p class="user_name">Door Delivery</p>
              </div>
              <hr>
              <div class="flex-column">              
                <?php summary(); ?>             
              </div>
            </div>
            <a href="cart.php" class="cart-delete color--white text-align-c">MODIFY CART</a>
          </div>    
          <a href="meals.php" class="cart-delete">&ll; Go back & continue shopping</a>
        </div>

        <aside>
          <div class="checkout">
            <?php 
            $email=$_SESSION['email'];
            $get_id_query="Select * from `user` where email='$email'";
            $result_query=mysqli_query($con,$get_id_query);
            $row_data=mysqli_fetch_assoc($result_query);
            $user_id=$row_data['user_id'];
            $get_ip_address= getIPAddress();
            $total_price=0;
            $each_price=0;
            $product_quantity=0;
            $cart_query= "Select * from `cart` where user_ip='$get_ip_address'";
            $result=mysqli_query($con,$cart_query);
            while($row=mysqli_fetch_array($result)){
              $menu_id = $row['menu_id'];
              $quantity= array($row['quantity']);
              $product_table_quantity=$row['quantity'];
              $product_quantity_values=array_sum($quantity);
              $product_quantity += $product_quantity_values;
              
              $select_attr= "Select * from menu where id=$menu_id";  
              $result_attr=mysqli_query($con,$select_attr);
              $row_attr=mysqli_fetch_assoc($result_attr);
              $product_table_price=$row_attr['price'];
              $each_price = $product_table_price * $product_table_quantity;
              $product_price=array($each_price);
              $product_values=array_sum($product_price);                                            
              $total_price += $product_values;   
          }
          ?> 

          <p class='heading-sub'>Order summary</p>                     
          <div class='subtotal'> 
            <div class='total-amt grid--2-column'>
              <p class='product-type'>Items Total(<?php echo $product_quantity?>)</p>
              <p class='amount' id="amount">₦<?php echo $total_price?></p>
            </div>
            <a href="payment.php" class="btn btn--search">Confirm order</a>               
          </div>
        </div>
      </aside>
    </div>
</section>
          

  
  
        
  

<script src="https://js.paystack.co/v1/inline.js"></script>

  <!-- <script defer src="js/script.js"></script> -->
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

  
</body>

</html>