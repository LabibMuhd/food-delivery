<?php
include('../connect/connect.php');
include('../functions/function.php');
@session_start();
$msg='';

if (isset($_GET['token'])){
  $token=$_GET['token'];
  $select_query="Select * from `user` where code='$token'";
  $result=mysqli_query($con,$select_query);
  $row_count=mysqli_num_rows($result);
  if ($row_count > 0){
    $update_query="Update user set code='' where code='$token'";
    $query = mysqli_query($con, $update_query);
    if($query){
      $msg = "<div class='alert alert-success'>Verified successfully proceed to login</div>";
    }
    else{
      echo "<script>window.open('../index.php','_self')</script>";
    }
  }
}

if(isset($_POST['sign_in'])){
  $email=$_POST['email'];
  $password=$_POST['password'];

  $select_query="Select * from `user` where email='$email'";
  $result=mysqli_query($con,$select_query);
  $row_count=mysqli_num_rows($result);
  if($row_count > 0){
      $row_data=mysqli_fetch_assoc($result);
      $user_id=$row_data['user_id'];
      $name=$row_data['first_name'];
      $user_ip=getIPAddress();
  
      $select_cart_query="Select * from `cart` where user_ip='$user_ip'";
      $select_cart=mysqli_query($con,$select_cart_query);
      $row_count_cart=mysqli_num_rows($select_cart);
      if($row_count>0){
        if(password_verify($password, $row_data['password'])){
          if(!isset($_GET['payment_for'])){
            $_SESSION['name']=$name;
            $_SESSION['id']=$user_id;
            $_SESSION['email']=$email;
            echo "<script>window.open('../index.php', '_self')</script>";
            // $row_count==1 and $row_count_cart==0
          }       
          else{
            $_SESSION['name']=$name;
            $_SESSION['id']=$id;
            $_SESSION['email']=$email;
            echo "<script>window.open('summary.php', '_self')</script>";
          }   
      }
      else{
        $msg = "<div class='alert alert-error'>Incorrect Password</div>";  
      }
    }
  }
  else{
      $select_admin_query="Select * from `admin_restaurant` where email='$email'";
      $result_admin=mysqli_query($con,$select_admin_query);
      $row_count_admin=mysqli_num_rows($result_admin);
      if($row_count_admin > 0){
        $row=mysqli_fetch_assoc($result_admin);
        $name=$row['restaurant_name'];
        $id=$row['id'];
        if(password_verify($password, $row['password'])){
        $_SESSION['aname']=$name;
        $_SESSION['aid']=$id;
        $_SESSION['aemail']=$email;
        echo "<script>window.open('../admin/index.php', '_self')</script>";
      }
      else{
        $msg = "<div class='alert alert-error'>Incorrect Password</div>";  
      }     
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
  <link rel="stylesheet" href="../css/queries.css?v=<?php echo time(); ?>">

  <script defer src="../js/cart.js?v=<?php echo time(); ?>"></script>
</head>
<body>
<header class="header">
    <a href="../index.php">
      <img src="../img/omnifood-logo.png" alt="Omnifood logo" class="logo" />
    </a>

    <nav class="main-nav ">
      <ul class="main-nav-list">
        <li><a class="main-nav-link" href="../index.php">Home</a></li>
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
        <h2 class="heading-secondary margin-bottom--sm center-text">Login</h2>
        <div class="cta-sign-in">
            <?php echo $msg;?>
            <form class="cta-form signin-form" name="sign-in" method='post'>   
              <div>
                <label for="email">Email address</label>
                <input id="email" name="email" type="email" placeholder="me@example.com" required />
              </div>
              <div>
                <label for="password">Password</label>
                <input id="password" name="password" type="password" required />
              </div>
              
              <button type='submit' class="btn btn--form" name="sign_in">Sign in</button>
              <a class="sign-link" href="forgot_password.php"> Forgot password?</a>
              <p class="sign-up--link">Dont have an account? <a class="sign-link" href="signup.php"> Sign Up</a> or <a class="sign-link" href="../admin/admin_register.php">sign up to be a vendor</a></p>
            </form>
          </div>
      </div>
    </section>

    <?php include("../includes/footer.php")?>

</body>
</html>