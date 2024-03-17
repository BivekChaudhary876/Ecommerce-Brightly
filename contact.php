<?php
include('./DatabaseConnection/connection.php');
include('./functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <!-- Bootstrap CSS Link -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
 
 <!-- FontAswesome icon Link -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


 <title>Ecommerce Website Cart details</title>
</head>
<body>
 <!-- Navbar -->
 <div class="container-fluid p-0">
    <!-- first Child -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Brightly</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="display_all.php">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_items();
              ?></sup></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./Users/user_login.php"><i class="fa-solid fa-user"></i></a>
            </li>
          
          </ul>
         
        </div>
      </div>
    </nav>
    <h1 style="text-align:center;justify-content:center;background:aqua;"> Contact Details</h2>
    <h3 style="text-align:center;justify-content:center;">Address: Bijayachowk, Gaushala, Kathmandu</h3>
    <h3 style="text-align:center;justify-content:center;">Phone NUmber: 9825347589</h3>
    <h3 style="text-align:center;justify-content:center;">Email: infobrightly@gmail.com </h3>


    <!-- Footer Section -->
    <!-- include footer -->
    <?php
      include("./DatabaseConnection/footer.php");
    ?>
</body>
</html>