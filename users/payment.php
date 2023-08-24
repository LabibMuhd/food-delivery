<?php
include("../connect/connect.php");
include("../functions/function.php");
session_start();
$get_ip_address= getIPAddress();
$email=$_SESSION['email'];
$user_query= "Select * from `user` where user_ip='$get_ip_address'";
$result_user=mysqli_query($con,$user_query);
$row_data=mysqli_fetch_assoc($result_user);
$first_name=$row_data['first_name'];
$last_name=$row_data['last_name'];
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
  
  $select_menu= "Select * from menu where id=$menu_id";  
  $result_menu=mysqli_query($con,$select_menu);
  $row_menu=mysqli_fetch_assoc($result_menu);
  $product_table_price=$row_menu['price'];
  $each_price = $product_table_price * $product_table_quantity;
  $product_price=array($each_price);
  $product_values=array_sum($product_price);
  $total_price += $product_values;  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment</title>

  <link rel="stylesheet" href="../css/general.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="../css/queries.css?v=<?php echo time(); ?>">

  <script defer src="../js/paystack.js?v=<?php echo time(); ?>"></script>
</head>
<body>

<section class="payment-section">
  <div class="container payment">
    <h2 class="heading-tertiary center-text">Payment form</h2>
  <form class="cta-form" id="paymentForm" method="POST">
    <div class="form-group">
      <label for="email">Email Address</label>
      <input type="email" id="email" name="email" value="<?php echo $email?>" required />
    </div>
    <div class="form-group">
      <label for="amount">Amount</label>
      <input type="tel" id="amount" disabled name="amount" value="<?php echo $total_price?>" required />
    </div>
    <div class="form-group">
      <label for="first-name">First Name</label>
      <input type="text" id="first-name" value="<?php echo $first_name?>"/>
    </div>
    <div class="form-group">
      <label for="last-name">Last Name</label>
      <input type="text" id="last-name" value="<?php echo $last_name?>"/>
    </div>
    <div class="form-submit">
      <button class="btn btn--search btn-paystack" name="pay_now" type="submit" onclick="payWithPaystack()"> Pay </button>
    </div>
  </form>
</div>
</section>

<script src="https://js.paystack.co/v1/inline.js"></script>
</body>
</html>
