
  <?php
  $get_order="Select * from `orders` order by date DESC";
  $result=mysqli_query($con,$get_order);
  $row_count=mysqli_num_rows($result);
  if($row_count==0){
    echo "<h2 class='heading-tertiary center-text'>NO ORDERS YET</h2>";
  }
  else{
    echo "
    <h2 class='heading-tertiary margin-top-bg center-text'>All Orders</h2>
    <div class='orders-box'>
      <p class='heading'>S/NO</p>
      <p class='heading'>Meal</p>
      <p class='heading'>Amount</p>
      <p class='heading'>Invoice No</p>
      <p class='heading'>Qty</p>
      <p class='heading'>Delivery address</p>
      <p class='heading'>Date</p>
      <p class='heading'>Status</p>
      <p class='heading'>Delete</p>
    </div>";
    $number=0;
    while($row=mysqli_fetch_assoc($result)){
      $order_id=$row['id'];
      $user_id=$row['user_id'];
      $menu_id=$row['menu_id'];
      $amount=$row['amount'];
      $invoice_num=$row['invoice_number'];
      $total=$row['quantity'];
      $date=$row['date'];
      $status=$row['order_status'];
      $delivery=$row['address'];

      $get_meal="Select * from `menu` where id=$menu_id";
      $result_meal=mysqli_query($con,$get_meal);
      $row=mysqli_fetch_assoc($result_meal);
      $meal_name=$row['name'];
      $meal_img=$row['food_img'];

      
      $number++;
  ?>
  <div class="border">
    <div class="orders-box">
      <p class='product-style'><?php echo $number?></p>
      <div>
      <img <?php echo "src='food_img/$meal_img' alt='$meal_name'"?> class="meal-img--sm">
      <p class='product-style'><?php echo $meal_name?></p>
      </div>
      <p class='product-style'>₦<?php echo $amount?></p>
      <p class='product-style'><?php echo $invoice_num?></p>
      <p class='product-style'><?php echo $total?></p>
      <p class='product-style'><?php echo $delivery?></p>
      <p class='product-style'><?php echo $date?></p>

      <form action='index.php?list_orders&order=<?php echo $order_id?>' class='form' method='post'>
        <?php
        if($status == 'pending'){
          echo "<div class='form__radio-group'>
          <input type='radio' class='form__radio-input' id='pending_$order_id' value='pending' name='status' checked>
          <label for='pending_$order_id' class='form__radio-label'>
            <span class='form__radio-button'></span>
            pending
          </label>
        </div>
        <div class='form__radio-group'>
          <input type='radio' class='form__radio-input' id='enroute_$order_id' value='on the way' name='status'>
          <label for='enroute_$order_id' class='form__radio-label'>
            <span class='form__radio-button'></span>
            out for delivery
          </label>
        </div>

        <div class='form__radio-group'>
          <input type='radio' class='form__radio-input' id='delivered_$order_id' value='delivered' name='status'>
          <label for='delivered_$order_id' class='form__radio-label'>
            <span class='form__radio-button'></span>
            delivered
          </label>
        </div>";
        }

        else if($status == 'on the way'){
          echo "<div class='form__radio-group'>
          <input type='radio' class='form__radio-input' id='pending_$order_id' value='pending' name='status'>
          <label for='pending_$order_id' class='form__radio-label'>
            <span class='form__radio-button'></span>
            pending
          </label>
        </div>
        <div class='form__radio-group'>
          <input type='radio' class='form__radio-input' id='enroute_$order_id' value='on the way' name='status' checked>
          <label for='enroute_$order_id' class='form__radio-label'>
            <span class='form__radio-button'></span>
            out for delivery
          </label>
        </div>

        <div class='form__radio-group'>
          <input type='radio' class='form__radio-input' id='delivered_$order_id' value='delivered' name='status'>
          <label for='delivered_$order_id' class='form__radio-label'>
            <span class='form__radio-button'></span>
            delivered
          </label>
        </div>";
        }

        else if ($status == 'delivered'){
          echo "<div class='form__radio-group'>
          <input type='radio' class='form__radio-input' id='pending_$order_id' value='pending' name='status'>
          <label for='pending_$order_id' class='form__radio-label'>
            <span class='form__radio-button'></span>
            pending
          </label>
        </div>
        <div class='form__radio-group'>
          <input type='radio' class='form__radio-input' id='enroute_$order_id' value='on the way' name='status'>
          <label for='enroute_$order_id' class='form__radio-label'>
            <span class='form__radio-button'></span>
            out for delivery
          </label>
        </div>

        <div class='form__radio-group'>
          <input type='radio' class='form__radio-input' id='delivered_$order_id' value='delivered' name='status' checked>
          <label for='delivered_$order_id' class='form__radio-label'>
            <span class='form__radio-button'></span>
            delivered
          </label>
        </div>";
        }
        else{
          echo "<div class='form__radio-group'>
          <input type='radio' class='form__radio-input' id='pending_$order_id' value='pending' name='status' checked>
          <label for='pending_$order_id' class='form__radio-label'>
            <span class='form__radio-button'></span>
            pending
          </label>
        </div>
        <div class='form__radio-group'>
          <input type='radio' class='form__radio-input' id='enroute_$order_id' value='on the way' name='status'>
          <label for='enroute_$order_id' class='form__radio-label'>
            <span class='form__radio-button'></span>
            out for delivery
          </label>
        </div>

        <div class='form__radio-group'>
          <input type='radio' class='form__radio-input' id='delivered_$order_id' value='delivered' name='status'>
          <label for='delivered_$order_id' class='form__radio-label'>
            <span class='form__radio-button'></span>
            delivered
          </label>
        </div>";
        }
        ?>

        <input type="submit" class="btn" value="save" name="save_radio">
      </form>
      <a href='index.php?delete_order=<?php echo $order_id?>' class='product-style' type="button" data-toggle="modal" data-target="#exampleModal">
        <ion-icon name='trash-outline' class='contact-icon color--primary cursor'></ion-icon>
      </a>
    </div>
  </div>
 

<?php 
}
}

if(isset($_POST['status'])){
  $u_status = $_POST['status'];
  $id = $_GET['order'];

  $update_query = "update orders set order_status='$u_status' where id=$id";
  $result_update = mysqli_query($con,$update_query);

  echo "<script>window.open('index.php?list_orders','_self')</script>";

}
?>
</div>