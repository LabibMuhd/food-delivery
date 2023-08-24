<?php
if(isset($_GET['category'])){
  $cat=$_GET['category'];
  $select_menu_query = "Select * from menu where category='$cat'";
  $result_menu=mysqli_query($con,$select_menu_query);
  $num_of_rows=mysqli_num_rows($result_menu);
  if($num_of_rows==0){
    echo "<h2 class='heading-secondary stock--message center-text'>Item not available</h2>";
  }
  while($row=mysqli_fetch_assoc($result_menu)){
    $menu_id=$row['id'];
    $menu_title=$row['name'];
    $menu_desc=$row['meal_desc'];
    $keyword=$row['keyword'];
    $category=$row['category'];
    $price=$row['price'];
    $food_img=$row['food_img'];
    $user_id = $row['user_id'];
    $delivery = $row['delivery_time']; 
?>
<div class="meals">
  <a href="details.php?menu_id=<?php echo $menu_id?>" class="menu-link">
    <img <?php echo "src='../admin/food_img/$food_img' alt='$menu_title'"?> class="meals-img" />      
    <div class="meal-content">
      <p class="meal-name"><?php echo $menu_title?></p>
      <ul class="meal-attributes">
        <li class="meal-attribute">
          <ion-icon class="meal-icon" name="list-outline"></ion-icon>
          <span><?php echo $category?></span>
        </li>
        <li class="meal-attribute">
          <ion-icon class="meal-icon" name="time-outline"></ion-icon>
          <span><?php echo $delivery?></span>
        </li>
        <li class="meal-attribute">
          <ion-icon class="meal-icon" name="restaurant-outline"></ion-icon>
          <span>
          <?php 
          $select_restaurant="Select restaurant_name from admin_restaurant where id=$user_id";
          $result_restaurant=mysqli_query($con,$select_restaurant);
          $row=mysqli_fetch_assoc($result_restaurant);
          $res_name=$row['restaurant_name'];
          echo $res_name
          ?>
          </span>
        </li>
      </ul>
    </div>
  </a>
  <div class="flex-cl ">
    <p class="meal-price">₦ <?php echo $price?></p>
    <button class="btn btn--search" name="order" type="submit">
      add to cart
    </button>
  </div>
</div>
<?php
}
}?>