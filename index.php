<?php 
include('connect/connect.php');
include("functions/function.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
  <link rel="stylesheet" href="css/general.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="css/queries.css?v=<?php echo time(); ?>">
  <title>Food</title>

  <script defer src="js/script.js?v=<?php echo time(); ?>"></script>
</head>
<body>
  
<header class="header">
    <a href="#">
      <img src="img/omnifood-logo.png" alt="Omnifood logo" class="logo" />
    </a>
   
    <form action="users/search.php" method="post" class="search">
      <input type="text" class="search__input" placeholder="Search item" name="search_data">
      <input class="btn btn--search" name="search" type="submit" value="search">
    </form>
      

    <nav class="main-nav">
      <ul class="main-nav-list">
        <li><a class="main-nav-link" href="index.php">Home</a></li>
        <li><a class="main-nav-link" href="users/meals.php">Menu</a></li>
        <li><div class="cart-icon--box hidden">
          <a href="users/cart.php" class="cart-link"><ion-icon class='cart-icon' name="cart-outline"></ion-icon>
          </a>
          <!-- <span class='cart-notification'>3</span> -->
          <?php cart_item(); ?>
      </div></li>
        <?php 
        if(!isset($_SESSION['name'])){
          echo "<li><a class='main-nav-link nav-cta' href='users/signin.php'>Sign in</a></li>";
        }
        else{
          echo "<li>
                  <a href='users/profile.php' class='main-nav-link'>
                    <div class='flex'>
                      <ion-icon name='person-outline' class='contact-icon'></ion-icon>
                      <span>Hi,</span> 
                      <span class='capitalize'>".$_SESSION['name']."</span>
                    </div>
                  </a>
                </li>
          ";
        }
        ?>         
      </ul>      
    </nav>
    
    
    <div class="mobile-btn-cart">
      <div class="cart-icon--box">
        <a href="users/cart.php" class="cart-link"><ion-icon class='cart-icon' name="cart-outline"></ion-icon>
        </a>
        <?php cart_item(); ?>
      </div>
      <button class="btn-mobile-nav">
        <ion-icon class="icon-mobile-nav" name="menu-outline"></ion-icon>
        <ion-icon class="icon-mobile-nav" name="close-outline"></ion-icon>      
      </button>
    </div>
  </header>
  

  <main>
    <!-- HERO SECTION -->
    <section class="hero-section">
      <div class="hero">
        <div class="hero-text-box">
          <h1 class="heading-primary">
            Meals delivered to your door, 24 hours a day, 7 days a week
          </h1>
          <p class="hero-description">
            The smart solution to bring tasty meals to your doorstep. Never worry about going the extra mile for food again.
          </p>

          <a href="users/signup.php" class="btn btn--start margin-right-sm">
            Start eating well
          </a>
        </div>

        <div class="hero-img-box">
          <picture>
            <img src="img/eating.jpg" alt="woman eating food, meals in a container, and food in a bowl"
              class="hero-img" />
          </picture>

        </div>
      </div>
    </section>
    <!-- RESTAURANT SECTION -->
    <section class="restaurant-section" id='how'>
      <div class="container center-text">
        <span class="sub-heading">Restraunts</span>
        <h2 class="heading-secondary">
          Choose from a variety of restraunts
        </h2>
      </div>
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
                <a href="users/meals.php?menu=<?php echo $id ?>#meals">
                    <button class="restaurant-info">
                    <img <?php echo "src='admin/food_img/$logo' alt='$name'"?> class="restaurant-img" />
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
    <!-- MEALS-SECTION -->
    <section class="meals-section" id="meals">
      <div class="container center-text">
        <span class="sub-heading">Meals</span>
        <h2 class="heading-secondary">
          Over 20+ meals to choose from!
        </h2>
      </div>

      <div class="container grid grid--2-column margin-bottom-md">
      <?php
      $select_menu_query = "Select * from menu limit 0,6";
      $result_menu=mysqli_query($con,$select_menu_query);
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
      <a href="users/details.php?menu_id=<?php echo $menu_id?>" class="menu-link">
      <div class="img-box">
        <img <?php echo "src='admin/food_img/$food_img' alt='$menu_title'"?> class="meals-img" />        
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
      <div class="flex-end">
        <span class="meal-price end-text">₦ <?php echo $price?></span>
      </div>
    </div>
<?php } ?>
</div>
<div class="container all-recipes">
  <a href="users/meals.php" class="link">See all meals &rarr;</a>
</div>
</section>
</main>


  <!-- FOOTER -->
  <footer class="footer">
    <div class="container grid grid--footer">
      <div class="logo-col">
        <a href="#" class="footer-logo">
          <img src="img/omnifood-logo.png" alt="Omnifood logo" class="logo" />
        </a>
        <ul class="social-links">
          <li><a class="footer-link" href="#">
              <ion-icon class="logo-icon" name="logo-instagram"></ion-icon>
            </a>
          </li>
          <li><a class="footer-link" href="#">
              <ion-icon class="logo-icon" name="logo-facebook"></ion-icon>
            </a>
          </li>
          <li><a class="footer-link" href="#">
              <ion-icon class="logo-icon" name="logo-twitter"></ion-icon>
            </a>
          </li>
        </ul>
        <p class="copyright">Copyright &copy;
          <span class="year">2023</span> by Omnifood, inc. All rights reserved
        </p>
      </div>
      <div class="footer-address">
        <p class="footer-heading">Contact-us</p>
        <address class="contact">
          <p class="address">
            No 36 Saint laurent Avenue, Abuja.
          </p>
          <p>
            <a class="footer-link" href="tel:415-201-6370">415-201-6370</a><br />
            <a class="footer-link" href="mailto:hello@omnifood.com"> hello@omnifood.com</a>
          </p>
        </address>
      </div>
      <nav class="nav-col">
        <p class="footer-heading">Account</p>
        <ul class="footer-nav">
          <li><a class="footer-link" href="users/signup.php">Create account</a></li>
          <li><a class="footer-link" href="users/signin.php">Sign in</a></li>
        </ul>
      </nav>
    </div>
  </footer>

  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>