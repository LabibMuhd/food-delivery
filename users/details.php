<?php 
include('../connect/connect.php');
include("../functions/function.php");
session_start();

$msg = '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>food</title>

  <link rel="stylesheet" href="../css/general.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="../css/queries.css?v=<?php echo time(); ?>">
  
  <script defer src="../js/cart.js?v=<?php echo time(); ?>"></script>

</head>
<body>

  <?php include("../includes/header.php")?>

  <main>
    <section class="meals-section" id="meals">
    <div class="container">
    <?php
      $ip=getIPAddress();
      if(isset($_GET['menu_id'])){
        $id=$_GET['menu_id'];
        
        // select query
        $select_query="Select * from menu where id=$id";
        $result=mysqli_query($con,$select_query);
        while($row=mysqli_fetch_assoc($result)){
          $name = $row['name'];
          $desc = $row['meal_desc'];
          $category = $row['category'];
          $price = $row['price'];
          $img = $row['food_img'];
          $user_id=$row['user_id'];
          $delivery = $row['delivery_time'];
      ?>
        <div class='meals-grid'>
          <div class='meal_img'>            
            <img <?php echo "src='../admin/food_img/$img' alt='$name'"?> class='meals-img--desc' />
          </div>
          <div>
            <p class='meal-name'><?php echo $name ?></p>
            <p class='meal-price margin-bottom--sm'>₦ <?php echo $price?></p>
            
            <p class='heading-tertiary'>
              Description
            </p>
            <p class='meal-description'><?php echo $desc ?></p>
            <p class='meal-description flex'>
              <ion-icon class="meal-icon" name="time-outline"></ion-icon>
              <span><?php echo $delivery?></span>
            </p>
            <form class='cta-form margin-bottom--sm' name='address' method="post">
              <div>
                <label for='address'>Address</label>
                <input id='address' name='address' type='text' placeholder='NO 123 street maitama, Abuja' required />
              </div>
              <div>
                <label for='quantity'>Quantity</label>
                <input id='quantity' name='qty' type='number' value="1" required />
              </div>
                <input  type='submit' class='btn btn--search color-white' name='order' value='add to cart'/>
            </form>
        </div>
      </div> 
      <?php
    }
  }

  if(isset($_POST['order'])){
        $address=$_POST['address'];
        $quantity=$_POST['qty'];

        $select_cart_query="Select * from `cart` where user_ip='$ip' and menu_id=$id";
        $result_cart_query=mysqli_query($con,$select_cart_query);
        $num_of_rows=mysqli_num_rows($result_cart_query);
        if($num_of_rows>0){
          echo "<script>alert('This item is already present inside the cart')</script>";
          echo "<script>window.open('details.php?menu_id=$id', '_self')</script>";
        }
        else if(!$_POST['address']){
          echo "<script>alert('Please fill address')</script>";
          echo "<script>window.open('details.php?menu_id=$id', '_self')</script>";
        }
        else if($quantity<1){
            echo "<script>alert('Item quantity can only start from 1 and above')</script>";
            $quantity=1;
            echo "<script>window.open('details.php?menu_id=$id', '_self')</script>";
        }
        else{     
        // insert query
        $insert_query="insert into cart (menu_id,user_ip,quantity,address) values ($id,'$ip',$quantity,'$address')";
        $result_query=mysqli_query($con,$insert_query); 
        echo "<script>alert('Item has been added to cart')</script>";
        echo "<script>window.open('details.php?menu_id=$id', '_self')</script>";
        }     
      }
    ?>
    </div>
  </section>

  <!-- more from restaurant section -->
  <section class="meals-section" id="meals">
    <div class="container">
      <p class="sub-heading margin-bottom--sm">More from <?php 
      $select_restaurant="Select restaurant_name from admin_restaurant where id=$user_id";
      $result_restaurant=mysqli_query($con,$select_restaurant);
      $row=mysqli_fetch_assoc($result_restaurant);
      $res_name=$row['restaurant_name'];
      echo $res_name
      ?>
      </p>
      <div class="grid grid--2-column">
        <?php
        $select_more_query="Select * from menu where user_id=$user_id limit 0,4";
        $result_more=mysqli_query($con,$select_more_query);
        while($row_data=mysqli_fetch_assoc($result_more)){
          $menu_id=$row_data['id'];
          $menu_name = $row_data['name'];
          $menu_category = $row_data['category'];
          $menu_price = $row_data['price'];
          $menu_img = $row_data['food_img'];
          $menu_delivery = $row_data['delivery_time'];
        ?>
        <div class="meals">
          <a href="details.php?menu_id=<?php echo $menu_id?>" class="menu-link">
            <img <?php echo "src='../admin/food_img/$menu_img' alt='$menu_name'"?> class="meals-img" />
            <div class="meal-content">              
              <p class="meal-name"><?php echo $menu_name ?></p>
              <ul class="meal-attributes">
                <li class="meal-attribute">
                  <ion-icon class="meal-icon" name="list-outline"></ion-icon>
                  <span><?php echo $menu_category ?></span>
                </li>
                <li class="meal-attribute">
                  <ion-icon class="meal-icon" name="time-outline"></ion-icon>
                  <span><?php echo $menu_delivery ?></span>
                </li>
                <li class="meal-attribute">
                  <ion-icon class="meal-icon" name="restaurant-outline"></ion-icon>
                  <span>
                    <?php                  
                    echo $res_name
                    ?>
                  </span>
                </li>
              </ul>
            </div>
          </a>
          <div class="flex-end">
            <span class="meal-price end-text">₦ <?php echo $menu_price?></span>
          </div>
        </div>
        <?php
          }
        ?>
        </div> 
    </div>
    </section>
 
  </main>
  <?php include("../includes/footer.php")?>

  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>