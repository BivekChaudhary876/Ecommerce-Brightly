<?php
include("../DatabaseConnection/connection.php");
include('../functions/common_function.php');
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
 <title>User Registration</title>
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
  <h2 class="text-center">User Registration</h2>
  <div class="row d-flex align-items-center justify-content-center">
   <div class="col-lg-12 col-xl-6">
    <form action="" method="POST" enctype="multipart/form-data " class="m-3 p-3 border border-light rounded">
     <!-- Username field -->
     <div class="form-outline mb-2">
      <label for="user_username" class="col-sm-2 col-form-label">Username</label>
      <input type="text" class="form-control" id="user_username" name="user_username" placeholder="Enter Your Username" required="required" autocomplete="off">
      <!-- <span><?php echo $errName;?></span><br/><br/> -->
     </div>
     <!-- Email Field -->
     <div class="form-outline mb-2">
      <label for="user_email" class="col-sm-2 col-form-label">Email</label>
      <input type="email" class="form-control" id="user_email" name="user_email" placeholder="abc@gmail.com" required="required" autocomplete="off">
     </div>
     
     <!-- Password Field -->
     <div class="form-outline mb-2">
      <label for="user_password" class="col-sm-2 col-form-label">Password</label>
      <input type="password" class="form-control" id="user_password" name="user_password" placeholder="Password" required="required" autocomplete="off">
     </div>
     <!-- Confirm Password Field -->
     <div class="form-outline mb-2">
      <label for="confirm_user_password" class="col-form-label">Confirm Password</label>
      <input type="password" class="form-control" id="confirm_user_password" name="confirm_user_password" placeholder="Re-enter Your Password" required="required" autocomplete="off">
     </div>
     <!-- Address field -->
     <div class="form-outline mb-2">
      <label for="user_address" class="col-sm-2 col-form-label">Address</label>
      <input type="text" class="form-control" id="user_address" name="user_address" placeholder="Enter Your Address" required="required" autocomplete="off">
     </div>
     <!-- Contact field -->
     <div class="form-outline mb-2">
      <label for="user_mobile" class="col-sm-2 col-form-label">Contact</label>
      <input type="text" class="form-control" id="user_mobile" name="user_mobile" placeholder="Enter Your Contact Number" required="required" autocomplete="off">
     </div>
     <div class=" text-center mt-2 pt-2"> 
      <input type="submit" class="btn btn-outline-success py-2 px-3" value="Register" name="user_register">
      <p class="pt-2 mb-0">Already have an account? <a href="user_login.php"class="link-secondary">Login</a></p>
     </div>
  </div>
 </div>
</body>
</html>



<?php

 if(isset($_POST['user_register']))
 {
  $username = $_POST['user_username']; 
  $email = $_POST['user_email'];
  $password = $_POST['user_password'];
  $hash_password = password_hash($password, PASSWORD_DEFAULT);
  $confirm_password = $_POST['confirm_user_password'];
  $user_ip = getIPAddress();
  $address = $_POST['user_address'];
  $mobile = $_POST['user_mobile'];
  
  
//   // Select Query from database
  $select_query = "SELECT * FROM user_table WHERE user_username = '$username' or user_email='$email'";
  $select_result = mysqli_query($conn, $select_query);
  // Count Result
  $count_result = mysqli_num_rows($select_result);
  if($count_result > 0)
  {
   echo "<script>alert('Username or Email Already Exists')</script>";
  }elseif ($password != $confirm_password) {
   echo "<script>alert('Passwords do not match')</script>";
  }
  else {
//    //Inserting Details into database
   $insert_query = "INSERT INTO user_table (user_username,user_email,user_password,user_ip,user_address,user_mobile) VALUES ('$username','$email','$hash_password','$user_ip','$address','$mobile')";
   $result = mysqli_query($conn,$insert_query);
   if($result)
   {
    echo "<script>alert('Data is inserted Successfully')</script>";
   }
//    // else {
//    //  die("Connection Failed:".mysqli_connect_error());
//    // }
  }
 }


// //  Selecting cart items
//  $select_cart_query = "SELECT * FROM cart_details WHERE ip_address= '$user_ip'";
//  $select_cart_result = mysqli_query($conn, $select_cart_query);
//  $count_cart_result = mysqli_num_rows($select_cart_result);
//  if($count_cart_result > 0)
//  {
//     $_SESSION['user_username']=$username;
//     echo "<script>alert('You have items in your cart')</script>";
//     echo "<script>window.open('checkout.php','_self')</script>";
//  }else
//  {
//     echo "<script>window.open('../index.php','_self')</script>";
//  }

?>