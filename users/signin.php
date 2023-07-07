<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" href="../css/general.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>">
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
          <div class="cta-sign-in">
            <h2 class="heading-secondary margin-bottom--sm center-text">Login</h2>
            <form class="cta-form signin-form" name="sign-in" netlify>            
              <div>
                <label for="email">Email address</label>
                <input id="email" name="email" type="email" placeholder="me@example.com" required />
              </div>
              <div>
                <label for="password">Password</label>
                <input id="password" name="password" type="password" required />
              </div>
              
              <button class="btn btn--form">Sign in</button>
              <p class="sign-up--link">Dont have an account? <a class="sign-link" href="signup.php"> Sign Up</a></p>
            </form>
          </div>
      </div>
    </section>

    <?php include("../includes/footer.php")?>

</body>
</html>