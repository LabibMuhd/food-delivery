<?php
include('../connect/connect.php') ;
if (isset($_POST['insert_cat'])){
  $category_title=$_POST['cat_title'];

  // select data from database
  $select_query="Select * from `category` where name='$category_title'";
  $result_select=mysqli_query($con,$select_query);
  $number=mysqli_num_rows($result_select);
  if($number>0){
    echo "<script>alert('This category is present inside the database')</script>";
  }
  else{
    $insert_query="insert into `category` (name) values ('$category_title')";
    $result=mysqli_query($con,$insert_query);
    if($result){
      echo "<script>alert('Category has been inserted succesfully')</script>";
    }
  }
}
?>

<h2 class="categories-header">Insert Category</h2>
<form method="post" class="cta-form signin-form">
  <div class="category-detail">
    <span class="category-icon" id="cat_icon"><ion-icon name="duplicate-outline" class="cat-icon"></ion-icon></span>
    <input type="text" name="cat_title" placeholder="categories" class="category">
  </div>
  <div class="submit-btn">
    <input type="submit" class="btn btn--search color-white" name="insert_cat" value="Insert Category">
    <!-- <button type="submit" class="btn btn--cat btn-submit" name="insert_cat">Insert Categories</button> -->
  </div>
</form>