<?php
include("../DatabaseConnection/connection.php");
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
 <title>Admin Registration</title>
</head>
<body>
 <div class="container-fluid">
    <!-- header -->
   <?php include('../header.php');?>
  <h2 class="text-center">Admin Registration</h2>
  <div class="row d-flex align-items-center justify-content-center">
   <div class="col-lg-12 col-xl-6">
    <form action="" method="POST" class="m-3 p-3 border border-light rounded">
     <!-- Username field -->
     <div class="form-outline mb-2">
      <label for="admin_username" class="col-sm-2 col-form-label">Username</label>
      <input type="text" class="form-control" id="admin_username" name="admin_username" placeholder="Enter Your Username" required="required" autocomplete="off">
      
     </div>
     <!-- Email Field -->
     <div class="form-outline mb-2">
      <label for="admin_email" class="col-sm-2 col-form-label">Email</label>
      <input type="email" class="form-control" id="admin_email" name="admin_email" placeholder="abc@gmail.com" required="required" autocomplete="off">
     </div>
     <!-- Password Field -->
     <div class="form-outline mb-2">
      <label for="admin_password" class="col-sm-2 col-form-label">Password</label>
      <input type="password" class="form-control" id="admin_password" name="admin_password" placeholder="Password" required="required" autocomplete="off">
     </div>
     <!-- Confirm Password Field -->
     <div class="form-outline mb-2">
      <label for="confirm_admin_password" class="col-form-label">Confirm Password</label>
      <input type="password" class="form-control" id="confirm_admin_password" name="confirm_admin_password" placeholder="Re-enter Your Password" required="required" autocomplete="off">
     </div>
     <!-- Address field -->
     <div class="form-outline mb-2">
      <label for="admin_address" class="col-sm-2 col-form-label">Address</label>
      <input type="text" class="form-control" id="admin_address" name="admin_address" placeholder="Enter Your Address" required="required" autocomplete="off">
     </div>
     <!-- Contact field -->
     <div class="form-outline mb-2">
      <label for="admin_mobile" class="col-sm-2 col-form-label">Contact</label>
      <input type="text" class="form-control" id="admin_mobile" name="admin_mobile" placeholder="Enter Your Contact Number" required="required" autocomplete="off">
     </div>
     <div class=" text-center mt-2 pt-2"> 
      <input type="submit" class="btn btn-outline-success py-2 px-3" name="admin_registration" value="Register" name="admin_register">
      <p class="pt-2 mb-0">Already have an account? <a href="admin_login.php"class="link-secondary">Login</a></p>
     </div>
  </div>
 </div>
</body>
</html>



<?php

 // $errUsername=$errPassword=$errConfirmPassword=$errAddress=$errMobile='';

 if(isset($_POST['user_register']))
 {
  $username = $_POST['user_username']; 
  $email = $_POST['user_email'];
  $password = $_POST['user_password'];
  $hash_password = password_hash($password, PASSWORD_DEFAULT);
  $confirm_password = $_POST['confirm_user_password'];
  // $image = $_FILES['user_image']['name'];
  // $tmp_image = $_FILES['user_image']['tmp_name'];
  // move_uploaded_file($tmp_image, "./User_images/$image");
  $image = $_FILES['user_image'];
  $imageName = $_FILES['user_image']['name'];
  $imageTmpName = $_FILES['user_image']['tmp_name'];
  $imageSize = $_FILES['user_image']['size'];
  $imageError = $_FILES['user_image']['error'];
  $imageType = $_FILES['user_image']['type'];
  // Get the image extension
  $imageExt = explode('.', $imageName);
  $imageActualExt = strtolower(end($imageExt));

  // Allowed image extensions
  $allowed = array('jpg', 'jpeg', 'png', 'gif');

  // Check if the image extension is allowed
  if (in_array($imageActualExt, $allowed)) {
      // Check for any errors
      if ($imageError === 0) {
          // Check image size
          if ($imageSize < 1000000) {
              // Generate a unique name for the image
              $imageNameNew = uniqid('', true).".".$imageActualExt;
              // Set the destination for the image
              $imageDestination = './User_images/'.$imageNameNew;
              // Move the image to the desired folder
              move_uploaded_image($imageTmpName, $imageDestination);
              
          }
      }
  }


  // $user_ip = getIPAddress()
  $address = $_POST['user_address'];
  $mobile = $_POST['user_mobile'];

  // //Validating the form field
  // validateName($_POST["user_username"]);
  // validateEmail($_POST["user_email"]);
  // validateName($_POST["user_password"]);
  // validateAddress($_POST["user_address"]);
  // validatePhone($_POST["user_mobile"]);
 
  // $name_error = $address_error = $phone_error = $email_error = "";
  // function validateName($username) {
  //     if(empty($username)) {
     
  //         $name_error = "Name empty.";
  //     } else {
  //         if(!preg_match("/^[a-zA-z]+$/", $username)) {
              
  //             $name_error = "Name invalid.";
  //         }
  //     }
  // }

  // function validateEmail($email) {
  //     if(empty($email)) {
  //         $email_error = "Email empty.";
  //     } else {
  //         if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  //             $email_error = "Invalid email format.";
  //         }
  //     }
  // }
  // function validatePassword($hash_password) {
  //     if(empty($hash_password)) {
     
  //         $password_error = "Name empty.";
  //     } else {
  //         if(!preg_match("/^[a-zA-z]+$/", $hash_password)) {
              
  //             $password_error = "Name invalid.";
  //         }
  //     }
  // }
  // function validateAddress($address) {
  //     if(empty($address)) {
  //         $address_error = "Address empty.";

  //     } else {
  //         if(!preg_match("/^[a-zA-z0-1]+$/", $address)) {
  //             $address_error = "Address invalid.";
  //         }
  //     }
  // }
  // function validatePhone($mobile) {
  //     if(empty($mobile)) {
  //         $phone_error = "Phone empty.";

  //     } else {
  //         if(!preg_match("/^98[0-9]{8}+$/", $mobile)) {
  //             $phone_error = "Phone invalid.";
  //         }
  //     }
  // }


  // Select Query from database
  $select_query = "SELECT * FROM user_table WHERE username = '$user_username'";
  $select_result = mysqli_query($connection, $select_query);
  // Count Result
  $count_result = mysqli_num_rows($select_result);
  if($count_result > 0)
  {
   echo "<script>alert('Username Already Exists')</script>";
  }elseif ($password != $confirm_password) {
   echo "<script>alert('Passwords do not match')</script>";
  }
  else {
   //Inserting Details into database
   $insert_query = "SELECT INTO user_table (username,user_email,user_password,user_address,user_mobile) VALUES ('$username','$email','$hash_password','$imageNameNew','$address','$mobile')";
   $result = mysqli_query($conn,$insert_query);
   if($result)
   {
    echo "<script>alert('Data is inserted Successfully')</script>";
   }
   else {
    die("Connection Failed:".mysqli_connect_error());
   }
  }
 }

?>