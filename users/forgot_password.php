<?php 
include("../connect/connect.php"); 
include('../functions/function.php');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

$msg="";

if (isset($_POST['submit'])){
  $email = $_POST['email'];
  $code = md5(rand());


  $select_query="select * from user where email='$email'";
  $result=mysqli_query($con,$select_query);
  $row_count=mysqli_num_rows($result);
  if($row_count > 0){
    $query = mysqli_query($con,"update user set code='$code' where email='$email'");
    
    if ($query){
      echo "<div style='display:none;'>";
      $mail = new PHPMailer(true);
      try {
      $mail->SMTPDebug = 2;                      //Enable verbose debug output
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'sleekbiz101@gmail.com';                     //SMTP username (use your email)
      $mail->Password   = 'wwsyjtuoxhgfqzuu';                               //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
      $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
  
    //Recipients
      $mail->setFrom('sleekbiz101@gmail.com', 'Labib');
      $mail->addAddress($email);     //Add a recipient
  
  //   $mail->SMTPOptions = array(
  //     'ssl' => array(
  //         'verify_peer' => false,
  //         'verify_peer_name' => false,
  //         'allow_self_signed' => true
  //     )
  // );
  
    //Content
     $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'no reply';
      $email_template ="Here is the reset link <a href='http://localhost/food%20delivery/users/reset_password.php?reset=$code'>Click me</a>";
      $mail->Body    = $email_template;
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
  
      $mail->send();
      $msg= "<div class='alert alert-success'>We've sent a reset link to your email address</div>";
    } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
    }
  echo "</div>";

  }
  else{
    $msg= "<div class='alert alert-error'>This account does not exist</div>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot Password</title>

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


  <main>

    <section class="account-section">
      <div class="container">
        <div class="account-card">
          <div class="form-btn">
            <span class="heading-tertiary">Forgot Password</span>
          </div>          
          <p class="subtext">Type in your email and a reset link will be sent to you</p>
          <?php echo $msg;?>
          <form class="forgot_form" action="" method="post">
            <input type="email" placeholder="Someone@example.com" class="email" name="email" required>            
            <button type="submit" class="btn btn--form" name="submit">Send reset link</button>            
            <p class="small">Back to! <a href="signin.php" class="sign-link">login</a></p>            
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