<?php
// get ip address
function getIPAddress() {  
  //whether ip is from the share internet  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }  
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   }  
//whether ip is from the remote address  
  else{  
           $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
}

// get number of items in the cart
function count_cart_items(){
  global $con;
  $get_ip_address = getIPAddress();
  $select_query="Select * from `cart` where user_ip='$get_ip_address'";
  $result_query=mysqli_query($con,$select_query);
  $count_cart_items=mysqli_num_rows($result_query);
  if($count_cart_items>0){
    echo "<span class='cart-notification'>$count_cart_items</span>";
  }
}
//display number of cart items on the cart icon
function cart_item(){
  if(isset($_GET['add_to_cart'])){
    count_cart_items();  
  }
  else{
    count_cart_items();
  }
}



// delete item from cart
function remove_product(){
  global $con;
  $get_ip_address = getIPAddress();
  // get cart details
  $select_query="Select * from `cart` where user_ip='$get_ip_address'";
  $result_query=mysqli_query($con,$select_query);
  $menu_id=$_GET['menu'];
  $row=mysqli_fetch_assoc($result_query);

  echo  " 
      <div class='popup_heading'>
          <h3 class='heading-tertiary'>Delete Item</h3>
          <a href='#' class='popup__close'>&times;</a>
        </div>

            <p class='meal-description'>Are u sure u want to remove this item?</p>
            <div class='buttons-submit'>
              <button type='submit' class='btn btn--search' name='remove_cart'>
                  <span>Yes</span> 
              </button>
              <input type='submit' class='btn btn--search' name='no' value='No'>
            </div>";
  // code to remove item from cart 
  if(isset($_POST['remove_cart'])){
    $delete_cart="Delete from `cart` where menu_id=$menu_id";
    $result=mysqli_query($con,$delete_cart);
    if($result){
      echo"<script>alert('Item has been deleted from cart')</script>";
      echo"<script>window.open('cart.php', '_self')</script>";
    }
  }
  if(isset($_POST['no'])){
    echo "<script>window.open('cart.php', '_self')</script>";
}
}    

// search products
function search_product(){
  global $con;

  if(isset($_POST['search'])){
    $search_data_value=$_POST['search_data'];
    $select = "select * from admin_restaurant";
    $res=mysqli_query($con,$select);
    while($row_id=mysqli_fetch_assoc($res)){
      $id=$row_id['id'];
    }    
    $search_query ="Select * from `menu` where keyword like '%$search_data_value%'";
    $result_query=mysqli_query($con,$search_query);
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows==0){
      echo "<h2 class='heading-secondary stock--message center-text'>Item not available</h2>";
    }
    while($row=mysqli_fetch_assoc($result_query)){
      $menu_id=$row['id'];
      $menu_title=$row['name'];
      $menu_image=$row['food_img'];
      $category=$row['category'];
      $delivery=$row['delivery_time'];
      $price=$row['price'];
    echo "<div class='meals'>
    <a href='details.php?menu_id=$menu_id' class='menu-link'>
    <div class='img-box'>
      <img src='../admin/food_img/$menu_image' alt='$menu_title' class='meals-img' />
    </div>
      <div class='meal-content'>
        <p class='meal-name'>$menu_title</p>
        <ul class='meal-attributes'>
          <li class='meal-attribute'>
            <ion-icon class='meal-icon' name='list-outline'></ion-icon>
            <span>$category</span>
          </li>
          <li class='meal-attribute'>
            <ion-icon class='meal-icon' name='time-outline'></ion-icon>
            <span>$delivery</span>
          </li>
          <li class='meal-attribute'>
            <ion-icon class='meal-icon' name='restaurant-outline'></ion-icon>
            <span>";
               
            $select_restaurant="Select restaurant_name from admin_restaurant where id=$id";
            $result_restaurant=mysqli_query($con,$select_restaurant);
            $row=mysqli_fetch_assoc($result_restaurant);
            $res_name=$row['restaurant_name'];
            echo "$res_name            
            </span>
          </li>
        </ul>
      </div>
    </a>
    <div class='flex-cl'>
      <p class='meal-price'>₦ $price</p>
      <button class='btn btn--search' name='order' type='submit'>
        add to cart
      </button>
    </div>
  </div>";
        }
      }
    }

////////////////////
// summary
////////////////////

// checkout summary
function summary(){
  global $con;
  $get_ip_address= getIPAddress();
  $cart_query= "Select * from `cart` where user_ip='$get_ip_address'";
  $result=mysqli_query($con,$cart_query);
  while($row=mysqli_fetch_array($result)){
    $menu_id = $row['menu_id'];
    $quantity= $row['quantity'];
    $address = $row['address'];
    $select_menu="Select * from `menu` where id='$menu_id'";
    $result_menu=mysqli_query($con,$select_menu);
    while($row_data=mysqli_fetch_assoc($result_menu)){
      $title=$row_data['name'];
      $menu_image=$row_data['food_img'];
      $delivery=$row_data['delivery_time'];

      echo "<div class='delivery--product-info'>
            <img src='../admin/food_img/$menu_image' alt='$title' class='cart-img' />
            <div class='cart-info'>
              <p class='product-type'>$title</p>
              <p>Qty: $quantity</p>                
              <p>Delivered in: $delivery</p>                
              <p>Deliver to: $address</p>                
              </div>
            </div>";
    }
  }
}

// summary data
function summary_data(){
  global $con;
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
  echo "<p class='user_name' id='first-name'>$first_name <span class='surname' id='last-name'>$last_name</span></p>
        <p class='user_name' id='email'>$email</p>
        <p class='address_text'>$address</p>";

}

// get account details
function get_account_details(){
  global $con;
  $fname=$_SESSION['name'];
  $email=$_SESSION['email'];
  $get_details="Select * from `user` where first_name='$fname' and email='$email'";
  $result_query=mysqli_query($con,$get_details);
  $row_data=mysqli_fetch_array($result_query);
  $last_name=$row_data['last_name'];
  $email=$row_data['email'];
  $phone=$row_data['phone'];
  $address=$row_data['address'];
  if(!isset($_GET['edit_address'])){
    if(!isset($_GET['saved_items'])){
      if(!isset($_GET['delete_account'])){
        if(!isset($_GET['my_order'])){
          if(!isset($_GET['change_password'])){
  echo "<h2 class='heading-tertiary'>Account Overview</h2>
        <hr>
        <div class='account-card-info'>
          <div class='account-details'>
          <div>
            <p class='heading-sub'>Account Details</p>
            <hr>
          </div>
          <div>
            <p class='user_name'>$fname <span class='surname'>$last_name</span></p>
            <p class='sub_text'>$email</p>
          </div>
        </div>
        <div class='account-details'>
          <div class='flex-justify'>
            <p class='heading-sub'>Address Book</p>
            <a href='profile.php?edit_address' class='cart-delete'><ion-icon name='create-outline' class='contact-icon color--primary cursor'></ion-icon></a>
          </div>
          <hr>
          <div>
            <p class='user_name'>Your default shipping address:</p>
            <p class='sub_text'>$address</p>
            <p class='sub_text'>$phone</p>
          </div>
        </div>
        
        </div>
        
        ";
}
}
}
  }
  }
}
?>