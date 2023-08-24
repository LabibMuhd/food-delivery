<?php 
include('../connect/connect.php');
include('../functions/function.php');

$msg="";

if(isset($_POST['sign_up'])){
  $owner=$_POST['owner'];
  $restaurant=$_POST['restaurant'];
  $email=$_POST['email'];
  $address=$_POST['address'];
  $phone_num=$_POST['phone'];
  $password=$_POST['password'];
  $password_hash=password_hash($password,PASSWORD_DEFAULT);
  $confirm_password=$_POST['confirm_password'];

  $logo=$_FILES['logo']['name'];

  $temp_logo=$_FILES['logo']['tmp_name'];
  $user_ip=getIPAddress();

  // Validate password strength
  $password_check = preg_match_all('/(?=.*[a-z])(?=.*[0-9])(?=.*[A-Z])(?=.*[@_*^`~":!?])[a-zA-Z0-9@_*^`~":!?]{8,}/m', $password);

  
  // select query
  $select_query="Select * from `admin_restaurant` where email='$email'";
  $result=mysqli_query($con,$select_query);
  $rows_count=mysqli_num_rows($result);
  if($rows_count>0){
    $msg = "<div class='alert alert-error'>This user already exists.</div>";
    // echo "<script>window.open('user_register.php','_self')</script>";
  }
  else if($password!=$confirm_password){
    $msg = "<div class='alert alert-error'><p>Passwords do not match</p></div>";
    // echo $msg;
    
  }
  else if(!$password_check) {
    $msg = "<div class='alert alert-error'>Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.</div>";
    // echo "<scrip>window.open('user_register.php','_self')</script>";  
  }
  else{
    // insert image into project folder
    move_uploaded_file($temp_logo,"./food_img/$logo");

    // insert query
    $insert_query="Insert into `admin_restaurant` (restaurant_name,owner,email,logo,address,phone,password) values ('$restaurant','$owner','$email','$logo','$address','$phone_num','$password_hash')";
    $sql_execute=mysqli_query($con,$insert_query);
    if($sql_execute){
      $msg = "<div class='alert alert-success'>Registered successfully</div>";  
      // echo "<script>window.open('index.php', '_self')</script>";
    }
    else{
      die(mysqli_error($con));
    }
  } 
}
?>


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
        <li><a class="main-nav-link nav-cta" href="../users/signin.php">Sign in</a></li>    
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
            <h2 class="heading-secondary">Become a vendor!</h2>
            <p class="cta-text">
              Sign up to become a registered food vendor with us
            </p>
            <?php echo $msg ?>
            <form class="cta-form" name="sign-up" method='post' enctype="multipart/form-data">
              <div>
                <label for="owner">Owner name</label>
                <input id="owner" name="owner" type="text" placeholder="Labib Muhammad" required />
              </div>
              <div>
                <label for="restaurant">Restaurant Name</label>
                <input id="restaurant" name="restaurant" type="text" placeholder="Cafe rock" required />
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
                <label for="phone">Phone</label>
                <input id="phone" name="phone" type="text" placeholder="09012345678" required />
              </div>
              <div>
                <label for="logo">Logo</label>
                <input id="logo" name="logo" type="file" required />
              </div>
              <div>
                <label for="password">Password</label>
                <input id="password" name="password" type="password" required />
              </div>
              <div>
                <label for="confirm-password">Confirm Password</label>
                <input id="confirm-password" name="confirm_password" type="password" required />
              </div>
              <button type='submit' class="btn btn--form" name='sign_up'>Sign up now</button>
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
