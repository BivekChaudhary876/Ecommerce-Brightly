<?php
include('../DatabaseConnection/connection.php');
include('../functions/common_function.php');
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

<style>
  body{
    overflow-x: hidden;
  }
  .logo {
  width: 7%;
  height: 7%;
}

.card-img-top {
  width: 100%;
  height: 200px;
  object-fit: contain;
}

.admin_image {
  width: 100px;
  object-fit: contain;
}
 </style>
 <title>Ecommerce Website</title>
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
              <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../display_all.php">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_items();
              ?></sup></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="user_login.php"><i class="fa-solid fa-user"></i></a>
            </li>
          </ul>
          <form class="d-flex" action="../search_product.php" method="get">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
            <input type="submit" value="Search" class="btn btn-outline-dark" name="search_data_product">
          </form>
        </div>
      </div>
    </nav>

    <!-- calling cart Function -->
    <?php 
      cart(); 
    ?>


    <!-- Second Child -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
      <div class="container-fluid">
        <ul class="navbar-nav me-auto">
        <?php
        if(!isset($_SESSION['user_username']))
        {
          echo "<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome Guest</a>
        </li>";
        }
        else {
          echo "<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome ".$_SESSION['user_username']."</a> 
        </li>";
        }
        if(!isset($_SESSION['user_username']))
        {
          echo "<li class='nav-item'>
          <a class='nav-link' href='user_login.php'>Login</a> 
        </li>";
        }
        else {
          echo "<li class='nav-item'>
          <a class='nav-link' href='logout.php'>Logout</a> 
        </li>";
        }
        ?>
      </ul>
      </div>
    </nav>
    <!-- third child -->
    <div class="bg-light">
      <h3 class="text-center">Products</h3>
      <p class="text-center">All the product items are genuine and delivered all over the country
      </p>
    </div>

    <!-- fourth child -->
    <div class="row">
     <div class="col-md-2 p-0">
      <ul class="navbar-nav bg-secondary text-center" style="height:100vh">
       <li class="nav-link bg-success text-light" href="#"><h4>Your Profile</h4></li>
       <li class="nav-item" ><a class="nav-link text-light" href="profile.php">Pending Orders</a></li>
       <li class="nav-item" ><a class="nav-link text-light" href="profile.php?edit_account">Edit Account</a></li>
       <li class="nav-item" ><a class="nav-link text-light" href="profile.php?my_orders">My Orders</a></li>
       <li class="nav-item"><a class="nav-link text-light" href="profile.php?delete_account">Delete Account</a></li>
       <li class="nav-item" ><a class="nav-link text-light" href="logout.php">Logout</a></li>
      </ul>
     </div>
     <div class="col-md-10">

     </div>
    </div>
    <!-- Footer Section -->
    <?php
    include('../DatabaseConnection/footer.php');
    ?>
  </div>
</body>
</html>