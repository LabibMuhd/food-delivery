<?php
include("../connect/connect.php");
include("../functions/function.php");
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Account</title>

  <link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="../css/general.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="../css/queries.css?v=<?php echo time(); ?>">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Gilda+Display&display=swap" rel="stylesheet">
  
  <script defer src="js/script.js?v=<?php echo time(); ?>"></script>
</head>

<body>
  <?php include ("../includes/header.php"); ?>

  <?php 

  $user_ip=getIPAddress();
  $get_user="Select * from `user` where user_ip='$user_ip'";
  $result=mysqli_query($con,$get_user);
  $run_query=mysqli_fetch_array($result);
  $user_id=$run_query['user_id'];
  ?>

  <section class="profile-section"> 
    <div class="container account_grid">
    <div class="account-option">
    <nav class="navigation-side color--white">
      <ul class="meal-attributes">
      <li class='navigation-item'>
        <a href='profile.php' class='main-nav-link'>
          <div class='flex'>
            <ion-icon name='person-outline' class='contact-icon color--primary'></ion-icon>
            <span>My Account</span>
          </div>
        </a>
        <hr>
      </li>
      <li class='navigation-item'>
        <a href='profile.php?my_order' class='main-nav-link'>
          <div class='flex'>
            <ion-icon name="file-tray-outline" class='contact-icon color--primary'></ion-icon>
            <span>orders</span> 
          </div>
        </a>
      </li>
      </li>
      <li class='navigation-item'>
        <a href='profile.php?change_password' class='main-nav-link'>
          <div class='flex'>
            <ion-icon name='lock-closed-outline' class='contact-icon color--primary'></ion-icon>
            <span>Change Password</span>             
          </div>
        </a>
      </li>
      <hr>
      <a href="logout.php" class="cart-delete center-text">Logout</a>
      </ul>
    </nav>
</div>


    <div class="account-information height-big">
      
        <?php
        get_account_details();
        if(isset($_GET['edit_address'])){
          include("edit_account.php");
        }
        if (isset($_GET['my_order'])){
          include ("my_orders.php");
        } 
        if (isset($_GET['change_password'])){            
              include ("change_password.php");     
        }       
        ?>
     
    </div>

  </section>
  
  <?php include ("../includes/footer.php"); ?>
  

  <script defer src="js/script.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

  
</body>

</html>