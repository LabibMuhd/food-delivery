<?php
// get cart item qty
function cart_item(){
  // if(isset($_GET['add_to_cart'])){
  //   global $con;
  //   $get_ip_address = getIPAddress();
  //   $select_query="Select * from `cart_details` where ip_address='$get_ip_address'";
  //   $result_query=mysqli_query($con,$select_query);
  //   $count_cart_items=mysqli_num_rows($result_query);
  //   if($count_cart_items>0){
  //     echo "<span class='cart-notification'>$count_cart_items</span>";
  //   }
  // }
  // else{
  //   global $con;
  //   $get_ip_address = getIPAddress();
  //   $select_query="Select * from `cart_details` where ip_address='$get_ip_address'";
  //   $result_query=mysqli_query($con,$select_query);
  //   $count_cart_items=mysqli_num_rows($result_query);
  //   if($count_cart_items>0){
  //     echo "<span class='cart-notification'>$count_cart_items</span>";
  //   }
  //   }
}

// delete item from cart
function remove_product(){
  global $con;
  $get_ip_address = getIPAddress();
  // get cart details
  $select_query="Select * from `cart_details` where ip_address='$get_ip_address'";
  $result_query=mysqli_query($con,$select_query);
  $product_id=$_GET['product'];
  $row=mysqli_fetch_assoc($result_query);
  $size=$row['size'];

  echo  " 
      <div class='popup_heading'>
          <h3 class='heading-tertiary'>Remove from cart</h3>
          <a href='#' class='popup__close'>&times;</a>
        </div>

            <p class='prod_unavailable'>Are u sure u want to remove this item?</p>
            <div class='buttons-submit'>
              <button type='submit' class='btn btn--white' name='save_cart'>
                <div class='inline big--gap display-flex'>
                  <ion-icon name='heart-outline' class='contact-icon color--primary'></ion-icon>
                  <span>Save for later</span> 
                </div>
              </button>
              <input type='submit' class='btn' name='remove_cart' value='Remove Item'>
            </div>";
  // code to remove item from cart 
  if(isset($_POST['remove_cart'])){
    $delete_cart="Delete from `cart_details` where product_id=$product_id and size='$size'";
    $result=mysqli_query($con,$delete_cart);
    if($result){
      echo"<script>alert('Item has been deleted from cart')</script>";
      echo"<script>window.open('cart.php', '_self')</script>";
    }
  }
  // code to save item to wishlist
  if(isset($_POST['save_cart'])){
  
    if(!isset($_SESSION['name'])){
      echo"<script>window.open('users_area/user_login.php', '_self')</script>";
    }
    else{
      $name=$_SESSION['name'];
      $get_user="Select * from `user_table` where first_name='$name'";
      $result=mysqli_query($con,$get_user);
      $run_query=mysqli_fetch_array($result);
      $user_id=$run_query['user_id'];
      $insert_item= "Insert into `wishlist` (product_id,user_id,size,date) values ($product_id,$user_id,'$size',NOW())";
      $result_insert=mysqli_query($con,$insert_item);
      
      $delete_cart="Delete from `cart_details` where product_id=$product_id and size='$size'";
      $result=mysqli_query($con,$delete_cart);
      
      if($result){
        echo"<script>alert('Item has been added to wishlist')</script>";
        echo"<script>window.open('index.php', '_self')</script>";
      }
    }
  }      
}    
?>