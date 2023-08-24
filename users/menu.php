<?php
if(isset($_GET['menu'])){
  $id=$_GET['menu'];
  $select_menu_query = "Select * from menu where user_id=$id";
$result_menu=mysqli_query($con,$select_menu_query);
while($row=mysqli_fetch_assoc($result_menu)){
  $menu_id=$row['id'];
  $menu_title=$row['name'];
  $menu_desc=$row['meal_desc'];
  $keyword=$row['keyword'];
  $category=$row['category'];
  $price=$row['price'];
  $food_img=$row['food_img'];
  $delivery = $row['delivery_time']; 
?>
  <div class="meals">
    <a href="details.php?menu_id=<?php echo $menu_id?>" class="menu-link">
    <div class="img-box">
      <img <?php echo "src='../admin/food_img/$food_img' alt='$menu_title'"?> class="meals-img" />
    </div>
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
            $select_restaurant="Select restaurant_name from admin_restaurant where id=$id";
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
    <div class="flex-end">
          <span class="meal-price end-text">₦ <?php echo $price?></span>
        </div>
  </div>
  <?php
  }
}
?>
