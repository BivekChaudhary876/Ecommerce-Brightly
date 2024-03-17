<?php
include("../DatabaseConnection/connection.php");
include('../functions/common_function.php');
@session_start();
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
 <title>User Login</title>
</head>
<body>  
 <div class="container-fluid">
   <!-- Header -->
     <!-- first Child -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="../index.php">Brightly</a>
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
          </ul>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
            <input type="submit" value="Search" class="btn btn-outline-dark">
          </form>
        </div>
      </div>
    </nav>
  <h2 class="text-center">User Login</h2>
  <div class="row d-flex align-items-center justify-content-center">
   <div class="col-lg-12 col-xl-6">
    <form action="" method="POST" enctype="multipart/form-data " class="m-3 p-3 border border-light rounded">
     <!-- Username field -->
     <div class="form-outline mb-2">
      <label for="user_username" class="col-sm-2 col-form-label">Username</label>
      <input type="text" class="form-control" id="user_username" name="user_username" placeholder="Enter Your Username" required="required" autocomplete="off">
     </div>
     <!-- Password Field -->
     <div class="form-outline mb-2">
      <label for="user_password" class="col-sm-2 col-form-label">Password</label>
      <input type="password" class="form-control" id="user_password" name="user_password" placeholder="Password" required="required" autocomplete="off">
     </div>
     <div class=" text-center mt-2 pt-2"> 
      <input type="submit" class="btn btn-outline-success py-2 px-3" name="user_login" value="Login">
      <p class="pt-2 mb-0">Don't have an account? <a href="user_registration.php"class="link-secondary">Register</a></p>
     </div>
  </div>
 </div>
</body>
</html>

<?php
if(isset($_POST['user_login']))
{
   $username = $_POST['user_username'];
   $password = $_POST['user_password'];
   $select_query = "SELECT * FROM user_table WHERE user_username = '$username'";
   $result = mysqli_query($conn, $select_query);
   $count_result = mysqli_num_rows($result);
   $count_data = mysqli_fetch_assoc($result);
   $user_ip = getIPAddress();


   //  Selecting Cart item
   $select_query_cart = "SELECT * FROM cart_details WHERE ip_address = '$user_ip'";
   $result_cart = mysqli_query($conn, $select_query_cart);
   $count_result_cart = mysqli_num_rows($result_cart);

   if($count_result > 0)
   {
      $_SESSION['user_username']=$username;
   if(password_verify($password,$count_data['user_password']))
   {
      if($count_result == 1 and $count_result_cart == 0)
      {
         $_SESSION['user_username']=$username;
         echo "<script>alert('Login Successful')</script>";
         echo "<script>window.open('profile.php','_self')</script>";
      }
      else {
         $_SESSION['user_username']=$username;
         echo "<script>alert('Login Successfull')</script>";
         echo "<script>window.open('payment.php','_self')</script>";
      }
      
   }
   else {
   {
      echo "<script>alert('Password Incorrect')</script>";
   }
   }
   }
   else
   {
      echo "<script>alert('Invalid username or password')</script>";
   }
   }
?>