<?php
if (isset($_GET['edit_menu'])){
  $id = $_GET['edit_menu'];
  $select_menu="Select * from menu where id=$id";
  $result_menu = mysqli_query($con,$select_menu);
  $row_data= mysqli_fetch_assoc($result_menu);
  $menu_title=$row_data['name'];
  $menu_desc=$row_data['meal_desc'];
  $keyword=$row_data['keyword'];
  $category=$row_data['category'];
  $price=$row_data['price'];
  $food_img=$row_data['food_img'];
  $delivery = $row_data['delivery_time'];
}
  ?>
<h2 class="heading-secondary margin-bottom--sm center-text">Edit Menu</h2>
  <form class="cta-form signin-form" method="post" enctype="multipart/form-data">            
  <div>
      <label for="meal-title">Meal Title</label>
      <input id="meal-title" name="title" type="text" placeholder="me@example.com" value="<?php echo $menu_title?>" required />
    </div>
    <div>
      <label for="description">Meal Description</label>
      <input id="description" name="description" type="text" value="<?php echo $menu_desc?>" required />
    </div>
    <div>
      <label for="keywords">Search Keywords</label>
      <input id="keywords" name="keywords" type="text" value="<?php echo $keyword?>" required />
    </div>
    <div>
      <label for="category">Category</label>
      <select name="category" id="category" class="input-form">
        <option <?php echo "value='$category'"?>><?php echo $category?></option>
              <?php
                $select_categories="Select * from `category`";
                $result_categories=mysqli_query($con,$select_categories);
                while($row_data=mysqli_fetch_assoc($result_categories)){
                  $categories_title=$row_data['name'];
                  $categories_id=$row_data['id'];
                  echo "<option value='$categories_title'>$categories_title</option>";
                }
              ?>
      </select>
    </div>
    <div>
      <label for="delivery">Delivery Time</label>
      <input id="delivery" name="time" type="text" placeholder="0-15 mins" value="<?php echo $delivery?>" required />
    </div>
    <div>
      <label for="price">Price</label>
      <input id="price" name="price" type="text" value="<?php echo $price?>" required />
    </div>
    <div>
      <label for="meal_image">Meal picture</label>
      <div class="flex margin-bottom-sm">
        <input type="file" name="image"  id="meal_image" required>
        <img <?php echo "src='food_img/$food_img' alt='$menu_title'"?> class="meal-img--sm">
      </div>
    </div>
    <input type="submit" class="btn btn--search color-white" name="update_menu" value="Update Menu">
  </form>

  <?php
  if(isset($_POST['update_menu'])){
    $meal_title=$_POST['title'];
    $description=$_POST['description'];
    $keyword=$_POST['keywords'];
    $delivery=$_POST['time'];
    $category=$_POST['category'];
    $price=$_POST['price'];
    $user_id= $_SESSION['id'];
  
    $meal_img=$_FILES['image']['name'];
    $temp_meal_img=$_FILES['image']['tmp_name'];
  
    if($meal_title=="" or $description=="" or $keyword=="" or $delivery=="" or $category=="" or $price==""){
      $msg = "<div class='alert alert-error'>Please fill in all fields</div>";
    }
    else{
      move_uploaded_file($temp_meal_img,"./food_img/$meal_img");
  
      // insert query
      $update_menu = "update `menu` set name='$meal_title',meal_desc='$description',keyword='$keyword',
      category='$category',price='$price',food_img='$meal_img',
      user_id='$user_id',delivery_time='$delivery' where id=$id";
      $result = mysqli_query($con,$update_menu);
      if($result){
        $msg="<div class='alert alert-success'>Successfully inserted</div>";
      }
    }
  }
?>