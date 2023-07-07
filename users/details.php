<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>food</title>

  <link rel="stylesheet" href="../css/general.css">
  <link rel="stylesheet" href="../css/style.css">

</head>
<body>

  <?php include("../includes/header.php")?>

  <main>
    <section class="meals-section" id="meals">
    <div class="container">
      <div class="flex-center">
        <img src="../img/meals/meal-2.jpg" alt="Avocado Salad" class="meals-img--desc" />
      </div>
      <div class="container">
        <div class="flex-cl">
          <p class="meal-name">pasta</p>
          <p class="meal-price">₦ 4650</p>
        </div>
        <p class="heading-tertiary">
          Description
        </p>
        <p class="meal-description">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Neque, nostrum quisquam? Fugiat officia provident atque sapiente vitae animi aut neque nam, nulla ipsum! Aspernatur expedita ratione, sit modi rem commodi!</p>
        <form class="cta-form" name="address" netlify>
        <div>
          <label for="address">Address</label>
          <input id="address" name="address" type="text" placeholder="NO 123 street maitama, Abuja" required />
        </div>
        </form>
        <div class="flex-end">
          <button class="btn btn--search" name="order" type="submit">
            add to cart
          </button>
        </div>
      </div> 
    </div>
    </section>
      
  </main>
  <?php include("../includes/footer.php")?>

  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>