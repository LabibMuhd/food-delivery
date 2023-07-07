<header class="header">
    <a href="#">
      <img src="../img/omnifood-logo.png" alt="Omnifood logo" class="logo" />
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

    <nav class="main-nav">
      <ul class="main-nav-list">
        <li><a class="main-nav-link" href="../index.php">Home</a></li>
        <li><a class="main-nav-link" href="../users/meals.php">Menu</a></li>
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
          <li><a class="main-nav-link nav-cta" href="../users/signin.php">Sign in</a></li>    
      </ul>
    </nav>

    <button class="btn-mobile-nav">
      <ion-icon class="icon-mobile-nav" name="menu-outline"></ion-icon>
      <ion-icon class="icon-mobile-nav" name="close-outline"></ion-icon>
    </button>
  </header>