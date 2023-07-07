<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
  <link rel="stylesheet" href="../css/general.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>">
  <title>Document</title>

  <script defer src="../js/meal.js?v=<?php echo time(); ?>"></script>
</head>
<body>
  <?php include("../includes/header.php")?>

  <main>
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
                    <img src="../img/omnifood-logo.png" alt="Japanese Gyozas" class="restaurant-img" />
                  </figure>
                </div>
                <p class="meal-name">Omnifood</p>
              </div>
            </div>
            <div class="slide">
              <div class="restaurant">
                <div class="restaurant-box">
                  <figure class="restauarant-info">
                    <img src="../img/omnifood-logo.png" alt="Japanese Gyozas" class="restaurant-img" />
                  </figure>
                </div>
                <p class="meal-name">Omnifood</p>
              </div>
            </div>
            <div class="slide">
              <div class="restaurant">
                <div class="restaurant-box">
                  <figure class="restauarant-info">
                    <img src="../img/omnifood-logo.png" alt="Japanese Gyozas" class="restaurant-img" />
                  </figure>
                </div>
                <p class="meal-name">Omnifood</p>
              </div>
            </div>
            <div class="slide">
              <div class="restaurant">
                <div class="restaurant-box">
                  <figure class="restauarant-info">
                      <img src="../img/omnifood-logo.png" alt="Japanese Gyozas" class="restaurant-img" />
                    </figure>
                  </div>
                  <p class="meal-name">Omnifood</p>
              </div>
            </div>
            <button class="slider__btn slider__btn--left">&larr;</button>
            <button class="slider__btn slider__btn--right">&rarr;</button>
            <div class="dots"></div>
          </div>
    </section>
  <section class="meals-section" id="meals">
      <div class="container center-text">
        <span class="sub-heading margin-bottom--sm">Meals</span>
        <!-- <h2 class="heading-secondary">
          Over 20+ meals to choose from!
        </h2> -->
      </div>

      <div class="container grid grid--2-column margin-bottom-md">
      <div class="meals">
      <a href="../users/details.php">
        <img src="../img/meals/jollof rice.jpg" alt="Japanese Gyozas" class="meals-img" />
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
          <img src="../img/meals/swallow.jpg" alt="swallow" class="meals-img" />
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
          <img src="../img/meals/chin chin.jpg" alt="chin chin" class="meals-img" />
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
          <img src="../img/meals/pasta.jpg" alt="pasta" class="meals-img" />
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
        <div class="meals">
          <img src="../img/meals/jollof and chicken.jpg" alt="pasta" class="meals-img" />
          <div class="meal-content">
            
            <p class="meal-name">Jollof Rice</p>
            <ul class="meal-attributes">
              <li class="meal-attribute">
                <ion-icon class="meal-icon" name="list-outline"></ion-icon>
                <span>Rice based</span>
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
    </section>
  </main>
  
  <?php include("../includes/footer.php")?>

  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
