<?php
include('../connect/connect.php');
$msg='';

if(isset($_POST['insert_product'])){
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
    $insert_menu = "insert into `menu` (name,meal_desc,keyword,category,price,food_img,user_id,delivery_time) 
    values ('$meal_title','$description','$keyword','$category','$price','$meal_img','$user_id','$delivery')";
    $result = mysqli_query($con,$insert_menu);
    if($result){
      $msg="<div class='alert alert-success'>Successfully inserted</div>";
    }
  }
}

?>
<h2 class="heading-secondary margin-bottom--sm center-text">Insert Menu</h2>
<?php echo $msg;?>
  <form class="cta-form signin-form" name="sign-in" method='post' enctype="multipart/form-data">            
    <div>
      <label for="meal-title">Meal Title</label>
      <input id="meal-title" name="title" type="text" placeholder="Insert meal name here.." required />
    </div>
    <div>
      <label for="description">Meal Description</label>
      <input id="description" name="description" type="text" required />
    </div>
    <div>
      <label for="keywords">Search Keywords</label>
      <input id="keywords" name="keywords" type="text" placeholder="Insert words that will help people find this meal" required />
    </div>
    <div>
      <label for="delivery">Delivery Time</label>
      <input id="delivery" name="time" type="text" placeholder="0-15 mins" required />
    </div>
    <div>
      <label for="category">Category</label>
      <select name="category" id="category" class="input-form">
        <option value="">Select a Category</option>
              <?php
                $select_categories="Select * from `category`";
                $result_categories=mysqli_query($con,$select_categories);
                while($row_data=mysqli_fetch_assoc($result_categories)){
                  $categories_title=$row_data['name'];
                  $categories_id=$row_data['id'];
                  echo "<option value='$categories_title'>$categories_title</option>";
                }
              ?>
        <!-- <option value="rice-based"></option>
        <option value="beans-based"></option>
        <option value="bread-based">bread-based</option>
        <option value="swallow"></option>
        <option value="snacks and small chops"></option>
        <option value="drinks and beverages"></option>
        <option value="others">others</option> -->
      </select>
    </div>
    <div>
      <label for="price">Price</label>
      <input id="price" name="price" type="text" required />
    </div>
    <div>
      <label for="image">Meal picture</label>
      <input type="file" name="image"  id="image" required>
    </div>
    <div>
      <input type="submit" class="btn btn--search color-white" name="insert_product" value="Add Menu">
    </div>
  </form>