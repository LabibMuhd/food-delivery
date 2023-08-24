<div>
  <div class="heading-box">
    <p class='heading'>S/N</p>
    <p class='heading'>Title</p>
    <p class='heading'>Image</p>
    <p class='heading'>Price</p>
    <p class='heading'>Total Sold</p>
    <p class='heading'>Edit</p>
    <p class='heading'>Delete</p>
  </div>
  <?php
  $user_id = $_SESSION['aid'];
  $number=0;
  
  $select_menu="Select * from menu where user_id ='$user_id'";
  $result_menu = mysqli_query($con,$select_menu);
  while($row_data= mysqli_fetch_assoc($result_menu)){
    $menu_id=$row_data['id'];
    $menu_title=$row_data['name'];
    $menu_desc=$row_data['meal_desc'];
    $keyword=$row_data['keyword'];
    $category=$row_data['category'];
    $price=$row_data['price'];
    $food_img=$row_data['food_img'];
    $delivery = $row_data['delivery_time'];
    $number++;
  ?>
<div class="heading-box">
    <p class="heading"><?php echo $number?></p>
    <p class='heading'><?php echo $menu_title ?></p>
    <img <?php echo "src='food_img/$food_img' alt='$menu_title'"?> class="meal-img--sm">
    <p class='heading'><?php echo $price ?></p>
    <p class='heading'>
      <?php
      $product_quantity=0;
      $sel_query="select * from orders where menu_id=$menu_id";
      $res=mysqli_query($con,$sel_query);
      while($row = mysqli_fetch_array($res)){
        $quantity= array($row['quantity']);
        $product_table_quantity=$row['quantity'];
        $product_quantity_values=array_sum($quantity);
        $product_quantity += $product_quantity_values;
      }
      echo $product_quantity;
      ?>
    </p>
    <a href='index.php?edit_menu=<?php echo $menu_id?>' class='heading'><ion-icon name='create-outline' class='contact-icon color--primary cursor'></ion-icon></a>
    <a href='?delete_id=<?php echo $menu_id?>#popup' class='heading'><ion-icon name='trash-outline' class='contact-icon color--primary cursor'></ion-icon></a>
  </div> 
  <?php
  }
?>
</div>