<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" href='../css/general.css'>
  <link rel="stylesheet" href='../css/style.css'>
</head>
<body>
<main>
    <section class="admin-control_section">
      <h1 class="heading-admin">Manage Details</h1>
      <section class="admin-section">
        <a href="insert_product.php" class=''><button class="btn btn--form">Add menu</button></a>
        <a href="index.php?view_products" class=''><button class='btn btn--form'>View Products</button></a>
        <a href="index.php?list_orders" class=''><button class='btn btn--form'>All Orders</button></a>
        <a href="#" class=''><button class='btn btn--form'>All Payments</button></a>
        <a href="logout.php" class=''> <button class='btn btn--form btn-logout color-red'>Logout</button></a>
      </section>

      <div class="container">
        <?php
          include('view_products.php');
        ?>
      </div>
    </section>
</main>
</body>
</html>