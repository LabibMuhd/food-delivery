<?php 
include('../connect/connect.php');
include("../functions/function.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" href='../css/general.css?v=<?php echo time(); ?>'>
  <link rel="stylesheet" href='../css/style.css?v=<?php echo time(); ?>'>
</head>
<body>
<main>
<header class="header">
    <a href="index.php"><img src="../img/omnifood-logo.png" alt="meena kawu logo" class="logo"></a>
    <?php 
        if(!isset($_SESSION['aemail'])){
          echo "<a href='admin_login.php' class='main-nav-link'>Welcome, Guest</a>";
        }
        else{
          echo "<a class='main-nav-link'>
                    <div class='flex'>
                      <ion-icon name='person-outline' class='contact-icon'></ion-icon>
                      <span>Welcome, </span> 
                      <span>Admin".$_SESSION['aid']."</span>
                    </div>
                  </a>             
          ";
        }
        ?>
    
  </header>
  

    <section class="admin-control_section">
      <h1 class="heading-admin">Manage Details</h1>
      <section class="admin-section">
        <a href="index.php?insert_menu" class=''><button class="btn btn--search">Insert menu</button></a>
        <a href="index.php?view_menu" class=''><button class='btn btn--search'>View menu</button></a>
        <a href="index.php?insert_category" class=''><button class='btn btn--search'>Insert category</button></a>
        <a href="index.php?list_orders" class=''><button class='btn btn--search'>All Orders</button></a>
        <a href="../users/logout.php" class=''> <button class='btn btn--search btn-logout'>Logout</button></a>
      </section>
    </section>

    <section class="admin-body">
        <div class="container-bg">
          <?php         
          
          if(isset($_GET['insert_menu'])){
            include('insert_menu.php');
          }
          else if(isset($_GET['edit_menu'])){
            include('edit_menu.php');
          }
          else if(isset($_GET['insert_category'])){
            include('insert_category.php');
          }
          else if(isset($_GET['list_orders'])){
            include('list_orders.php');
          }
          else{
            include('view_menu.php');
          }
          ?>
        </div>
    </section>
  </main>
  <?php include ('../includes/footer.php')?>
  <!-- popup window -->
  <div class="popup" id="popup">
    <form action="" method="post">
      <div class="popup__content">
        <div class='popup_heading'>
            <h3 class='heading-tertiary'>Delete Item</h3>
            <a href='#' class='popup__close'>&times;</a>
          </div>
          <p class='meal-description'>Are u sure u want to remove this item?</p>
          <div class='buttons-submit'>
            <input type='submit' class='btn btn--search' name='remove_cart' value='Yes'>
            <input type='submit' class='btn btn--search' name='no' value='No'>
          </div>
      </div>
    </form>
  </div>
    
  <?php
  if(isset($_GET['delete_id'])){
    $delete=$_GET['delete_id'];
    if(isset($_POST['remove_cart'])){
      $delete_cart="Delete from `menu` where id=$delete";
      $result=mysqli_query($con,$delete_cart);
      if($result){
        echo"<script>alert('Item has been deleted')</script>";
        echo"<script>window.open('index.php', '_self')</script>";
      }
    }
    if(isset($_POST['no'])){
      echo "<script>window.open('index.php', '_self')</script>";
    }
  }
?>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>