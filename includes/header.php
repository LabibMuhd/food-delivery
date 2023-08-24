<header class="header">
    <a href="../index.php">
      <img src="../img/omnifood-logo.png" alt="Omnifood logo" class="logo" />
    </a>
    
    <form action="search.php?#meals" method="post" class="search">
      <input type="text" class="search__input" placeholder="Search item" name="search_data">
      <button class="btn btn--search" name="search" type="submit">
        search
      </button>
    </form>

    <nav class="main-nav">
      <ul class="main-nav-list">
        <li><a class="main-nav-link" href="../index.php">Home</a></li>
        <li><a class="main-nav-link" href="meals.php">Menu</a></li>
        <li><div class="cart-icon--box">
          <a href="cart.php" class="cart-link"><ion-icon class='cart-icon' name="cart-outline"></ion-icon>
          </a>
          <!-- <span class='cart-notification'>3</span> -->
          <?php cart_item(); ?>
      </div></li>
        <?php 
        if(!isset($_SESSION['name'])){
          echo "<li><a class='main-nav-link nav-cta' href='../users/signin.php'>Sign in</a></li>";
        }
        else{
          echo "<li>
                  <a href='profile.php' class='main-nav-link'>
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
        <a href="cart.php" class="cart-link"><ion-icon class='cart-icon' name="cart-outline"></ion-icon>
        </a>
        <?php cart_item(); ?>
      </div>
    <button class="btn-mobile-nav">
      <ion-icon class="icon-mobile-nav" name="menu-outline"></ion-icon>
      <ion-icon class="icon-mobile-nav" name="close-outline"></ion-icon>
    </button>
    </div>
  </header>