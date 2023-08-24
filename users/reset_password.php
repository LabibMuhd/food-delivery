<?php 
include("../connect/connect.php"); 
include('../functions/function.php');

$msg="";

if (isset($_GET['reset'])){
  $code=$_GET['reset'];
  $query = mysqli_query($con,"Select * from user where code='$code'");
  $row_count = mysqli_num_rows($query);
  if($row_count > 0){
    if (isset($_POST['submit'])){
      $password=$_POST['password'];
      $c_password=$_POST['confirm_password'];
      $password_hash=password_hash($password,PASSWORD_DEFAULT);

      // Validate password strength
      $password_check = preg_match_all('/(?=.*[a-z])(?=.*[0-9])(?=.*[A-Z])(?=.*[@_*^`~":!?])[a-zA-Z0-9@_*^`~":!?]{8,}/m', $password);
      if($password!=$c_password){
        $msg = "<div class='alert alert-error'><p>Passwords do not match</p></div>";
        
      }
      else if(!$password_check) {
        $msg = "<div class='alert alert-error'>Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.</div>";
      }
      else{
        $update_query = mysqli_query($con,"update user set password='$password_hash', code='' where code='$code'");
        if($update_query){
          echo "<script>window.open('signin.php','_self')</script>";
        }
      }
  
    }
  } else{
    $msg = "<div class='alert alert-error'>Reset link expired</div>";
  }
}

else{
  echo "<script>window.open('../index.php','_self')</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>

  <link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="../css/general.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="../css/queries.css?v=<?php echo time(); ?>">


  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Gilda+Display&display=swap" rel="stylesheet">
</head>

<body>
  <?php 
  include('../includes/header.php')
  ?>
  <main>

    <section class="account-section">
      <div class="container">
        <div class="account-card">
          <div class="form-btn">
            <span class="heading-tertairy">Change Password</span>
          </div>
          <?php echo $msg;?>
          <form class="forgot_form" action="" method="post">
            <input type="password" placeholder="Enter new password" class="email" name="password" required>
            <input type="password" placeholder="Confirm Password" class="email" name="confirm_password" required>
            <button type="submit" class="btn btn--form" name="submit">Change password</button>
          </form>
        </div>
      </div>
    </section>

  </main>

 <script defer src="../js/account.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
<?php



?>