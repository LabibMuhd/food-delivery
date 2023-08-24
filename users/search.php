<?php 
include('../connect/connect.php');
include("../functions/function.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
  <link rel="stylesheet" href="../css/general.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="../css/queries.css?v=<?php echo time(); ?>">
  <title>Document</title>

  <script defer src="../js/meal.js?v=<?php echo time(); ?>"></script>
</head>
<body>
  <?php include("../includes/header.php")?>

  <main>
    <!-- restraunt section -->
    <section class="restaurant-section" id='how'>
      <div class="container center-text">
        <span class="sub-heading">Restraunts</span>
        <h2 class="heading-secondary">
          Choose from a variety of restraunts
        </h2>
      </div>

    <!-- slider for restaurant list -->
      <div class="slider">
          <?php 
            $get_ip = getIPAddress();
            $select_query = "Select * from admin_restaurant";
            $result=mysqli_query($con,$select_query);
            while($row=mysqli_fetch_assoc($result)){
              $id=$row['id'];
              $logo= $row['logo'];
              $name=$row['restaurant_name'];
          ?>
            <div class="slide">
              <div class="restaurant">
                <div class="restaurant-box">
                  <a href="meals.php?menu=<?php echo $id ?>#meals">
                    <button class="restaurant-info">
                      <img <?php echo "src='../admin/food_img/$logo' alt='$name'"?> class="restaurant-img" />
                    </button>
                  </a>
                </div>
                <p class="meal-name"><?php echo $name?></p>
              </div>
            </div>
            <?php
            } 
            ?>
            <button class="slider__btn slider__btn--left">&larr;</button>
            <button class="slider__btn slider__btn--right">&rarr;</button>
            <div class="dots"></div>
          </div>
    </section>

    <section class="meals-section" id="meals">    
      <div class="container-bg menu-grid">
        <div class="category">
          <div class="category-box">
            <p class="sub-heading color-white center-text margin-bottom--sm">Categories</p>
            <ul class="category-list">
              <?php
              $select_restaurant_query="Select * from category";
              $result_query=mysqli_query($con,$select_restaurant_query);
              while($row=mysqli_fetch_assoc($result_query)){
                $id=$row['id'];
                $name=$row['name'];
                echo "<li><a href='?category=$name#meals' class='link-text'>$name</a></li>";
              }
              ?>
            </ul>
          </div>    
        </div>
        <div class="menu-div">
          <div class="container center-text">
            <span class="sub-heading margin-bottom--sm">Menu</span>
          </div>
          <div class="container grid grid--2-column margin-bottom-md">
            <?php
              if(isset($_GET['category'])){
                include('category.php');
              }
              else{
                search_product();
            }
            ?>
          </div>        
        </div>        
      </div>
    </section>
  </main>
        

  <?php include("../includes/footer.php")?>

  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
