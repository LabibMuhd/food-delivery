<?php 
include('connect/connect.php');
include("functions/function.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
  <link rel="stylesheet" href="css/general.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
  <title>Food</title>

  <script defer src="js/index.js?v=<?php echo time(); ?>"></script>
</head>
<body>
  
<header class="header">
    <a href="#">
      <img src="img/omnifood-logo.png" alt="Omnifood logo" class="logo" />
    </a>
    
    <form action="" method="get" class="search">
      <input type="text" class="search__input" placeholder="Search item" name="search_data">
      <button class="btn btn--search" name="search" type="submit">
        search
      </button>
      <div class="cart-icon--box">
          <a href="cart.php" class="cart-link"><ion-icon class='cart-icon' name="cart-outline"></ion-icon>
          </a>
          <span class='cart-notification'>3</span>
          <!-- <?php // cart_item(); ?> -->
      </div>
    </form>

    <nav class="main-nav flex">
      <ul class="main-nav-list">
        <li><a class="main-nav-link" href="index.php">Home</a></li>
        <li><a class="main-nav-link" href="users/meals.php">Menu</a></li>
        <li><a class="main-nav-link category-box" href="#">Categories
        <div class="categories">
          <ul class="category-list">
          <li class="category-item"><button class="link-btn">Rice Based</button></li>
          <li class="category-item"><button class="link-btn">Beans Based</button></li>
          <li class="category-item"><button class="link-btn">Bread Based</button></li>
          <li class="category-item"><button class="link-btn">Swallow</button></li>
          <li class="category-item"><button class="link-btn">Snacks and small chops</button></li>
          <li class="category-item"><button class="link-btn">Drinks and beverages</button></li>
          </ul>
        </div>
        </a></li>
        <li><a class="main-nav-link nav-cta" href="users/signin.php">Sign in</a></li>    
      </ul>      
    </nav>

    

    <button class="btn-mobile-nav">
      <ion-icon class="icon-mobile-nav" name="menu-outline"></ion-icon>
      <ion-icon class="icon-mobile-nav" name="close-outline"></ion-icon>
    </button>
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
          <a href="#how" class="btn btn--learn"> Learn more &darr; </a>
        </div>

        <div class="hero-img-box">
          <picture>
            <img src="img/eating.jpg" alt="woman eating food, meals in a container, and food in a bowl"
              class="hero-img" />
          </picture>

        </div>
      </div>
    </section>

    <section class="restaurant-section" id='how'>
      <div class="container center-text">
        <span class="sub-heading">Restraunts</span>
        <h2 class="heading-secondary">
          Choose from a variety of restraunts
        </h2>
      </div>
      <!-- <div class="container">
        <div class="flex"> -->
          <div class="slider">
            <div class="slide">
              <div class="restaurant">
                <div class="restaurant-box">
                  <figure class="restauarant-info">
                    <img src="img/omnifood-logo.png" alt="Japanese Gyozas" class="restaurant-img" />
                  </figure>
                </div>
                <p class="meal-name">Omnifood</p>
              </div>
            </div>
            <div class="slide">
              <div class="restaurant">
                <div class="restaurant-box">
                  <figure class="restauarant-info">
                    <img src="img/omnifood-logo.png" alt="Japanese Gyozas" class="restaurant-img" />
                  </figure>
                </div>
                <p class="meal-name">Omnifood</p>
              </div>
            </div>
            <div class="slide">
              <div class="restaurant">
                <div class="restaurant-box">
                  <figure class="restauarant-info">
                    <img src="img/omnifood-logo.png" alt="Japanese Gyozas" class="restaurant-img" />
                  </figure>
                </div>
                <p class="meal-name">Omnifood</p>
              </div>
            </div>
            <div class="slide">
              <div class="restaurant">
                <div class="restaurant-box">
                  <figure class="restauarant-info">
                    <img src="img/omnifood-logo.png" alt="Japanese Gyozas" class="restaurant-img" />
                  </figure>
                </div>
                <p class="meal-name">Omnifood</p>
              </div>
            </div>
            <button class="slider__btn slider__btn--left">&larr;</button>
            <button class="slider__btn slider__btn--right">&rarr;</button>
            <div class="dots"></div>
          </div>
        <!-- </div>
      </div> -->
    </section>
        

    <section class="meals-section" id="meals">
      <div class="container center-text">
        <span class="sub-heading">Meals</span>
        <h2 class="heading-secondary">
          Over 20+ meals to choose from!
        </h2>
      </div>

      <div class="container grid grid--2-column margin-bottom-md">
      <div class="meals">
      <a href="users/details.php">
        <img src="img/meals/jollof rice.jpg" alt="Japanese Gyozas" class="meals-img" />
      </a>
          <div class="meal-content">
           

            <p class="meal-name">Jollof Rice</p>
            <ul class="meal-attributes">
              <li class="meal-attribute">
                <ion-icon class="meal-icon" name="list-outline"></ion-icon>
                <span>Rice based</span>
              </li>
              <li class="meal-attribute">
                <ion-icon class="meal-icon" name="time-outline"></ion-icon>
                <span><strong>15</strong> mins</span>
              </li>
              <li class="meal-attribute">
                <ion-icon class="meal-icon" name="restaurant-outline"></ion-icon>
                <span>Riddle House</span>
              </li>
            </ul>
          </div>
          <div class="flex-cl ">
            <p class="meal-price">₦ 1500</p>
            <button class="btn btn--search" name="order" type="submit">
              add to cart
            </button>
          </div>
        </div>

        <div class="meals">
          <img src="img/meals/swallow.jpg" alt="swallow" class="meals-img" />
          <div class="meal-content">
            
            <p class="meal-name">Pounded Yam and vegetable Soup</p>
            <ul class="meal-attributes">
              <li class="meal-attribute">
                <ion-icon class="meal-icon" name="list-outline"></ion-icon>
                <span>swallow</span>
              </li>
              <li class="meal-attribute">
                <ion-icon class="meal-icon" name="time-outline"></ion-icon>
                <span><strong>1</strong> hour</span>
              </li>
              <li class="meal-attribute">
                <ion-icon class="meal-icon" name="restaurant-outline"></ion-icon>
                <span>GrubHub</span>
              </li>
            </ul>
          </div>
          <div class="flex-cl ">
            <p class="meal-price">₦ 6500</p>
            <button class="btn btn--search" name="order" type="submit">
              add to cart
            </button>
          </div>
        </div>

        <div class="meals">
          <img src="img/meals/chin chin.jpg" alt="chin chin" class="meals-img" />
          <div class="meal-content">
            
            <p class="meal-name">Chin Chin</p>
            <ul class="meal-attributes">
              <li class="meal-attribute">
                <ion-icon class="meal-icon" name="list-outline"></ion-icon>
                <span>Snacks and small chops</span>
              </li>
              <li class="meal-attribute">
                <ion-icon class="meal-icon" name="time-outline"></ion-icon>
                <span><strong>1</strong> hour</span>
              </li>
              <li class="meal-attribute">
                <ion-icon class="meal-icon" name="restaurant-outline"></ion-icon>
                <span>GrubHub</span>
              </li>
            </ul>
          </div>
          <div class="flex-cl ">
            <p class="meal-price">₦ 2650</p>
            <button class="btn btn--search" name="order" type="submit">
              add to cart
            </button>
          </div>
        </div>

        <div class="meals">
          <img src="img/meals/pasta.jpg" alt="pasta" class="meals-img" />
          <div class="meal-content">
            
            <p class="meal-name">pasta</p>
            <ul class="meal-attributes">
              <li class="meal-attribute">
                <ion-icon class="meal-icon" name="list-outline"></ion-icon>
                <span>Side dishes</span>
              </li>
              <li class="meal-attribute">
                <ion-icon class="meal-icon" name="time-outline"></ion-icon>
                <span><strong>1</strong> hour</span>
              </li>
              <li class="meal-attribute">
                <ion-icon class="meal-icon" name="restaurant-outline"></ion-icon>
                <span>GrubHub</span>
              </li>
            </ul>
          </div>
          <div class="flex-cl ">
            <p class="meal-price">₦ 4650</p>
            <button class="btn btn--search" name="order" type="submit">
              add to cart
            </button>
          </div>
        </div>
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
          <span class="year">2027</span> by Omnifood, inc. All rights reserved
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