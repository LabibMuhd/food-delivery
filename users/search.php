<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Food</title>

  <link rel="stylesheet" href="css/general.css">
  <link rel="stylesheet" href="css/style.css">
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
    </form>

    <nav class="main-nav ">
      <ul class="main-nav-list">
        <li><a class="main-nav-link" href="index.php">Home</a></li>
        <li><a class="main-nav-link" href="#meals">Menu</a></li>
        <li><a class="main-nav-link nav-cta" href="users/signup.php">Sign in</a></li>    
      </ul>
    </nav>

    <button class="btn-mobile-nav">
      <ion-icon class="icon-mobile-nav" name="menu-outline"></ion-icon>
      <ion-icon class="icon-mobile-nav" name="close-outline"></ion-icon>
    </button>
  </header>

  <main>
  <section class="meals-section" id="meals">
      <div class="container center-text">
        <span class="sub-heading">Meals</span>
        <h2 class="heading-secondary">
          Omnifood AI chooses from 5,000+ recipes
        </h2>
      </div>

      <div class="container grid grid--3-column margin-bottom-md">
      <div class="meals">
      <a href="users/details.php">
        <img src="img/meals/meal-1.jpg" alt="Japanese Gyozas" class="meals-img" />
      </a>
          <div class="meal-content">
            <div class="meal-tag">
              <span class="tag tag--vegetarian">Vegetarian</span>
            </div>

            <p class="meal-name">Japanese Gyozas</p>
            <ul class="meal-attributes">
              <li class="meal-attribute">
                <ion-icon class="meal-icon" name="flame-outline"></ion-icon>
                <span>$ <strong>650</strong></span>
              </li>
              <li class="meal-attribute">
                <ion-icon class="meal-icon" name="restaurant-outline"></ion-icon>
                <span><strong>15</strong> mins</span>
              </li>
              <li class="meal-attribute">
                <ion-icon class="meal-icon" name="restaurant-outline"></ion-icon>
                <span>Riddle House</span>
              </li>
            </ul>
          </div>
        </div>

        <div class="meals">
          <img src="img/meals/meal-2.jpg" alt="Avocado Salad" class="meals-img" />
          <div class="meal-content">
            <div class="meal-tag">
              <span class="tag tag--vegan">Vegan</span>
              <span class="tag tag--paleo">Paleo</span>
            </div>
            <p class="meal-name">Avocado Salad</p>
            <ul class="meal-attributes">
              <li class="meal-attribute">
                <ion-icon class="meal-icon" name="flame-outline"></ion-icon>
                <span>$ <strong>400</strong></span>
              </li>
              <li class="meal-attribute">
                <ion-icon class="meal-icon" name="restaurant-outline"></ion-icon>
                <span><strong>1</strong> hour</span>
              </li>
              <li class="meal-attribute">
                <ion-icon class="meal-icon" name="star-outline"></ion-icon>
                <span>GrubHub</span>
              </li>
            </ul>
          </div>
        </div>

        <div class="meals">
          <img src="img/meals/meal-2.jpg" alt="Avocado Salad" class="meals-img" />
          <div class="meal-content">
            <div class="meal-tag">
              <span class="tag tag--vegan">Vegan</span>
              <span class="tag tag--paleo">Paleo</span>
            </div>
            <p class="meal-name">Avocado Salad</p>
            <ul class="meal-attributes">
              <li class="meal-attribute">
                <ion-icon class="meal-icon" name="flame-outline"></ion-icon>
                <span>$ <strong>400</strong></span>
              </li>
              <li class="meal-attribute">
                <ion-icon class="meal-icon" name="restaurant-outline"></ion-icon>
                <span><strong>1</strong> hour</span>
              </li>
              <li class="meal-attribute">
                <ion-icon class="meal-icon" name="star-outline"></ion-icon>
                <span>GrubHub</span>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <div class="container all-recipes">
        <a href="#" class="link">See all recipes &rarr;</a>
      </div>
    </section>
  </main>
  <?php include("../includes/footer.php")?>

  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>