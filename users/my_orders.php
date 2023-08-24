<?php 
  $email=$_SESSION['email'];
  $get_user="Select * from `user` where email='$email'";
  $result=mysqli_query($con,$get_user);
  $row_fetch=mysqli_fetch_assoc($result);
  $user_id=$row_fetch['user_id'];
  $get_orders="Select * from `orders` where user_id=$user_id order by date DESC";
  $result_orders=mysqli_query($con,$get_orders);
  $result_num_rows=mysqli_num_rows($result_orders);
  if($result_num_rows>0){
  ?>
<h2 class='heading-tertiary'>Orders</h2>
  <hr>
  <?php
  while($row_orders=mysqli_fetch_assoc($result_orders)){
    $menu_id=$row_orders['menu_id'];
    $order_invoice=$row_orders['invoice_number'];
    $order_status=$row_orders['order_status'];


    $get_product="Select * from `menu` where id=$menu_id";
    $result_product=mysqli_query($con,$get_product);
    while($row_product=mysqli_fetch_assoc($result_product)){
      $meal=$row_product['name'];
      $meal_image=$row_product['food_img'];
      $delivery=$row_product['delivery_time'];
  
  ?>
  
  <div class='order-info'>
    <div class='order-details'>
      <img src=<?php echo "'../admin/food_img/$meal_image' alt='$meal'" ?> class="cart-img">
      <div>
        <p class='meal-title'><?php echo $meal; ?></p>
        <p class='sub_text'>Order No: <?php echo $order_invoice; ?></p>
        <?php 
        if($order_status == 'enroute'){
          echo "<span class='item-status bg-color-yellow'>$order_status</span>";
        }
        else if($order_status == 'delivered'){
          echo "<span class='item-status bg-color-green'>$order_status</span>";
        }
        else{
          echo "<span class='item-status bg-color-orange'>$order_status</span>";
        }
        ?>
        <p class='sub_text'>Est Delivery time: <strong><?php echo $delivery?></strong></p>
      </div>      
    </div>
  </div>
<?php
 }
}
}
else{
    echo "<div class='empty-cart center-text mg-top-sm'>
            <h2 class='heading-tertiary'>You havent made an order yet!</h2>
            <p class='paragraph'>Browse our variety of restraunts and get your favourite meals!</p>
            <a href='meals.php' class='btn btn--search'>Discover now</a>
          </div>";
    }
?>