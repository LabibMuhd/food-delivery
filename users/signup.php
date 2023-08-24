<?php 
include('../connect/connect.php');
include('../functions/function.php');

$msg="";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

function sendemail_verify($first_name,$email,$verify_token){
  
  echo "<div style='display: none;'>";
  $mail = new PHPMailer(true);
  try{
  $mail->SMTPDebug = 2;                      //Enable verbose debug output
  $mail->isSMTP();                                            //Send using SMTP
  $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
  $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
  $mail->Username   = 'sleekbiz101@gmail.com';                     //SMTP username
  $mail->Password   = 'wwsyjtuoxhgfqzuu';                               //SMTP password
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
  $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

  //Recipients
  $mail->setFrom('sleekbiz101@gmail.com', 'Labib');   // replace with your own email and name
  $mail->addAddress($email);     //Add a recipient

  //Content
  $mail->isHTML(true);                                  //Set email format to HTML
  $mail->Subject = 'no reply';

  $email_template ="
      <h2>You have Registered with P.Eats</h2>
      <h4>Verify your email address to login with the below given link</h4>
      <br/><br/>
      <a href='http://localhost/food%20delivery/users/signin.php?token=$verify_token'>Click me</a>
      ";

  $mail->Body    = $email_template;
  // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

  $mail->send();
  echo "</div>";
} catch (Exception $e) {
  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}


if(isset($_POST['sign_up'])){
  $first_name=$_POST['first_name'];
  $last_name=$_POST['last_name'];
  $email=$_POST['email'];
  $address=$_POST['address'];
  $phone_num=$_POST['phone'];
  $password=$_POST['password'];
  $password_hash=password_hash($password,PASSWORD_DEFAULT);
  $confirm_password=$_POST['confirm_password'];
  $verify_token= md5(rand());
  $user_ip=getIPAddress();

 

  // Validate password strength
  $password_check = preg_match_all('/(?=.*[a-z])(?=.*[0-9])(?=.*[A-Z])(?=.*[@_*^`~":!?])[a-zA-Z0-9@_*^`~":!?]{8,}/m', $password);

  
  // select query
  $select_query="Select * from `user` where email='$email'";
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
    sendemail_verify("$first_name","$email","$verify_token");
    // insert query
    $insert_query="Insert into `user` (first_name,last_name,email,address,phone,password,user_ip,code) values ('$first_name','$last_name','$email','$address','$phone_num','$password_hash','$user_ip','$verify_token')";
    $sql_execute=mysqli_query($con,$insert_query);
    if($sql_execute){
      $msg = "<div class='alert alert-success'>Data inserted succesfully check ur email to verify and login</div>";
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
  <link rel="stylesheet" href="../css/queries.css?v=<?php echo time(); ?>">
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
            <?php echo $msg;?>

            <form class="cta-form" name="sign-up" method="post">
              <div>
                <label for="first-name">First Name</label>
                <input id="first-name" name="first_name" type="text" placeholder="Labib" required />
              </div>
              <div>
                <label for="last-name">Last Name</label>
                <input id="last-name" name="last_name" type="text" placeholder="Muhammad" required />
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
                <label for="phone">Phone Number</label>
                <input id="phone" name="phone" type="text" placeholder="09012345678" required />
              </div>
              <div>
                <label for="password">Password</label>
                <input id="password" name="password" type="password" placeholder="Should contain at least 1 upperCase, lowercase, a number and special character" required />
              </div>
              <div>
                <label for="confirm-password">Confirm Password</label>
                <input id="confirm-password" name="confirm_password" type="password" placeholder="Cwerd@1234" required />
              </div>
              <button type="submit" class="btn btn--form" name="sign_up">Sign up now</button>
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