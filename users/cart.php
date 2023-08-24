<?php
include('../connect/connect.php');
include('../functions/function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cart</title>
  <link rel="stylesheet" href="../css/general.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="../css/queries.css?v=<?php echo time(); ?>">
  
  <script defer src="../js/cart.js?v=<?php echo time(); ?>"></script>
</head>
<body>
  <?php include ('../includes/header.php')?>

  <main>
    <section class="cart-section">
      <div class="cart-container">
        <form action="" method="post">              
        <?php 
          $get_ip_address= getIPAddress();
          $total_price=0;
          $each_price=0;
          $cart_query= "Select * from `cart` where user_ip='$get_ip_address'";
          $result=mysqli_query($con,$cart_query);
          $result_count=mysqli_num_rows($result);
          // if cart is not empty display content
          if($result_count>0){
            echo "<div class='cart-header'>
                <p class='cart-heading'>Product</p>
                <p class='cart-heading'>Quantity</p>
                <p class='cart-heading'>Subtotal</p>
              </div>
              <div class='cart-item'>";
            while($row=mysqli_fetch_assoc($result)){
              $menu_id = $row['menu_id'];
              $quantity=$row['quantity'];
              // select query
              $select_menu= "Select * from menu where id=$menu_id";  
              $result_menu=mysqli_query($con,$select_menu);
              $row_menu=mysqli_fetch_assoc($result_menu);
              $menu_title=$row_menu['name'];
              $menu_img=$row_menu['food_img'];
              // calculate the price
              $product_table_price=$row_menu['price'];
              $each_price = $product_table_price * $quantity;
              $product_price=array($each_price);
              $product_values=array_sum($product_price);
              $total_price += $product_values;                 
          ?>        
          <div class='flex'>
            <img <?php echo"src='../admin/food_img/$menu_img' alt='$menu_title'"?> class='cart-img' />
            <div class='cart-info'>
              <p class='meal-name'><?php echo $menu_title?> </p>
              <a <?php echo "href='?menu=$menu_id#popup'"?> class='cart-delete'>Remove</a>
            </div>
          </div>
          
          <!-- quantity form -->
          <form  action="" method="post">
            <div class="qty-form">
              <input type='number' name='qty[<?php echo $menu_id?>]' class='value' autocomplete="off" value="<?php echo $quantity?>">
              <input type="submit" value="add" name="update_cart" class="btn btn--search color-white">
            </div>              
          </form>
          <?php
            if(isset($_POST['update_cart']) && isset($_POST['qty'][$menu_id])){                          
              $quantities=$_POST['qty'][$menu_id];
              if($quantities<1){
                echo "<script>alert('Item quantity can only start from 1 and above')</script>";
                $quantity=1;
              }
              else{            
                $update_cart_query="update `cart` set quantity=$quantities where menu_id=$menu_id";
                $result_query_cart=mysqli_query($con,$update_cart_query);
                $total_price = $total_price * $quantities;
                echo "<script>window.open('cart.php', '_self')</script>"; 
              }    
            }            
          ?>
            <p class='meal-price'><span>₦ </span> <?php echo $product_table_price?></p>
            <?php
            }
            echo "</div>";
          }
          // if cart is empty display content
            else{
              echo "<div class='empty-cart center-text'>
                  <h2 class='heading-tertiary'>Your cart is empty!</h2>
                  <p class='paragraph'>Browse our variety of restraunts and get your favourite meals!</p>
                  <input type='submit' class='btn btn--search' name='continue_shop' value='Discover now'>
                </div>";
            }
            if(isset($_POST['continue_shop'])){
              echo "<script>window.open('meals.php', '_self')</script>";
            }
            if(isset($_POST['add_cart'])){
              echo "<script>window.open('checkout.php?payment_for=$menu_id', '_self')</script>";     
            }            
            
          ?>
          <?php
      $cart_query= "Select * from `cart` where user_ip='$get_ip_address'";
      $result_cart=mysqli_query($con,$cart_query);
      $result_cart_count=mysqli_num_rows($result_cart);
  
      if($result_cart_count>0){
        echo " 
        <div class='subtotal_grid'>
          <div class='subtotal'>
            <div class='total'>
              <p class='heading-sub'>Total</p>
              <p class='amount'>₦ $total_price</p>
            </div>
            <input type='submit' class='btn btn--search' name='add_cart' value='Proceed to payment'>    
          </div>
        </div>
        
        ";
      } 
        ?> 
      </form>
    </div>
    </section>  
  </main>

  <?php include('../includes/footer.php')?>

  <!-- popup window -->
  <div class="popup" id="popup">
    <form action="" method="post">
      <div class="popup__content">
        <?php
        remove_product();
        ?>
      </div>
    </form>
  </div>

  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>