<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" href="../css/general.css">
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<header class="header">
    <a href="../index.php">
      <img src="../img/omnifood-logo.png" alt="Omnifood logo" class="logo" />
    </a>

    <nav class="main-nav ">
      <ul class="main-nav-list">
        <li><a class="main-nav-link" href="../index.php">Home</a></li>
        <li><a class="main-nav-link" href="#meals">Menu</a></li>
        <li><a class="main-nav-link nav-cta" href="signin.php">Sign in</a></li>    
      </ul>
    </nav>

    <button class="btn-mobile-nav">
      <ion-icon class="icon-mobile-nav" name="menu-outline"></ion-icon>
      <ion-icon class="icon-mobile-nav" name="close-outline"></ion-icon>
    </button>
  </header>

<section class="cta-section" id="cta">
      <div class="container">
        <div class="cta--grid">
          <div class="cta-sign-up">
            <h2 class="heading-secondary">Meals at ur fingertips!</h2>
            <p class="cta-text">
              Healthy, tasty and hassle-free meals are waiting for you. Start eating well today.
            </p>

            <form class="cta-form" name="sign-up" netlify>
              <div>
                <label for="first-name">Full Name</label>
                <input id="first-name" name="full-name" type="text" placeholder="Labib Muhammad" required />
              </div>
              <div>
                <label for="email">Email address</label>
                <input id="email" name="email" type="email" placeholder="me@example.com" required />
              </div>
              <div>
                <label for="address">Address</label>
                <input id="address" name="address" type="text" placeholder="NO 123 street maitama, Abuja" required />
              </div>
              <div>
                <label for="password">Password</label>
                <input id="password" name="password" type="password" required />
              </div>
              

              <button class="btn btn--form">Sign up now</button>
            </form>
          </div>
          <div class="cta-img" role="img" aria-label="Woman enjoying food">

          </div>
        </div>
      </div>
    </section>

    <?php include("../includes/footer.php")?>

</body>
</html>